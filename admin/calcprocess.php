<b>返佣计算中</b>

<?php include('config.php');
$id=$_GET["id"];
$siteid=$_GET["siteid"];
$sitename=$_GET["sitename"];
$username=$_GET["username"];
$backname=$_GET["backname"];
$lastclick=$_GET["lastclick"];
$lastback=$_GET["lastback"];
$currentclick=$_POST["currentclick"];
$value=$_POST["clickvalue"];


$sql=mysql_query("SELECT * FROM tb_back_site where site_id='$siteid'");
$row=mysql_fetch_array($sql);

$sql1=mysql_query("SELECT * FROM tb_back_account where username='$username'");
$row1=mysql_fetch_array($sql1);

if($currentclick<$row["last_click"])
{
	echo "输入有误";
}
else{
if($value==null)
{
	$clickvalue=$row["click_value"];
}
else
{
	$clickvalue = $value;
	
}
if($row["site_money_unit"]=='$')
{
	$payunit=6;
}else{$payunit=1;}
$payclick = $currentclick-$lastclick;
$payback = $payclick*$row["refer_earn_per"]*$row["back_percent"]*$clickvalue*$payunit;
$newcurrent_back = $lastback + $payback;
$backtime = date("y-m-d H:i");
$backper = $row["back_percent"];
$referper = $row["refer_earn_per"];

//add money to the back accout
$sql1=mysql_query("SELECT * FROM tb_back_account where username='$username'");
$row1=mysql_fetch_array($sql1);
$backaccount = $row1["back_account"]+ $payback;
$query1 = "UPDATE tb_back_account SET back_account='$backaccount' where username='$username'";
 mysql_query($query1) or die(mysql_error());
 
    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_back_common SET last_click='$currentclick', pay_click='$payclick', current_click='$currentclick', last_back='$newcurrent_back', pay_back='$payback', current_back='$newcurrent_back', pay_status='等待返佣', back_time='$backtime' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>返佣计算成功.</b></font><br><br>";
    echo "结果由来：本期点击数*下线提成*返佣比例*点击值*汇率<br>";
    echo "$payclick*$backper*$referper*$clickvalue*$payunit";
}
?>

<table cellspacing="0" cellpadding="0">
<tr>
<th>编号</th>
<th>用户名</th>
<th>注册站点用户名</th>
<th>站点ID</th>
<th>站点名</th>
<th>上回总计点击数</th>
<th>本次点击数</th>
<th>最新点击数</th>
<th>上回总返佣金额</th>
<th>本次返佣金额</th>
<th>最新总返佣金额</th>
<th>登记返佣状态</th>
<th>返佣状态</th>
<th>返佣时间</th>
<th>登记返佣时间</th>
<th>请输入最新点击数</th>
<th>请输入平均点击值(空则为默认值)</th>
<th>&nbsp;</th>
</tr>

<?php

$tabla = mysql_query("SELECT * FROM tb_back_common where site_id='$siteid' ORDER BY site_id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["backname"] ."</td>
<td>". $registro["site_id"] ."</td>
<td>". $registro["site_name"] ."</td>
<td>". $registro["last_click"] ."</td>
<td>". $registro["pay_click"] ."</td>
<td>". $registro["current_click"] ."</td>
<td>". $registro["last_back"] ."</td>
<td>". $registro["pay_back"] ."</td>
<td>". $registro["current_back"] ."</td>
<td>". $registro["site_reg_status"] ."</td>
<td>". $registro["pay_status"] ."</td>
<td>". $registro["back_time"] ."</td>
<td>". $registro["site_reg_time"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=592&id=<?php echo $registro["id"] ?>&siteid=<?php echo $registro["site_id"] ?>&lastclick=<?php echo $registro["last_click"] ?>&lastback=<?php echo $registro["last_back"] ?>&sitename=<?php echo $registro["site_name"] ?>&backname=<?php echo $registro["backname"] ?>&username=<?php echo $registro["username"] ?>">
<input style="width:50px;" type="text" name="currentclick" />
</td>
<td>
<input style="width:50px;" type="text" name="clickvalue" />
</td>
<td>
<input type="submit" value="计算返佣" class="button">
</form>
</td>
</tr>

<?php

} // fin del bucle de ordenes



?>
</table>



