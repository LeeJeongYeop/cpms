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
					<td><input type='button' class="btn btn-default btn-sm" value='마이페이지'></td>
					<td><a href="/index.php/code/memberManagement">&nbsp;&nbsp;<input type='button' class="btn btn-default btn-sm" value='회원관리'></a></td>
					<td><a href="/index.php/code/logout">&nbsp;&nbsp;<input type='button' class="btn btn-default btn-sm" value='로그아웃'></a></td>
					<td><a href="/index.php/code/logout">&nbsp;&nbsp;<input type='button' class="btn btn-default btn-sm" value='로그아웃'></a></td>
				</tr>
			</table>
		</div>
	
			

		
		<div id="menu">
			
				<li>공지사항</li>
				<li id="menu_board">게시판</li>
					
				<a href="/index.php/code/group?group=<?=$udata['ugroup']?>"><li>웹 프로젝트</li></a>
				<li>Q & A</li>
			<div id="menu_board_sub">
						<li>강의자료</li>
						<a href="/index.php/code/board"><li>자유게시판</li></a>
			</div>
		</div>

		
			

