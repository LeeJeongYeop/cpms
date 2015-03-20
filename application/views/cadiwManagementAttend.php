<div id="article">
	<center>
		<div class="contents">
			<h1>출석 관리</h1>
			<form action="/index.php/code/attendWeekSet" method="post">
				<div align="right" style="font-size:23px">
					주차설정:
					<input type="submit" style="float: right;" class='btn btn-default btn-sm' value="설정" onclick="if(!confirm('정말 변경하시겠습니까?')){return false;}">
					<input type="text" id="weekSet" name="weekSet" size="5"
					onkeypress="onlyNumber();" numberonly="true" class="form-control" />
				</div>
			</form>
			<hr>
			<form action="/index.php/code/attendInput">
				<div id="managementAttendTable">
					<table id="attendTableManager" border="1" width="700px" height="200px">
						<tr>
							<th width="80px">아이디</th>
							<th width="80px">이름</th>
							<th width="20px">조</th>
							<?foreach($week as $row){?>
							<? for($i=1; $i<=$row['count(*)']-1; $i++){ ?>
							<th width="60px"><?=$i?>주차</th>
							<? } } ?>
						</tr>
						<? foreach ($list as $row){ ?>
						<tr>
							<td><? echo $row['id']; ?></td>
							<td><? echo $row['name']; ?></td>
							<td><? echo $row['grp'] ?></td>
							<?foreach($week as $week_row){?>
							<? for($i=1; $i<=$week_row['count(*)']-1; $i++){ ?>
							<td>
								<input type="text" id="<?=$row['id']?>_<?=$i?>" name="<?=$row['id']?>_<?=$i?>" class="form-control" value="<?=$row['id']?>_<?=$i?>">
							</td>
							<? } } ?>
						</tr>
						<? } ?>
					</table>
				</div>
				<input type="submit" value="입력" style="font-size:20px" class='btn btn-default btn-sm'>
			</form>
		</div>
	</center>
</div>