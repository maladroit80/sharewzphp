<?php include('header.php'); ?>
<?php
require ('config.php');
?>
<div class="mem_left">
<?php include('memberbackleft.php')?>
</div>
<div align="center">
    <table width="680" style="border-collapse: collapse" bordercolor="#111111" cellpadding="0" cellspacing="0">
      <tr bgcolor="#FFFFFF">
      <td>
      </tr>
      <tr bgcolor="#FFFFFF" id="sitemenu">
		<td><a href="sites_available.php" >可做站点</a></td>
		<td><a href="sites_joined.php" >已做站点</a></td>
		<td><a href="sites_notavailable.php" >受限站点</a></td>
		<td><a href="sites_paid.php" >收款站点</a></td>
		<td><a href="sites_scam.php" >停止推荐</a></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td height="10">&nbsp;</td>
      </tr>
      <tr><td colspan="5">
      <table width="100%" border="0" cellspacing="1" cellpadding="5" style="border:1px solid #FFCC00;">
					   <tr align="center"><td colspan="5">最近支付信息</td></tr>
                        <tr style="background-color:#D9EDff;" align="center">
                            <td>
                               编号
                            </td>
                            <td>
                                第几次返佣支付
                            </td>
                            <td>
                                本次返佣支付金额
                            </td>
                            <td>
                                时间
                            </td>
                        </tr> 		
					<?php
					$tabla = mysql_query("SELECT * FROM  tb_backpay_history where username='$user' ORDER BY pay_time asc"); 
					while ($registro = mysql_fetch_array($tabla)) { 
					echo "
					<tr>
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'>". $registro["id"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["pay_number"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["pay_sum"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["pay_time"] ."</td>";
					?>	
					</tr>
					<?php
					} // fin del bucle de ordenes
					?>
					</table>
  
      </td></tr>
      <tr bgcolor="#FFFFFF">
        <td height="28">&nbsp;</td>
        <td height="28">&nbsp;</td>
        <td height="28">&nbsp;</td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td height="28" colspan="5"><div align="center"><a href="contact.php">黄金广告位50元/月</a></div></td>
      </tr>
    </table>
</div>




</div>
<?php include('footer.php'); ?>