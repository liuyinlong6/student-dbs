<!-- 头部 -->
<?php include("top.php"); ?>
 	<div class="box">
	<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
		<div class="right">
			<div class="content">
				<p class="sui-text-xxlarge">班级修改</p>
				<table class="sui-table table-primary">
					<tr>
						<th>id</th>
						<th>学号</th>
						<th>班号</th>
						<th>班长</th>
						<th>教室</th>
						<th>班主任</th>
						<th>班级口号</th>
						<th>操作</th>
					</tr>
					<tbody id="studentlist">

					</tbody>
 		</table>
 			</div>
		</div>
	</div>
	<!-- foot链接 -->
	<?php include("foot.php"); ?>
<script type="text/javascript">
$(function(){
	$.ajax({
		url:" api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"student"
		},
		beforeSend:function(XMLHttpRequest){
			$("#studentlist").html("<tr><td>正在查询，请稍后...</td></tr>");
		},

		success:function(data,textStatus){
			console.log(data.data);
			 if (data.code==200) {
                var str="";
                for (var i = 0; i < data.data.length; i++) {
                 console.log( data.data[i]);
                 str += "<tr><td>"+data.data[i].id+"</td><td>"+data.data[i].学号+"</td><td>"+data.data[i].班号+"</td><td>"+data.data[i].姓名+"</td><td>"+data.data[i].性别+"</td><td>"+data.data[i].出生日期+"</td><td>"+data.data[i].电话+"</td><td><a class='sui-btn btn-small btn-warning' href='banj-update.php?kid={$row['id']}'>修改<a>&nbsp&nbsp&nbsp <a class='sui-btn btn-small btn-danger' href='banj-del.php?kid={$row['id']}'>删除</a></td></tr>"
                }
                $("#studentlist").html(str);
              }

		},
		error:function(XMLHttpRequest,textStatus,errorThrown){
			console.log("失败原因="+errorThrown);
		}
	});
})

</script>