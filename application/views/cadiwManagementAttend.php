<?
$udata=$this->session->all_userdata();
?>
<div id="article">
	<center>
		<div class="contents">
			<h1>출석 관리</h1>
			<form action="/index.php/code/attendWeekSet" method="post">
				<div style="float:left; margin-top:20px;">
					<p>0:출석 1:지각 2:결석 4:무단결석 (9점 초과시 미수료)</p>
				</div>
				<? if($udata['uauth']=='관리자'){?>
				<div align="right" style="font-size:23px">
					주차설정:
					<input type="submit" style="float: right;" class='btn btn-default btn-sm' value="설정" onclick="if(!confirm('정말 변경하시겠습니까?')){return false;}">
					<input type="text" id="weekSet" name="weekSet" size="5"
					onkeypress="onlyNumber();" numberonly="true" class="form-control" />
				</div>
				<? } ?>
			</form>
			<hr>
			<form action="/index.php/code/attendInput" method="post">
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
							<th width="100px">출석점수</th>
						</tr>
						<? 
						$count=0;
						foreach ($list as $row){
							++$count;
							?>
							<tr>
								<td><? echo $row['id']; ?></td>
								<td><? echo $row['name']; ?></td>
								<td><? echo $row['grp'] ?></td>
								<?foreach($week as $week_row){?>
								<? for($i=1; $i<=$week_row['count(*)']-1; $i++){ ?>
								<td>
									<?$weekView = $i."week"?>
									<? if($udata['uauth']=='관리자'){?>
									<input value="<?=$row[$weekView]?>" type="text" id="<?=$count?>_<?=$i?>" name="<?=$count?>_<?=$i?>" class="form-control">
									<? }else{ ?>
									<?=$row[$weekView]?>
									<? } ?>
								</td>
								<? } } ?>
								<?if(($sum[$count-1]->weeksum)>9){?>
								<td bgcolor="red">O U T</td>
								<?}else if(($sum[$count-1]->weeksum)>=5){?>
								<td bgcolor="orange"><?= $sum[$count-1]->weeksum ?></td>
								<?}else{?>
								<td><?= $sum[$count-1]->weeksum ?></td>
								<?}?>
							</tr>
							<? } ?>
						</table>
					</div>
					<? if($udata['uauth']=='관리자'){?>
					<input type="submit" value="입력" style="font-size:20px" class='btn btn-default btn-sm'>
					<? } ?>
				</form>
			</div>
		</center>
	</div>