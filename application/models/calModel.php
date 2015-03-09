<?
class CalModel extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	function addId(){
		$strQuery="select id from cal order by id desc limit 1";
		return $this->db->query($strQuery)->result();
	}
	function calInsert($id,$title,$start,$end,$color,$user){
		$insertdb=array(
			'id'=>$id,
			'title'=>$title,
			'start'=>$start,
			'end'=>$end,
			'color'=>$color,
			'user'=>$user
			);
		$this->db->insert('cal',$insertdb);
	}
	function calView($user){
		$strQuery="select id,title,start,end,color from cal where user='$user';";
		return $this->db->query($strQuery)->result();
	}
	function calUpdate($id,$start,$end){
		$updatedb=array(
			'start'=>$start,
			'end'=>$end
			);
		$this->db->where('id',$id);
		$this->db->update('cal',$updatedb);
	}
	function calDelete($id){
		$this->db->where('id',$id);
		$this->db->delete('cal');
	}
}
?>