<?
session_start();
?>
<? include('header.php'); ?>



<h3>转换成广告/现金</h3>

<br>
<div align="left"><a href="convert.php?convert=ads"><b>» 转换成广告</b></a><br>
在<? include('sitename.php'); ?>上打广告
<br><br>
<a href="convert.php?convert=cash"><b>» 通过支付宝得到支付 </b></a><br>
通过支付宝得到支付，您必须至少赚得<?
require('config.php');
$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);
echo $row["price"]; ?>元.</div>
<br><br>
<?

if ($_GET["convert"]=="cash")
{

$user=uc($_COOKIE["usNick"]);

	require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

$root=$row["money"];




$sqle = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
$resulte = mysql_query($sqle);
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
$price=$rowe["price"];

if ($root<$price){

echo "<center><b>对不起，您只有".$row["money"]." 元，必须至少赚".$price." 元才能通过支付宝得到付款.</b></center>";

}else{

echo "<center><b>当你申请付款后，你应当确信您没有违反条例。</b></center>";

$username=$row["username"];

	require('config.php');
$checkuser = mysql_query("SELECT username FROM tb_payme WHERE username='$username'");
$username_exist = mysql_num_rows($checkuser);
mysql_close($con);
if ($username_exist>0) {

echo "<br><center><b>你的申请正在处理. 处理时间: 2-7个工作日.</b></center>";

}else{

$password=$row["password"];
$email=$row["email"];
$pemail=$row["pemail"];
$country=$row["country"];
$money=$row["money"];
$laip=getRealIP();

	require('config.php');
$query = "INSERT INTO `tb_payme` (username, pasword, email, pemail, country, money, ip) VALUES('$username','$password','$email','$pemail','$country','$money','$laip')";
mysql_query($query) or die(mysql_error());
mysql_close($con);
}
}
}



if ($_GET["convert"]=="ads")
{

$user=uc($_COOKIE["usNick"]);

	require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

$root=$row["money"];

$sqle = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$resulte = mysql_query($sqle);
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
$pricee=$rowe["price"];

if ($root<$pricee){
echo "<center><b>对不起，您只有".$row["money"]."元，您必须至少赚".$pricee."元来转换成广告.</b></center>";
}else{

echo "<center><b>当您申请广告兑换后，你必须确信您遵守了本站的条款。</b></center>";

$email=$row["email"];

	require('config.php');
$checkuser = mysql_query("SELECT pemail FROM tb_advertisers WHERE pemail='$email'");
$username_exist = mysql_num_rows($checkuser);
mysql_close($con);
if ($username_exist>0) {

echo "<br><center><b>你的广告申请正在处理. 处理时间: 2-7个工作日.</b></center>";

}else{



if (isset($_POST["url"])) {

require('config.php');


if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){
echo "验证码错误... "; exit();
}



$url=limpiar($_POST["url"]);
$description=limpiar($_POST["description"]);

if ($url==""){echo "Error"; exit();}
if ($description==""){echo "Error"; exit();}

$laip = getRealIP();

$user=$_COOKIE["usNick"];

	require('config.php');
$sqlu = "SELECT * FROM tb_users WHERE username='$user'";
$resultu = mysql_query($sqlu);
$rowu = mysql_fetch_array($resultu);

$money=$rowu["money"];


$query = "INSERT INTO tb_advertisers (pemail, plan, url, description, ip, tipo, money) VALUES('$user','1000','$url','$description','$laip','convert','$money')";
mysql_query($query) or die(mysql_error());
mysql_close($con);
echo "<br><center><b>你的广告申请正在处理. 处理时间: 2-7个工作日.</b></center>";

}else{


?>
<br><br>
请完成下表

<div align="center"><div id="form">
<fieldset><legend>&nbsp;转换成广告&nbsp;</legend>
<form method="post" action="convert.php?convert=ads">


<table width="400" border="0" align="center">



  <tr>
    <td width="150" align="left"><p><label>» 广告文子描述</label></p></td>
    <td width="250" align="left"><input type="text" name="description" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 广告链接</label></p></td>
    <td width="250" align="left"><input type="text" name="url" size="25" maxlength="150" autocomplete="off" class="field" value="http://" tabindex="1" /></td>
  </tr>




  <tr>
    <td width="150" align="left"><p><label>» 广告计划</label></p></td>
    <td width="250" align="left"><?
								require('config.php');
								$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);
								$row = mysql_fetch_array($result);
								mysql_close($con);?>1000 会员浏览<?= $row["price"] ?>元</td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 验证码 </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="转换" class="submit" tabindex="4" />
	</td>
  </tr>
</table>
</form>
</fieldset>
</div></div>



<?

}// final post



}


}
}

?>





		<!--footer starts here-->
<? include('footer.php'); ?>