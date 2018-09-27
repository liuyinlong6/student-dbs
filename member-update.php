<?php session_start();
include("top.php");
$kid=empty($_GET['kid'])?"null":$_GET['kid']; 
$conn = mysqli_connect("localhost","root","");
if ($conn) {
	echo "连接成功!";
}else{
	die ("连接失败".mysqli_connect_error());
 }
 //连接要操作的数据库
 mysqli_select_db($conn,"student-dbs");
 //设置读取数据库的编码，不然显示汉字为乱码
 mysqli_query($conn,"set names utf8");
 //执行SQL语句
 $sql = " SELECT * FROM user where id='{$kid}'";
 $result = mysqli_query($conn,$sql);
//输出数据
if (mysqli_num_rows($result) > 0) {
  //将查询的结果转换成关联数组
   $row = mysqli_fetch_assoc($result);
}else{
  echo "没有记录";
}
 $result = mysqli_query($conn,$sql);

 //关闭数据库
 mysqli_close($conn);
?>
<link rel="stylesheet" type="text/css" href="css/sex.css">
<p id="haap">欢迎<span><?php echo $_SESSION['usname']; ?></span>来到管理页面</p>
<div class="box">
		<?php include("leftmenu.php"); ?>
		<div class="right">
	<div class="content">
		<p class="sui-text-xxlarge ">会员修改</p>
  				<form onsubmit="return check()" action="member-update-h.php" method="post" class="sui-form form-horizontal sui-validate">
         <div class="control-group one1">
            <label for="inputEmail" class="control-label">用户邮件：</label>
            <div class="controls">
            <input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
              <input type="text" id="inputEmail" placeholder="邮件" data-rules="required|email" name="email" value="<?php echo $row['email']; ?>">
            </div>
        </div>
        <div class="control-group one1">
    <label for="name" class="control-label">用户名：</label>
    <div class="controls">
      <input type="text" id="name" placeholder="请输入用户名" data-rules="required" name="username" value="<?php echo $row['name']; ?>">
    </div>
  </div>
        <div class="control-group one1">
    <label for="inputPassword" class="control-label">修改密码：</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="password" placeholder="密码" data-rules="required" title="密码" value="<?php echo $row['password']; ?>">
    </div>
  </div>
  <div class="control-group one1">
    <label for="inputRepassword" class="control-label">重复密码：</label>
    <div class="controls">
      <input type="password" id="inputRepassword" name="repassword" placeholder="重复密码" data-rules="required|match=password" value="<?php echo $row['password']; ?>">
    </div>
  </div>

  <div class="went">
    密码提示问题：<select name="question" id="went">
    <option value="<?php echo $row['question'] ?>"><?php echo $row['question'] ?></option>
      <option value="你的小学在哪里上的">你的小学在哪里上的</option>
      <option value="你的最好朋友姓名">你的最好朋友姓名</option>
      <option value="你的最有纪念意义的日期">你的最有纪念意义的日期</option>
    </select>
  </div>
  <div class="daan">
    密码答案：<input type="text" name="daa" value="<?php echo $row['answer']; ?>">
  </div>
  <!-- <div class="control-group"> -->
    <label class="control-label"></label>
     <div class="control-group">
    <label for="sanwei" class="control-label"></label>
    <div class="controls">
      <button type="submit" id="cha" class="sui-btn btn-primary one2">提交修改</button>
    </div>
  </div>
      </form>
	</div>
	</div>
</div>
<?php include("foot.php"); ?>