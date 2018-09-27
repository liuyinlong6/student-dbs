<!-- 头部 -->
<?php include("top.php"); ?>
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
	$sql = "select 学号,课程编号,成绩 from xuanxiu";
	$result = mysqli_query($conn,$sql);
	
	//关闭数据库
	mysqli_close($conn);
?>
	<div class="box">
	<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
		<div class="right">
			<div class="content">
				<p class="sui-text-xxlarge">成绩修改</p>
				<table class="sui-table table-primary">
					<tr>
						<th>学号</th>
						<th>课程编号</th>
						<th>成绩</th>
						<th>操作</th>
					</tr>
		
<?php 
	//输出数据
	// var_dump($result);
	if(mysqli_num_rows($result)>0){
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>
			<td>{$row['学号']}</td>
			<td>{$row['课程编号']}</td>
			<td>{$row['成绩']}</td>
			<td>
			<a class='sui-btn btn-small btn-warning' href='chengj-update.php?kid={$row['学号']}'>修改</a> &nbsp;&nbsp;&nbsp; <a class='sui-btn btn-small btn-danger' href='chengj-del.php?kid={$row['学号']}'>删除</a>
			</td>
			</tr>";
		}
	}else{
		echo "没有记录";
	}
 ?>
 		</table>
 			</div>
		</div>
	</div>
	<!-- foot链接 -->
	<?php include("foot.php"); ?>