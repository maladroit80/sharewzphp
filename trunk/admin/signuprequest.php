<b>允许或者拒绝注册广告申请</b>

<?php include('config.php');
if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];

if ($option=="approve"){
	 $status="yes";
     $query = "UPDATE tb_signupads SET status='$status' WHERE id='$id'";
	 $resultex = mysql_query($query);
	 
    echo "<font color=\"green\"><b>注册广告申请被允许.</b></font><br><br>";
}

if ($option=="deny"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_signupads WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());
    echo "<font color=\"#cc0000\"><b>注册广告申请被拒绝.</b></font><br><br>";
}


}
?>



<table>
	<tr>
		<th>序号</th>
		<th>支付宝</th>
		<th>所有者</th>
		<th>名称</th>
		<th>链接</th>
		<th>数量</th>
		<th>价值</th>
		<th></th>
		<th></th>
	</tr>
<?php
$stats="no";
$tabla = mysql_query("SELECT * FROM tb_signupads where status='$stats' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["paypal"] ."</td>
<td>". $registro["owner"] ."</td>
<td>". $registro["adname"] ."</td>
<td><a href=\"#\" onmouseover=\"Tip('". $registro["url"] ."')\">注册链接</a></td>
<td>". $registro["adnum"] ."</td>
<td>". $registro["value"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=33&id=<?php echo $registro["id"]; ?>&option=approve">
<input type="submit" value="允许" class="button">
</form>
</td><td>
<form method="post" action="index.php?op=33&id=<?php echo $registro["id"]; ?>&option=deny">
<input type="submit" value="拒绝" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>