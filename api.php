<?php 
include "conns.php";
//获取提交表单的数据库值
$action=empty($_REQUEST['action'])?"null":$_REQUEST['action'];
//接口返回的json值
$responseArr = array(
	"code"=>200,
	"data"=>null,
	"msg"=>"数据获取成功"
	);

switch ($action) {
	case 'student':
		$sql = "select * from ".$action;
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			$stdentlist = array();
			while ($rows=mysqli_fetch_assoc($result)) {
				$stdentlist[]=$rows;
			}
			// var_dump($stdentlist);
			$responseArr["data"]=$stdentlist;
		}else{
			$responseArr["data"] = null;
			$responseArr["code"] = 207;
			$responseArr["msg"]= "暂无记录";
		}
		die(json_encode($responseArr));
		break;
	case 'banj';
	default:
		echo "请指定正确的参数";
		break;
}
?>