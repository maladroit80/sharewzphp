<b>增加修改收款纪录</b>

<?php include('config.php');
?>

<?
$siteid=$_POST["siteid"];
$sitename=$_POST["sitename"];
$paynumber = $_POST["paynumber"];
$nowpaysum = $_POST["nowpaysum"];
$allpaysum = $_POST["allpaysum"];
$paytime = $_POST["paytime"];


if($nowpaysum== NULL) {
}else{
 $query ="INSERT INTO tb_payproof (site_id,site_name,pay_number,now_pay_sum, all_pay_sum, pay_time) VALUES ( '".$siteid." ', '".$sitename." ', '".$paynumber."','" .$nowpaysum. "', '".$allpaysum."','".date("y-m-d H:i")." ');";
    mysql_query($query) or die(mysql_error());
echo "恭喜成功添加收款纪录";}?>

<table cellspacing="0" cellpadding="0">
<tr>
<th>id</th>
<th>站点id</th>
<th>站点名</th>
<th>收款次数</th>
<th>本次收款额</th>
<th>总收款额</th>
<th>收款时间</th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_payproof ORDER BY site_id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["site_id"] ."</td>
<td>". $registro["site_name"] ."</td>
<td>". $registro["pay_number"] ."</td>
<td>". $registro["now_pay_sum"] ."</td>
<td>". $registro["all_pay_sum"] ."</td>
<td>". $registro["pay_time"] ."</td>
<td>";
?>
</td>
</tr>
<?php
}
?>
</table>