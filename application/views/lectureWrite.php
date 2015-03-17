
<div id='article'>
<center>
	<?php echo $error;?>
	<form id='boardWriteForm' action='/index.php/code/boardInput/lecture' method='post' enctype="multipart/form-data" >
	<table id='boardWrite'>
		<tr>
			<th>제목</th>
			<td><input name="btitle" placeholder='제목을 입력하세요' type="text" style="width:100%;height:100%;"></td>
		</tr>
		<tr>
			<th>파일</th>
			<td><input type="file" name="userfile" size="20" /></td>
		</tr>
		
		<tr>
			<th>내용</th>
			<td><textarea name="bcontent" id="ir1" rows="10" cols="100" style="width:100%; height:300px; display:none;"></textarea></td>
		</tr>
		

	</table>
	<br>
	<br>
	<br>
	<input class="btn-btn default btn-sm" type="submit" value="등록" onclick="if($('input[name=btitle]').val().trim()==''){
					alert('제목을 입력하세요');
					return false;
				}else{submitContents(this)}"> &nbsp;&nbsp;<input class="btn-btn default btn-sm" type="button" value="돌아가기" onclick="history.back()">
	</form>
	<br>
	
	<script type="text/javascript">
var oEditors = [];

// 추가 글꼴 목록
//var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir1",
	sSkinURI: "/SmartEditor2Skin.html",	
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
		fOnBeforeUnload : function(){
			//alert("완료!");
		}
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});
function submitContents(elClickedObj) {

	oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
	
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
	
	try {
		elClickedObj.form.submit();
	} catch(e) {}
}

</script>





</center>
</div><!-- div id='article'-->
</div> <!-- div id='wrap'-->

</body>

</html>