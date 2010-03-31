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
					   <tr align="center"><td colspan="11"><?php echo date('Y') ?>年最佳国内注册网赚站点</td></tr>
                        <tr style="background-color:#D9EDff;" align="center">
                            <td class="width8">
                                站点ID
                            </td>
                            <td class="width12">
                                站点名
                            </td>
                            <td class="width8">
                                点击值
                            </td>
                            <td class="width4">
                                下线提成
                            </td>
                            <td class="width4">
                                返佣比例
                            </td>
                            <td class="width12">
                                起付/收款
                            </td>
                            <td class="width6">
                                下线数
                            </td>
                            <td class="width10">
                                站点状态
                            </td>
                            <td class="width6">
                                注册
                            </td>
                            <td class="width6">
                                登记
                            </td>
                            <td class="width12">
                                收款返佣详情
                            </td>
                        </tr> 		
					<?php
					$tabla = mysql_query("SELECT * FROM  tb_back_site where site_category='注册' and site_status!='停止' ORDER BY site_time desc"); 
					while ($registro = mysql_fetch_array($tabla)) { 
					echo "
					<tr>
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'>". $registro["site_id"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'><a target='_blank' href='". $registro["refer_link"] ."'>". $registro["site_name"] ."</a></td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["site_money_unit"] ."". $registro["click_value"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["refer_earn_per"]*100 ."%</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["back_percent"]*100 ."%</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["site_money_unit"] ."". $registro["min_pay"] ."/". $registro["site_pay_method"] ."</td>
					
					<td style='background-color: #FAFAFA;text-align:center;'><font color='red'>". $registro["now_refer_number"] ."</font>/". $registro["max_refer_number"] ."</td>";
					?>	
					<?php
					if($registro["site_status"]=='金钻推荐')
					{
					echo "
					<td style='background-color: #FAFAFA;text-align:center;color:red;'>". $registro["site_status"] ."</td>";}
					elseif($registro["site_status"]=='银钻推荐')
					{
					echo "
					<td style='background-color: #FAFAFA;text-align:center;color:#ff00ff;'>". $registro["site_status"] ."</td>";}
					elseif($registro["site_status"]=='铜钻推荐')
					{
					echo "
					<td style='background-color: #FAFAFA;text-align:center;color:#5f3300;'>". $registro["site_status"] ."</td>";}
					elseif($registro["site_status"]=='推荐')
					{
					echo "
					<td style='background-color: #FAFAFA;text-align:center;color:gray;'>". $registro["site_status"] ."</td>";}
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