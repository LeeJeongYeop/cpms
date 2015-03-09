<!doctype html>
<html>
<head>
	<title>CODE FACTORIAL</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel='stylesheet' href='http://fonts.googleapis.com/earlyaccess/nanumgothic.css'>
	<link rel="stylesheet" hrdf="./style.css">
	<link rel="stylesheet" href="/assets/css/codeIndex.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/codeIndex.js"></script>
	
</head>
<body>
	<div id="header">
		<img src="/assets/image/codefactorial.jpg" alt="codefactorial">
	</div>
	
	<div id="nav">
		<div id="logo" align="center">
			<ul>
				<li><div id="cadiLogo"><img src="/assets/image/cadi.jpg"><br>CONVERGGENCE APP DEVELOPMENT CLUB</div></li>
				<li><div id="cadiwLogo"><img src="/assets/image/cadi-w.jpg"><br>WEB DEVELOPMENT SHORT PROJECT CLUB</div></li>
				<li><div id="cadibLogo"><img src="/assets/image/cadi-b.jpg"><br>BASIC LANGUAGE SHORT STUDY CLUB</div></li>
				<li><div id="cadieLogo"><img src="/assets/image/cadi-e.jpg"><br>EMBEDDED I.O.T CLUB</div></li>
			</ul>
		</div>
		<div id="login" align="center">
			<ul>
				<li onmouseover="mOver('cadi')" onmouseout="mOut('cadi')" onclick="fixed('cadi')">
					<div id="cadi" >
						<form action="#" method="post" id="cadiForm">
							<table>
								<tr>
									<th colspan="2" align="center">CADI</th>
								</tr>
								<tr>
									<th>ID</th>
									<td><input type="text" name="id"></td>
								</tr>
								<tr>
									<th>PW</th>
									<td><input type="password" name="pw"></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input class="btn btn-default btn-sm" type="submit" value="LOG-IN"></td>
								</tr>
							</table>
						</form>
					</div>
				</li>

				<li onmouseover="mOver('cadiw')" onmouseout="mOut('cadiw')"  onclick="fixed('cadiw')">
					<div id="cadiw">
						<form action="/index.php/code/login" method="post">
							<table>
								<tr>
									<th colspan="2" align="center">CADI-W</th>
								</tr>
								<tr>
									<th>ID</th>
									<td><input type="text" name="id"></td>
								</tr>
								<tr>
									<th>PW</th>
									<td><input type="password" name="pw"></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input class="btn btn-default btn-sm" type="submit" value="LOG-IN"></td>
								</tr>
							</table>
						</form>
					</div>
				</li>
				<li onmouseover="mOver('cadib')" onmouseout="mOut('cadib')" onclick="fixed('cadib')">
					<div id="cadib" >
						<form action="#" method="post">
							<table>
								<tr>
									<th colspan="2" align="center">CADI-B</th>
								</tr>
								<tr>
									<th>ID</th>
									<td><input type="text" name="id"></td>
								</tr>
								<tr>
									<th>PW</th>
									<td><input type="password" name="pw"></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input class="btn btn-default btn-sm" type="submit" value="LOG-IN"></td>
								</tr>
							</table>
						</form>
					</div>
				</li>
				<li onmouseover="mOver('cadie')" onmouseout="mOut('cadie')"  onclick="fixed('cadie')">
					<div id="cadie">
						<form action="#" method="post">
							<table>
								<tr>
									<th colspan="2" align="center">CADI-E</th>
								</tr>
								<tr>
									<th>ID</th>
									<td><input type="text" name="id"></td>
								</tr>
								<tr>
									<th>PW</th>
									<td><input type="password" name="pw"></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input class="btn btn-default btn-sm" type="submit" value="LOG-IN"></td>
								</tr>
							</table>
						</form>
					</div>
				</li>
			</ul>
		</div>
		
	</div>
	<div id="footer" align="center">
		
		CADI Project Management SNS<br>
		member : Gloria YG TOM Y<BT>

	</div>
</body>

</html>