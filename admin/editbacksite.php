<b>编辑返佣站点</b>

<?php include('config.php');
if (isset($_POST["siteid"]))
{

$sitename=$_POST["sitename"];
$siteid=$_POST["siteid"];
$clickvalue = $_POST["clickvalue"];
$moneyunit = $_POST["moneyunit"];
$referearnpercent = $_POST["referearnpercent"];
$backpercent = $_POST["backpercent"];
$minpay = $_POST["minpay"];
$paymethod = $_POST["paymethod"];
$maxrefernumber = $_POST["maxrefernumber"];
$nowrefernumber = $_POST["nowrefernumber"];
$backnumber = $_POST["backnumber"];
$sitestatus = $_POST["sitestatus"];
$sitecategory = $_POST["sitecategory"];
$referlink = $_POST["referlink"];
$helplink = $_POST["helplink"];
$sitecomment = $_POST["sitecomment"];
$sitetime = $_POST["sitetime"];

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_back_site SET site_name='$sitename', click_value='$clickvalue', site_money_unit='$moneyunit', refer_earn_per='$referearnpercent', back_percent='$backpercent', min_pay='$minpay', site_pay_method='$paymethod', max_refer_number='$maxrefernumber', now_refer_number='$nowrefernumber', back_number='$backnumber', site_status='$sitestatus', site_category='$sitecategory', refer_link='$referlink', help_link='$helplink', site_comment='$sitecomment', site_time='$sitetime' where site_id='$siteid'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>站点被编辑.</b></font><br><br>";
}

if (isset($_GET["siteid"]))
{

$siteid=$_GET["siteid"];
$option=$_GET["option"];


if ($option=="edit"){

$tablae = mysql_query("SELECT * FROM tb_back_site where site_id='$siteid'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
?>

<form method="post" action="index.php?op=56">

站点id: <input type="hidden" name="siteid" value="<?php echo $registroe["site_id"] ?>"><?php echo $registroe["site_id"] ?><br>
站点名: 
<input type="text" name="sitename" value="<?php echo $registroe["site_name"] ?>">
<br>
点击值: 
<input type="text" name="clickvalue" value="<?php echo $registroe["click_value"] ?>">
<br>
货币单位: [<?php echo $registroe["site_money_unit"] ?>]

<select name='moneyunit'>
<option value="￥">人民币</option>

<option value="$">美元</option>
</select>
<br>
下线提成比例: [<?php echo $registroe["refer_earn_per"] ?>]
<select name='referearnpercent'>
<option value="0.5">50%</option>
<option value="0.7">70%</option>
<option value="1">100%</option>
</select><br>
返佣比例:
<input type="text" name="backpercent" value="<?php echo $registroe["back_percent"] ?>"><br>
最小支付:
<input type="text" name="minpay" value="<?php echo $registroe["min_pay"] ?>"><br>
支付方式:
<input type="text" name="paymethod" value="<?php echo $registroe["site_pay_method"] ?>"><br>
下线最大数目:
<input type="text" name="maxrefernumber" value="<?php echo $registroe["max_refer_number"] ?>"><br>
当前下线人数: 
<input type="text" name="nowrefernumber" value="<?php echo $registroe["now_refer_number"] ?>"><br>
返佣次数:
<input type="text" name="backnumber" value="<?php echo $registroe["back_number"] ?>"><br>
站点状态: [<?php echo $registroe["site_status"] ?>]
<select name='sitestatus'>
<option value="金钻推荐">金钻推荐</option>
<option value="银钻推荐">银钻推荐</option>
<option value="铜钻推荐">铜钻推荐</option>
<option value="推荐">推荐</option>
<option value="停止">停止</option>
</select><br>
站点类别: 
<input type="text" name="sitecategory" value="<?php echo $registroe["site_category"] ?>"><br>
下线链接: 
<input type="text" name="referlink" value="<?php echo $registroe["refer_link"] ?>"><br>
教程链接: 
<input type="text" name="helplink" value="<?php echo $registroe["help_link"] ?>"><br>
站点说明: 
<input type="text" name="sitecomment" value="<?php echo $registroe["site_comment"] ?>"><br>
更新时间： 
<input type="text" name="sitetime" value="<?php echo date("Y-n-j"); ?>"><br>


<input type="submit" value="保存" class="button">

</form>
<br><br>
<?php
}
}
if ($option=="delete"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_back_site WHERE site_id='$siteid'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>站点被删除.</b></font><br><br>";
}
}
?>

<table cellspacing="0" cellpadding="0">
<tr>
<th>站点id</th>
<th>站点名</th>
<th>点击值</th>
<th>货币单位</th>
<th>下线提成比例</th>
<th>返佣比例</th>
<th>最小支付</th>
<th>支付方式</th>
<th>下线最大数目</th>
<th>当前下线人数</th>
<th>返佣次数</th>
<th>站点状态</th>
<th>站点类别</th>
<th>下线链接</th>
<th>教程链接</th>
<th>站点说明</th>
<th>更新时间</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php

$tabla = mysql_query("SELECT * FROM tb_back_site ORDER BY site_id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["site_id"] ."</td>
<td>". $registro["site_name"] ."</td>
<td>". $registro["click_value"] ."</td>
<td>". $registro["site_money_unit"] ."</td>
<td>". $registro["refer_earn_per"] ."</td>
<td>". $registro["back_percent"] ."</td>
<td>". $registro["min_pay"] ."</td>
<td>". $registro["site_pay_method"] ."</td>
<td>". $registro["max_refer_number"] ."</td>
<td>". $registro["now_refer_number"] ."</td>
<td>". $registro["back_number"] ."</td>
<td>". $registro["site_status"] ."</td>
<td>". $registro["site_category"] ."</td>
<td>". $registro["refer_link"] ."</td>
<td>". $registro["help_link"] ."</td>
<td>". $registro["site_comment"] ."</td>
<td>". $registro["site_time"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=56&siteid=<?php echo $registro["site_id"] ?>&option=edit">
<input type="submit" value="编辑" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=56&siteid=<?php echo $registro["site_id"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>


