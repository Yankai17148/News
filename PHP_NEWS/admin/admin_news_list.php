<?php 
	include_once("admin_global.php");

	$r = $db->Get_user_shell_check($uid, $shell);

	$query = $db->findall("p_newsclass");
	while ($row = $db->fetch_array($query)) {
		$news_class_arr[$row[id]] = $row[name];
	}

	if (isset($_GET[del])) {
	 	mysql_query("DELETE FROM `P_newsbase` WHERE `id` = '$GET[del]' LIMIT 1;");
	// 	mysql_query("DELETE FROM `P_newscontent` WHERE `nid` = '$GET[del]' LIMIT 1;")
		$db->Get_admin_msg("admin_news_list.php", "删除成功");
	}
 ?>

 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>News</title>
 </head>
 <body>
 	<div>后台 >> 新闻管理</div>
 	<h4>新闻列表</h4>
 	<table>
 		<tr>
 			<th width="150">新闻分类</th>
 			<th width="200" align="center">新闻标题</th>
 			<th width="100" align="center">作者</th>
 			<th width="200" align="center">日期</th>
 			<th width="100" align="center">操作</th>
 		</tr>
 			<?php 
 				$result = mysql_query("SELECT id FROM p_newsbase");
 				$total = mysql_num_rows($result);
 				pageft($total, 20);
 				if ($firstcount < 0) {
 					$firstcount = 0;
 				}
 				$query = $db->findall("p_newsbase limit $firstcount, $displaypg");
 				while ($row = $db->fetch_array($qurey)) {
 			 ?>
 		<tr>
 			 <td align="center">
 			 	<?php echo $news_class_arr[$row[cid]] ?>
 			 </td>
 			 <td align="center">
 			 	<?php echo $row[title] ?>
 			 </td>
 			 <td align="center">
 			 	<?php echo $row[author] ?>
 			 </td>
 			 <td align="center">
 			 	<?php echo date("Y-m-d H:i", $row[date_time]) ?>
 			 </td>
 			 <td align="center">
 			 	<a href="?del=<?php echo $row[id] ?>">删除</a> / <a href="admin_news_edit.php?id=<?php echo $row[id] ?>">修改</a>
 			 </td>
 			 <?php 
 			 	}
 			  ?>
 			  <tr>
 			  	<th colspan="5">
 			  		<?php echo $pagenav; ?>
 			  	</th>
 			  </tr>
 		</tr>
 	</table>
 </body>
 </html>