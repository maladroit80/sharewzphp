<b>计算返佣</b>
<br>
<br>



<?
$siteid=$_GET["siteid"];
?>
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
<th>请输入最新点击数</th>
<th>请输入平均点击值</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
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
<form method="post" action="index.php?op=592&id=<?php echo $registro["id"] ?>&siteid=<?php echo $registro["site_id"] ?>&lastclick=<?php echo $registro["last_click"] ?>&lastback=<?php echo $registro["last_back"] ?>&sitename=<?php echo $registro["site_name"] ?>&backname=<?php echo $registro["backname"] ?>&username=<?php echo $registro["username"] ?>">
<input style="width:50px;" type="text" name="currentclick" />
</td>
<td>
<input style="width:50px;" type="text" name="clickvalue" />
</td>
<td>
<input type="submit" value="计算返佣" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>

