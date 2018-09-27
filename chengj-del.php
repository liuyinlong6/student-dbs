<?php 

	include("conns.php");
	//班号后面的值是字符串
	$sql = "delete from xuanxiu where 学号='{$_GET['kid']}'";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('数据删除成功')</script>";
		//执行代码后过几秒后跳转另一个页面
		header("Refresh:1;url=chengj-list.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	//关闭数据库
	mysqli_close($conn);
 ?>