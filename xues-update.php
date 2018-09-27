<?php include("top.php"); ?>
<?php 
$kid = empty( $_GET["kid"] )?"null":$_GET["kid"];
if ($kid == "null") {
	die("请选择要修改的记录");
}else{
include("conns.php");

// 执行SQL语句
$sql = "select id,学号,班号,姓名,性别,出生日期,电话 from student where id={$kid}";
$result = mysqli_query($conn, $sql);
//输出数据
if (mysqli_num_rows($result)>0) {
	//将查询的结果换成数组
            $row=mysqli_fetch_assoc($result);
}else{
	echo "找不到这条记录";
}
// 关闭数据库
mysqli_close($conn);
}
?>
<div class="box">
	<!-- 左菜单 -->
	<?php include("leftmenu.php"); ?>
            <div class="right">
		<p class="sui-text-xxlarge myBlue my-padd">学生修改页面</p>
		<form id="form1" action="xues-save.php" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
				<label for="inputEmail" class="control-label">学号：</label>
				<div class="controls">
					<!-- 增加一个隐藏的input，用来区分是新增数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 -->
					<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
					<input type="text" id="xueh"  value="<?php echo $row['学号'] ?>" name="xueh" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="banhao" class="control-label">班号：</label>
				<div class="controls">
					<input type="text" id="banhao" value="<?php echo $row['班号'] ?>" name="banh" class="input-large input-fat"  data-toggle="datepicker-inline" placeholder="输入课程时间">
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">姓名：</label>
				<div class="controls">
					<input type="text" id="xingm" value="<?php echo $row['姓名'] ?>" name="xingm" class="input-large input-fat"  placeholder="输入姓名"  data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="sex" class="control-label">性别：</label>
				<div class="controls">
					<label class="radio-pretty inline <?php if ($row['性别']=="1"){echo 'checked';} ?>">
						<input type="radio" value="1" name="sSex"><span>男</span>
					</label>
					<label class="radio-pretty inline <?php if ($row['性别']=="0"){echo 'checked';} ?>">
						<input type="radio" value="0" name="sSex"><span>女</span>
					</label>
				</div>

			</div>
			<div class="control-group">
				<label for="riqi" class="control-label">出生日期：</label>
				<div class="controls">
					<input type="text" id="riqi" value="<?php echo $row['出生日期'] ?>" name="shengr" class="input-large input-fat"  data-toggle="datepicker-inline" placeholder="输入日期">
				</div>
			</div>

			<div class="control-group">
				<label for="phone" class="control-label">电话：</label>
				<div class="controls">
					<input type="text" id="phone" value="<?php echo $row['电话'] ?>" name="phone" class="input-large input-fat"  placeholder="输入电话号码"  data-rules="required|minlength=2|maxlength=11">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" name="" value="提交" class="sui-btn btn-large btn-primary">
				</div>
			</div>
		</form>
            </div>
</div>
<?php include("foot.php"); ?>