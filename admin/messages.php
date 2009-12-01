<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<b>消息</b>

<?

if (isset($_GET["id"]))
{

$option=$_GET["option"];

$id=$_GET["id"];

if ($option=="delete")
{

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_contact WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>消息被删除.</b></font><br><br>";


}

}

?>

<table>
<tr>
<th>序号</th>
<th>名字</th>
<th>电子邮件</th>
<th>主题</th>
<th>题目</th>
<th>内容</th>
<th>IP地址</th>
<th></th>
</tr>
<?

$tabla = mysql_query("SELECT * FROM tb_contact ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["name"] ."</td>
<td>". $registro["email"] ."</td>
<td>". $registro["topic"] ."</td>
<td>". $registro["subject"] ."</td>
<td>". $registro["comments"] ."</td>
<td>". $registro["ip"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=3&id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
<tr>


<?


} // fin del bucle de ordenes

?>
</table>