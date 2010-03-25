<b>查看改用户登记的站点</b>

<?php include('config.php');
if(isset($_POST["id"]))
{
	
$id=$_POST["id"];
$username=$_POST["username"];
$zhifubao=$_POST["zhifubao"];
$nowbacksum=$_POST["nowbacksum"];
$allbacksum = $_POST["allbacksum"];
$backpaynumber = $_POST["backpaynumber"];
$backpaytime = $_POST["backpaytime"];

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_back_account SET username='$username', zhifubao='$zhifubao', now_back_sum='$nowbacksum', all_back_sum='$allbacksum', back_pay_number='$backpaynumber',back_pay_time='$backpaytime' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>编辑成功.</b></font><br><br>";
}

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];


if ($option=="edit"){

$tablae = mysql_query("SELECT * FROM tb_back_account where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
?>

<form method="post" action="index.php?op=62">

编号: <input type="hidden" name="id" value="<?php echo $registroe["id"] ?>"><?php echo $registroe["id"] ?><br>
<br>
本站用户名: 
<input type="text" name="username" value="<?php echo $registroe["username"] ?>">
<br>
支付宝账户:
<input type="text" name="zhifubao" value="<?php echo $registroe["zhifubao"] ?>"><br>
本期返佣额:
<input type="text" name="nowbacksum" value="<?php echo $registroe["now_back_sum"] ?>"><br>
总返佣额:
<input type="text" name="allbacksum" value="<?php $registroe["all_back_sum"] ?>"><br>
返佣次数:
<input type="text" name="backpaynumber" value="<?php $registroe["back_pay_number"] ?>"><br>
最近返佣时间:
<input type="text" name="backpaytime" value="<?php $registroe["back_pay_time"] ?>"><br>

<input type="submit" value="保存" class="button">

</form>
<br><br>


<?php
}
}
if ($option=="delete"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_back_account WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>记录被删除.</b></font><br><br>";
}
}
?>

<table cellspacing="0" cellpadding="0">
<tr>
<th>编号</th>
<th>会员名</th>
<th>支付宝账户</th>
<th>本期返佣额</th>
<th>总返佣额</th>
<th>返佣次数</th>
<th>最近返佣时间</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_back_account"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["zhifubao"] ."</td>
<td>". $registro["now_back_sum"] ."</td>
<td>". $registro["all_back_sum"] ."</td>
<td>". $registro["back_pay_number"] ."</td>
<td>". $registro["back_pay_time"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=62&id=<?php echo $registro["id"] ?>&option=edit">
<input type="submit" value="编辑" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=62&id=<?php echo $registro["id"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
</tr>

<?php
} // fin del bucle de ordenes
?>
</table>