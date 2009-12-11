<?php require('config.php');


$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
?>



<div id="signup">
          <h3>
 账户状态:</h3>
          <div class="in">
<table width="100%" class="nom">

<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 广告点击</td>
<td><?php echo $row["visits"]; ?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 下线个数</td>
<td><?php echo $row["referals"]; ?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 下线点击</td>
<td><?php echo $row["referalvisits"]; ?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 帐户余额</td>
<td><?php echo $row["money"]; ?>元</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 总计支付</td>
<td><?php echo $row["paid"]; ?>元</td>
</tr>


</table>
</div>
</div>
