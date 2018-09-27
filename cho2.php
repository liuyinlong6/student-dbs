<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
</head>
<body>
	<div class="sui-container">
		<div class="sui-layout">
  			<div class="sidebar">sidebar</div>
 			<div class="content">
				<p class="sui-text-xxlarge">课程录入</p>
				<form class="sui-form form-horizontal sui-validate">
					 <div class="control-group">
    					<label for="inputEmail" class="control-label">课程名：</label>
    					<div class="controls">
      					<input type="text" id="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules='required|minlength=2|maxlength=10'>
   				 		</div>
  					</div>
  					<div class="control-group">
    					<label for="inputEmail" class="control-label">课程时间：</label>
    					<div class="controls">
      					<input type="text" id="kcTime" class="input-large input-fat" data-toggle="datepicker" placeholder="输入课程时间">
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
</body>
</html>
<script type="text/javascript" src='http://g.alicdn.com/sj/lib/jquery.min.js'></script>
<script type="text/javascript" src='http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js'></script>
<script>
$('control-group input').datepicker({size:"small"});
</script>