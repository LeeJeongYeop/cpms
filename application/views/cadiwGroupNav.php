<?
$udata=$this->session->all_userdata();

?>	

<div id="mypage">
	<table>
		<tr>
			<td colspan="2"><?=$udata['uname']?> 님 환영합니다!</td>
		</tr>
		<tr>
			<?if($udata['uauth']=='관리자'){?>
			<td colspan="3" align="center">관리자</td>
			<?}else{?>
			<th>소속: </th>
			<td colspan="2"><?=$udata['ugroup']?>조</td>
			<?}?>
		</tr>
		<tr>
			<td><a href="/index.php/code/managerMyPage"><input type='button' class="btn btn-default btn-sm" value='마이페이지'></a></td>
			<td><a href="/index.php/code/logout">&nbsp;&nbsp;<input type='button' class="btn btn-default btn-sm" value='로그아웃'></a></td>
		</tr>
	</table>
</div>





<div id="menu">

	<a href="/index.php/code/cadiw"><li>메인으로</li></a>
	<a href="/index.php/code/groupBoard/<?=$group?>"><li >자료실</li></a>

	<?if($udata['uauth']=='관리자'){?>
		<li id="groupPage">웹 프로젝트</li>
	<?}else{?>
		<a href="/index.php/code/group/<?=$udata['ugroup']?>"><li id="groupPage">웹 프로젝트</li></a>
	<?}?>
	<?if($udata['uauth']=='관리자'){?>
	<div id="groupPage_sub">
		
	</div>
	<?}?>
	
	
</div>
