<?php 
session_start();
	//标题
	$title = empty($_POST['title'])?"null":$_POST['title'];
	//肩题
	$shou = empty($_POST['shou'])?"null":$_POST['shou'];
	// //作者
	$author = empty($_POST['userid'])?"null":$_POST['userid'];
	//栏目
	$column = empty($_POST['column'])?"null":$_POST['column'];
	//时间 
	$time = empty($_POST['time'])?"null":$_POST['time'];
	//内容
	$content = empty($_POST['content'])?"null":$_POST['content'];
	//图片
	//判断新图片是否为空
	if (empty($_FILES["file"]["tmp_name"])==false) {
		
	if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "imagepeg"))
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
}else{
	$filename = $_REQUEST['oldpic'];
}

// 如果是录入页面的话，那么$active等于“add”
	$action = empty($_REQUEST["action"])?"add":$_REQUEST["action"];
	if($action=='add'){
		$str="数据添加成功!";
		$str2="数据添加失败!";
		$url= "xinwenfb-input.php";
		$sql1 = "insert into news(标题,肩题,图片,内容,发布时间,创建时间,userid,columnid) value('$title','$shou','$filename','$content','$time',".time().",$author,'$column')";
	}else if($action=='update'){
		$str="数据更新成功";
		$str2="数据更新失败!";
		$url= "xinwenfb-list.php";
		$kid= $_REQUEST["kid"];
		$sql1="UPDATE news SET id='{$kid}',标题='{$title}',肩题='{$shou}',图片='{$filename}',发布时间='{$time}',内容='{$content}',userid='{$author}',columnid='{$kid}' WHERE id='{$kid}'";
		// echo $sql1;
	}else{
		die("请选择操作方法");
	}

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
		echo "数据添加成功";
		header("Refresh:1;url=news-release.php");
	}else{
		die("数据添加失败".mysqli_error($conn));
		header("Refresh:1;url=news-release.php");
	}
	//关闭数据库
	mysqli_close($conn);
 ?>