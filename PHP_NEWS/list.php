<?php 
	include_once("global.php");

	if (empty($_GET[cid])) {
		exit();
	}

	$sql = "SELECT *FROM `p_newsclass` WHERE f_id=0 ORDER BY id DESC";
	$query = $db->query($sql);
	while ($row_class = $db->fetch_array($query)) {
		$sm_class[] = array(
				"name" => $row_class[name],
				"id" => $row_class[id]
			);
	}

	$smarty->assign("sm_class", $sm_class); //导航

	//----------------------------------

	$sql = "SELECT * FROM p_config";
	$query = $db->query($sql);
	while ($row_config = $db->fetch_array($query)) {
		$sm_config[] = $row_config[values];
	}

	$smarty->assign("sm_config", $sm_config); //配置

	//------------------------------------

	$query = $db->findall("p_newsclass");
	while ($row = $db->fetch_array($query)) {
		$news_class_arr[$row[id]] = $row[name];
	}

	$query = $db->findall("p_newsclass WHERE f_id='$_GET[cid]'");
	while($row = $db->fetch_array($query)){
		$news_class_in.= $row[id].",";
		$news_class_list_arr[] = array("name"=>$row[name], "id"=>$row[id],);
	}

	$news_class_in = $news_class_in."$_GET[cid]";


	$result = mysql_query("SELECT id FROM p_newsbase WHERE cid IN ($news_class_in)");
	$total = mysql_num_rows($result);
	pageft($total, 2);

	if ($firstcount < 0) {
		$firstcount = 0;
	}

	$query = $db->findall("p_newsbase WHERE cid IN ($news_class_in) LIMIT $firstcount, $displaypg");
	while ($row = $db->fetch_array($query)) {
		$sm_list[] = array(
				"cid" => $row[cid],
				"cidname" => $news_class_arr[$row[cid]],
				"title" => $row[title],
				"id" => $row[id],
				"date_time" => date("m/d", $row[date_time])
			);
	}


	$smarty->assign("sm_list", $sm_list);
	$smarty->assign("pagenav", $pagenav);
	$smarty->assign("news_class_list_arr", $news_class_list_arr);

	$smarty->display("list.html");
 ?>