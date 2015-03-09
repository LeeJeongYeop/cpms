<div class='contents'>
	<form action="/code/managerModifyOk" method="post">
		<h1 align="center">정보 수정</h1>
		<table class="modify">
			<tr>
				<th>아이디</th>
				<?
				foreach ($udata as $row){?>
				<td> <input type="text" id="id" name="id" value="<?=$row->id?>" readonly></td>
				<? } ?>
			</tr>
			<tr>
				<th>비밀번호</th>
				<td><input type="password" id="pw" name="pw"></td>
			</tr>
			<tr>
				<th>비밀번호 확인</th>
				<td><input type="password" id="pw_ok" name="pw_ok"></td>
			</tr>
			<tr>
				<th>이름</th>
				<?
				foreach ($udata as $row) {?>
				<td><input type="text" id="name" name="name" value="<?=$row->name?>"></td>
				<? } ?>
			</tr>
			<tr>
				<th>핸드폰 번호</th>
				<td><input type="text" id="phone" name="phone"></td>
			</tr>
			<tr>
				<td>대학교</td>
				<td><input type="text" id="uni" name="uni"></td>
			</tr>
		</table>
		<br>
		<input type="hidden" id="grp" name="grp" value="0">
		<input type="hidden" id="auth" name="auth" value="관리자">
		<div id="modifyBtn">
		<input type="button" value="수정" onclick="managerModify(this.form)">
		<input type="reset" value="취소">
		<input type="button" value="돌아가기" onclick="location='/code/cadiw'">
		</div>
	</form>
</div>
</div>