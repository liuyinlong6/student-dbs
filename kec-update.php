<!-- 头部 -->
<?php include("top.php"); ?>
<?php 
	$kid = empty($_GET['kid'])?"null":$_GET['kid'];
	if ($kid=="null") {
		die("请选择要修改的记录");
	}else{
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
		$sql = "select 课程编号,课程名,时间 from kecheng where 课程编号={$kid}";
		$result = mysqli_query($conn,$sql);
		//输出数据
		if(mysqli_num_rows($result)>0){
			//将查询的结果转换成数组
			$row = mysqli_fetch_assoc($result);
		}else{
			echo "没记录";
		}
		
		//关闭数据库
		mysqli_close($conn);
	}
 ?>
	<div class="box">
	<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
		<div class="right">
			<div class="content">
				<p class="sui-text-xxlarge">课程修改</p>
				<form id="form1" action="kec-save.php" method="post" class="sui-form form-horizontal sui-validate">
					 <div class="control-group">
    					<label for="inputEmail" class="control-label">课程名：</label>
    					<div class="controls">
      					<input type="text" value="<?php echo $row['课程名'] ?>" id="kcName" name="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules='required|minlength=2|maxlength=10'>
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">课程时间：</label>
    					<div class="controls">
    					<!-- 新增一个input，用来区分新增数据还是修改数据 -->
    					<input type="hidden" name="action" value="update">
    					<!-- 增加一个隐藏的input，保留课程编号 -->
    					<input type="hidden" name="kid" value="<?php echo $row['课程编号']; ?>">
      					<input type="text" value="<?php echo $row['时间'] ?>" id="kcTime" name="kcTime" class="input-large input-fat" placeholder="输入课程时间">
   				 		</div>
  					</div>
  					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<input type="submit" value="提交" id="tij" class="sui-btn btn-large btn-primary">
						</div>
  					</div>
				</form>
 			</div>
		</div>
	</div>
	<!-- foot链接 -->
	<?php include("foot.php"); ?>