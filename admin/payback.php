
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
$nowbacksum=$_GET["nowbacksum"];


$tablae = mysql_query("SELECT * FROM tb_back_account where username='$username'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

$nowpaysum = 0;
$backpaynumber = $paynumber+1;
$allbacksum = $registroe["all_back_sum"]+$registroe["now_back_sum"];

$lafecha=date("Y-n-d H:i");

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_back_account SET now_back_sum='0', back_pay_number='$backpaynumber',all_back_sum='$allbacksum',back_pay_time='$lafecha' where username='$username'";
    mysql_query($query) or die(mysql_error());


echo "<font color=\"green\"><b>成功支付</b></font><br><br>";

//增加支付记录
$sql = mysql_query("select * from tb_backpay_history where username='$username'");
$rownumber = mysql_num_rows($sql);
$sql1 = mysql_query("select max(pay_number) from tb_backpay_history where username='$username'");
$row = mysql_fetch_array($sql1);
if($rownumber==0)
{
	$back_number = 1;
}else
{
	$back_number = $row[0]+1;
}

	$query1 = "INSERT INTO tb_backpay_history (username, pay_number, pay_sum," .
		"pay_time) VALUES(" .
		"'$username', '$back_number', '$nowbacksum', '$lafecha')";
	 mysql_query($query1) or die(mysql_error());
echo "<font color=\"green\"><b>成功添加一条新支付记录</b></font><br><br>";
}

}
if($option=="leastpay"){
	$leastpay = $_POST["leastpay"];
	if($leastpay==0)
	{
		echo "<font color=\"green\"><b>输入有误！请确保输入的数值大于零</b></font><br><br>";
	}else 
	{
    $query = "UPDATE tb_common SET value='$leastpay' where itemid='leastpay'";
    mysql_query($query) or die(mysql_error());
	echo "<font color=\"green\"><b>修改最低支付成功</b></font><br><br>";}
}

}

?>
<table style="width:500px;">
<tr>
<th>提示</th>
<th>用户名</th>
</tr>
<tr><td>
当前最低支付额为<font color="red">￥<?php 
$sql = mysql_query("select * from tb_common where itemid='leastpay'");
$row = mysql_fetch_array($sql);
echo $row["value"];
?></font>，如需修改请输入更改
</td>
<td>
<form method="post" action="index.php?op=60&id=<?php echo "edit" ?>&option=leastpay">
<input type="text" name="leastpay" >
<input type="submit" value="修改" class="button">
</form>
</td>
</tr>
点击支付按钮支付.
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

$sql = mysql_query("select * from tb_common where itemid='leastpay'");
$row = mysql_fetch_array($sql);
$nowsum = $row["value"];
$tabla = mysql_query("SELECT * FROM tb_back_account where now_back_sum>'$nowsum' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

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
<form method="post" action="index.php?op=60&id=<?php echo $registro["id"] ?>&nowbacksum=<?php echo $registro["now_back_sum"] ?>&option=paid">
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