
<b>支付申请</b>
<?php
			require('config.php');
if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];

if ($option=="paid")
{


$username=$_POST["username"];


$tablae = mysql_query("SELECT * FROM tb_users where username='$username'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

$lolze=$registroe["money"];
$lolza=$_POST["money"];

$moneye= $lolze - $lolza;

$lolzea=$registroe["paid"];
$moneyere= $lolzea + $lolza;

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_users SET money='$moneye', paid='$moneyere' where username='$username'";
    mysql_query($query) or die(mysql_error());

$lafecha=date("Y-n-d H:i");

    //Todo parece correcto procedemos con la inserccion
    $query = "INSERT INTO tb_history (user, date, amount, method, status) VALUES('$username','$lafecha','$lolza','支付宝','Payment Sent')";
    mysql_query($query) or die(mysql_error());

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_payme WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());


echo "<font color=\"green\"><b>用户信息被更新.</b></font><br><br>";

}

}

}

?>

当你给会员支付后就点击支付按钮.
<br>
<br>
<table>
<tr>
<th>序号</th>
<th>用户名</th>
<th>电子邮件</th>
<th>支付宝</th>
<th>付款数额</th>
<th>IP</th>
<th></th>
</tr>

<?php

$tabla = mysql_query("SELECT * FROM tb_payme ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["email"] ."</td>
<td>". $registro["pemail"] ."</td>
<td>". $registro["money"] ."</td>
<td>". $registro["ip"] ."</td>";

?>

<td>
<form method="post" action="index.php?op=4&id=<?php echo $registro["id"] ?>&option=paid">
<input type="hidden" name="money" value="<?php echo $registro["money"] ?>">
<input type="hidden" name="username" value="<?php echo $registro["username"] ?>">
<input type="submit" value="支付" class="button">
</form>
</td>
</tr>

<?php



} // fin del bucle de ordenes



?>
</table>