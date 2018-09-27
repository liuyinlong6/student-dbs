<?php  
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
	//执行SQL语句
	$sql = "delete from kecheng where 课程编号={$_GET['kid']}";
	$result = mysqli_query($conn,$sql);
	//输出数据
	// var_dump($result);
	if($result){
		echo "<script>alert('数据删除成功')</script>";
		//执行代码后过几秒后跳转另一个页面
		header("Refresh:1;url=kec-list.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	//关闭数据库
	mysqli_close($conn);
?>