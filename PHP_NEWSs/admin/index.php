<?php 
	include_once("admin_global.php");
	if (!empty($_POST[username])&& !empty($_POST[password])) {
		$db->Get_user_login($_POST[username], $_POST[password]);
	}
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>后台</title>
 </head>
 <body>
 	<form action="" method="post">
 		<h4>用户登录</h4>
 		<div><input type="text" name="username" values="" placeholder="用户名"></div>
 		<div><input type="password" name="password" values="" placeholder="密码"></div>
 		<div><input type="submit" value="登录" name="update"></div>
 	</form>
 </body>
 </html>