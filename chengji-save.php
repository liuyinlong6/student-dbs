<?php 
	//获取班号
	$banh = empty($_POST['xueh'])?"null":$_POST['xueh'];
	$bianh = empty($_POST['bianh'])?"null":$_POST['bianh'];
	$chengj = empty($_POST['chengj'])?"null":$_POST['chengj'];
	// 如果是录入页面提交，那么$action等于add
	$action = empty($_POST['action'])?"add":$_POST['action'];
	if ($action=="add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "chengj.php";
		//执行SQL语句
		// $sql = "insert into kecheng(课程名,时间) value('$kcName','$kcTime')";
		// //添加信息
		$sql = "insert into xuanxiu(学号,课程编号,成绩) value('$banh','$bianh','$chengj')";
	}else if($action=="update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "chengj-list.php";
		// $kid = $_POST["kid"];
		$sql = "update xuanxiu set 学号='{$banh}',课程编号='{$bianh}',成绩='{$chengj}'";
		echo $sql;
	}else{
		die("请选择操作方法");
	}
	//创建连接
	$conn = mysqli_connect("localhost","root","");
	//第一个参数是本地连接，第二个参数是账号名称，第三个参数是密码
	if($conn){
		echo "连接成功";
	}else{
		die("连接失败".mysqli_connect_error());
	}
	//选择要操作的数据库
	mysqli_select_db($conn,"student-dbs");
	//设置读取数据库的编码，不然显示汉字为乱码
	mysqli_query($conn, "set names utf8");

	//mysqli_query 函数执行一条 MySQL 查询
	$result = mysqli_query($conn,$sql);
		if( $result ){
		echo "<script>alert('{$str1}');</script>";
		//Refresh: 暂停时间
		header("Refresh:1;url=$url");
	}else{
		echo $str2.mysqli_error($conn);
	}

	//关闭数据库
	mysqli_close($conn);
 ?>