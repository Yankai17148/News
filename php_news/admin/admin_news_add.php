<?php 
	include_once("admin_global.php");

	//$r = $db->Get_user_shell_check($uid, $shell);

	if (isset($_POST[into_news])) {
		$db->query("INSERT INTO `p_newsbase` (`id`, `cid`, `title`, `author`, `date_time`) " .
     		"VALUES (NULL, '$_POST[cid]', '$_POST[title]', '$_POST[author]', '".mktime()."')");
		$last_id = $db->insert_id();
		$db->query("INSERT INTO `p_newscontent` (`nid`, `keywrod`, `content`, `remark`) " .
			"VALUES ($last_id, '$_POST[keywrod]', '$_POST[content]', '')");
		$db->Get_admin_msg("admin_news_add.php", "添加成功");
	}
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>News</title>
 	<link rel="stylesheet" type="text/css" href="./simditor/styles/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="./simditor/styles/simditor.css" />

	<script type="text/javascript" src="./simditor/scripts/js/jquery.min.js"></script>
	<script type="text/javascript" src="./simditor/scripts/js/simditor-all.js"></script>
	<script>
		$(document).ready(function() {
			var editor = new Simditor({
				textarea: $("#editor")
			})
		});
	</script>
 </head>
 <body>
 	<div>后台 >> 添加新闻</div>
 	<form action="" method="post">
 	<h4>新闻分类</h4>
 	<div>
 		<select name="cid" id="">
 			<option value="0">添加大类</option>
 			<?php 
				 $query = mysql_query("SELECT *FROM p_newsclass WHERE f_id=0");
				 while ($row=mysql_fetch_array($query)) {
				 	echo "<option value=\"$row[id]\">$row[name]</option>";
				 	$query_son = mysql_query("SELECT * FROM p_newsclass WHERE f_id = '$row[id]'");
				 	while ($row_son = mysql_fetch_array($query_son)) {
						echo "<option value=\"$row_son[id]\">&nbsp;&nbsp;&nbsp;┗$row_son[name]</option>";
				 	}
				}
			 ?>
 		</select>
 	</div>
 	<h4 class="h4_title">新闻内容</h4>
 	<div>新闻标题：<input type="text" name="title"></div>
 	<div>新闻作者：<input type="text" name="author"></div>
 	<div>新闻关键字：<input type="text" name="keyword"></div>
 	<div>
 		新闻内容：
 		<div style="width:900px;">
 		<textarea id="editor" name="content" placeholder="这里输入内容" width="500"></textarea>
 		</div>
 	</div>
 	<div><input type="submit" value="添加新闻" name="into_news"></div>
 	</form>
 </body>
 </html>
