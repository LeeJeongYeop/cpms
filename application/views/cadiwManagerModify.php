<div id="article">
	<center>
		<div class='contents'>
			<form action="/index.php/code/managerModifyOk" method="post">
				<h1>정보 수정</h1>
				<hr>
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
						<td><input type="text" id="name" name="name" readonly value="<?=$row->name?>" class="form-control"></td>
						<? } ?>
					</tr>
					<tr>
						<th>핸드폰 번호</th>
						<td><input type="text" id="phone" name="phone" class="form-control"></td>
					</tr>
					<tr align="right">
						<td>대학교</td>
						<td><input type="text" id="uni" name="uni" class="form-control"></td>
					</tr>
				</table>
				<br>
				<input type="hidden" id="grp" name="grp" value="0">
				<input type="hidden" id="auth" name="auth" value="관리자">
				<hr>
				<div id="modifyBtn">
					<input type="button" class="btn btn-default btn-sm" value="수정" onclick="managerModify(this.form)">
					<input type="reset" class="btn btn-default btn-sm" value="취소">
					<input type="button" class="btn btn-default btn-sm" value="돌아가기" onclick="location='/code/cadiw'">
				</div>
			</form>
		</div>
	</div>
</center>
</div><!-- div id='article'-->
</div> <!-- div id='wrap'-->

</body>
</html>