<?php 
	include_once("global.php");

	if ($_GET[key]) {

		$k = explode(" ", $_GET[key]);
		$sql = "SELECT * FROM `p_newsbase` WHERE title LIKE '%$k[0]%' AND title LIKE '%$k[1]%'";
		$query = $db->query($sql);
		while($row_key = $db->fetch_array($query)){
			$row_key[title]  = preg_replace("/($k[0])/i", "<b>$k[0]</b>", $row_key[title]);
			//$row_key[title]  = preg_replace("/($k[1])/i", "<b>$k[1]</b>", $row_key[title]);

			$sm_key[] = array("title"=>$row_key[title], "id"=>$row_key[id]);
		}
	}

	$smarty->assign("sm_key", $sm_key);//搜索

	$smarty->display("search_result.html");
 ?>