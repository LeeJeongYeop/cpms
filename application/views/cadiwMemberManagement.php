<div id="article">
<center>
<div class="contents">
	<div id="grpSelect">
		<h3>회원 조회</h3>
		<form id="insertForm" method="post">
			<span>조선택(등록) :</span>	
			<select name="grp" id="grp">
				<option value="0">조선택(관리자)</option>
				<option value="1">1조</option>
				<option value="2">2조</option>
				<option value="3">3조</option>
				<option value="4">4조</option>
				<option value="5">5조</option>
				<option value="6">6조</option>
				<option value="7">7조</option>
			</select>
		</div>
		<hr>
		<div id="managementTable">
			<!-- 회원 조회 -->
		</div>
		<div id="memberInsert">
			<hr>
			<h3>회원 등록</h3>
			<table id="memberInsertTable">
				<tr>
					<th>아이디</th>
					<td><input type="text" id="id" name="id"></td>
					<th>비밀번호</th>
					<td><input type="text" id="pw" name="pw"></td>
				</tr>
				<tr>
					<th>이름</th>
					<td><input type="text" id="name" name="name"></td>
					<th>핸드폰번호</th>
					<td><input type="text" id="phone" name="phone"></td>
				</tr>
				<tr>
					<td align="center">대학교</td>
					<td><input type="text" id="uni" name="uni"></td>
					<td align="center">권한</td>
					<td><input type="text" id="auth" name="auth"></td>
				</tr>
			</table>
			<br>
			<div>
				<input class="btn btn-default btn-sm" type="button" value="등록" id="insertBtn"/>
				<input class="btn btn-default btn-sm" type="button" value="취소" onclick="resetInsertForm(this.form);" />
			</div>
		</form>
	</div>
</div>
</center>
</div><!-- div id='article'-->
</div> <!-- div id='wrap'-->

</body>
</html>