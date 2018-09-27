<?php session_start();
include("top.php"); 
	$kid=empty($_GET['kid'])?"null":$_GET['kid'];
	include ("conns.php");
//执行SQL语句
$sq2="select distinct name from newscolumn";
$result2 = mysqli_query($conn,$sq2);
$sql = "select * from news where id='{$kid}'";
$result = mysqli_query($conn,$sql);
//输出数据
if (mysqli_num_rows($result) > 0) {
	//将查询的结果转换成关联数组
	 $rows = mysqli_fetch_assoc($result);
}else{
	echo "没有记录";
}
mysqli_close($conn);

?>
<p id="haap">欢迎<span><?php echo $_SESSION['usname']; ?></span>来到管理页面</p>
<div class="box">
		<?php include("leftmenu.php"); ?>
		<div class="right">
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">新闻修改</p>
		<form class="sui-form form-horizontal sui-validate" action="news-entry.php" method="post" enctype="multipart/form-data">
			<div class="control-group">
    					 <label for="title" class="control-label">标题</label>
					     <div class="controls">
					     <!-- 增加一个隐藏的input,用来区分是新增的数据还是修改数据 -->
			    			<input type="hidden" name="action" value="update">
			    		<!-- 增加一个隐藏的input,保存课程编号 -->
			    			<input type="hidden" name="kid" value="<?php echo $rows['id'] ?>">	
					        <input type="text" id="title" name="title" class="input-large input-fat" value="<?php echo $rows['标题']; ?>" data-rules='required|minlength=2|maxlength=10'>
					     </div>
					</div>
					<div class="control-group">
    					 <label for="inputEmail" class="control-label">肩题</label>
					     <div class="jianti">
					        <input type="text" id="jianti" name="shou" class="input-large input-fat"  value="<?php echo $rows['肩题']; ?>" data-rules='required|minlength=2|maxlength=10'>
					     </div>
					</div>
					<div class="control-group">
    					 <label for="zuozhe" class="control-label">作者</label>
					     <div class="controls">
					     <input type="hidden" name="userid" value="<?php echo $_SESSION['usid']; ?>">
					        <input type="text" id="zuozhe" name="zuohze" readonly="readonly" value="<?php echo $_SESSION['usname'] ?>" 
					        class="input-large input-fat" placeholder="作者名字" data-rules='required|minlength=2|maxlength=10'>
					     </div>
					</div>
					<div class="control-group">
    					 <label for="inputEmail" class="control-label">图片</label>
					     <div class="controls">
					     <input type="hidden" name="oldpic" value="<?php echo $rows['图片']; ?>">
					     	<input type="file" name="file">
							<img width="80px" height="150px" name="file" src="<?php echo $rows['图片']; ?>" >
					     </div>
					</div>
					<div class="control-group">
    					 <label for="lanmu" class="control-label">栏目：</label>
					     <div class="controls">
					        <select name="lanmu" id="lanmu">
					        	<?php 
					        	if(mysqli_num_rows($result2) > 0 ){
									while ($row = mysqli_fetch_assoc($result2)) {
										echo "<option value='{$row['name']}'>{$row['name']}</option>";
									}
								} else {
									echo "<option value=''>栏目选择</option>";
								}
					        	 ?>
					        </select>
					     </div>
					</div>
					<div class="control-group">
    					 <label for="inputEmail" class="control-label">时间</label>
					     <div class="controls">
					        <input type="text" id="kcTime" name="time" class="input-large input-fat" value="<?php echo $rows['发布时间']; ?>">
					     </div>
					</div>
					<div class="control-group">
					    <label for="inputEmail" class="control-label">内容</label>
					    <textarea id="editor" name="content" style="width:550px;height:50px;"><?php echo $rows['内容']; ?></textarea>
					</div> 
					<div class="control-group">
    					 <label for="inputEmail" class="control-label"></label>
					     <input type="submit" class="sui-btn btn-large btn-primary" value="提交" name="">
					</div>
		</form>
	</div>
	</div>
</div>
<?php include("foot.php"); ?>