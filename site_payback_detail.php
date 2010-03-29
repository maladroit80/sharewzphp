<?php include('header.php'); ?>
<?php
require ('config.php');
?>
<div class="mem_left">
<?php include('memberbackleft.php')?>
</div>
<div align="center">
    <table width="600" style="border-collapse: collapse" bordercolor="#111111" cellpadding="0" cellspacing="0">
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
					  <tr><td colspan="5"><?php 
								$id = $_GET["id"];
								$sql = mysql_query("SELECT * FROM  tb_back_site where site_id='$id'"); 
								$result = mysql_fetch_array($sql);
								?>
					  <a target="_blank" href="<?php echo $result["refer_link"] ?>"><?php echo $result["site_name"] ?></a>返佣详细信息</td></tr>
                        <tr style="background-color:#D9EDff;" align="center">
                            <td>
                                站点ID
                            </td>
                            <td>
                                站点名
                            </td>
                            <td>
                                用户名
                            </td>
                            <td>
                                总点击数
                            </td>
                            <td>
                                总返佣金额
                            </td>
                            <td>
                                本期点击数
                            </td>
                            <td>
                                本期返佣金额
                            </td>
                            <td>
                                返佣时间
                            </td>
                        </tr> 			
					<?php
					$tabla = mysql_query("SELECT * FROM  tb_back_common where site_id = '$id' and site_reg_status ='成功登记' ORDER BY site_reg_time desc"); 
					while ($registro = mysql_fetch_array($tabla)) { 
					echo "
					<tr>
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'>". $registro["site_id"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["site_name"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["username"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["last_click"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["last_back"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["pay_click"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["pay_back"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["back_time"] ."</td>
					";
					?>
					</tr>
					<?php
					} // fin del bucle de ordenes
					?>
					</table>
  
      </td></tr>
      <tr><td colspan="5">
      <table width="100%" border="0" cellspacing="1" cellpadding="5" style="border:1px solid #FFCC00;">
					  
                         <tr><td colspan="5"><?php 
								$id = $_GET["id"];
								$sql = mysql_query("SELECT * FROM  tb_back_site where site_id='$id'"); 
								$result = mysql_fetch_array($sql);
								?>
					  <a target="_blank" href="<?php echo $result["refer_link"] ?>"><?php echo $result["site_name"] ?></a>收款详细信息</td></tr>
                        <tr style="background-color:#D9EDff;" align="center">
                            <td>
                                站点ID
                            </td>
                            <td>
                                站点名
                            </td>
                            <td>
                                该站收款次数
                            </td>
                            <td>
                                本次收款金额
                            </td>
                            <td>
                                总收款金额(不包括本次收款)
                            </td>
                            <td>
                                收款时间
                            </td>
                        </tr> 			
					<?php
					$tabla = mysql_query("SELECT * FROM  tb_payproof where site_id='$id' ORDER BY pay_time desc"); 
					while ($registro = mysql_fetch_array($tabla)) { 
					echo "
					<tr>
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'>". $registro["site_id"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["site_name"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["pay_number"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["now_pay_sum"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["all_pay_sum"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["pay_time"] ."</td>
					</tr>";
					?>
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