<?
	$udata=$this->session->all_userdata();
	
?>	
<!doctype html>
<html>
<head>
	<title>CADI-W</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href='/assets/css/fullcalendar.css' rel='stylesheet' />
	<link href='/assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
	<link href='/assets/css/cadiw.css' rel='stylesheet'>
	<script src='/assets/js/moment.min.js'></script>
	<script src='/assets/js/jquery.min.js'></script>
	<script src='/assets/js/fullcalendar.min.js'></script>
	<script src='/assets/js/lang-all.js'></script>
	<script>
		var uauth='<?=$udata['uauth']?>';
		var ugroup="<?=$group?>";
	</script>
	<script src='/assets/js/groupCalendar.js'></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/cadiw.js"></script>
	<script src="/assets/js/cadiwJS.js"></script>
	</head>
<body>
	<div id="wrap">
	<a href="/index.php/code/cadiw">
		<div id="header">
			<img src="/assets/image/cadi-w.jpg" height="100px">웹 개발 단기 프로젝트 동아리 <?=$group?>조 페이지<br>

		</div>
	</a> 
	