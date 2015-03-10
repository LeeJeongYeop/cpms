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
	<link type="text/css" rel="stylesheet" href="/assets/css/jquery-te-1.4.0.css">
	<script src='/assets/js/moment.min.js'></script>
	<script src='/assets/js/jquery.min.js'></script>
	<script src='/assets/js/fullcalendar.min.js'></script>
	<script src='/assets/js/lang-all.js'></script>
	<script type="text/javascript" src="/assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="/assets/js/HuskyEZCreator.js" charset="utf-8"></script>
	<script>
		var uauth='<?=$udata['uauth']?>';
		var ugroup="<?=$udata['ugroup']?>";
	</script>
	<script src='/assets/js/calendar.js'></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/cadiw.js"></script>
	<script src="/assets/js/cadiwJS.js"></script>
</head>
<body>
	<div id="wrap">
	<a href="/index.php/code/cadiw">
		<div id="header">
			<img src="/assets/image/cadi-w.jpg" height="100px">웹 개발 단기 프로젝트 동아리<br>

		</div>
	</a> 
	

