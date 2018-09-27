<?php 
$conn = mysqli_connect("localhost","root","");
if ($conn) {
	echo "连接成功!";
}else{
	die ("连接失败".mysqli_connect_error());
}
 //连接要操作的数据库
 mysqli_select_db($conn,"student-dbs");
 //设置读取数据库的编码，不然显示汉字为乱码
 mysqli_query($conn,"set names utf8");

 //执行SQL语句
 $sql = "delete from user where id='{$_GET['kid']}'";

 $result = mysqli_query($conn,$sql);


if ($result) {
	echo "<script>alert('删除数据成功');<script>";
	header('refresh:1;url=member-mana.php');
}else{
	echo "删除数据失败".mysqli_error($conn);
}
 //关闭数据库
 mysqli_close($conn);
?>