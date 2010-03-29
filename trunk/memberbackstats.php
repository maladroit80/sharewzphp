<?php require("config.php");
?>



<div id="signup">
          <h3>
 返佣账户状态:</h3>
          <div class="in">
<table width="100%" class="nom">
<tr>
<td nowrap>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 返佣帐户余额</td>
<td align="left">
<?php include('config.php');
$sql = "SELECT * FROM tb_back_account WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
echo $row["now_back_sum"]; ?>&nbsp;元&nbsp;</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 最低支付额</td>
<td align="left"><?php include('config.php');
								$result =mysql_query("SELECT * FROM tb_common WHERE itemid='leastpay'");
								$row = mysql_fetch_array($result); echo $row["value"];
								 ?>&nbsp;元&nbsp;</td>
</tr>
<tr>
<td>
<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > 总返佣金额</td>
<td align="left"><?php include('config.php');
								$result =mysql_query("SELECT sum(all_back_sum) FROM tb_back_account WHERE username='$user'");
								$row = mysql_fetch_array($result); echo $row[0];
								?>&nbsp;元&nbsp;</td>
</tr>


</table>
</div>
</div>
