<b>作弊会员列表</b>


<table>
<tr>
<th>序号</th>
<th>用户名</th>
<th>欺骗广告ID</th>
<th>点击次数</th>
</tr>

<?php include('config.php');
$sql = "SELECT * FROM tb_config WHERE item='cheat'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
$cheatadid=$row["howmany"];
$visit="visit";
$tabla = mysql_query("SELECT * ,count(user) as clicknum FROM tb_ads where ident='$cheatadid' and tipo='$visit' group by user order by clicknum desc"); 
while ($registro = mysql_fetch_array($tabla)) 
{ 
echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["user"] ."</td>
<td>". $registro["ident"] ."</td>
<td>". $registro["clicknum"] ."</td>
</tr>";
} 
?>

</table>
