<b>编辑返佣站点</b>

<?php include('config.php');
if (isset($_POST["id"]))
{
$id=$_POST["id"];
$username=$_POST["username"];
$backname=$_POST["backname"];
$sitename = $_POST["sitename"];
$siteregstatus = $_POST["siteregstatus"];
$siteregtime = $_POST["siteregtime"];

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_back_common SET username='$username', backname='$backname', site_name='$sitename', site_reg_status='$siteregstatus', site_reg_time='$siteregtime' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>成功登记.</b></font><br><br>";
}

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];


if ($option=="edit"){

$tablae = mysql_query("SELECT * FROM tb_back_common where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
?>

<form method="post" action="index.php?op=58">

编号: <input type="hidden" name="id" value="<?php echo $registroe["id"] ?>"><?php echo $registroe["id"] ?><br>
站点名: 
<input type="text" name="sitename" value="<?php echo $registroe["site_name"] ?>">
<br>
本站用户名: 
<input type="text" name="username" value="<?php echo $registroe["username"] ?>">
<br>
登记站点用户名:
<input type="text" name="backname" value="<?php echo $registroe["backname"] ?>"><br>
登记返佣状态:
<input type="text" name="siteregstatus" value="<?php echo $registroe["site_reg_status"] ?>"><br>
登记返佣时间:
<input type="text" name="siteregtime" value="<?php echo $registroe["site_reg_time"] ?>"><br>

<input type="submit" value="保存" class="button">

</form>
<br><br>
<?php
}
}
if ($option=="delete"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_back_common WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>记录被删除.</b></font><br><br>";
}
}
?>

<table cellspacing="0" cellpadding="0">
<tr>
<th>编号</th>
<th>站点名</th>
<th>本站用户名</th>
<th>登记站点用户名</th>
<th>登记返佣状态</th>
<th>登记返佣时间</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_back_common where site_reg_status = '等待登记' ORDER BY site_name ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["backname"] ."</td>
<td>". $registro["site_name"] ."</td>
<td>". $registro["site_reg_status"] ."</td>
<td>". $registro["site_reg_time"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=58&id=<?php echo $registro["id"] ?>&option=edit">
<input type="submit" value="编辑" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=58&id=<?php echo $registro["id"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>


