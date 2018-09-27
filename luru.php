<?php 
	
	//获取数据
	$youj = empty($_POST['youj'])?"null":$_POST['youj'];
	$ming = empty($_POST['ming'])?"null":$_POST['ming'];
	$password = empty($_POST['password'])?"null":$_POST['password'];
	$repassword = empty($_POST['repassword'])?"null":$_POST['repassword'];
	$went = empty($_POST['went'])?"null":$_POST['went'];
	$daa = empty($_POST['daa'])?"null":$_POST['daa'];
	//创建一个session
	// $_SESSION['uname'] = "$youj";
	//录入
	$sql = "insert into user(email,name,password,question,answer) value('$youj','$ming','$password','$went','$daa')";
	include("conns.php");
	//mysqli_query 函数执行一条 MySQL 查询
	$result = mysqli_query($conn,$sql);
		if( $result ){
		echo "数据添加成功";
		// die("<script>document.cookie='用户名='+'$ming'</script>");
		//Refresh: 暂停时间
		header("Refresh:1;url=denglu.php");
	}else{
		die( "数据添加失败,用户名不能重复");
		header("Refresh:1;url=index.php");
	}
	// echo document.cookie;
	//关闭数据库
	mysqli_close($conn);
 ?>