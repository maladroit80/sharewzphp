<b>允许或者拒绝用户广告申请</b>


<?php

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];
$pemail=$_POST["pemail"];
$plan=$_POST["plan"];
$url=$_POST["url"];
$description=$_POST["description"];
$ip=$_POST["ip"];
$fechainicia=time();

if ($option=="approve"){


    //Todo parece correcto procedemos con la inserccion
    $query = "INSERT INTO tb_ads (fechainicia, paypalemail, plan, url, description, tipo) VALUES('$fechainicia','$pemail','$plan','$url','$description','ads')";
    mysql_query($query) or die(mysql_error());

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_advertisers WHERE id='$id' and tipo='convert'";
    mysql_query($queryz) or die(mysql_error());


$sqlue = "SELECT * FROM tb_users WHERE username='$pemail'";
$resultue = mysql_query($sqlue);        
$rowue = mysql_fetch_array($resultue);

$sqlz = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$resultz = mysql_query($sqlz);        
$rowz = mysql_fetch_array($resultz);

$wootz=$rowue["money"] - $rowz["price"];



    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_users SET money='$wootz' where username='$pemail'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>广告申请被允许.</b></font><br><br>";
}

if ($option=="deny"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_advertisers WHERE id='$id' and tipo='convert'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>广告申请被拒绝.</b></font><br><br>";
}


}
?>



<table>
<tr>
<th>序号</th>
<th>用户名</th>
<th>价值</th>
<th>计划</th>
<th>链接</th>
<th>文字描述</th>
<th>IP</th>
<th></th>
<th></th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_advertisers where tipo='convert' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
". $registro["id"] ."
</font></td>
<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
". $registro["pemail"] ."
</font></td>
<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
$". $registro["money"] ."
</font></td>
<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
". $registro["plan"] ."
</font></td>
<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
<a href=\"". $registro["url"] ."\" target=\"_blank\">View site</a>
</font></td>
<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
<a href=\"#\" onmouseover=\"Tip('". $registro["description"] ."')\">描述</a>
</font></td>
<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
". $registro["ip"] ."
</font></td>
<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">";
?>
<form method="post" action="index.php?op=10&id=<?php echo $registro["id"] ?>&option=approve">
<input type="hidden" name="pemail" value="<?php echo $registro["pemail"] ?>">
<input type="hidden" name="plan" value="<?php echo $registro["plan"] ?>">
<input type="hidden" name="url" value="<?php echo $registro["url"] ?>">
<input type="hidden" name="description" value="<?php echo $registro["description"] ?>">
<input type="hidden" name="ip" value="<?php echo $registro["ip"] ?>">
<input type="submit" value="允许" class="button">
</form>
</td><td>
<form method="post" action="index.php?op=10&id=<?php echo $registro["id"] ?>&option=deny">
<input type="submit" value="拒绝" class="button">
</form>

</font></td></td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>