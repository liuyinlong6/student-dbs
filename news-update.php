<?php 
	$biaoti = ($_REQUEST["biaoti"]);
	$jianti =  ($_REQUEST["jianti"]);
	$kcTime = ($_REQUEST["kcTime"]);
	$editor = ($_REQUEST["editor"]);
	$zuozhe = ($_REQUEST["zuozhe"]);
	$lanmu =($_REQUEST["lanmu"]);
	$time=($_REQUEST[".time()."]);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10241000))
{
	if ($_FILES["file"]["error"] > 0){
		echo "错误: " . $_FILES["file"]["error"] . "<br />";
	}else{
		// 重新给上传的文件命名, 增加一个年月日时分秒的前缀, 并且加上保存路径
		$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];

		//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
		move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
	}
}else{
	echo "您上传的文件不符合要求";
}

	// 如果是录入页面的话，那么$active等于“add”
	$action = empty($_REQUEST["action"])?"add":$_REQUEST["action"];
	if($action=='add'){
		$str="数据添加成功!";
		$str2="数据添加失败!";
		$url= "xinwenfb-input.php";
		$sql1="insert into xinwenfb (标题,肩题,图片,时间,内容,创建时间,userid,columnid)values('$biaoti','$jianti','$filename','$kcTime','$editor',".$time().",'$zuozhe','$lanmu')";
	}else if($action=='update'){
		$str="数据更新成功";
		$str2="数据更新失败!";
		$url= "xinwenfb-list.php";
		$kid= $_REQUEST["kid"];
		$sql1="UPDATE `xinwenfb` SET `id`='{$kid}',`标题`='{$biaoti}',`肩题`='{$jianti}',`图片`='{$filename}',`时间`='{$kcTime}',`内容`='{$editor}',`创建时间`='{.$time().}',`userid`='{$zuozhe}',`columnid`='{$lanmu}' WHERE id='{$kid}'";
	}else{
		die("请选择操作方法");
	}
include("conn.php");
$result = mysqli_query($conn,$sql1);
 // 输出数据
 if ($result){
 	echo "<script> alert('{$str}');<script>";
 	header("refresh:1;url=xinwenfb-input.php");
 }else{
 	echo "数据更新失败".mysqli_error($conn);
 }
 //关闭数据库
 mysqli_close($conn);
 ?>

