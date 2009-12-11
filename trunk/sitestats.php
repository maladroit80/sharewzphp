<?php
include('config.php');
$checkpemail = mysql_query("SELECT id FROM tb_users");
$pemail_exist = mysql_num_rows($checkpemail);


$sqryvar="Select sum(amount) from tb_history";
$iqryvar=mysql_query($sqryvar);
$tot1=mysql_result($iqryvar,0,0);
$totals=$tot1;
if ($totals==''){
	$totalpaid='0.00';
} else{
	$totalpaid=$tot1;
}


$sqryvar="Select sum(visits) from tb_users";
$iqryvar=mysql_query($sqryvar);
$tot1=mysql_result($iqryvar,0,0);
$clickserved=$tot1;
mysql_close($con);
?>

<table width="100%"  class="nom_sitestats">

<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 每点击 </td>
<td><?php include('config.php');
		$sql = "SELECT * FROM tb_config WHERE item='click' and howmany='1'";
		$result = mysql_query($sql);        
		$row = mysql_fetch_array($result);
		echo $row["price"]; 
		mysql_close($con);?>元</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 最小支付</td>
<td><?php include('config.php');
				$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
				$result = mysql_query($sql);        
				$row = mysql_fetch_array($result);
				echo $row["price"];
				mysql_close($con);
			?>元</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 会员总数</td>
<td><?php echo $pemail_exist; ?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 在线会员</td>
<td><?php include("onlinesql.php"); ?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 总计支付</td>
<td><?php echo $totalpaid?>元</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 总计点击</td>
<td><?php echo $clickserved?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 支付比率</td>
<td>100：1</td>
</tr>


</table>
<!--</div>
</div>-->