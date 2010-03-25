<b>查看改用户登记的站点</b>

<?php include('config.php');
?>


<table cellspacing="0" cellpadding="0">
<tr>
<th>编号</th>
<th>会员名</th>
<th>本期返佣金额</th>
<th>总返佣金额</th>
<th>返佣次数</th>
<th>最近返佣时间</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_back_account ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["now_back_sum"] ."</td>
<td>". $registro["all_back_sum"] ."</td>
<td>". $registro["back_pay_number"] ."</td>
<td>". $registro["back_pay_time"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=611&username=<?php echo $registro["username"] ?>">
<input type="submit" value="查看改用户登记的站点" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>


