<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/one.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
</head>
<body>
	<div class="box">
		<div class="top">
			<ul>
				<li style="list-style-type:none;" id="zhuce"><a href="index.php">注册</a></li>
				<li style="list-style-type:none;"><a href="denglu.php">登录</a></li>
			</ul>
		</div>
		<div class="foot">
			<form onsubmit="return check()" action="luru.php" method="post" class="sui-form form-horizontal sui-validate">
				 <div class="control-group one1">
    				<label for="inputEmail" class="control-label">用户邮件：</label>
    				<div class="controls">
      				<input type="text" id="email" name="youj" placeholder="邮件" data-rules="required|email"><span id="tips"></span>
    				</div>
 				</div>
 				<div class="control-group one1">
    <label for="name" class="control-label">用户名：</label>
    <div class="controls">
      <input type="text" id="name" placeholder="请输入用户名" data-rules="required" name="ming">
    </div>
  </div>
 				<div class="control-group one1">
    <label for="inputPassword" class="control-label">密码：</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="password" placeholder="密码" data-rules="required" title="密码">
    </div>
  </div>
  <div class="control-group one1">
    <label for="inputRepassword" class="control-label">重复密码：</label>
    <div class="controls">
      <input type="password" id="inputRepassword" name="repassword" placeholder="重复密码" data-rules="required|match=password">
    </div>
  </div>
	<div class="yanz">
		验证码：<input id="box" type="text" name="yanz">
	<input type="button" id="code_btn">
	</div>
	<div class="went">
		密码提示问题：<select name="went" id="went">
		<option value="请选择">请选择</option>
			<option value="你的小学在哪里上的">你的小学在哪里上的</option>
			<option value="你的最好朋友姓名">你的最好朋友姓名</option>
			<option value="你的最有纪念意义的日期">你的最有纪念意义的日期</option>
		</select>
	</div>
	<div class="daan">
		密码答案：<input type="text" name="daa">
	</div>
	<!-- <div class="control-group"> -->
    <label class="control-label"></label>
     <div class="control-group">
    <label for="sanwei" class="control-label"></label>
    <div class="controls">
      <button type="submit" id="cha" class="sui-btn btn-primary one2">立即注册</button>
    </div>
  </div>
			</form>
		</div>
	</div>

</body>
</html>
<script type="text/javascript" src='http://g.alicdn.com/sj/lib/jquery.min.js'></script>
<script type="text/javascript" src='http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js'></script>
<script type="text/javascript">
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

</script>
<script>
document.cookie = "unname=liuyinlong;expires=Thu,22 Aug 2018 00:00:00 GMT";
//第二种方法
var days = 30;
var daystime = 30*24*60*60*1000;//转化成毫秒
var exp = new Date();
exp.setTime( exp.getTime() + daystime );//设置为30天后
document.cookie = "unname=liuyinlong;expires="+exp.toGMTString();


var password = "123456";
document.cookie = "password="+password;
</script>
<script type="text/javascript">
var email = document.getElementById('email');
$("input[name=youj]").on("blur",function(){
		//使用$.get()来进行异步请求
	//$.get(url,[date],[callback],[type]);
	//url请求的(提交的地址)
	//date发送到服务器的数据，以键值对的形式附加到url后面。例如logon.php?usname=dengbin&pass=123456
	//callback 数据发送成功后调用函数，服务器会将返回的结果作为形参
	//type 服务器返回内容的格式。包括xml|html|script|sjon|text|_default
	
	$.get("http://localhost/cui/segister-save.php",
		{"usname":$(this).val()},
		function(data){
			console.log( data );
			if( data == "ok"){
		$("#tips").html("可以注册");
	}else{
		$("#tips").html("邮件重复");
	}
		},
		'text'
		)
	//1.为了实现异步请求，先要实例化一个XMLHttpRequest对象
// 	if (window.XMLHttpRequest) {
// 		var xhr = new XMLHttpRequest();
// 	}else{
// 		//兼容IE老版本
// 		var xhr = ActiveObject("Msxml2.XMLHTTP");
// 	}
// 	//2.实现一个回调函数
// 	//onreadystatechange事件：当请求状态就绪
// 	xhr.onreadystatechange = function(){
// 		//readyState 一共有四个返回值：
// 		//1：服务器已连接；2.请求已接收；3.请求处理中；4.请求完成 响应已发送
// 		if(xhr.readyState == 2){
// 			console.log("请求已接收");
// 		}
// 		if (xhr.readyState == 3) {
// 			$("#tips").html("正在处理中，请稍后...")
// 		}
// 		//requestText接受服务器返回的数据
// 		if( xhr.readyState == 4){
// 			if( xhr.status == "200"){
// 				$("#tips").html("准备好了");
// 				console.log(xhr.responseText);
// 				if( xhr.responseText == "ok"){
// 					$("#tips").html("可以注册");
// 				}else{
// 					$("#tips").html("邮件重复");
// 				}
// 			}
// 			if( xhr.status == "404"){
// 				$("#tips").html("网页被汪星人劫持");
// 			}
// 		}
// 	}
// 	//3.使用xhr的open方法，实现异步请求
// 	//参数一：get|post
// 	//参数二：请求的地址url
// 	//参数三：true|false ，true为异步请求
// 	// xhr.open("get","segister-save.php?usname="+encodeURIComponent(email.value),true);

// 	// //4.使用xhr的send方法，将请求发送出去
	// //参数一：发送请求时上报的http头(报文体)，get方法填写null
	// xhr.send(null);

// 	//使用post方法提交
	// xhr.open("post","index-save.php",true);
	// xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	// xhr.send("usname="+encodeURIComponent(email.value));
});

</script>