<?php 
if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    include("accessdeny.php");
    exit();
} 
	include_once('header.php');
 ?>
<div style="margin:15px auto 0 auto;width:600px;">
<div class="title600px-top"></div>
<div class="title600px">
<div class="title600px-in">
<h2 align="center"><a href="advertise.php">注册广告 - 注册赚钱</a></h2>
</div>
</div>
<div class="title600px-bottom"></div>
</div>
<div style="width:66%;margin:15px auto 0 auto;">
<?php
if (isset($_GET["id"]))
{
$id=$_GET["id"];
$regname = $_POST["regname"];
$user=uc($_COOKIE["usNick"]);
if ($regname==""){echo "请填写您注册的用户名或者ID"; exit();}
require('config.php');
$tabla = mysql_query("SELECT * FROM tb_signupads WHERE id='$id'"); 
$registro = mysql_fetch_array($tabla);

$adid=$id;
$owner=$registro["owner"];
$adname=$registro["adname"];
$adnum=$registro["adnum"];
$value=$registro["value"];
$status="pending";

$checkuser = mysql_query("SELECT username FROM tb_signupusers WHERE username='$user' and adid='$adid'");
$username_exist = mysql_num_rows($checkuser);
if ($username_exist>0) 
{
echo "<font style='font-size:1.2em;'>你已经注册了这个任务，请不要重复提交.</font><br/><span class=\"top\"><a href=\"regads.php\" style=\"font-size: 24px\">继续做注册任务</a></span>";
}
else
{
$adnum=$adnum-1;
$query1 = "UPDATE tb_signupads SET adnum='$adnum' WHERE id='$adid'";
$resultex = mysql_query($query1);
$lafecha=date("Y-n-d H:i");
$paiddate="N";
$query = "INSERT INTO tb_signupusers (username, adid, owner, adname, value, status, regname, reqdate, paiddate) VALUES( '$user', '$adid', '$owner', '$adname', '$value', '$status', '$regname', '$lafecha', '$paiddate')";
mysql_query($query) or die(mysql_error());

echo " <font style='font-size:1.2em;'>您提交了这个任务.<br/>
我们会尽快验证您的广告完成情况.<br/>
广告主7天未验证，我们将直接给您支付.<br/>
如果您的任务长时间（7天以上）没有被验证，您可以直接联系管理员.<br/>感谢您对本站的支持.</font>
<br/>
<span class=\"top\"><a href=\"regads.php\" style=\"font-size: 24px\">继续做注册任务</a></span>
";

}
}

?>
</div>

<!--footer starts here-->
<?php include('footer.php'); ?>