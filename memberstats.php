<? require('config.php');


$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
?>



<div id="navmainlistline">&nbsp;</div>

<fieldset>
<legend>
<img border="0" src="images/hourglass_add.png" width="16" height="16"  align="absmiddle"> 账户状态</legend>

<table width="100%">

<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 广告点击</td>
<td><? echo $row["visits"]; ?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 下线个数</td>
<td><? echo $row["referals"]; ?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 下线点击</td>
<td><? echo $row["referalvisits"]; ?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 帐户余额</td>
<td><? echo $row["money"]; ?>元</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 总计支付</td>
<td><? echo $row["paid"]; ?>元</td>
</tr>


</table>

</fieldset>