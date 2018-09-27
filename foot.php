</div>
</body>
</html>
<script type="text/javascript" src='http://g.alicdn.com/sj/lib/jquery.min.js'></script>
<script type="text/javascript" src='http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js'></script>
<script type="text/javascript">
//使用JQuery实现tap切换效果
$(function(){
	$(".level1 > a").on("click",function(){
		$(this).addClass("current")//给当前元素添加"current"样式
		.next().show("false")//下一个元素显示
		.parent().siblings().children("a")//父元素的同辈元素的子元素<a>
		.removeClass("current")//移除上面找到的所有<a>的current样式
		.next().hide("false");//上面所有超链接的下一个元素隐藏
		//获取当前li标签在兄弟中的序号
		document.cookie = "menuNum=" + $(this).parent().index()+";";
		
		return false;
	});
});
console.log(document.cookie);
var menuNum = document.cookie.substr(-1,1);
//找到对应序号的li，在查找li中的ul标签，让其显示。
$(".box .menu>li").eq(menuNum).find("ul").show();
//找到对应序号的li，在查找li中的第一个a，增加一个样式current
$(".box .menu>li").eq(menuNum).find("a").eq(0).addClass("current");
</script>

<script>
$('control-group input').datepicker({size:"small"});
</script>