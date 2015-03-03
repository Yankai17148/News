<?php 
	include_once("global.php");

	$sql = "SELECT * FROM `p_newsclass` WHERE f_id=0 ORDER BY id DESC";
	$query = $db->query($sql);
	while ($row_class = $db->fetch_array($query)) {
		$sm_class[] = array(
				"name" => $row_class[name],
				"id" => $row_class[id]
			);
	}

	$smarty->assign("sm_class", $sm_class);//导航

	//-----------------------------------------
	$sql = "SELECT * FROM p_config";
	$query = $db->query($sql);
	while ($row_config = $db->fetch_array($query)) {
		$sm_config[] = $row_config[values];
	}

	$smarty->assign("sm_config", $sm_config); //配置

	//------------------------------------------

	if (!empty($_GET[id])) {
		$sql = "SELECT * FROM p_newsbase AS a, p_newscontent AS b WHERE a.id = b.nid AND a.id = '$_GET[id]'";
		$query = mysql_query($sql);
		$row_news = mysql_fetch_array($query);
		$row_news[4] = date("Y-m-d", $row_news[4]);
		//echo $row_news[7];
	}

	$smarty->assign("row_news",$row_news);

	$smarty->display("view.html");
 ?>