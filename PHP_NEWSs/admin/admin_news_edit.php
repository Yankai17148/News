<?php 
	include_once("admin_global.php");

	//$r = $db->Get_user_shell_check($uid, $shell);

	if (isset($_POST[into_news])) {
		$db->query("UPDATE `p_newsbase` SET title = '$_POST[title]' WHERE id = '$_GET[id]'");
		$db->Get_admin_msg("admin_news_list.php", "修改成功");
	}

	if (!empty($_GET[id])) {
		$sql = "SELECT * FROM p_newsbase AS a, p_newscontent AS b WHERE a.id = b.nid AND a.id = '$_GET[id]'";
		$query = mysql_query($sql);
		$row_news = mysql_fetch_array($query);
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
 	<div>后台 >> 编辑新闻</div>
 	<h4>修改分类</h4>
 	<form action="" method="post">
 		<div>
 			<select name="cid" id="">
 				<option value="0">添加大类</option>
 				<?php 
 					$query = mysql_query("SELECT *FROM p_newsclass WHERE f_id = 0");
 					while($row = mysql_fetch_array($query)){
 						$selected = $row[id]==$row_news[cid] ? "selected" : NULL;
 						echo "<option value=\"$row[id]\" $selected>$row[name]</option>";
 						$query_son = mysql_query("SELECT *FROM p_newsclass WHERE f_id = '$row[id]'");
 						while ($row_son = mysql_fetch_array($query_son)) {
 							$selected = $row_son[id]==$row_news[cid] ? "selected" : NULL;
 							echo "<option value=\"$row_son[id]\" $selected>&nbsp;&nbsp;&nbsp;┗$row_son[name]</option>";
 						}
 					}
 				 ?>
 			</select>
 		</div>
 		<h4>新闻内容</h4>
 		<div>新闻标题：<input type="text" name="title" value="<?php echo $row_news[title] ?>"></div>
 		<div>新闻作者：<input type="text" name="author" value="<?php echo $row_news[author] ?>"></div>
 		<div>新闻关键字：<input type="text" name="keyword" value="<?php echo $row_news[keywrod] ?>"></div>
 		<div>
 			新闻内容：
 			<div style="width:900px;">
 				<textarea name="content" id="editor" placeholder="请在这里输入内容"><?php echo $row_news[content] ?></textarea>
 			</div>
 		</div>
 		<div><input type="submit" value="修改新闻" name="into_news"></div>
 	</form>
 </body>
 </html>