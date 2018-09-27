<?php 
	session_start();
	//获取网页数据
	$wyouj = empty($_REQUEST['youj'])?"null":strtolower($_REQUEST['youj']);
	$wmim = empty($_REQUEST['password'])?"null":$_REQUEST['password'];
	include("conns.php");
	$responseArr = array(
			"code"=>200,
			"msg"=>"登录成功"
		);
	//数据库密码查询
	//首先查询邮件是否正确
	$sql = "select id,email,name,password,question,answer from user where email = '{$wyouj}'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {
		//邮件正确
		$arr = mysqli_fetch_assoc($result);
		// echo $arr['password'];
		if ($wmim == $arr['password']) {
			//密码也正确 
			$_SESSION['usemail'] = $arr['email'];
			$_SESSION['usname'] = $arr['name'];
			$_SESSION['usid'] = $arr["id"];
			echo "<script> window.location.href = 'welcone.php';</script>";
			// echo "<meta http-equiv='refres'hcontent='5'; url='banj.php'>";  
		}else{
			//邮件正确密码错误
			$responseArr["code"] = 20001;
			$responseArr["msg"] = "密码错误";
		}
		// print_r($arr);
	}else{
		//邮件不存在
		$responseArr['code'] = 20004;
		$responseArr['msg'] = "邮件不存在";
	}
	//如果邮件正确则判断密码，一致则正确否则登录失败原因密码错误
	
	// print_r($responseArr);
	echo json_encode($responseArr);

	// //mysqli_query 函数执行一条 MySQL 查询
	// $result = mysqli_query($conn,$sql);
	// 	if( mysqli_num_rows($result)>=1 ){
	// 	$_SESSION['usname'] = $wyouj;
	// 	echo "ok";
	// 	// die("<script>document.cookie='用户名='+'$ming'</script>");
	// 	//Refresh: 暂停时间
	// 	// header("Refresh:100;url=entry.php");
	// }else{
	// 	echo "登录失败，账号或密码不匹配";
	// 	//mysqli_connect_error();返回上一次连接错误的错误描述
	// 	//mysqli_error();函数返回最近调用函数的最后一个错误描述
	// 	// header("Refresh:100;url=denglu.php");
	// }
	// // echo document.cookie;
	//关闭数据库
	mysqli_close($conn);
 ?>