<?php include("top.php") ?>
	<div class="box">
		<?php include("leftmenu.php"); ?>
		
		<div class="right">
			<div class="content">
				<p class="sui-text-xxlarge">成绩信息录入</p>
				<form id="from2" action="chengji-save.php" method="post" class="sui-form form-horizontal sui-validate" >
					 <div class="control-group">
    					<label for="inputEmail" class="control-label">学号：</label>
    					<div class="controls">
      					<input type="text" id="kcName" name="xueh" class="input-large input-fat" placeholder="输入课程名称" data-rules='required|minlength=2|maxlength=10'>
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">课程编号：</label>
    					<div class="controls">
      					<input type="text" id="kcTime" name="bianh" class="input-large input-fat" placeholder="输入课程时间">
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">成绩：</label>
    					<div class="controls">
      					<input type="text" id="kcTime" name="chengj" class="input-large input-fat" placeholder="输入课程时间">
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

	<?php include("foot.php") ?>
