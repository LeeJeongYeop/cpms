	$(document).ready(function(){
		$('#wrap').css('width',(screen.width)/2+'px');
		var wrapHeight=$('#wrap').outerHeight();
		$('#wrap').css('height',wrapHeight+$('#comment').outerHeight()+'px');

		$('#header').css('width',(screen.width)/2+'px');
		var middle=(screen.width-$('#calendar').outerWidth())/2;
		$('#calendar').css("left",middle+"px");


		$('#menu_board_sub').css("left",($('#menu_board').offset().left-$('#menu_board_sub').offset().left)+'px');
		$('#article').css('left',($('#wrap').outerWidth()-$('#article').outerWidth())/2+'px')
		$('#menu_board_sub').hide();
		$('#menu_board,#menu_board_sub').hover(function(){
			$('#menu_board').css('background','#342E2E');
			$('#menu_board_sub').stop().slideDown('fast');
		},function(){
			$('#menu_board').css('background','none');
			$('#menu_board_sub').stop().slideUp('fast');
		})

		$('#board_search').keypress(function(){
			if(event.keyCode==13){
				board_search('free');
			}
		})

		$('#comment_submit').click(function(){
			$.post('/index.php/code/commentWrite',{board_id:$('#board_id').val(),content:$('#commentWrite_content').val()},function(data){
				$('#commentWrite_content').val('');
				$('#commentView').load('/index.php/code/commentView',{bid:data.slice(24)},function(){
					$('#wrap').css('height',wrapHeight+$('#comment').outerHeight()+'px');
				});
			})
		})

		$('#managerMypageNav').hide();
		$('#managerMypageNav').slideDown('fast');
	});

	function board_search(category){
		if($('#board_search').val().trim()==''){
			alert('한글자 이상 입력하세요!');
		}
		else{
			location.href="/index.php/code/boardSearch/"+category+"/"+encodeURIComponent($('#board_search_option').val())+"/"+encodeURIComponent($('#board_search').val().trim());
		}
	}
	function commentRemove(bid,cid){

		$.post('/index.php/code/commentRemove',{cid:cid},function(data){
			$('#commentView').load('/index.php/code/commentView',{bid:bid});
		})
	}


//text editor
if($('.jqte-test')){
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
}