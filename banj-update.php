<?php include("top.php") ?>
<?php 
	$kid = empty($_GET['kid'])?"null":$_GET['kid'];
	if($kid == 'null'){
		die("请选择要删除的记录");
	}else{
		include("conns.php");
		$sql = "select 班长,教室,班主任,班级口号,班号 from banji where 班号='{$kid}'";
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
				<p class="sui-text-xxlarge">班级修改</p>
				<form id="form1" action="banj-save.php" method="post" class="sui-form form-horizontal sui-validate">
					 <div class="control-group">
    					<label for="inputEmail" class="control-label">班号：</label>
    					<div class="controls">
      					<input type="text" value="<?php echo $row['班号'] ?>" id="kcName" name="banh" class="input-large input-fat" placeholder="输入课班号" data-rules='required|minlength=2|maxlength=10'>
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">班长：</label>
    					<div class="controls">
    					<!-- 新增一个input，用来区分新增数据还是修改数据 -->
    					<input type="hidden" name="action" value="update">
    					<!-- <input type="hidden" name="kid"> -->
      					<input type="text" value="<?php echo $row['班长'] ?>" id="kcTime" name="banz" class="input-large input-fat" placeholder="输入班长">
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">教室：</label>
    					<div class="controls">
    					
      					<input type="text" value="<?php echo $row['教室'] ?>" id="kcTime" name="jiaos" class="input-large input-fat" placeholder="输入教室">
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">班主任：</label>
    					<div class="controls">
    					
      					<input type="text" value="<?php echo $row['班主任'] ?>" id="kcTime" name="banzr" class="input-large input-fat" placeholder="输入班主任">
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">班级口号：</label>
    					<div class="controls">
    					
      					<input type="text" value="<?php echo $row['班级口号'] ?>" id="kcTime" name="kouh" class="input-large input-fat" placeholder="输入班级口号">
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