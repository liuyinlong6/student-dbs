<?php session_start();
include("top.php"); 
include('conns.php');
$sql = "select * from newscolumn";
$result = mysqli_query($conn,$sql);
?>
<p id="haap">欢迎<span><?php echo $_SESSION['usname']; ?></span>来到管理页面</p>
<div class="box">
		<?php include("leftmenu.php"); ?>
		<div class="right">
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">新闻发布</p>
		<form class="sui-form form-horizontal sui-validate" action="news-entry.php" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label for="xuehao" class="control-label">标题：</label>
				<div class="controls">
				<!-- 增加一个隐藏的input,用来区分是新增的数据还是修改数据 -->
			    			<input type="hidden" name="action" value="add">
					<input type="text" id="xuehao"  name="title" class="input-large input-fat" placeholder="请输入标题" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">肩题：</label>
				<div class="controls">
					<input type="hidden" name="SName" value="SName">
					<input type="text" id="xingming" name="shou" class="input-large input-fat"  placeholder="输入肩题"  data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">栏目：</label>
				<div class="controls">
					<select id="column" name="column">
						<?php 
							if (mysqli_num_rows($result)>0) {
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<option value='{$row['id']}'>{$row['name']}</option>";
								}
							}else{
								echo "<option>请先添加栏目信息</option>";
							}
						 ?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">作者：</label>
				<div class="controls">
					<input type="hidden" name="userid" value="<?php echo $_SESSION['usid']; ?>">
					<input type="text" id="xingming" readonly="readonly" name="author" class="input-large input-fat" value="<?php echo $_SESSION['usname']; ?>" data-rules="required|minlength=2|maxlength=100">
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">图片：</label>
				<div class="controls">
					<input type="file" name="file" value="图片">
				</div>
			</div>
			<div class="control-group">
				 <label for="sBrithday" class="control-label">日期</label>
			     <div class="controls">
			        <input type="text" id="time" name="time" class="input-large input-fat" placeholder="日期" data-toggle='datepicker'>
			     </div>
			</div>
			 <div class="control-group">
    <label for="inputDes" class="control-label v-top">内容：</label>
    <div class="controls">
      <textarea id="content" cols="80" rows="4" name="content" placeholder="输入内容" data-rules="required"></textarea>
    </div>
  </div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" value="提交" class="sui-btn btn-large btn-primary">
				</div>
			</div>
		</form>
	</div>
	</div>
</div>
<?php include("foot.php"); ?>