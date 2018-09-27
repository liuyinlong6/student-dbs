<?php include("top.php");
include("conns.php");
$sql = "SELECT DISTINCT 班号 FROM student";
$result = mysqli_query($conn, $sql);
 ?>
	<div class="box">
		<?php include("leftmenu.php"); ?>
		<div class="right">
			<div class="content">
				<p class="sui-text-xxlarge">学生信息录入</p>
				<form id="from3" action="xues-save.php" method="post" class="sui-form form-horizontal sui-validate">
					 <div class="control-group">
    					<label for="inputEmail" class="control-label">学号：</label>
    					<div class="controls">
      					<input type="text" id="xueh" name="xueh" class="input-large input-fat" placeholder="输入课程名称" data-rules='required|minlength=2|maxlength=10'>
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">班号：</label>
    					<div class="controls">
      					<select name="banh" id="banhao">
          <?php 
          if (mysqli_num_rows($result) > 0) {
            while ( $row = mysqli_fetch_assoc($result) ) {
              echo "<option value='{$row['班号']}'>{$row['班号']}></option>";
            }
          }else{
            echo "<option value=''>请先添加班级信息</option>";
          } 
           ?>
          </select>
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">姓名：</label>
    					<div class="controls">
      					<input type="text" id="xingm" name="xingm" class="input-large input-fat" placeholder="输入课程时间">
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">出生日期：</label>
    					<div class="controls">
      					<input type="text" id="shengr" name="shengr" class="input-large input-fat" placeholder="输入课程时间" data-toggle="datepicker">
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">性别：</label>
    					<div class="controls">
      					<label class="radio-pretty inline checked">
            <input type="radio" value="1" checked="checked" name="sSex"><span>男</span>
          </label>
          <label class="radio-pretty inline">
            <input type="radio" value="0" name="sSex"><span>女</span>
          </label>
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">电话：</label>
    					<div class="controls">
      					<input type="text" id="phone" name="phone" class="input-large input-fat" placeholder="输入课程时间">
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
