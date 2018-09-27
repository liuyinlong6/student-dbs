<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/two.css">
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
		#foot{
			margin-top: 30px;
			margin-left: 265px;
		}
	</style>
</head>
<body>
	<div class="box">
		<div class="top">
			<ul>
				<li style="list-style-type:none;" ><a href="index.php">注册</a></li>
				<li style="list-style-type:none;" id="dengl"><a href="denglu.php">登录</a></li>
			</ul>
		</div>
		<div class="foot">
			<form  id="form1" action="login-sava-ajax.php" method="post" class="sui-form form-horizontal sui-validate">
				<div class="control-group one1">
    				<label for="inputEmail" class="control-label">用户邮件：</label>
    				<div class="controls">
      				<input type="text" id="inputEmail" name="youj" placeholder="邮件" data-rules="required|email">
    				</div><p id="tipss"></p>
 				</div>
 				<div class="control-group one1">
    		<label for="inputPassword" class="control-label">密码：</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="password" placeholder="密码" data-rules="required" title="密码"><p id="tips"></p>
    </div>
  </div>
  <div class="yanz">
		验证码：<input id="box" type="text" name="yanz">
	<input type="button" id="code_btn">
	</div>
	 <div class="control-group">
    <label for="sanwei" class="control-label"></label>
    <div class="controls">
      <button type="submit" id="cha" class="sui-btn btn-primary one2">登录</button>
    </div>
  </div>
  <div id="foot"><a href="forget-password.php">忘记密码</a></div>
  	<p class="pp">登录成功</p>
			</form>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src='http://g.alicdn.com/sj/lib/jquery.min.js'></script>
<script type="text/javascript" src='http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js'></script>
<script type="text/javascript">
//给提交按钮绑定事件
$("button[type=submit]").on('click',function(){
	//使用$.ajax()提交数据
	$.ajax({
		url 	:"login-sava-ajax.php",
		type 	:"POST",
		data 	:$("#form1").serialize(),
		dataType:"json",
		beforeSend:function(XMLHttpRequest){
			//发送前调用此函数。一般再次编写检测代码或者loading
		},
		// complete:function(XMLHttpRequest,textStatus){
		// 	//请求完成后调用此函数(请求成功或失败都调用)
		// },
		success:function(data,textStatus){
			//成功以后调用此函数
			console.log( data );
			if(data.code == "200"){
				$(".pp").slideDown(2000,function(){
					window.location.href = "welcon.php";
				});
				// $(".pp").animate({"height":"100px","display":"block"},function(){
				// 	window.location.href = "banj.php";
				// });
			}
			if (data.code == 20001) {
				//提示密码错误
				$("#tips").html("密码错误");
			}
			if (data.code == 20004) {
				//提示邮件填写错误
				$("#tipss").html("邮件错误");
			}
		},
		// error:function(XMLHttpRequest,textStatus,errorThrown){
		// 	//请求失败
		// 	console.log("失败原因:"+errorThrown);
		// 	return false;
		// }
	});
	
});




var code_btn=document.getElementById('code_btn');
	getCodeFn();
	code_btn.onclick=getCodeFn;
function getCodeFn(){
	var strArry=["0","1","2","3","4","5","6","7","8","9","a","b",'c','d','e','f','h','i','g','k','l','m','m','o','p','q','r','s','t','u','v','w','x','y','z',"A","B",'C','D','E','F','G','I','G','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	var code_str="",num;
	for (var i = 0; i <4; i++) {
		num=parseInt(Math.random()*strArry.length);
		code_str+=strArry[num];
		
	}
	code_btn.value=code_str;

}	
	var cha=document.getElementById('cha');
	var box=document.getElementById('box');
	cha.onclick=function(){	
	var neirong=box.value.toUpperCase();	
		// var box_in=box.Value;
		if(neirong==code_btn.value.toUpperCase()){
			alert("验证通过");
			
		}else if(box.value.length==0){
			alert("请输入验证码");
		}else{
			alert("验证有误");
			return false;
		}
		
	}
var str = document.cookie;
var str1 = str.split(";")[0].split("=")[1];
console.log(str1);
</script>