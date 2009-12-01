<?php include('header.php'); ?>




<?php
if (isset($_POST["customer"]))
{

$refset=$_POST["refset"];



require('config.php');
$queryx = mysql_query("SELECT sets FROM tb_buyref WHERE id='1' and refnum='$refset'") or die(mysql_error());
$rowx = mysql_fetch_array($queryx);
mysql_close($con);
if ($rowx["sets"]=="0")
{
echo "<font color=\"red\">对不起,当前没有可以购买的下线包.</font><br><br>";
}else{


// Si todo parece correcto procedemos con la inserccion

$setz=$rowx["sets"] - 1;
require('config.php');
$queryb = "UPDATE tb_buyref SET sets='$setz' WHERE id='1' and refnum='$refset'";
mysql_query($queryb) or die(mysql_error());
mysql_close($con);

$customer=limpiar($_POST["customer"]);
$pemail=limpiar($_POST["pemail"]);
$refset=limpiar($_POST["refset"]);
$precio=$_POST["price"];
$laip = getRealIP();
require('config.php');
//Todo parece correcto procedemos con la inserccion
$queryzz = "INSERT INTO tb_buyref (customer, amount, refset, pemail, ip) VALUES('$customer','1','$refset', '$pemail','$laip')";
mysql_query($queryzz) or die(mysql_error());
mysql_close($con);

?>
<br>
<p align="center">您的定购被提交,在我们确认您的订购前,您必须通过支付宝支付
  <?php
	require('config.php');
$sql = "SELECT * FROM tb_refset WHERE howmany='$refset'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
$precio=$row["price"];
$description=$row["howmany"];
?>

<?php echo $precio ?> 元.<br>
</p>
<p><div align="center">

  <table width="397" border="0" cellpadding="3" cellspacing="1" bordercolor="#009900" bgcolor="#009900">
    <tr>
      <td width="391" bgcolor="#FFFFFF"><div align="center">
          <p>本站支付宝：
              <?php include('paypal.php'); ?>
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
</p>
<br>
<?php

}

}else{
?>

<h3>
<img border="0" src="images/orders.gif" align="absmiddle" width="32" height="32"><span style="font-weight: bold">购买下线</span></h3>


<br>
<p>拉下线是很累的,怎么不让我们来给你拉下线呢?我们有很多会员是没有通过别人的下线连接注册的.</p>
<p>你可以低价购买<?php include('sitename.php'); ?>的下线包,你可以从这些下线中获得很大的收益.
  <?php

require('config.php');
$sqld = "SELECT * FROM tb_buyref WHERE customer='admin'";
$resultd = mysql_query($sqld);        
$rowd = mysql_fetch_array($resultd);
mysql_close($con);
?>
</p>
<div align="center"><div id="form">
<fieldset>
<legend>可能性</legend>

<?php
require('config.php');
$tablaa = mysql_query("SELECT * FROM tb_buyref where id='1' ORDER BY id DESC"); // selecciono todos los registros de la tabla ads categories, ordenado por id
mysql_close($con);
while ($registroa = mysql_fetch_array($tablaa)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "<p>&nbsp;&nbsp;可出售的组(".$registroa["refnum"] ." 个下线 ): <b>".$registroa["sets"] ."</b></p>


";



}
?>
<br>
</fieldset>
</div></div>

<p class="warning" style="font-weight: bold">如果你恶意提交信息但是没有付款,我们将毫不犹豫地删除你的帐户.如果你不是真的要购买下线,请不要点击下面的付款按钮.</p>



<?php

$user=uc($_COOKIE["usNick"]);
require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
?>


<div align="center"><div id="form">
<fieldset>
<legend>&nbsp;购买下线</legend>

<form method="post" action="purchase.php">

<p>»客户名: <b><?php echo $row["username"] ?></b>
  <input type="hidden" value="<?php echo $row["username"] ?>" name="customer"></p>

<p>» 支付宝账户: <b><?php echo $row["pemail"] ?></b>
  <input type="hidden" value="<?php echo $row["pemail"] ?>" name="pemail"></p>
<p>» 购买<b> 1 组 </b> 
  <select name="refset" class="combo">


<?php
require('config.php');
$tablaa = mysql_query("SELECT * FROM tb_refset ORDER BY id ASC"); // selecciono todos los registros de la tabla ads categories, ordenado por id

while ($registroa = mysql_fetch_array($tablaa)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
mysql_close($con);

echo "

<option value=\"".$registroa["howmany"] ."\">". $registroa["howmany"] ." 个下线  - ". $registroa["price"] ." 元</option>

";



}
$refnum=$registroa["howmany"];
?>



</select></p>


<p><input type="submit" value="马上付款" class="submit" tabindex="4" />
</p>
</form>
</fieldset>
</div></div>
<?php
}
?>



<?php include('footer.php'); ?>