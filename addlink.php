<?php
 if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    include("accessdeny.php");
    exit();
}
if(isset($_POST["urlpath"]))
{
	
}
include("header.php");
?>
<!-- Page -->
<div style="padding-top:20px">
<!-- leftmenu -->
<div class="mem_left" style="margin-top:0px">
<?php require_once("memberleft.php");?>
</div>
<!-- /leftmenu -->
<!-- content -->
<script type="text/javascript"> 
var intervalId = null;
var state="closed"; 
function opencommend(){
 if(intervalId != null) 
 window.clearInterval(intervalId); 
 function change(){
 var obj = document.getElementById("commend"); 
 var h = parseInt(obj.offsetHeight);
 if(state == "closed")
 {
 if(h<100)
 {
 obj.style.height = (h + 5)+'px';
 }
 else
 {
 	state="opened";
 	window.clearInterval(intervalId);
 }
 }
 else if(state == "opened")
 {
 if(h>0)
 {
 obj.style.height = (h -5)+'px';
 }
 else
 {
 	state="closed";
 	window.clearInterval(intervalId);
 }
 }
 } 
 intervalId = window.setInterval(change,10); 
}

</script>
<div style="float:right;width:685px;">

<form action="addlink.php" method="post" enctype="text/plain"> 
<div class="tipblock" style="float:left;width:670px">
        <h3>添加网络书签<input type="image" src="./images/hsubmit-button.gif" style="padding-left:500px;margin-top:2px;"/></h3>
<div>
<table style="margin:0;">
<tr>
<td width="80"><p><lable>网址：</lable></p></td>
<td width="150"><input type='text' name='urlpath' autocomplete="on" id="urlpath" size="50" onfocus="glimmer('spancommend')"/><span style="color:red;">*</span></td>
<td rowspan="2" align="center" width="250"><span id="spancommend">推荐诚信网站，有机会获得现金奖励，同时推广下线，快点击</span><a href="javascript:opencommend()">推荐给我们</a><td>
</tr>
<tr>
<td><p><lable>网站名称：</lable></p></td>
<td><input type='text' name='urlname' autocomplete="on" id="urlname" size="10" /><span style="color:red;">*</span></td>
</tr>
<tr>
</table>
<P style="font-size:0.75em;color:#66664D;">——你也可以<a href="javascript:opencommend()">推荐给我们</a>，与大家一起分享</P>
<div id="commend" style="height:0;overflow:hidden;border:0;">
<table style="margin:0;">
<tr>
<td width="80"><p><lable>网站种类：</lable></p></td>
<td><select>
  <option name="urltype" value="-1">--网站种类--</option>
  <option name="urltype" value="bux">点击类</option>
  <option name="urltype" value="invest">调查类</option>
  <option name="urltype" value="register">注册类</option>
  <option name="urltype" value="mail">邮件类</option>
  <option name="urltype" value="surf">冲浪类</option>
  <option name="urltype" value="software">挂机类</option>
  <option name="urltype" value="complex">综合类</option>
  <option name="urltype" value="other">其他类</option>
</select></td>
</tr>
<tr>
<td><p><lable>描述：</lable></p></td>
<td><textarea rows="3" cols="40" name="urldescrip" onclick="cleardescrip()" style="font-size:1em">(详细的描述有助于你的链接推广,250字以内)</textarea></td>
</tr>
<tr>
</table>


</div>
</div>
</div>
 </form>
</div>
<script type="text/javascript">
var clicked=false;
function cleardescrip()
{
	if(!clicked)
	{
	var obj = document.getElementsByName("urldescrip")[0];
	obj.value="";
	clicked=true;
	}
}
document.body.onload=glimmer('spancommend');
</script>
<!-- /content -->
</div>
<!-- /Page -->
<?php 
include_once("footer.php");
?>