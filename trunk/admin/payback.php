
<b>返佣支付</b>
<?php
			require('config.php');
if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];

if ($option=="paid")
{


$username=$_POST["username"];
$paynumber=$_POST["backpaynumber"];


$tablae = mysql_query("SELECT * FROM tb_back_account where username='$username'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

$nowpaysum = 0;
$backpaynumber = $paynumber+1;
$allbacksum = $registroe["all_back_sum"]+$registroe["now_back_sum"];
$nowbacksum = $registroe["now_back_sum"];

$lafecha=date("Y-n-d H:i");

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_back_account SET now_back_sum='0', back_pay_number='$backpaynumber',all_back_sum='$allbacksum',back_pay_time='$lafecha' where username='$username'";
    mysql_query($query) or die(mysql_error());


echo "<font color=\"green\"><b>成功支付</b></font><br><br>";
$sql = mysql_query("SELECT max(pay_number) FROM tb_backpay_history where username='$username'");
$row = mysql_fetch_array($sql);

if($row[0]==null)
{
	$zhifunumber = 1;
}else
{
	$zhifunumber = $row[0]+1;
}
$query = "INSERT INTO tb_backpay_history (username, pay_number,pay_sum,pay_time) VALUES('$username', '$zhifunumber', '$nowbacksum','$lafecha')";
mysql_query($query) or die(mysql_error());

echo "<font color=\"green\"><b>成功为用户'$username'添加一条支付记录</b></font><br><br>";
}

}

}

?>
<?php

$sql1 = mysql_query("SELECT * FROM tb_common where itemid='leastpay'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
$row1 = mysql_fetch_array($sql1);
?>

<br>
当前支付最低额为<?php echo $row1["value"]?>元，需要更改请重新设定：<br>
<form method="post" action="index.php?op=601&category=leastpay">
<input type="text" name="leastpay">
<input type="submit" value="设定" class="button">
</form>
<br>
<br>
<table>
<tr>
<th>序号</th>
<th>用户名</th>
<th>支付宝</th>
<th>本次返佣额</th>
<th>总返佣额</th>
<th>支付次数</th>
<th></th>
</tr>

<?php

$tabla = mysql_query("SELECT * FROM tb_back_account where now_back_sum>0.1 ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["zhifubao"] ."</td>
<td>". $registro["now_back_sum"] ."</td>
<td>". $registro["all_back_sum"] ."</td>
<td>". $registro["back_pay_number"] ."</td>";
?>

<td>
<form method="post" action="index.php?op=60&id=<?php echo $registro["id"] ?>&option=paid">
<input type="hidden" name="allbacksum" value="<?php echo $registro["all_back_sum"] ?>">
<input type="hidden" name="backpaynumber" value="<?php echo $registro["back_pay_number"] ?>">
<input type="hidden" name="username" value="<?php echo $registro["username"] ?>">
<input type="submit" value="支付" class="button">
</form>
</td>
</tr>

<?php



} // fin del bucle de ordenes



?>
</table>