<?php 
	session_start();
	//删除指定session
	unset($_SESSION['uname']);
	header("Refresh:0;url=login.php");
 ?>