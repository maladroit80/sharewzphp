<b>添加新的返佣站点</b>
<br>
<br>

<?
$siteid=$_GET["siteid"];
$sitename=$_GET["sitename"];
$paynumber = $_POST["paynumber"];
$nowpaysum = $_POST["nowpaysum"];
$allpaysum = $_POST["allpaysum"];
$paytime = $_POST["paytime"];

$sql_backnumber = mysql_query("SELECT count(*) FROM tb_payproof where site_id='$siteid' ");

$row_backnumber = mysql_fetch_array($sql_backnumber);
?>
<form method="post" action="index.php?op=572">

站点id: 
<input type="text" name="siteid" value="<?php echo $siteid ?>">
<br>
站点名: 
<input type="text" name="sitename" value="<?php echo $sitename ?>">
<br>
收款次数: 
<input type="text" name="paynumber" value="<?php echo $row_backnumber[0] +1 ?>">
<br>
本次收款额:
<input type="text" name="nowpaysum" ><br>
总收款额:
<input type="text" name="allpaysum" value="<?php

$sql = "SELECT sum(now_pay_sum) FROM tb_payproof where site_id='$siteid' ";
$result = mysql_query($sql); 
$row = mysql_fetch_array($result);
echo $row[0];
 ?>"><br>
收款时间： 
<input type="text" name="paytime" value="<?php echo date("y-m-d H:i"); ?>"><br>

<input type="submit" value="保存" class="button">

</form>

