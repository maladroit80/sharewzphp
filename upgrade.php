<? include('header.php'); ?>

<h3>
<img border="0" src="images/orders.gif" align="absmiddle" width="32" height="32"><span style="font-weight: bold">高级会员</span></h3>


<?

if(isset($_POST["user"]))
{




$user=limpiar($_POST["user"]);
$pemail=limpiar($_POST["pemail"]);
$email=limpiar($_POST["email"]);

$laip = getRealIP();


require('config.php');
$sqle = "SELECT * FROM tb_upgrade WHERE username='$user'";
$resulte = mysql_query($sqle);
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
if ($rowe["status"]=="upgraded")
{

echo "Error: Users cant upgrade twice."; include('footer.php');
exit();

}

require('config.php');
$query = "INSERT INTO tb_upgrade (username, pemail, email, ip) VALUES('$user','$pemail','$email','$laip')";
mysql_query($query) or die(mysql_error());


$sqle = "SELECT * FROM tb_config WHERE item='upgrade' and howmany='1'";
$resulte = mysql_query($sqle);
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
?>

你的订购已经提交，在我们允许你的申请之前，你必须通过支付宝付款 <? echo $rowe["price"]; ?> 元. </b></a><br>
<br>
<div align="center">
  <table width="397" border="0" cellpadding="3" cellspacing="1" bordercolor="#009900" bgcolor="#009900">
    <tr>
      <td width="391" bgcolor="#FFFFFF"><div align="center">
          <p>本站支付宝：
              <? include('paypal.php'); ?>
          </p>
      </div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div align="center">
          <p style="color: #FF0000; font-weight: bold"><a href="https://www.alipay.com/" target="_blank"><img src="images/alipay.gif" width="254" height="43" border="1" /></a></p>
          <p style="color: #FF0000; font-weight: bold"><a href="https://www.alipay.com/" target="_blank">支付宝安全支付</a></p>
      </div></td>
    </tr>
  </table>
</div>
<?

}else{
require('config.php');
	$sqle = "SELECT * FROM tb_config WHERE item='upgrade' and howmany='1'";
$resulte = mysql_query($sqle);
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
?>
<div align="center"><div id="form">
  <fieldset>
  <legend></legend>
  <table width="302" border="0" cellpadding="3" cellspacing="1" bordercolor="#009900" bgcolor="#009900">
    <tr>
      <td bgcolor="#FFFFFF"><div align="center" style="font-weight: bold">
高级会员
      </div></td>
    </tr>
    <tr>
      <td width="292" bgcolor="#FFFFFF">
        <div align="left"><b>-100%</b> 一级下线提成</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">
        <div align="left"><b>-5</b> 个免费的下线</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div align="left"><b></b><b>-付款优先</b> - 通常得到支付不会超过2天</div></td>
    </tr>
  </table>
  <p>高级会员<b><?echo $rowe["price"] ?></b>元1年 </p>
<p><img src="images/alipay.gif" width="254" height="43" border="1"></p>
<table width="395" border="0" cellspacing="1" bgcolor="#009900">
  <tr>
    <td width="391" bgcolor="#FFFFFF"><span style="font-weight: bold"><span style="color: #0066FF">注意：</span>如果你不是真的要升级，请不要点下面的按钮，对于提交申请后24小时没有付款者我们将删除帐户！</span></td>
  </tr>
</table>
<?

$elus=$_COOKIE["usNick"];
require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$elus'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);
$dep1=$row["username"];
$dep2=$row["pemail"];
$dep3=$row["email"];
$dep4=$row["lastiplog"];

?>
<form method="post" action="upgrade.php">
<input type="hidden" name="user" value="<?= $dep1 ?>">
<input type="hidden" name="pemail" value="<?= $dep2 ?>">
<input type="hidden" name="email" value="<?= $dep3 ?>">
<input type="hidden" name="ip" value="<?= $dep4 ?>"><br>
<p><input type="submit" value="升级" class="submit" tabindex="4" /></p>

</form>
</fieldset>
</div></div>


<?

}
?>






<? include('footer.php'); ?>