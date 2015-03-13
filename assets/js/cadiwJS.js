
/**************** 정보수정 ****************/
function managerModify(check){
	var pw=check.pw.value;
	var pw_ok=check.pw_ok.value;
	var name=check.name.value;
	var phone=check.phone.value;

	if(pw==""){
		alert("비밀번호를 입력하세요.");
		check.pw.focus();
		return;
	}
	if(pw_ok==""){
		alert("비밀번호 확인을 입력하세요.");
		check.pw_ok.focus();
		return;
	}
	if(name==""){
		alert("이름를 입력하세요.");
		check.name.focus();
		return;
	}
	if(phone==""){
		alert("핸드폰 번호를 입력하세요.");
		check.phone.focus();
		return;
	}
	if(pw!=pw_ok){
		alert("비밀번호가 일치하지 않습니다.");
		check.pw_ok.focus();
		return;
	}

	check.submit();
}
/**************** 회원 관리 ****************/
function resetInsertForm(check){
	check.id.value="";
	check.pw.value="";
	check.name.value="";
	check.phone.value="";
	check.uni.value="";
	check.auth.value="";
}

/**************** jQuery ****************/
$(function(){
	$('#grp').change(function(){
		var grp = $('#grp option:selected').val();
		$.post("/index.php/code/memberList",{grp:grp}, function(data){
			$('#managementTable').html(data);
		});
	});
	
	/**************** 회원 등록 ****************/
	$('#insertBtn').click(function(){
		var id = $('#id').val();
		var pw = $('#pw').val();
		var name = $('#name').val();
		var phone = $('#phone').val();
		if(id==""){
			alert("아이디를 입력하세요.");
			$("#id").focus();
			return;
		}
		if(pw==""){
			alert("비밀번호를 입력하세요.");
			$("#pw").focus();
			return;
		}
		if(name==""){
			alert("이름를 입력하세요.");
			$("#name").focus();
			return;
		}
		if(phone==""){
			alert("핸드폰 번호를 입력하세요.");
			$("#phone").focus();
			return;
		}

		var dataform = $("#insertForm").serialize();
		var grp = $('#grp option:selected').val();
		$.post("/index.php/code/memberInsert",dataform, function(data){
			$.post("/index.php/code/memberList",{grp:grp}, function(data){
				$('#managementTable').html(data);
			});
		});
	});

	/**************** 회원 삭제 ****************/
	$(document).on('click', ".deleteBtn", function(){
		
		var id = $(event.target).val();
		var grp = $('#grp option:selected').val();
		$.post("/index.php/code/memberDelete",{id:id}, function(data){
			$.post("/index.php/code/memberList",{grp:grp}, function(data){
				$('#managementTable').html(data);
			});
		});
	});

	/**************** 회원 정보 수정 ****************/
	$(document).on('click', ".modifyBtn", function(){
		var id = $(event.target).val();
		var grp = $('#grp option:selected').val();
		var url = "/index.php/code/memberModify?id="+id;
		window.open(url,"회원 정보 수정", "width=350, height=350");
	});
});

$(function(){
	$("#modifyOkBtn").click(function(){
		var pw=$("#pw").val();
		var pw_ok=$("#pw_ok").val();
		var name=$("#name").val();
		var phone=$("#phone").val();
		var grp=$("#grp option:selected").val();

		if(pw==""){
			alert("비밀번호를 입력하세요.");
			$("#pw").focus();
			return;
		}
		if(pw_ok==""){
			alert("비밀번호 확인을 입력하세요.");
			$("#pw_ok").focus();
			return;
		}
		if(name==""){
			alert("이름를 입력하세요.");
			$("#name").focus();
			return;
		}
		if(phone==""){
			alert("핸드폰 번호를 입력하세요.");
			$("#phone").focus();
			return;
		}
		if(pw!=pw_ok){
			alert("비밀번호가 일치하지 않습니다.");
			$("#pw_ok").focus();
			return;
		}

		var dataform = $("#memberModifyForm").serialize();
		$.post("/index.php/code/memberModifyOk",dataform, function(data){
			alert("정보수정 완료!");
			window.close();
		});
	});
	/**************** 설정 ****************/
	$(document).on("keyup", "input:text[numberOnly]",
		function() {$(this).val( $(this).val().replace(/[^0-9]/gi,""));
	});
});
