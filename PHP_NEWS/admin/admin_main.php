<?php 
	include_once("admin_global.php");

	$r = $db->Get_user_shell_check($uid, $shell);

	if ($_GET[action] =="logout") {
		$db->Get_user_out();
	}
	$query = $db->findall("p_config");
	while($row = $db->fetch_array($query)){
		$row_arr[$row[name]] = $row[values];
	}

	if (isset($_POST["update"])) {
		unset($_POST["update"]);
		foreach($_POST as $name => $values){
			$db->query("update p_config set `values` = '$values' where `name` = '$name'");
		}
		$db->Get_admin_msg("admin_main.php");
	}
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>后台管理</title>
 </head>
 <body style="border-left:1px solid #CCC;padding-left:15px;">
 	<form action="" method="post">
 		<p>后台>>系统配置</p>
 		<h4>系统配置</h4>
 		<div><input type="text" name="websitename" value="<?php echo $row_arr[websitename] ?>" placeholder="网站名称"></div>
 		<div><input type="text" name="website_url" value="<?php echo $row_arr[website_url] ?>" placeholder="网站地址"></div>
		<div><input type="text" name="website_keyword" value="<?php echo $row_arr[website_keyword] ?>" placeholder="关键字"></div>
		<div><input type="text" name="website_cp" value="<?php echo $row_arr[website_cp] ?>" placeholder="说明"></div>
		<div><input type="text" name="website_tel" value="<?php echo $row_arr[website_tel] ?>" placeholder="电话"></div>
		<div><input type="text" name="website_email" value="<?php echo $row_arr[website_email] ?>" placeholder="邮箱"></div>
		<div><input type="submit" value="更新" name="update"></div>
 	</form>
 </body>
 </html>