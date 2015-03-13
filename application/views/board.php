<div id="article">
<center>
<div id='board'>
	
		<h1>게시판</h1>
		<br>
		<table>
			<tr>
				<th>번호</th>
				<th>제목</th>
				<th>작성자</th>
				<th>작성일</th>
			</tr>
			<?
			if(count($list)==0){
			
			}
			else{
			for($i=0;$i<count($list);$i++){
				echo "<tr>";
				if($list[$i]->category=='notice')
					echo "	<td><span class='noticebid'>공지</span></td>";
				else
					echo "	<td>".$list[$i]->bid."</td>";
				if($comment[$i]==0){
					echo "	<td><a href='/index.php/code/boardView/".$list[$i]->bid."'>".$list[$i]->btitle."</a></td>";
				}
				else{
					echo "	<td><a href='/index.php/code/boardView/".$list[$i]->bid."'>".$list[$i]->btitle." [".$comment[$i]."]</a></td>";
				}
				echo "	<td>".$list[$i]->name."</td>";
				echo "	<td>".$list[$i]->bdate."</td>";
				echo "</tr>";
			}
		}

			?>
		</table>
		
	
</div>
<br>
<br>
<br>
<br>
<br>
		<?=$page_links?>
		<br>
		<br>
		<br>
		<select id="board_search_option">
			<option>제목+내용</option>
			<option>작성자</option>
		</select>
		<input type="search" id="board_search"> &nbsp;<button class="btn-btn default btn-sm" onclick="board_search('free')"><span class='glyphicon glyphicon-search'>검색</span></button>
		<button id="board_write_btn" class="btn-btn default btn-sm" onclick="location.href='/index.php/code/boardWrite/free'"><span class='glyphicon glyphicon-edit'>글쓰기</span></button>
		</center>
</div><!-- div id='article'-->
</div> <!--div id='wrap'-->

</body>
</html>