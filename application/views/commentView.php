<?
	$udata=$this->session->all_userdata();
	
?>
<br>
<table style="width:100%;">
				<?

					for($i=0;$i<count($list);$i++){
						echo "<tr>";
						echo "<td style='text-align:left;border-right:0px;'>".$list[$i]->name."&nbsp;&nbsp;";
						echo $list[$i]->cdate."<br>";
						echo nl2br($list[$i]->ccontent);
						if($list[$i]->uid==$udata['uid']){
						echo "&nbsp;<span style='cursor:pointer;cursor:hand;'class='glyphicon glyphicon-remove' onclick='commentRemove({$list[$i]->bid},{$list[$i]->cid})'></span>";
						}
						echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
</table>