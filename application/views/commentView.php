<?
	$udata=$this->session->all_userdata();
	
?>
<br>
<table border style="width:100%;">
				<?

					for($i=0;$i<count($list);$i++){
						echo "<tr>";
						echo "<td style='text-align:left;border-right:0px;'>".$list[$i]->name."&nbsp;&nbsp;";
						echo $list[$i]->cdate."<br>";
						echo nl2br($list[$i]->ccontent)."</td>";
						if($list[$i]->uid==$udata['uid']){
						echo "<td style='border-left:0px;'><span style='cursor:pointer;cursor:hand;'class='glyphicon glyphicon-remove' onclick='commentRemove({$list[$i]->bid},{$list[$i]->cid})'></span></td>";
						}
						echo "</tr>";
					}
				?>
			</table>
</table>