<?
$udata=$this->session->all_userdata();

if($udata['uauth']=='관리자'){?>
<div id="managerMypageNav">
	<a href="/index.php/code/managerModify"><span id="managerMypageNavLeft">내 정보수정</span></a>
	<a href="/index.php/code/memberManagement"><span>회원 관리</span></a>
	<a href="/index.php/code/managementAttend"><span id="managerMypageNavRight">출석 관리</span></a>
</div>
<?}?>