<? ob_start();?>
<meta charset="utf-8">
<?
class Code extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('codeModel');
		$this->load->library('session');
	}
	public function index(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			redirect('/code/cadiw','refresh');
		}
		$this->load->view('codeIndex');

	}
	public function login(){
		$id=$this->input->post('id');
		$pw=$this->input->post('pw');
		$result=$this->codeModel->login($id,$pw);
		if(count($result)==0){
			echo "<script>alert('아이디와 비밀번호가 맞지 않습니다!')</script>";
			echo "<script>location.href='/index.php/code'</script>";
			
		}
		else{

			$data=array(
				'uid'=>$result[0]->id,
				'uname'=>$result[0]->name,
				'ugroup'=>$result[0]->grp,
				'uauth'=>$result[0]->authority
				);
			$this->session->set_userdata($data);
			redirect('/code/cadiw','refresh');
		}
	}
	public function cadiw(){

		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('cadiwIndex');
		}
		else{

			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code','refresh');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/code','location');
	}
	public function group(){
		$udata=$this->session->all_userdata();
		$group=$this->input->get('group');
		if($udata['ugroup']!=$group){
			echo "<script>alert('권한이 없습니다')</script>";
			redirect('/code/cadiw','refresh');
		}
		else{
			$this->load->view('cadiwGroupHeader');
			$this->load->view('cadiwNav');
			$this->load->view('cadiwGroupIndex');
		}
	}
	public function board(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			
			$category='free';
			$data['page_num'] = $this->uri->segment(3,0);
			$data['per_page']=10;
			$data['list']=$this->codeModel->board($data['per_page'],$data['page_num'],$category);
			$data['total_rows']=$this->codeModel->boardCount($category);

			$comment=$this->codeModel->commentCount();
			
			for($i=0;$i<count($data['list']);$i++){
				$comment1[$i]=0;
				for($j=0;$j<count($comment);$j++){
					if($data['list'][$i]->bid==$comment[$j]->bid)
						$comment1[$i]=$comment[$j]->bcount;
				}
				
			}
			$data['comment']=$comment1;
			
			$this->load->library('pagination');
			$config['full_tag_open'] = '<div id="page">';
			$config['base_url']='/index.php/code/board';
			$config['total_rows']=$data['total_rows'];
			$config['per_page'] = $data['per_page'];
			$config['uri_segment'] = 3;
			$config['next_link']  = '다음';
			$config['next_tag_open'] = '<div class="page_num">';
         	$config['next_tag_close'] = '</div>';
         	$config['prev_link']  = '이전';
         	$config['prev_tag_open'] = '<div class="page_num">';
         	$config['prev_tag_close'] = '</div>';
         	$config['num_tag_open'] = '<div class="page_num">';
         	$config['num_tag_close'] = '</div>';
         	$config['cur_tag_open'] = '<div class="page_num">';
         	$config['cur_tag_close'] = '</div>';
         	$config['full_tag_close'] = '</div>';
			$this->pagination->initialize($config);
			$data['page_links'] = $this->pagination->create_links();
			if($data['page_links']==null){
				$data['page_links']='1';
			}
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('board',$data);
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	public function boardWrite(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('boardWrite',array('error' => ' ' ));
		}
		else{
			echo "<script>alert('로그인해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	public function boardInput(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = '*';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload() && !strstr($this->upload->display_errors(),"You did not select a file to upload."))
			{
				$error = array('error' => $this->upload->display_errors());
				echo "<script>alert('오류')</script>";
				redirect('/code/boardWrite','refresh');
			}	
			else
			{
				
				$data = array('upload_data' => $this->upload->data());
				$btitle=$this->input->post('btitle');
				$bcontent=$this->input->post('bcontent');
				$orig_name=$data['upload_data']['orig_name'];
				$file_name=$data['upload_data']['file_name'];
				$category='free';
				$this->codeModel->boardInput($udata['uid'],$btitle,$file_name,$orig_name,$bcontent,$category);
				

				echo "<script>alert('글이 등록되었습니다')</script>";
				redirect('/code/board','refresh');
			}
		
			
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	
	public function boardView($no){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$result['list']=$this->codeModel->boardView($no);
			$result['comment']=$this->codeModel->commentView($no);
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('boardView',$result);
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	public function fileDownload($filename){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			
			
			$this->load->helper('download');
			
			$data = file_get_contents("./uploads/{$filename}"); // Read the file's contents
 			force_download($filename, $data); 

		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	public function boardUpdate($no){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$result['list']=$this->codeModel->boardView($no);
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('boardUpdate',$result);
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	public function boardUpdateSuccess(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$bid=$this->input->post('bid');
			$bcontent=$this->input->post('bcontent');
			$this->codeModel->boardUpdate($bid,$bcontent);
			echo "<script>alert('글이 수정되었습니다')</script>";
			redirect('/code/board','refresh');
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	public function boardDelete(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$bid=$this->input->post('bid');
			$this->codeModel->boardDelete($bid);
			echo "<script>alert('글이 삭제되었습니다')</script>";
			redirect('/code/board','refresh');
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	public function boardSearch($category,$option,$search){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$o=$option;
			$s=$search;
			$option=urldecode($option);
			$search=urldecode($search);

			$data['page_num'] = $this->uri->segment(6,0);
			$data['per_page']=10;
			if($option=='제목+내용'){
				$data['list']=$this->codeModel->boardSearchAll($category,$data['per_page'],$data['page_num'],$search);
				$data['total_rows']=$this->codeModel->boardSearchAllCount($category,$search);
			}
			else{
				$data['list']=$this->codeModel->boardSearchTitle($category,$data['per_page'],$data['page_num'],$search);
				$data['total_rows']=$this->codeModel->boardSearchTitleCount($category,$search);
			}
			
			
			$comment=$this->codeModel->commentCount();
			$comment1='';
			for($i=0;$i<count($data['list']);$i++){
				$comment1[$i]=0;
				for($j=0;$j<count($comment);$j++){
					if($data['list'][$i]->bid==$comment[$j]->bid)
						$comment1[$i]=$comment[$j]->bcount;
				}
				
			}
			$data['comment']=$comment1;
			
			$this->load->library('pagination');
			$config['full_tag_open'] = '<div id="page">';
			$config['base_url']='/index.php/code/boardSearch/'.$category.'/'.$o.'/'.$s.'';
			$config['total_rows']=$data['total_rows'];
			$config['per_page'] = $data['per_page'];
			$config['uri_segment'] = 6;
			$config['next_link']  = '다음';
			$config['next_tag_open'] = '<div class="page_num">';
         	$config['next_tag_close'] = '</div>';
         	$config['prev_link']  = '이전';
         	$config['prev_tag_open'] = '<div class="page_num">';
         	$config['prev_tag_close'] = '</div>';
         	$config['num_tag_open'] = '<div class="page_num">';
         	$config['num_tag_close'] = '</div>';
         	$config['cur_tag_open'] = '<div class="page_num">';
         	$config['cur_tag_close'] = '</div>';
         	$config['full_tag_close'] = '</div>';
			$this->pagination->initialize($config);
			$data['page_links'] = $this->pagination->create_links();
			if($data['page_links']==null){
				$data['page_links']='1';
			}
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('board',$data);
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	public function commentWrite(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){

			$content=$this->input->post('content');
			$board_id=$this->input->post('board_id');
			echo $board_id;
			$this->codeModel->commentWrite($board_id,$udata['uid'],$content);
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}
	public function commentView(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$bno=$this->input->post('bid');
			$result['list']=$this->codeModel->commentView($bno);
			
			$this->load->view('commentView',$result);
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	
	}
	public function commentRemove(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$cid=$this->input->post('cid');
			$this->codeModel->commentRemove($cid);
			
			
		}
		else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code/cadiw','refresh');
		}
	}



	/*************************************/
	/*            관리자 정보 수정           */
	/************************************/
	public function managerModify(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$result['udata']=$this->codeModel->managerModify($udata['uid']);
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('cadiwManagerModify',$result);
		}else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code','refresh');	
		}
	}

	public function managerModifyOk(){   // 회원 본인 정보수정과 같이 사용
		$udata=array(
			'id'=>$this->input->post('id'),
			'password'=>$this->input->post('pw_ok'),
			'name'=>$this->input->post('name'),
			'phone'=>$this->input->post('phone'),
			'university'=>$this->input->post('uni'),
			'grp'=>$this->input->post('grp'),
			'authority'=>$this->input->post('auth')
			);
		$this->codeModel->managerModifyOk($udata);
		echo "<script>alert('정보수정 완료!')</script>";
		redirect('/code/cadiw','refresh');
	}

	/*************************************/
	/*          회원 본인 정보 수정           */
	/************************************/
	public function modify(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$result['udata']=$this->codeModel->managerModify($udata['uid']);
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('cadiwModify',$result);
		}else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code','refresh');	
		}
	}

	/*************************************/
	/*             회원 관리               */
	/************************************/
	public function memberManagement(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('cadiwMemberManagement');
		}else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code','refresh');
		}
	}

	public function memberInsert(){
		$udata=array(
			'id'=>$this->input->post('id'),
			'password'=>$this->input->post('pw'),
			'name'=>$this->input->post('name'),
			'phone'=>$this->input->post('phone'),
			'university'=>$this->input->post('uni'),
			'grp'=>$this->input->post('grp'),
			'authority'=>$this->input->post('auth')
			);
		$this->codeModel->memberInsert($udata);
	}

	public function memberList(){
		$grp=$this->input->post('grp');
		$data['list'] = $this->codeModel->memberList($grp);
		$this->load->view('cadiwMemberManagementTable', $data);
	}

	public function memberDelete(){
		$id=$this->input->post('id');
		$this->codeModel->memberDelete($id);
	}

	public function memberModify(){
		$id=$this->input->get('id');
		$result['udata']=$this->codeModel->memberModify($id);
		$this->load->view('cadiwMemberManagementModify',$result);
	}

	public function memberModifyOk(){
		$udata=array(
			'id'=>$this->input->post('id'),
			'password'=>$this->input->post('pw_ok'),
			'name'=>$this->input->post('name'),
			'phone'=>$this->input->post('phone'),
			'university'=>$this->input->post('uni'),
			'grp'=>$this->input->post('grp'),
			'authority'=>$this->input->post('auth')
			);
		$this->codeModel->memberModifyOk($udata);
	}

	/*************************************/
	/*          회원 출석 관리               */
	/************************************/

	public function managementAttend(){
		$udata=$this->session->all_userdata();
		if(isset($udata['uid'])){
			$this->load->view('cadiwHeader');
			$this->load->view('cadiwNav');
			$this->load->view('cadiwManagementAttend');
		}else{
			echo "<script>alert('로그인 해주세요!')</script>";
			redirect('/code','refresh');
		}
	}
	
}


?>