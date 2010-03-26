<?php require("config.php");


$sql = "SELECT * FROM tb_back_account WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
?>



<div id="signup">
          <h3>
 返佣账户状态:</h3>
          <div class="in">
<table width="100%" class="nom">

<tr>
<td nowrap>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 返佣帐户余额</td>
<td><?php echo $row["now_back_pay"]; ?>元</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 总返佣金额</td>
<td><?php echo $row["all_back_pay"]; ?>元</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 已做站点</td>
<td><?php echo $row["referalvisits"]; ?></td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 返佣帐户余额</td>
<td><?php echo $row["now_back_pay"]; ?>元</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 总返佣金额</td>
<td><?php echo $row["all_back_pay"]; ?>元</td>
</tr>


</table>
</div>
</div>
