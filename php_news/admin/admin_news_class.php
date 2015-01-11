<?php 
	include_once("admin_global.php");

	//$r = $db->Get_user_login_check($uid, $shell);

	if (isset($_POST[into_class])) {
		$db->query("INSERT INTO `php_news`.`p_newsclass` (`id`, `f_id`, `name`, `keywrod`, `remark`)" .
			" VALUES (NULL, '$_POST[f_id]', '$_POST[name]', '', '')");

		$db->Get_admin_msg("admin_news_class.php", "成功添加分类");
	}

	if (!empty($_GET[del])) {
		$db->query("DELETE FROM `p_newsclass` WHERE `id` = '$_GET[del]' LIMIT 1;");
		$db->Get_admin_msg("admin_news_class.php", "删除成功");
	}

	if (isset($_POST[update_class])) {
		$db->query("update `p_newsclass` set `name`='$_POST[name]' WHERE `id` = '$_POST[id]' LIMIT 1;");
		$db->Get_admin_msg("admin_news_class.php", "更新成功");
	}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>News</title>
 </head>
 <body>
 	<div>后台 >> 新闻分类</div>
 	<h4>添加分类</h4>
 	<form action="" method="post">
 		<div>
	 		<select name="f_id">
	 			<option value="0">添加大类</option>
	 			<?php 
	 				$query = $db->findall("p_newsclass where f_id=0");
	 				while ($row = $db->fetch_array($query)) {
	 					$news_class_arr[$row[id]]=$row[name];
	 					echo "<option value=\"$row[id]\">$row[name]</option>";
	 				}
	 			 ?>
	 		</select>
	 		<input type="text" name="name" value="">
	 		<input type="submit" name="into_class" value="添加分类">
	 	</div>
 	</form>

 	<h4>系统分类</h4>
 	<?php 
 		foreach ($news_class_arr as $id => $val) {
 	 ?>
 	 <div>
 	 	<form action="" method="post">
	 	 	<div>
	 	 		<input type="hidden" name="id" value="<?php echo $id ?>">
	 	 		<input type="text" name="name" value="<?php echo $val ?>">
	 	 		<input type="submit" name="update_class" value="更新">
	 	 		<input type="button" value="删除" onclick="location.href='?del=<?php echo $id ?>'">
	 	 	</div>
	 	 </form>
	 	 <?php 
	 	 	$query_fid = $db->findall("p_newsclass where f_id = $id");
	 	 	while($row_fid = $db->fetch_array($query_fid)){
	 	  ?>
	 	  <form action="" method="post">
		 	 	<div>
		 	 		&nbsp;&nbsp;&nbsp;┗<input type="hidden" name="id" value="<?php echo $row_fid[id] ?>">
		 	 		<input type="text" name="name" value="<?php echo $row_fid[name] ?>">
		 	 		<input type="submit" name="update_class" value="更新">
		 	 		<input type="button" value="删除" onclick="location.href='?del=<?php echo $row_fid[id] ?>'">
		 	 	</div>
		 	 </form>
	 	  <?php 
	 	  	}
	 	   ?>
 	 </div>
 	 <?php 
 	 	}
 	  ?>
 </body>
 </html>