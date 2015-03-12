<?
class CodeModel extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	function login($id,$pw){
		$strQuery = "select * from member where id='$id' and password='$pw';";

		return $this->db->query($strQuery)->result();
	}
	function boardInput($uid,$btitle,$file_name,$orig_name,$bcontent,$category){
		$insertdb=array(
			'uid'=>$uid,
			'btitle'=>$btitle,
			'files'=>$file_name,
			'orig_name'=>$orig_name,
			'bcontent'=>$bcontent,
			'category'=>$category
			);
		$this->db->insert('board',$insertdb);
	}
	function board($num,$local,$category){
		$this->db->where('category',$category);
		$this->db->limit($num,$local);
		$this->db->select('bid,btitle,name,bdate');
		$this->db->from('board');
		$this->db->join('member','member.id=board.uid');
		$this->db->order_by("bid", "desc"); 
		return $this->db->get()->result();
	}
	function boardCount($category){
		$this->db->where('category',$category);
		$this->db->select('bid,btitle,name,bdate');
		$this->db->from('board');
		$this->db->join('member','member.id=board.uid');
		return $this->db->count_all_results();
	}
	function boardView($no){
		$this->db->where('bid',$no);
		$this->db->select('uid,bid,btitle,files,orig_name,name,bcontent,bdate');
		$this->db->from('board');
		$this->db->join('member','member.id=board.uid');
		return $this->db->get()->result();
	}
	function boardUpdate($bid,$bcontent,$orig_name,$file_name){
		$data=array('bcontent' =>$bcontent,
					'orig_name' =>$orig_name,
					'files' =>$file_name);
		$this->db->where('bid',$bid);
		$this->db->update('board',$data);
	}
	function boardCategory($bid){
		$this->db->where('bid',$bid);
		$this->db->select('category');
		$this->db->from('board');
		return $this->db->get()->result();
	}
	function boardDelete($no){
		$this->db->where('bid',$no);
		$this->db->delete('board');
	}
	function boardSearchAll($category,$num,$local,$search){
		
		$where= "category ='".$category."' and btitle like '%".$search."%' or category='".$category."' and bcontent like '%".$search."%' ";
		$this->db->where($where);
		$this->db->limit($num,$local);
		$this->db->select('bid,btitle,name,bdate');
		$this->db->from('board');
		$this->db->join('member','member.id=board.uid');
		
		
		$this->db->order_by("bid", "desc"); 
		return $this->db->get()->result();
	}
	function boardSearchTitle($category,$num,$local,$search){
		$this->db->limit($num,$local);
		$this->db->where('category',$category);
		
		$this->db->select('bid,btitle,name,bdate');
		$this->db->from('board');
		$this->db->join('member','member.id=board.uid');
		$this->db->like('name',$search);
		$this->db->order_by("bid", "desc"); 
		return $this->db->get()->result();
	}
	function boardSearchAllCount($category,$search){
		$where= "category ='".$category."' and btitle like '%".$search."%' or category ='".$category."' and bcontent like '%".$search."%' ";
		$this->db->where($where);
		
		$this->db->from('board');
		

		return $this->db->count_all_results();
	}
	function boardSearchTitleCount($category,$search){
		$this->db->where('category',$category);
		$this->db->from('board');
		$this->db->join('member','member.id=board.uid');
		$this->db->like('name',$search);
		return $this->db->count_all_results();
	}
	function commentWrite($bid,$uid,$ccontent){
		$insertdb=array(
			'bid'=>$bid,
			'uid'=>$uid,
			'ccontent'=>$ccontent
			);
		$this->db->insert('board_comment',$insertdb);
	}
	function commentView($bid){
		$this->db->where('bid',$bid);
		$this->db->select('bid,cid,uid,name,ccontent,cdate');
		$this->db->from('board_comment');
		$this->db->join('member','member.id=board_comment.uid');
		return $this->db->get()->result();
	}
	function commentRemove($cid){
		$this->db->where('cid',$cid);
		$this->db->delete('board_comment');
	}
	function commentCount(){
		$this->db->select ('bid,count(bid) as bcount');
		$this->db->from('board_comment');
		$this->db->group_by('bid');
		$this->db->order_by('bid','desc');
		return $this->db->get()->result();
	}

		/*  관리자 정보 수정  */
	function managerModify($id){  // 회원 본인 정보수정과 같이 사용
		$this->db->where('id', $id);
		$data = $this->db->get('member')->result();

		return $data;
	}
	function managerModifyOk($udata){  // 회원 본인 정보수정과 같이 사용
		$this->db->where('id',$udata['id']);
		$this->db->update('member',$udata);
	}
	
	/*  회원 등록  */
	function memberInsert($udata){
		$this->db->insert('member',$udata);
	}

	/*  회원 조회  */
	function memberList($grp){
		$this->db->where('grp', $grp);
		$data = $this->db->get('member')->result_array();

		return $data;
	}

	/*  회원 삭제  */
	function memberDelete($id){
		$this->db->where('id', $id);
		$this->db->delete('member');
	}

	/*  회원 정보 수정  */
	function memberModify($id){
		$this->db->where('id', $id);
		$data = $this->db->get('member')->result();

		return $data;
	}

	function memberModifyOk($udata){
		$this->db->where('id',$udata['id']);
		$this->db->update('member',$udata);
	}
	
}
?>