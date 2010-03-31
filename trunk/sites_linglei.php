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
					   <tr align="center" style="border-bottom:1px solid rgb(255, 204, 0);"><td colspan="11"><?php echo date('Y') ?>年最佳调查网赚站点</td></tr>
                        <tr style="background-color:#D9EDff;" align="center">
                            <td class="width8">
                                站点ID
                            </td>
                            <td class="width10">
                                站点名
                            </td>
                            <td class="width4">
                                下线提成
                            </td>
                            <td class="width20">
                                站点介绍
                            </td>
                            <td class="width10">
                                站点状态
                            </td>
                            <td class="width6">
                                注册
                            </td>
                            <td class="width8">
                                教程
                            </td>
                            <td class="width10">
                                收款详情
                            </td>
                        </tr> 			
					<?php
					$tabla = mysql_query("SELECT * FROM  tb_back_site where site_status!='停止' and site_category='另类' or site_category='投资' or site_category='威客' or site_category='购物返利'  ORDER BY site_time desc"); 
					while ($registro = mysql_fetch_array($tabla)) { 
					echo "
					<tr>
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["site_id"] ."</td>"		
					?>		
					<?php
					if($registro["help_link"] !=null)
					echo "
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'><a target='_blank' href='". $registro["help_link"] ."'>". $registro["site_name"] ."</a></td>";
					else
					echo "
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'><a target='_blank' href='". $registro["refer_link"] ."'>". $registro["site_name"] ."</a></td>";
					?>
					<?php
					echo "
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["refer_earn_per"]*100 ."%</td>
					
					<td style='background-color: #FAFAFA;text-align:center;'>". $registro["site_comment"] ."</td>";
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
					  <td style="background-color: #FAFAFA;text-align:center;">
					  <a target="_blank" href="<?php echo $registro["refer_link"] ?>">注册</a>
					  </td>	
					<?php
					if($registro["help_link"] !=null)
					echo "
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'><a target='_blank' href='". $registro["help_link"] ."'>操作教程</a></td>";
					else
					echo "
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'>暂无</td>";
					?>
					  <td style="background-color: #FAFAFA;text-align:center;">
					  <a target="_blank" href="site_payback_detail.php?id=<?php echo $registro["site_id"] ?>">收款详情</a>
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