<b>编辑点击广告</b>

<?php include('config.php')?>
<?


if (isset($_POST["id"]))
{

$id=$_POST["id"];
$pname=$_POST["pname"];
$pemail=$_POST["pemail"];
$plan=$_POST["plan"];
$url=$_POST["url"];
$description=$_POST["description"];
$category=$_POST["category"];
$bold=$_POST["bold"];
$highlight=$_POST["highlight"];

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_ads SET bold='$bold', highlight='$highlight', paypalname='$pname', paypalemail='$pemail', plan='$plan', url='$url', description='$description', category='$category' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>广告被编辑.</b></font><br><br>";
}

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];


if ($option=="edit"){

?>


<?php

$tablae = mysql_query("SELECT * FROM tb_ads where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
?>

<form method="post" action="index.php?op=2">

序号: <input type="hidden" name="id" value="<?php echo $registroe["id"] ?>"><?php echo $registroe["id"] ?><br>
Account name: 
<input type="text" name="pname" value="<?php echo $registroe["paypalname"] ?>">
<br>
支付宝帐号: 
<input type="text" name="pemail" value="<?php echo $registroe["paypalemail"] ?>">
<br>
计划(点击数量): 
<input type="text" name="plan" value="<?php echo $registroe["plan"] ?>"><br>
链接: 
<input type="text" name="url" value="<?php echo $registroe["url"] ?>"><br>
文本描述: 
<input type="text" name="description" value="<?php echo $registroe["description"] ?>"><br>

分类: [<?php echo $registroe["category"] ?>]  - 
<select name="category">


<?php

$tablaa = mysql_query("SELECT * FROM tb_ads_categories ORDER BY id ASC"); // selecciono todos los registros de la tabla ads categories, ordenado por id

while ($registroa = mysql_fetch_array($tablaa)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
echo "
<option value=\"".$registroa["id"] ."\">[". $registroa["id"] ."] - ". $registroa["catname"] ."</option>
";
}
?>
</select><br>

粗体: 
<input type="text" name="bold" value="<?php echo $registroe["bold"] ?>"><br>
高亮: 
<input type="text" name="highlight" value="<?php echo $registroe["highlight"] ?>"><br>
<br>

<input type="submit" value="保存" class="button">

</form>
<br><br>
<?php
}
}
if ($option=="delete"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_ads WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>广告被删除.</b></font><br><br>";
}
}
?>

<table cellspacing="0" cellpadding="0">
<tr>
<th>序号</th>
<th>链接</th>
<th>文字描述</th>
<th>分类</th>
<th>点击计划</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_ads where tipo='ads' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td ><a href=\"". $registro["url"] ."\" target=\"_blank\">查看</a></td>
<td><a href=\"#\" onmouseover=\"Tip('". $registro["description"] ."')\">文字描述</a></td>

<td>". $registro["category"] ."</td>


<td>". $registro["plan"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=2&id=<?php echo $registro["id"] ?>&option=edit">
<input type="submit" value="编辑" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=2&id=<?php echo $registro["id"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>


