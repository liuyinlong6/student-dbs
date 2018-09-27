<?php session_start();
include("top.php");
include("conns.php");
$sql = "SELECT DISTINCT 班号 FROM student";
$result = mysqli_query($conn, $sql);
 ?>
 <style>
.tu img{
  width: 200px;
  height: 100px; 
}
 </style>
 <p id="haap">欢迎<span><?php echo $_SESSION['usname']; ?></span>来到管理页面</p>
	<div class="box">
		<?php include("leftmenu.php"); ?>
		<div class="right">
			<div class="content">
				<p class="sui-text-xxlarge">登录欢迎页</p>
				<form id="from3" action="xues-save.php" method="post" class="sui-form form-horizontal sui-validate">
  					<div id="new-con">
        
      </div>
				</form>
 			</div>
		</div>
	</div>
	<?php include("foot.php"); ?>
<script type="text/javascript">
$(function(){
  $.ajax({
    url:"api2.php",
    type:"POST",
    dataType:"json",
    data:{
      "action":"news"
    },
    beforeSend:function(XMLHttpRequest){
      // $("#studentlist").html("<tr><td>正在查询, 请稍后</td></tr>");       
    },
    success:function(data,textStatus){
      if (data.code==200) {

        var str = "";
        for (var i = 0; i < data.data.length; i++) {
          // console.log(data.data);
          // console.log(data.data[i].Id);  
          str+="<div class='news'><div class='tu'><a href='beiwang.php?kid="+data.data[i].id+"'><img src='"+data.data[i].图片+"'></a></div><h4>"+data.data[i].标题+"</h4><h5><a href='beiwang.php?kid="+data.data[i].id+"'>"+data.data[i].肩题+"</a></h5><p>"+data.data[i].内容+"</p></div>"; 
          
        }
        $("#new-con").html(str);
      }
    },
    error:function(XMLHttpRequest,textStatus,errorThrown){
      // 请求失败后调用此函数
      console.log("失败原因:"+errorThrown);
    }
  });
});
</script>