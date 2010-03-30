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
      
      	<?php
			$id=$_GET["id"];
			$sitename=$_GET["sitename"];
			$backname=$_POST["backname"];
			$regtime = date("y-m-d H:i");
			$sql = mysql_query("select * from tb_back_site where site_id = '$id'");
			$result = mysql_fetch_array($sql);
			$refernumber = $result["now_refer_number"]+1;
    $sql1 = "UPDATE tb_back_site SET now_refer_number = '$refernumber' where site_id='$id'";
    mysql_query($sql1) or die(mysql_error());
			$query = "INSERT INTO tb_back_common (username, backname, site_id, site_name, last_click, pay_click, current_click, last_back, pay_back, current_back, site_reg_status, pay_status, back_time, site_reg_time)" .
					" VALUES( '$user', '$backname', '$id', '$sitename','0','0','0','0','0','0','等待登记', '成功返佣','$regtime','$regtime')";
			mysql_query($query) or die(mysql_error());
			
			echo "恭喜登记成功";
  		?>
  
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