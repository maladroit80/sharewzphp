<b>查看改用户登记的站点</b>

<?php include('config.php');
$username = $_GET["username"];
if(isset($_POST["id"]))
{
	
$id=$_POST["id"];
$username=$_POST["username"];
$siteid=$_POST["siteid"];
$backname=$_POST["backname"];
$sitename = $_POST["sitename"];
$siteregstatus = $_POST["siteregstatus"];
$siteregtime = $_POST["siteregtime"];

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_back_common SET username='$username', backname='$backname', site_name='$sitename', site_reg_status='$siteregstatus', site_reg_time='$siteregtime' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>编辑成功.</b></font><br><br>";
    if($siteregstatus=='成功登记'){
    	
    $sqlrefernumber = mysql_query("select * from tb_back_site where site_id ='$siteid'");
    $row = mysql_fetch_array($sqlrefernumber);
    $refernumber = $row["now_refer_number"]+1;
    
    $sql="UPDATE tb_back_site SET now_refer_number='$refernumber' where site_id='$siteid'";
    $query = "UPDATE tb_back_site SET now_refer_number='$refernumber' where site_id='$siteid'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>此站点登记人数已经增加一个.</b></font><br><br>";
}
}

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];


if ($option=="edit"){

$tablae = mysql_query("SELECT * FROM tb_back_common where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
?>

<form method="post" action="index.php?op=611">

编号: <input type="hidden" name="id" value="<?php echo $registroe["id"] ?>"><?php echo $registroe["id"] ?><br>
站点id: 
<input type="text" name="siteid" value="<?php echo $registroe["site_id"] ?>">
<br>
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
<input type="text" name="siteregtime" value="<?php echo date("y-m-d H:i") ?>"><br>

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
<th>会员名</th>
<th>返佣站点用户名</th>
<th>站点名</th>
<th>总点击数</th>
<th>总返佣金额</th>
<th>返佣登记状态</th>
<th>最近返佣时间</th>
<th>返佣登记时间</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_back_common where username='$username' ORDER BY site_reg_time ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["backname"] ."</td>
<td>". $registro["site_name"] ."</td>
<td>". $registro["current_click"] ."</td>
<td>". $registro["current_back"] ."</td>
<td>". $registro["site_reg_status"] ."</td>
<td>". $registro["back_time"] ."</td>
<td>". $registro["site_reg_time"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=611&id=<?php echo $registro["id"] ?>&siteid=<?php echo $registro["site_id"] ?>&option=edit">
<input type="submit" value="编辑/登记返佣" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=611&id=<?php echo $registro["id"] ?>&siteid=<?php echo $registro["site_id"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
</tr>

<?php
} // fin del bucle de ordenes
?>
</table>