<?php 
	include_once("admin_global.php");

	$r = $db->Get_user_shell_check($uid, $shell);

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>News</title>
 </head>
 <body>
 	<div>后台 >> 搜索</div>
 	<div>
 		<form action="" method="get">
 			<input type="text" name="key">
 			<input type="submit" value="submit">
 		</form>
 	</div>
 	<?php 
 		if (isset($_GET[key])) {
			$sql = "SELECT * FROM `p_newsbase` WHERE title LIKE '%$_GET[key]%'";
			$query = $db->query($sql);
			while($row_key = $db->fetch_array($query)){
				$row_key[title]  = preg_replace("/($_GET[key])/i", "<b>\\1</b>", $row_key[title]);
				echo $row_key[title]."<br>";
			}
		}
 	 ?>
 	<div>
 		<p></p>
 	</div>
 </body>
 </html>