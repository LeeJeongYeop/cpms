<table border="1" width="800px">
	<tr>
		<th>
			ID
		</th>
		<th>
			Name
		</th>
		<th>
			Univercity
		</th>
		<th>
			Phone
		</th>
		<th>
			Group
		</th>
		<th>
			Authority
		</th>
		<th>
			관리
		</th>
	</tr>
	<? foreach ($list as $row){ ?>
	<tr align="center">
		<td><? echo $row['id']; ?></td>
		<td><? echo $row['name']; ?></td>
		<td><? echo $row['university']; ?></td>
		<td><? echo $row['phone']; ?></td>
		<td><? echo $row['grp']; ?></td>
		<td><? echo $row['authority']; ?></td>
		<td>
			<button class="btn btn-default btn-sm modifyBtn" id="" value="<?=$row['id']?>">수정</button>&nbsp
			<button class="btn btn-default btn-sm deleteBtn" value="<?=$row['id']?>">삭제</button>
		</td>
	</tr>
	<? } ?>
</table>