<div id="article">
	<center>
		<div class='contents'>
			<form action="/index.php/code/managerModifyOk" method="post">
				<h1 align="center">정보 수정</h1>
				<table class="modify" width="400px" height="350px">
					<tr>
						<th>아이디</th>
						<?
						foreach ($udata as $row){?>
						<td> <input type="text" id="id" name="id" value="<?=$row->id?>" class="form-control" readonly></td>
						<? } ?>
					</tr>
					<tr>
						<th>비밀번호</th>
						<td><input type="password" id="pw" name="pw" class="form-control"></td>
					</tr>
					<tr>
						<th>비밀번호 확인</th>
						<td><input type="password" id="pw_ok" name="pw_ok" class="form-control"></td>
					</tr>
					<tr>
						<th>이름</th>
						<?
						foreach ($udata as $row) {?>
						<td><input type="text" id="name" name="name" value="<?=$row->name?>" readonly class="form-control"></td>
						<? } ?>
					</tr>
					<tr>
						<th>핸드폰 번호</th>
						<td><input type="text" id="phone" name="phone" class="form-control"></td>
					</tr>
					<tr>
						<td>대학교</td>
						<td><input type="text" id="uni" name="uni" class="form-control"></td>
					</tr>
				</table>
				<br>
				<?
				foreach ($udata as $row) {?>
				<input type="hidden" id="grp" name="grp" value="<?=$row->grp?>">
				<input type="hidden" id="auth" name="auth" value="<?=$row->authority?>">
				<? } ?>
				<div id="modifyBtn">
					<input type="button" value="수정" class="btn btn-default btn-sm" onclick="managerModify(this.form)">
					<input type="reset" value="취소" class="btn btn-default btn-sm">
					<input type="button" value="돌아가기" onclick="location='/code/cadiw'" class="btn btn-default btn-sm">
				</div>
			</form>
		</div>
	</div>
</center>
</div>