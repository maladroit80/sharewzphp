



<?
$siteid=$_GET["siteid"];
$sitename=$_GET["sitename"];
$sql = mysql_query("select * from tb_back_site where site_id='$siteid'");
$row = mysql_fetch_array($sql);
$backnumber = $row["back_number"]+1;
$query1 = "UPDATE tb_back_site SET back_number='$backnumber' where site_id='$siteid'";
	 mysql_query($query1) or die(mysql_error());

$backtime = date("y-m-d H:i");
$query1 = "UPDATE tb_back_common SET pay_status='成功返佣',back_time='$backtime' where site_id='$siteid'";
	 mysql_query($query1) or die(mysql_error());
?>
<b>返佣计算成功【<?php echo $sitename ?>】</b>
<br>
<br>
<table cellspacing="0" cellpadding="0">
<tr>
<th>编号</th>
<th>用户名</th>
<th>注册站点用户名</th>
<th>站点ID</th>
<th>站点名</th>
<th>上回总计点击数</th>
<th>本次点击数</th>
<th>最新点击数</th>
<th>上回总返佣金额</th>
<th>本次返佣金额</th>
<th>最新总返佣金额</th>
<th>登记返佣状态</th>
<th>返佣状态</th>
<th>返佣时间</th>
<th>登记返佣时间</th>
</tr>

<?php

$tabla = mysql_query("SELECT * FROM tb_back_common where site_id='$siteid' ORDER BY site_id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["backname"] ."</td>
<td>". $registro["site_id"] ."</td>
<td>". $registro["site_name"] ."</td>
<td>". $registro["last_click"] ."</td>
<td>". $registro["pay_click"] ."</td>
<td>". $registro["current_click"] ."</td>
<td>". $registro["last_back"] ."</td>
<td>". $registro["pay_back"] ."</td>
<td>". $registro["current_back"] ."</td>
<td>". $registro["site_reg_status"] ."</td>
<td>". $registro["pay_status"] ."</td>
<td>". $registro["back_time"] ."</td>
<td>". $registro["site_reg_time"] ."</td>
<td>";
?>
</tr>

<?php

} // fin del bucle de ordenes


?>
<tr>
<td colspan="15" style="text-align:center;">
<form method="post" action="index.php?op=59">
<input type="submit" value="返回继续统计返佣" class="button">
</form>
</td>
</tr>
</table>

