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
					  <tr><td><?php 
								$id = $_GET["id"];
								$sql = mysql_query("SELECT * FROM  tb_back_site where site_id='$id'"); 
								$result = mysql_fetch_array($sql);
								?>
					  站点名称：<a target="_blank" href="<?php echo $result["refer_link"] ?>"><?php echo $result["site_name"] ?></a></td></tr>
                      <tr><td>注册链接：<a target="_blank" href="<?php echo $result["refer_link"] ?>"><?php echo $result["refer_link"] ?></a></td></tr>			
					<tr><td>温馨提示：<?php echo $result["site_comment"] ?></td></tr>
					<tr><td>点击值：<?php echo $result["site_money_unit"] ?><?php echo $result["click_value"] ?></td></tr>
					<tr><td>下线提成：<?php echo $result["refer_earn_per"]*100 ?>%</td></tr>
					<tr><td>返佣比例：<?php echo $result["back_percent"]*100 ?>%</td></tr>
					<tr><td>最低支付：<?php echo $result["site_money_unit"] ?><?php echo $result["min_pay"] ?>/<?php echo $result["site_pay_method"] ?></td></tr>
					<tr><td>登记返佣：<a target="_blank" href="back_site_apply.php?id=<?php echo $id ?>">点击登记</a></td></tr>
					<tr><td>查看返佣支付详情：<a target="_blank" href="site_payback_detail.php?id=<?php echo $id ?>">点击查看</a></td></tr>
					<tr><td>更新时间：<?php echo $result["site_time"] ?></td></tr>
					<tr><td>注册教程：
					<?php if($result["help_link"]!=null){echo "<a target='_blank' href=".$result["help_link"].">点击查看</a>";}
					else{echo "大家可以百度或google一下，很简单：站点名+注册教程，保管搜到！（仅作参考，注意上线）";} ?>
					</td></tr>
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