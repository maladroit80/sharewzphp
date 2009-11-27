<? include('header.php'); ?>

<h3><span style="font-weight: bold">注册广告</span> - <a href="regads.php">注册赚钱</a></h3>
<br>

<br>

<?
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
echo "你已经注册了这个任务，请不要重复提交.";
}
else
{
$adnum=$adnum-1;
$query1 = "UPDATE tb_signupads SET adnum='$adnum' WHERE id='$adid'";
$resultex = mysql_query($query1);

$eltiempo=time();
$lafecha=date("d M Y H:i",$eltiempo);
$paiddate="N";
$query = "INSERT INTO tb_signupusers (username, adid, owner, adname, value, status, regname, reqdate, paiddate) VALUES( '$user', '$adid', '$owner', '$adname', '$value', '$status', '$regname', '$lafecha', '$paiddate')";
mysql_query($query) or die(mysql_error());

echo "你提交了这个任务.<br>
你有7天时间来完成这个广告.<br>
我们会在最近验证你的广告完成情况.<br>
</br>
<span class=\"top\"><a href=\"regads.php\" style=\"font-size: 24px\">继续做注册任务</a></span>
";

}
}

?>


<!--footer starts here-->
<? include('footer.php'); ?>