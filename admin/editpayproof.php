<b>增加修改收款纪录</b>

<?php include('config.php');
if (isset($_POST["id"]))
{

$id=$_POST["id"];
$siteid=$_POST["siteid"];
$sitename=$_POST["sitename"];
$paynumber = $_POST["paynumber"];
$nowpaysum = $_POST["nowpaysum"];
$allpaysum = $_POST["allpaysum"];
$paytime = $_POST["paytime"];

    //Todo parece correcto procedemos con la inserccion
    $query ="INSERT INTO tb_payproof (site_id,site_name,pay_number,now_pay_sum, all_pay_sum, pay_time) VALUES ( '".$siteid." ', '".$sitename." ', '".$paynumber."','" .$nowpaysum. "', '".$allpaysum."','".date("y-m-d H:i")." ');";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>收款记录已增加.</b></font><br><br>";
}

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];


if ($option=="edit"){
$sql=mysql_query("SELECT SUM(now_pay_sum) FROM tb_payproof group by site_id");
$row=mysql_fetch_array($sql);
$tablae = mysql_query("SELECT site_id,site_name,pay_number FROM tb_payproof where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
?>

<form method="post" action="index.php?op=571">

id: <input type="hidden" name="id" value="<?php echo $registroe["id"]+1 ?>"><?php echo $registroe["id"]+1 ?><br>
站点id: 
<input type="text" name="siteid" value="<?php echo $registroe["site_id"] ?>">
<br>
站点名: 
<input type="text" name="sitename" value="<?php echo $registroe["site_name"] ?>">
<br>
收款次数: 
<input type="text" name="paynumber" value="<?php echo $registroe["pay_number"]+1 ?>">
<br>
本次收款额:
<input type="text" name="nowpaysum" ><br>
总收款额（不包含本次）:
<input type="text" name="allpaysum" value="<?php echo $row[0] ?>"><br>
收款时间： 
<input type="text" name="paytime" value="<?php echo date("y-m-d H:i"); ?>"><br>


<input type="submit" value="保存" class="button">

</form>
<br><br>
<?php

?>
<?php
}
}
if ($option=="add"){
	
    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_back_site WHERE site_id='$siteid'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>站点被删除.</b></font><br><br>";
}
}
?>




<table cellspacing="0" cellpadding="0">
<tr>
<th>站点id</th>
<th>站点名</th>
<th>点击值</th>
<th>货币单位</th>
<th>下线提成比例</th>
<th>返佣比例</th>
<th>最小支付</th>
<th>支付方式</th>
<th>下线最大数目</th>
<th>当前下线人数</th>
<th>返佣次数</th>
<th>站点状态</th>
<th>站点类别</th>
<th>下线链接</th>
<th>教程链接</th>
<th>站点说明</th>
<th>更新时间</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_back_site ORDER BY site_id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["site_id"] ."</td>
<td>". $registro["site_name"] ."</td>
<td>". $registro["click_value"] ."</td>
<td>". $registro["site_money_unit"] ."</td>
<td>". $registro["refer_earn_per"] ."</td>
<td>". $registro["back_percent"] ."</td>
<td>". $registro["min_pay"] ."</td>
<td>". $registro["site_pay_method"] ."</td>
<td>". $registro["max_refer_number"] ."</td>
<td>". $registro["now_refer_number"] ."</td>
<td>". $registro["back_number"] ."</td>
<td>". $registro["site_status"] ."</td>
<td>". $registro["site_category"] ."</td>
<td>". $registro["refer_link"] ."</td>
<td>". $registro["help_link"] ."</td>
<td>". $registro["site_comment"] ."</td>
<td>". $registro["site_time"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=571&siteid=<?php echo $registro["site_id"] ?>&sitename=<?php echo $registro["site_name"] ?>">
<input type="submit" value="增加" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>


