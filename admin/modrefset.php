<b>修改下线组</b>


<?php


if (isset($_POST["id"]))
{

$id=$_POST["id"];
$item=$_POST["item"];
$howmany=$_POST["howmany"];
$refnum=$_POST["howmany"];
$price=$_POST["price"];


    
	
	
	$query2 = "UPDATE tb_buyref SET refnum='$howmany' where id='1' and refnum='$refnum'";
    mysql_query($query2) or die(mysql_error());



    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_refset SET howmany='$howmany', price='$price' where id='$id'";
    mysql_query($query) or die(mysql_error());



    echo "<font color=\"green\"><b>组被编辑.</b></font><br><br>";


}

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$howmany=$_GET["howmany"];
$option=$_GET["option"];




if ($option=="delete"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_refset WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    $queryz2 = "DELETE FROM tb_buyref WHERE id='1' and refnum='$howmany'";
    mysql_query($queryz2) or die(mysql_error());



    echo "<font color=\"#cc0000\"><b>Set has been deleted.</b></font><br><br>";
}


}
?>

<table cellspacing="0" cellpadding="0">
<tr>
<th>编号</th>
<th># 组中下线数目</th>
<th>价格</th>
<th>&nbsp;</th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_refset ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["howmany"] ."</td>
<td>". $registro["price"] ."</td>
<td>";



?>
<form method="post" action="index.php?op=27&id=<?php echo $registro["id"] ?>&howmany=<?php echo $registro["howmany"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>