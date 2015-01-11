<?php 
	include_once("admin_global.php");
	//$r = $db->Getuser_shell_check($uid, $shell);
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Left</title>
 </head>
 <body>
 	<ul>
 		<li>
 			基础操作
 			<ul>
 				<li><a href="admin_main.php" target=main>配置信息</a></li>
 				<li><a href="../" target="_blank">网站首页</a></li>
 				<li><a onClick="return confirm('提示：您确定要退出系统吗？')" href="admin_main.php?action=logout" target=_parent>退出后台</a></li>
 			</ul>
 		</li>
 		<li>
 			新闻操作
 			<ul>
 				<li><a href="admin_news_class.php" target="main">新闻分类</a></li>
 				<li><a href="admin_news_list.php" target="main">新闻列表</a></li>
 				<li><a href="admin_news_add.php" target="main">添加新闻</a></li>
 			</ul>
 		</li>
 	</ul>
 </body>
 </html>