<?php include('header.php'); ?>
<b>登记返佣</b><br>
<?php
require ('config.php');
$id=$_GET["id"];
$sitename=$_GET["sitename"];
$backname=$_POST["backname"];
$regtime = date("y-m-d H:i");
$query = "INSERT INTO tb_back_common (username, backname, site_id, site_name, last_click, pay_click, current_click, last_back, pay_back, current_back, site_reg_status, pay_status, back_time, site_reg_time)" .
		" VALUES( '$user', '$backname', '$siteid', '$sitename','0','0','0','0','0','0','等待登记', '成功返佣','$regtime','$regtime')";
mysql_query($query) or die(mysql_error());

echo "登记成功 <br>";
echo $sitename;
echo $query;
?>
<?php include('footer.php'); ?>