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
					   <tr><td colspan="5">查看已经登记的站点</td></tr>
                        <tr style="background-color:#D9EDff;" align="center">
                            <td>
                                站点ID
                            </td>
                            <td>
                                站点名
                            </td>
                            <td>
                                点击值
                            </td>
                            <td>
                                下线提成
                            </td>
                            <td>
                                返佣比例
                            </td>
                            <td>
                                最低支付
                            </td>
                            <td>
                                收款工具
                            </td>
                            <td>
                                下线数
                            </td>
                            <td>
                                注册
                            </td>
                            <td>
                                登记
                            </td>
                            <td>
                                收款返佣详情
                            </td>
                        </tr> 			
					<?php
					$tabla = mysql_query("SELECT * FROM  tb_back_site where site_status!='停止' and now_refer_number!=max_refer_number and site_id not in (select site_id from tb_back_common where username='$user') ORDER BY site_time desc"); 
					while ($registro = mysql_fetch_array($tabla)) { 
					echo "
					<tr>
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'>". $registro["site_id"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'><a target='_blank' href='". $registro["refer_link"] ."'>". $registro["site_name"] ."</a></td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["site_money_unit"] ."". $registro["click_value"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["refer_earn_per"]*100 ."%</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["back_percent"]*100 ."%</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["site_money_unit"] ."". $registro["min_pay"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["site_pay_method"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'><font color='red'>". $registro["now_refer_number"] ."</font>/". $registro["max_refer_number"] ."</td>
					";
					?>
					  <td>
					  <a target="_blank" href="back_site_register.php?id=<?php echo $registro["site_id"] ?>">注册</a>
					  </td>
					  <td>
					  <a target="_blank" href="back_site_apply.php?id=<?php echo $registro["site_id"] ?>">登记</a>
					  </td>
					  <td>
					  <a target="_blank" href="site_payback_detail.php?id=<?php echo $registro["site_id"] ?>">收款返佣详情</a>
					  </td>
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