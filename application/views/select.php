<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>
	<form method="post">
		<input type="hidden" name="start" value="<?=$_GET['start']?>">
		<input type="hidden" name="end" value="<?=$_GET['end']?>"><br>
		&nbsp;제목: <input type="text" name="tit"><br><br>
		&nbsp;색 : <select name='color1'>
		<option>red</option>
		<option>blue</option>
		<option>green</option>
		<option>orange</option>
		<option>sky</option>
		<option>purple</option>
	</select>
	<input type="button" class="btn btn-default btn-sm" value="확인" onclick="window.opener.select(this.form);self.close()">
</form>
</body>
</html>
