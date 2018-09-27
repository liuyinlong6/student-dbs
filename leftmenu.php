<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/reset.css"> -->
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<style>
		.box{
			width: 1000px;
			height: 550px;
			border: 1px solid #ccc;
			margin: 0 auto;
			margin-top: 30px;
		}
		.left{
			width: 240px;
			height: 550px;
			float: left;
			border-right: 1px solid #ccc;
		}
		.right{
			width: 759px;
			height: 550px;
			float: right;
			text-align: center;
			line-height: 550px;
			cursor: pointer;
		}
		.menu li{
			width: 180px;
		}
		.menu{
			border: 1px solid #ccc;
			margin-top: 30px;
		}
	</style>
</head>
<body>
	<!-- 左菜单 -->
	
		<div class="left">
			<div class="top">
				<ul class="menu">
				<li class="level1">
						<a href="#none">登录欢迎页</a>
						<ul class="level2">
							<li><a href="welcone.php">连接页</a></li>
						</ul>
					</li>
					<li class="level1">
						<a href="#none">录入信息</a>
						<ul class="level2">
							<li><a href="kec.php">课程录入</a></li>
							<li><a href="banj.php">班级录入</a></li>
							<li><a href="xues.php">学生录入</a></li>
							<li><a href="chengj.php">成绩录入</a></li>
						</ul>
					</li>
					<li class="level1">
						<a href="#none">修改信息</a>
						<ul class="level2">
							<li><a href="kec-list.php">课程修改</a></li>
							<li><a href="banj-list-ajax.php">班级修改</a></li>
							<li><a href="xues-list.php">学生修改</a></li>
							<li><a href="chengj-list.php">成绩修改</a></li>
						</ul>
					</li>
					<li class="level1">
						<a href="#none">信息查询</a>
						<ul class="level2">
							<li><a href="student-query.php">学生信息查询</a></li>
							<li><a href="ach-query.php">成绩查询</a></li>
						</ul>
					</li>
					<li class="level1">
						<a href="#none">新闻管理</a>
						<ul class="level2">
							<li><a href="news-release.php">新闻发布</a></li>
							<li><a href="news-update2.php">新闻管理</a></li>
						</ul>
					</li>
					<li class="level1">
						<a href="#none">会员管理</a>
						<ul class="level2">
							<li><a href="member-mana.php">会员管理</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
</script>
</body>
</html>
