<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src='/assets/js/jquery.min.js'></script>
	<script src='/assets/js/cadiwJS.js'></script>
	<script src="/assets/js/bootstrap.min.js"></script>
</head>
<body>
	<form method="post" id="memberModifyForm">
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
				<th>조</th>
				<?
				foreach ($udata as $row) {?>
				<td><input type="text" id="grp" name="grp" value="<?=$row->grp?>"></td>
				<? } ?>
			</tr>
			<tr align="center">
				<td>대학교</td>
				<td><input type="text" id="uni" name="uni"></td>
			</tr>
			<tr align="center">
				<td>권한</td>
				<?
				foreach ($udata as $row) {?>
				<td><input type="text" id="authority" name="authority" value="<?=$row->authority?>"></td>
				<? } ?>
			</tr>
		</table>
		<br>
		<div align="center">
			<input type="button" value="수정" class="btn btn-default btn-sm" id="modifyOkBtn">
			<input type="button" value="취소" class="btn btn-default btn-sm" onclick="window.close();">
		</div>
	</form>
</body>
</html>