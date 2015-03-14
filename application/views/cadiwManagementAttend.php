<div id="article">
	<center>
		<div class="contents">
			<h3>출석 관리</h3>
			<form action="/index.php/code/attendWeekSet" method="post">
				<div align="right">
					주차설정:&nbsp&nbsp
					<input type="text" id="weekSet" name="weekSet" size="5"
					onkeypress="onlyNumber();" style="text-align:right;" numberonly="true"/>
					<input type="submit" value="설정">
				</div>
			</form>
			<hr>
			<div id="managementAttendTable">
				<table id="attendTableManager" border="1" width="700px" height="200px">
					<tr>
					<th>아이디</th>
					<th>이름</th>
					<th>1주차</th>
					</tr>
					<? foreach ($list as $row){ ?>
					<tr>
						<td><? echo $row['id']; ?></td>
						<td><? echo $row['name']; ?></td>
						<td>
						<input type="radio" name="<?=$row['id']?>attend" id="<?=$row['id']?>in" value="0" checked>
						<label for="<?=$row['id']?>in">출석</label>
						<input type="radio" name="<?=$row['id']?>attend" id="<?=$row['id']?>out" value="1">
						<label for="<?=$row['id']?>out">결석</label>
						</td>
					</tr>
					<? } ?>
				</table>
			</div>
		</div>
	</center>
</div>