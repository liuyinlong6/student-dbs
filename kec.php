<!-- 头部 -->
<?php include("top.php"); ?>
	<div class="box">
	<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
		<div class="right">
			<div class="content">
				<p class="sui-text-xxlarge">课程录入</p>
				<form id="form1" action="kec-save.php" method="post" class="sui-form form-horizontal sui-validate">
					 <div class="control-group">
    					<label for="inputEmail" class="control-label">课程名：</label>
    					<div class="controls">
      					<input type="text" id="kcName" name="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules='required|minlength=2|maxlength=10'>
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">课程时间：</label>
    					<div class="controls">
      					<input type="text" id="kcTime" name="kcTime" class="input-large input-fat" placeholder="输入课程时间">
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