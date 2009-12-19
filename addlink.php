<?php
 if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    include("accessdeny.php");
    exit();
}
if(isset($_POST["urlpath"]))
{
 $url=$_POST["urlpath"];
 $name=$_POST["urlname"];
 $type=$_POST["urltype"];
 $description=$_POST["urldescrip"];
 $username=$_COOKIE["usNick"];
 $joindate=date("y-m-d H:i");
 $status=1;
 if($type!="0"&&$description!="(详细的描述有助于你的链接推广,250字以内)"&&$description!="")
 {
 	$status=2;
 }
 if($description=="(详细的描述有助于你的链接推广,250字以内)")
 {
 	$description="";
 }
 require_once("config.php");
 $query = "INSERT INTO tb_commendurl (url, name, type, description, username, status, date) VALUES('$url','$name','$type','$description','$username','$status','$joindate')";
 mysql_query($query) or die(mysql_error());
?>
<script type="text/javascript">
window.location.href='addlink.php';
</script>
<?php 
}
if(isset($_POST["delete"]))
{
	$id_delet=implode(",",$_POST['checkbox']);
	 require_once("config.php");
    $query = "delete from tb_commendurl where id in ($id_delet)";
     mysql_query($query) or die(mysql_error());
?>
<script type="text/javascript">
window.location.href='addlink.php';
</script>
<?php 
}
else
{
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

<form action="addlink.php" method="POST" onsubmit="return submiturl();"> 
<div class="tipblock" style="float:left;width:670px">
        <h3>添加网络书签<span id="addtip" style="color:red;display: inline-block;width:200px;font-weight:normal;" ></span><input type="image" src="./images/hsubmit-button.gif" style="margin-left:300px;margin-top:2px;"/></h3>
<div>
<table style="margin:0;">
<tr>
<td width="80"><p><lable>网址：</lable></p></td>
<td width="250"><input type='text' name='urlpath' autocomplete="on" size="30" value="http://"/><span style="color:red;">*</span></td>
<td rowspan="2" align="center"><span id="spancommend">推荐诚信网站，有机会获得现金奖励，同时推广下线，快点击</span><a href="javascript:opencommend()">推荐给我们</a><td>
</tr>
<tr>
<td><p><lable id="idname">网站名称：</lable></p></td>
<td><input type='text' name='urlname' autocomplete="on" id="urlname" size="10" /><span style="color:red;">*</span></td>
</tr>
<tr>
</table>
<P style="font-size:0.75em;color:#66664D;">——你也可以<a href="javascript:opencommend()">推荐给我们</a>，与大家一起分享</P>
<div id="commend" style="height:0;overflow:hidden;border:0;">
<table style="margin:0;">
<tr>
<td width="80"><p><lable>网站种类：</lable></p></td>
<td><select name="urltype">
  <option  value="0">--网站种类--</option>
  <option  value="点击类">点击类</option>
  <option  value="调查类">调查类</option>
  <option  value="注册类">注册类</option>
  <option  value="邮件类">邮件类</option>
  <option  value="冲浪类">冲浪类</option>
  <option  value="挂机类">挂机类</option>
  <option  value="综合类">综合类</option>
  <option  value="其他类">其他类</option>
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
<div class="tipblock" style="float:left;width:670px;padding-top:20px;">
<h3>请选择适量的网址打开，贪多小心死机哦</h3>
<div>
<?php
include("config.php");
$username=$_COOKIE["usNick"];
$pagesize=30;
//取得记录总数$rs，计算总页数用
$rs=mysql_query("select count(*) from tb_commendurl where username='$username'");
$myrow = mysql_fetch_array($rs);
$numrows=$myrow[0];
//计算总页数

$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
$pages++;
//设置页数
//设置为第一页
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
//设置为第一页
$page=1;
}

//计算记录偏移量
$offset=$pagesize*($page - 1);
//读取指定记录数
$rs=mysql_query("select id,url,name from tb_commendurl WHERE username = '$username' order by date DESC limit $offset,$pagesize");
if ($myrow = mysql_fetch_array($rs))
{
$i=0;
?>
<form action="addlink.php" method="POST" id="urlform">
<input type="hidden" name="delete" value="delet"/>
　　<table class="linktable">
　　<tr>
　　　<td width="80" style="text-align:center">
　　　　<p>选择</p>
     </td>
　　　<td width="150">
　　　　<p>网站名</p>
     </td>
     <td width="430">
　　　　<p>网址</p>
     </td>
　　</tr>
<?php
do {
$i++;
?>
<tr>
<td style="text-align:center"><input type="checkbox" name="checkbox[]" value="<?php echo $myrow["id"]?>"/></td>
<td><?php echo $myrow["name"]?></td>
<td><a href="<?php echo $myrow["url"]?>"  target="_blank">><?php echo $myrow["url"]?></a></td>
</tr>
<?php
}
while ($myrow = mysql_fetch_array($rs));
echo "</table>";
}
echo "<div style='border:0;margin-left:20px'><input type='button' value='打开' onclick='openurl()'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</input><input type='submit' value='删除'></input></div>";
echo "<div align='center' style='border:0;'>共有".$pages."页(".$page."/".$pages.")";
for($i=1;$i<=$pages;$i++)
echo "<a href='addlink.php?page=".$i."'>[".$i ."]</a> ";
echo "</div></form>";
?>
</div>
</div>
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
function openurl()
{
	var checkboxs = document.getElementsByName("checkbox[]"); 
    for(var i=0;i<checkboxs.length;i++)
    {
        if(checkboxs[i].checked==true)
        {
            var url=checkboxs[i].parentNode.parentNode.getElementsByTagName("a")[0];
            window.open (url);
        }
    }
}
</script>
<!-- /content -->
</div>
<!-- /Page -->
<?php 
include_once("footer.php");
}
?>