<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/where.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<style>
		.pp{
			position: absolute;
			width: 500px;
			height: 100px;
			top: 50%;
			margin-top: -50;
			left: 50%;
			margin-left: -250px;
			background-color: #f34f4fd6;
			margin: 10px auto;
			font-size: 30px;
			text-align: center;
			line-height: 100px;
			display: none;	
		}
	</style>
</head>
<body>
	<div class="box">
		<div class="top">
			<ul>
				<li style="list-style-type:none;"><h3>忘记密码</h3></li>
			</ul>
		</div>
		<div class="foot">
			<form  id="form1" action="forget-sava-ajax.php" method="post" class="sui-form form-horizontal sui-validate">
				<div class="control-group one1">
    				<label for="inputEmail" class="control-label">用户邮件：</label>
    				<div class="controls">
      				<input type="text" id="inputEmail" name="youj" placeholder="邮件" data-rules="required|email">
    				</div>
 				</div>
 				<div class="control-group yz">
				    <label for="yanzhengma" class="control-label">验证码：</label>
				    <div class="controls">
				      <input type="yanzhengma" id="yanzhengma" name="yanzhengma" placeholder="验证码" data-rules="required">
				      <input type="button" id="text" value="<?php include ("wei2.php") ?>">
				    </div>
				  </div>
				<div class="control-group yz">
				    <label for="tishi" class="control-label">密码提示问题</label>
				    <select name="tishi" id="tishi">
				    	<option value="">请选择</option>
				    	<option value="">你小学在哪上的 </option>
				    	<option value="">你最好的朋友是谁</option>
				    	<option value="">你最值得纪念的日期有哪些。</option>
				    <lect>
				  </div>	
				<div class="control-group mim">
				    <label for="daan" class="control-label v-top">答案密码：</label>
				    <div class="controls">
				      <textarea id="daan" name="daan" placeholder="答案密码" data-rules="required"></textarea>
				    </div>
				  </div>
	 <div class="control-group zou">
    <label for="sanwei" class="control-label"></label>
    <div class="controls">
      <button type="submit" id="cha" class="sui-btn btn-primary one2">登录</button>
    </div>
  </div>
  	<p class="pp">登录成功</p>
			</form>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
$("#cha").on('click', function(){
		if ($("#yanzhengma").val()=="") {
			alert("验证码不能为空 ");
			return;
		}else if($("#yanzhengma").val().toLowerCase()!=$("#text").val().toLowerCase()){
			alert("验证码错误");
			return false;
		}else{
			alert("验证码正确");
		}
	});
</script>