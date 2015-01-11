<?php
class action extends mysql {

	/**
	 * 用户权限判断($uid, $shell, $m_id)
	 */

	public function Get_user_shell($uid, $shell) {
		$query = $this->select('p_admin', '*', '`uid` = \'' . $uid . '\'');
		$us = is_array($row = $this->fetch_array($query));
		$shell = $us ? $shell == md5($row[username] . $row[password] . "TKBK") : FALSE;
		return $shell ? $row : NULL;
	} //end shell

	public function Get_user_shell_check($uid, $shell, $m_id = 9) {
		if ($row=$this->Get_user_shell($uid, $shell)) {
			if ($row[m_id] <= $m_id) {
				return $row;
			} else {
				echo "你无权限操作！";
				exit ();
			} //end m_id
		} else {
		  $this->Get_admin_msg('index.php','请先登陆');
		}
	} //end shell
	//========================================


	/**
	 * 用户登陆超时时间(秒)
	 */
	public function Get_user_ontime($long = '3600') {
		$new_time = mktime();
		$onlinetime = $_SESSION[ontime];
		echo $new_time - $onlinetime;
		if ($new_time - $onlinetime > $long) {
			echo "登录超时";
			session_destroy();
			exit ();
		} else {
			$_SESSION[ontime] = mktime();
		}
	}

	/**
	 * 用户登陆
	 */
	public function Get_user_login($username, $password) {
		$username = str_replace(" ", "", $username);
		$query = $this->select('p_admin', '*', '`username` = \'' . $username . '\'');
		$us = is_array($row = $this->fetch_array($query));
		;
		$ps = $us ? md5($password) == $row[password] : FALSE;
		if ($ps) {
			$_SESSION[uid] = $row[uid];
			$_SESSION[shell] = md5($row[username] . $row[password] . "TKBK");
			$_SESSION[ontime] = mktime();
			$this->Get_admin_msg('main.php','登陆成功！');
		} else {
			$this->Get_admin_msg('index.php','密码或用户错误！');
			session_destroy();
		}
	}
	 /**
	  * 用户退出登陆
	  */
	public function Get_user_out() {
		session_destroy();
		$this->Get_admin_msg('index.php','退出成功！');
	}

   /**
    * 后台通用信息提示
    */
	public function Get_admin_msg($url, $show = '操作已成功！') {
		$msg = '<!DOCTYPE html>
						<html lang="en">
						<head>
							<meta charset="UTF-8" />
							<title>提示信息</title>
							<meta http-equiv="refresh" content="200"; URL=' . $url . '" />
						</head>
						<body>
							<p>'.$show.'</p>
							<p>2秒后返回指定页面</p>
							<p>如果浏览器无法跳转，<a href="'.$url.'">请点击此处</a>。</p>
						</body>
						</html>';
		echo $msg;
		exit ();
	}

	//========================
} //end class
?>














