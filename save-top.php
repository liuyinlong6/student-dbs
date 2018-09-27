	//创建连接
	$conn = mysqli_connect("localhost","root","");
	//第一个参数是本地连接，第二个参数是账号名称，第三个参数是密码
	if($conn){
		echo "连接成功";
		header("Refresh:10;url=ch01.php");
	}else{
		die("连接失败".mysqli_connect_error());
	}
	//选择要操作的数据库
	mysqli_select_db($conn,"student-dbs");
	//设置读取数据库的编码，不然显示汉字为乱码
	mysqli_query($conn, "set names utf8");