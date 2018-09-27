<?php 
header("content-type:textml;charset=UTF-8");
//建立2个范围数组
$shuzi=range(0,9);
$zimuda=range('A','Z');
//将这2个数组合并成新数组
$arr =array_merge($shuzi,$zimuda);
 //将数组 元素打乱，其KEY值跟随元素被打乱
shuffle($arr);
//随机取出原数组的4个key值
$arr_rand = array_rand($arr,4);
//将原数组的key遍历输出，得到4个随机验证码
foreach ($arr_rand as $key => $value) {
	echo $arr[$value];
}
 ?>