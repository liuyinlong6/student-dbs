<?php 
// session_start();
	//email
	$emails = empty($_POST['email'])?"null":$_POST['email'];
	//用户名
	$username = empty($_POST['username'])?"null":$_POST['username'];
	//密码password
	$password = empty($_POST['password'])?"null":$_POST['password'];
	//问题
	$question = empty($_POST['question'])?"null":$_POST['question'];
	//答案
	$daa = empty($_POST['daa'])?"null":$_POST['daa'];

		$kid= $_REQUEST["kid"];
		$sql1="UPDATE user SET email='$emails',name='$username',password='$password',question='$question',answer='$daa' WHERE id='$kid'";
		// echo $sql1;

	//创建连接
	$conn = mysqli_connect("localhost","root","");
	if($conn){
		echo "连接成功";
	}else{
		die("连接失败".mysql_connect_error()) ;
	}
	//选择要操作的数据库
	mysqli_select_db($conn,"student-dbs");
	//设置读取数据库的编码，不然显示汉字为乱码
	mysqli_query($conn, "set names utf8");
	//mysqli_query  函数执行一条SQL查询
	$result = mysqli_query($conn,$sql1);
	if($result){
		echo "数据更新成功";
		header("Refresh:1;url=member-mana.php");
	}else{
		die("数据更新失败".mysqli_error($conn));
		header("Refresh:1;url=member-mana.php");
	}
	//关闭数据库
	mysqli_close($conn);
 ?>