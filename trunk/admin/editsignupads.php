<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<b>修改注册广告</b>


<?php include('config.php')?>
<?


if (isset($_POST["id"]))
{
$id=$_POST["id"];
$adname = $_POST["adname"];
$owner = $_POST["owner"];
$url = $_POST["url"];
$adnum = $_POST["adnum"];
$paypal = $_POST["paypal"];
$value = $_POST["value"];
$instruction = $_POST["instruction"];

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_signupads SET adname='$adname', owner='$owner', url='$url', adnum='$adnum', paypal='$paypal', value='$value', instruction='$instruction' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>注册广告被编辑.</b></font><br><br>";


}

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];


if ($option=="edit"){

?>


<?

$tablae = mysql_query("SELECT * FROM tb_signupads where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


?>

<form method="post" action="index.php?op=34">

序号: 
  <input type="hidden" name="id" value="<?= $registroe["id"] ?>"><?= $registroe["id"] ?><br>
支付宝帐号: 
<input type="text" name="paypal" value="<?= $registroe["paypal"] ?>"><br>
广告名称: 
<input name="adname" type="text" id="adname" value="<?= $registroe["adname"] ?>">
<br>
广告数量: 
<input type="text" name="adnum" value="<?= $registroe["adnum"] ?>"><br>
链接: 
<input type="text" name="url" value="<?= $registroe["url"] ?>"><br>
所有者: 
<input type="text" name="owner" value="<?= $registroe["owner"] ?>"><br>
广告单价: 
<input type="text" name="value" value="<?= $registroe["value"] ?>"><br>
说明: 
<textarea name="instruction" cols="40" rows="5" id="instruction"><?= $registroe["instruction"] ?>
</textarea>
<br>
<br>
<input type="submit" value="保存" class="button">
</form>
<br><br>
<?
}
?>

<?

}

if ($option=="delete"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_signupads WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>注册广告被删除.</b></font><br><br>";
}


}
?>

<table cellspacing="0" cellpadding="0">
<tr>
        <th>序号</th>
		<th>支付宝</th>
		<th>所有者</th>
		<th>广告名称</th>
		<th>链接</th>
		<th>广告数量</th>
		<th>广告单价</th>
		<th></th>
		<th></th>
</tr>
<?
$status="yes";
$tabla = mysql_query("SELECT * FROM tb_signupads where status='$status' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["paypal"] ."</td>
<td>". $registro["owner"] ."</td>
<td>". $registro["adname"] ."</td>
<td><a href=\"#\" onmouseover=\"Tip('". $registro["url"] ."')\">链接</a></td>
<td>". $registro["adnum"] ."</td>
<td>". $registro["value"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=34&id=<?= $registro["id"] ?>&option=edit">
<input type="submit" value="编辑" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=34&id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>


