<?php session_start();
include("top.php"); 
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
 $sql = " SELECT id,标题,发布时间 FROM news ";
 $result = mysqli_query($conn,$sql);

 //关闭数据库
 mysqli_close($conn);
?>
<p id="haap">欢迎<span><?php echo $_SESSION['usname']; ?></span>来到管理页面</p>
<div class="box">
    <?php include("leftmenu.php"); ?>
    <div class="right">
  <div class="content">
    <p class="sui-text-xxlarge myBlue my-padd">新闻修改</p>
    <table class="sui-table table-primary">
            <tr><th>id</th><th>新闻标题</th><th>时间</th><th>操作</th></tr>
        <?php 
        if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['标题']}</td>
        <td>{$row['发布时间']}</td>
        <td><a class='sui-btn btn-small btn-warning' href='news-mana.php?kid={$row['id']}'>修改<a>&nbsp&nbsp&nbsp <a class='sui-btn btn-small btn-danger' href='news-del.php?kid={$row['id']}'>删除</a></td>
        </tr>";
     }
        }else{
     echo "没有记录";
              }
           ?>
          </table>
  </div>
  </div>
</div>
<?php include("foot.php"); ?>