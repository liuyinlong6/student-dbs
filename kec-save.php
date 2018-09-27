<?php 
	$kcName = $_POST["kcName"];
	$kcTime = $_POST['kcTime'];
	// 如果是录入页面提交，那么$action等于add
	$action = empty($_POST['action'])?"add":$_POST['action'];
	if ($action=="add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "kec.php";
		//执行SQL语句
		$sql = "insert into kecheng(课程名,时间) value('$kcName','$kcTime')";
	}else if($action=="update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "kec-list.php";
		$kid = $_POST["kid"];
		$sql = "update kecheng set 课程名='{$kcName}',时间='{$kcTime}' where 课程编号={$kid}";
	}else{
		die("请选择操作方法");
	}
	include("conns.php");
	// $bhName = $_POST["bhName"];
	// $sql2 = "update kecheng set 课程名='js面向对象' where 课程编号=4";
	$result = mysqli_query($conn,$sql);
	//输出数据
	var_dump($result);
	if($result){
		echo "{$str1}";
		header("Refresh:1;url={$url}");
	}else{
		echo "{$str2}".mysql_error($conn);
	}
	//关闭数据库
	mysqli_close($conn);
 ?>