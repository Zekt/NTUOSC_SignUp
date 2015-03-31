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
	<title>翔子的肉雞</title>
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/SignUp_php.css">
</head>
<body>
	<?php
	if($Err == true){
		echo"<h1>輸入錯誤，要確定東西都有打對歐</h1>";
	}else{
		echo"<h1>註冊成功！等網管寄信給你吧</h1>";
	}
	?>
	<button onclick="location.href='index.html'">回上頁</button>
</body>
</html>
