<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<b>购买下线申请</b>

<?

if (isset($_GET["id"]))
{

$id=$_GET["id"];

if ($_GET["option"]=="approve")
{

if (isset($_POST["customer"]))
{

$customer=$_POST["customer"];
$id=$_POST["id"];
$referals=$_POST["refset"];



$checkpemaile = mysql_query("SELECT * FROM tb_users WHERE referer=''");
$pemail_existe = mysql_num_rows($checkpemaile);

if ($pemail_existe<$referals)
{

echo "Error. There are not ". $referals ." users without referer.<br><br>";

}else{


$tablea = mysql_query("SELECT * FROM tb_users where referer='' and username != '$customer' limit $referals"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registreo = mysql_fetch_array($tablea)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

$lolsr=$registreo["username"];

$sqlexe = "UPDATE tb_users SET referer='$customer' WHERE username='$lolsr'";
$resultexe = mysql_query($sqlexe);

}


$sqlz = "SELECT * FROM tb_users WHERE username='$customer'";
$resultz = mysql_query($sqlz);
$myrowz = mysql_fetch_array($resultz);

$numero=$myrowz["referals"] + $referals;

$sqlex = "UPDATE tb_users SET referals='$numero' WHERE username='$customer'";
$resultex = mysql_query($sqlex);

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_buyref WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

}

}

}

if ($_GET["option"]=="deny")
{
    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_buyref WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());
}

}

?>
没有上线的会员数: <b><?
$checkpemail = mysql_query("SELECT * FROM tb_users WHERE referer=''");
$pemail_exist = mysql_num_rows($checkpemail);

echo $pemail_exist;
?></b>
<br>
<br> 
当你点击允许后，下线自动分配给此会员
<br>
<br>
<table>
<tr>
<th>客户</th>
<th>支付宝</th>
<th>组</th>
<th></th>
<th></th>
</tr>

<?

$tabla = mysql_query("SELECT * FROM tb_buyref where id!='1' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["customer"] ."</td>
<td>". $registro["pemail"] ."</td>

<td>1组". $registro["refset"] ."下线包</td>
	";
?>
<td><form method="post" action="index.php?op=6&id=<?= $registro["id"] ?>&option=approve">
<input type="hidden" name="customer" value="<?= $registro["customer"] ?>">
<input type="hidden" name="id" value="<?= $registro["id"] ?>">
<input type="hidden" name="refset" value="<?= $registro["refset"] ?>">
<input type="submit" value="允许" class="button">
</form>
</td><td>
<form method="post" action="index.php?op=6&id=<?= $registro["id"] ?>&option=deny">
<input type="submit" value="拒绝" class="button">
</form>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>