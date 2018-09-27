<?php
session_start();
 include("top.php"); ?>
<p id="haap">欢迎<span><?php echo $_SESSION['usname']; ?></span>来到管理页面</p>
	<div class="box">
	<?php include("leftmenu.php"); ?>
		<div class="right">
			<div class="content">
				<p class="sui-text-xxlarge">班级信息录入</p>
				<form id="from2" action="banj-save.php" method="post" class="sui-form form-horizontal sui-validate">
					 <div class="control-group">
    					<label for="inputEmail" class="control-label">班号：</label>
    					<div class="controls">
      					<input type="text" id="kcName" name="banh" class="input-large input-fat" placeholder="输入课程名称" data-rules='required|minlength=2|maxlength=10'>
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">班长：</label>
    					<div class="controls">
      					<input type="text" id="kcTime" name="banz" class="input-large input-fat" placeholder="输入课程时间">
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">教室：</label>
    					<div class="controls">
      					<input type="text" id="kcTime" name="jiaos" class="input-large input-fat" placeholder="输入课程时间">
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">班主任：</label>
    					<div class="controls">
      					<input type="text" id="kcTime" name="banzr" class="input-large input-fat" placeholder="输入课程时间">
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">班级口号：</label>
    					<div class="controls">
      					<input type="text" id="kcTime" name="kouh" class="input-large input-fat" placeholder="输入课程时间">
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
	<?php include("foot.php"); ?>
