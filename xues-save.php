<?php 
	//获取数据
	$xueh = empty($_POST['xueh'])?"null":$_POST['xueh'];
	$banh = empty($_POST['banh'])?"null":$_POST['banh'];
	$xingm = empty($_POST['xingm'])?"null":$_POST['xingm'];
	$shengr = empty($_POST['shengr'])?"null":$_POST['shengr'];
	$phone = empty($_POST['phone'])?"null":$_POST['phone'];
	$sex = empty($_POST['sSex'])?"0":$_POST['sSex'];

	$action = empty($_REQUEST["action"])?"add":$_REQUEST["action"];
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "xues.php";
		$sql = "insert into student(学号,班号,姓名,出生日期,性别,电话) value('$xueh','$banh','$xingm','$shengr','$sex','$phone')";
	}else if($action=="update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "xues-list.php";
		$kid = $_POST["kid"];
		$sql = "update student set 学号='{$xueh}',班号='{$banh}',姓名='{$xingm}',性别='{$sex}',出生日期='{$shengr}',电话='{$phone}' where id={$kid}";
	}else{
		die("请选择操作方法");
	}
	include("conns.php");
	// 执行SQL语句
	$result = mysqli_query($conn, $sql);

	// 输出数据
	// var_dump($result);

	if ($result) {
	echo "<script>alert('{$str1}');</script>";
	header("Refresh:1;url={$url}");
	}else{
	echo $str2.mysqli_error($conn);
	}
	// 关闭数据库
	mysqli_close($conn);
?>