<?php
$Err = false;
if( !( isset($_POST['name'])
	&& isset($_POST['user'])
	&& isset($_POST['mail'])))
	$Err = true;
else{
	$name = $_POST['name'];
	$user = $_POST['user'];
	$mail = $_POST['mail'];
	if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
		$Err = true;
	}else{
		$data = $name.','.$user.','.$mail."\n";
		file_put_contents('signup.csv',$data,FILE_APPEND | LOCK_EX);
	}
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<title>工作站申請 | NTUOSC 臺大開源社</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" type="text/css">
</head>
<body>
	<div class="layout">
		<header class="row">
			<h1 class="site-name">NTUOSC 臺大開源社</h1>
			<a href="https://ntuosc.org" class="logo"><img src="images/ntuosc-icon.png" alt="NTUOSC 臺大開源社"></a>
			<h2 class="page-title">Account Registration <wbr>工作站申請</h2>
		</header>
		<div class="row">
			<p>
			<?php
				if ($Err == true) {
					echo"輸入錯誤，要確定東西都有打對噢";
				} else {
					echo"註冊成功！等網管寄信給你吧";
				}
			?>
			</p>
			<button onclick="window.history.back()">回上頁</button>
		</div>
		<footer>
			© NTUOSC 2015
		</footer>
	</div>
</body>
</html>
