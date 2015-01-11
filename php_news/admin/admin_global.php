<?php 
	session_start();
	include_once("../common/mysql.class.php");
	include_once("../configs/config.php");
	include_once("common/page.class.php");
	include_once("common/action.class.php");

	$db = new action($mydbhost, $mydbuser, $mydbpwd, $mydbname, ALL_PS, $mydbcharset);

	$uid = $_SESSION[uid];
	$shell = $_SESSION[shell];
 ?>