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
					  <a target="_blank" href="<?php echo $result["refer_link"] ?>"><?php echo $result["site_name"] ?></a>返佣登记</td></tr>
                      
					<tr><td>点击值：<?php echo $result["site_money_unit"] ?><?php echo $result["click_value"] ?></td></tr>
					<tr><td>下线提成：<?php echo $result["refer_earn_per"]*100 ?>%</td></tr>
					<tr><td>返佣比例：<?php echo $result["back_percent"]*100 ?>%</td></tr>
					
					<tr><td>登记注意：注册用户名是指注册本项目时的用户名，而不是注册共享网赚网的用户名</td></tr>
					
					<tr>
					<form method="post" action="backsite_apply_access.php?&id=<?php echo $id ?>&sitename=<?php echo $result["site_name"]?>&option=apply">
					<td>注册用户名：
					<input type="text" name="backname">
					<input type="submit" value="提交" class="button">
					</td>
					</form></tr>
					<?php
					$tabla = mysql_query("SELECT * FROM  tb_back_common where site_id = '$id' and site_reg_status ='成功登记' ORDER BY site_reg_time desc"); 
					$registro = mysql_fetch_array($tabla);
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