<?
	$udata=$this->session->all_userdata();
	
?>
<div id="article">
<center>
	<table border id="boardView">
		<tr>
			<th>제목</th>
			<td><?=$list[0]->btitle?></td>
		</tr>
		<tr>
			<th>작성자</th>
			<td><?=$list[0]->name?></td>
		</tr>
		<tr>
			<th>작성일</th>
			<td><?=$list[0]->bdate?></td>
		</tr>
		<tr>
			<th>파일</th>
			<td><a href="/index.php/code/fileDownload/<?=$list[0]->files?>"><?=$list[0]->orig_name?></a></td>
		</tr>
		<tr>
			<th>내용</th>
			<td><?=$list[0]->bcontent?></td>
		</tr>
	</table>

	<br>
	<input type="button" value="돌아가기" class="btn btn-default btn-sm" onclick="history.back();">
</center>
<? if($udata['uid']==$list[0]->uid){?>
<div id='boardControl' align="right">
	<form action="/index.php/code/boardDelete" method="post">
	<input type="button" value="수정" class="btn btn-default btn-sm" onclick="location.href='/index.php/code/boardUpdate/<?=$list[0]->bid?>'"></a>
	&nbsp;&nbsp;
	<input type="submit" value="삭제" class="btn btn-default btn-sm" onclick="if(!confirm('정말 삭제하시겠습니까?')){return false;}"><br>
	<input type="hidden" value="<?=$list[0]->bid?>" id="board_id" name="bid">
	</form>
	<?}else{?>
	<input type="hidden" value="<?=$list[0]->bid?>" id="board_id" name="bid">
	<?}?>
	<br>
	<div id="comment">
		<div id="commentWrite">
			<textarea style="width:90%;" id="commentWrite_content"></textarea> &nbsp;<input type="button" id="comment_submit" class="btn btn-defalt btn-sm" value="쓰기">
		</div>
		<div id="commentView">
		<br>
			<table border style="width:100%;">
				<?

					for($i=0;$i<count($comment);$i++){
						echo "<tr>";
						echo "<td style='text-align:left;border-right:0px;'>".$comment[$i]->name."&nbsp;&nbsp;";
						echo $comment[$i]->cdate."<br>";
						echo nl2br($comment[$i]->ccontent);
						if($comment[$i]->uid==$udata['uid']){
						echo "&nbsp;<span style='cursor:pointer;cursor:hand;text-align:right'class='glyphicon glyphicon-remove' onclick='commentRemove({$list[0]->bid},{$comment[$i]->cid})'></span>";
						}
						echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
</div>

</div><!-- div id='article'-->
</div> <!--div id='wrap'-->

</body>
</html>