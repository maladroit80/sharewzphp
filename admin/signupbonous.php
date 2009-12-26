<b>允许或者拒绝注册奖励申请</b>


<?php

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];

if ($option=="approve"){
	 $status="paid";
	 $paiddate=date("Y-n-d H:i");
	 
	 $query1 = mysql_query("select * from tb_signupusers WHERE id='$id'");
	 $registro = mysql_fetch_array($query1);
	 $value=$registro["value"];
	 $username=$registro["username"];
	 
	 $query2 = mysql_query("SELECT * FROM tb_users WHERE username='$username'");
	 $registro2 = mysql_fetch_array($query2);
	 $money=$registro2["money"];
	 $money=$money+$value;
	 
     $query = "UPDATE tb_signupusers SET status='$status', paiddate='$paiddate' WHERE id='$id'";
	 $resultex = mysql_query($query);
	 
	 
	 
	 $sqlexd = "UPDATE tb_users SET money='$money' WHERE username='$username'";
     $resultexd = mysql_query($sqlexd);
	  
    echo "<font color=\"green\"><b>注册奖励被允许.</b></font><br><br>";
}

if ($option=="deny"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_signupusers WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());
    echo "<font color=\"#cc0000\"><b>注册奖励被拒绝.</b></font><br><br>";
}


}
?>



<table>
	<tr>
		<th>序号</th>
		<th>本站用户名</th>
		<th>注册用户名</th>
		<th>所有者</th>
		<th>广告名称</th>
		<th>单价</th>
		<th>申请时间</th>
		<th></th>
		<th></th>
	</tr>
<?php
$stats="approved";
$tabla = mysql_query("SELECT * FROM tb_signupusers where status='$stats' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["regname"] ."</td>
<td>". $registro["owner"] ."</td>
<td>". $registro["adname"] ."</td>
<td>". $registro["value"] ."</td>
<td>". $registro["reqdate"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=35&id=<?php echo $registro["id"]; ?>&option=approve">
<input type="submit" value="允许" class="button">
</form>
</td><td>
<form method="post" action="index.php?op=35&id=<?php echo $registro["id"]; ?>&option=deny">
<input type="submit" value="拒绝" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>