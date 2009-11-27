<b>注册记录管理</b>

<?


if (isset($_POST["id"]))
{

$id=$_POST["id"];
$adid=$_POST["adid"];
$username=$_POST["username"];
$regname=$_POST["regname"];
$paiddate=$_POST["paiddate"];
$reqdate=$_POST["reqdate"];
$adname=$_POST["adname"];
$owner=$_POST["owner="];
$status=$_POST["status"];
$value=$_POST["value"];



    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_signupusers SET regname='$regname', paiddate='$paiddate', reqdate='$reqdate', status='$status', value='$value' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>记录被编辑.</b></font><br><br>";

}


if (isset($_GET["id"]))
{

$id=$_GET["id"];

if ($_GET["option"]=="edit")
{
?>

<?

$tablae = mysql_query("SELECT * FROM tb_signupusers where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


?>

<form method="post" action="index.php?op=37">

序号: <input type="hidden" name="id" value="<?= $registroe["id"] ?>"><?= $registroe["id"] ?><br>
广告ID: <input type="hidden" name="adid" value="<?= $registroe["adid"] ?>"><?= $registroe["adid"] ?><br>
用户名 : <input type="hidden" name="username" value="<?= $registroe["username"] ?>"><?= $registroe["username"] ?><br>
注册名 : <input type="text" name="regname" value="<?= $registroe["regname"] ?>"><br>
所有者: <input type="hidden" name="owner" value="<?= $registroe["owner"] ?>"><?= $registroe["owner"] ?><br>
广告名: <input type="hidden" name="adname" value="<?= $registroe["adname"] ?>"><?= $registroe["adname"] ?><br>
价值 : <input type="text" name="value" value="<?= $registroe["value"] ?>"><br>
申请时间: <input type="text" name="adname" value="<?= $registroe["reqdate"] ?>"><br>
支付时间: <input type="text" name="paiddate" value="<?= $registroe["paiddate"] ?>"><br>
状态 :<select name="status">

					<option value="<?= $registroe["status"] ?>" selected></option>
					<option value="pending">pending</option>
					<option value="deny">deny</option>
					<option value="approved">approved</option>
					<option value="paid">paid</option>
</select>

<br>


<input type="submit" value="Save" class="button">

</form>

<?

}
?>


<?
}

if ($_GET["option"]=="delete")
{

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_signupusers WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>记录被删除 .</b></font><br><br>";
}

}

?>
<table>
	<tr>
		<th>序号</th>
		<th>广告ID</th>
		<th>用户名</th>
		<th>注册名</th>
		<th>所有者</th>
		<th>广告名</th>
		<th>价值</th>
		<th>申请时间</th>
		<th>支付时间</th>
		<th>状态</th>
		
		<th></th>
		<th></th>
	</tr>
<?

//Limito la busqueda
$TAMANO_PAGINA = 50;

//examino la p¨¢gina a mostrar y el inicio del registro a mostrar
$pagina = limpiar($_GET["pagina"]);
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
} 

$tabla = mysql_query("SELECT * FROM tb_signupusers ORDER BY id ASC limit $inicio,$TAMANO_PAGINA"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["adid"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["regname"] ."</td>
<td>". $registro["owner"] ."</td>
<td>". $registro["adname"] ."</td>
<td>". $registro["value"] ."</td>
<td>". $registro["reqdate"] ."</td>
<td>". $registro["paiddate"] ."</td>
<td>". $registro["status"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=37&id=<?= $registro["id"] ?>&option=edit">
<input type="submit" value="Edit" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=37&id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="Delete" class="button">
</form>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>

<?
$uno = limpiar($_GET["pagina"]);

if (empty($uno))
{ 
$uno = 1;
$mos = $uno + 1;
echo "<a href='index.php?op=37&pagina=$mos'><font face=\"verdana\" style=\"font-size:11px;\" color=\"#000000\"><b>Next page</b></font></a> ";
} else 
{

$mos = $uno + 1;

for ($z=$mos;$z<=$mos;$z++)
{
echo "<a href='index.php?op=37&pagina=$z'><font face=\"verdana\" style=\"font-size:11px;\" color=\"#000000\"><b>Next page</b></font></a> ";

}



}
?>