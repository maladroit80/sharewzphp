<?php include('header.php'); ?>
<?php
require ('config.php');
$lole=$_COOKIE["usNick"];
$check_messages = mysql_query("SELECT * FROM tb_messenger WHERE sendto='$lole' and status='unread'");
$messages = mysql_num_rows($check_messages);
mysql_close($con);
?>
<div class="mem_left">
<?php include('memberleft.php')?>
</div>
<div align="center">
    <table width="564" style="border-collapse: collapse" bordercolor="#111111" cellpadding="0" cellspacing="0">
      <tr bgcolor="#FFFFFF">
        <td colspan="3">
        <div align="center"><a href="http://www.sharewz.com/" target="_blank"><img src="images/yuming.gif" width="468" height="60" border="0" /></a></div></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td height="28">&nbsp;</td>
        <td height="28">&nbsp;</td>
        <td height="28">&nbsp;</td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td height="28" colspan="3"><div align="center"><a href="contact.php">黄金广告位50元/月</a></div></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td height="28">&nbsp;</td>
        <td height="28">&nbsp;</td>
        <td height="28">&nbsp;</td>
      </tr>
      <tr bgcolor="#E8E8E8">
        <td height="28"><div align="left" style="font-size: 18px">
          <div align="left"><span class="links" style="font-size: 16px"><a href="buxscript.php" class="title"><img src="images/icon_user.gif" width="16" align="absmiddle" /><span style="color: #0067E6; font-size: 14px">本站程序</span></a></span></div>
        </div></td>
        <td height="28"><div align="left"><a href="regads.php" class="title"><img src="images/icon_user.gif" width="16" align="absmiddle" /><span style="color: #0067E6">注册赚钱</span></a>
        </div></td>
        <td height="28"><div align="left"><a href="myregads.php" class="title"><img src="images/icon_user.gif" width="16" align="absmiddle" /><span style="color: #0067E6">你的注册广告</span></a></div></td>
      </tr>
      <tr bgcolor="#E8E8E8">
        <td width="162">          <p class="links" align="left"><a href="profile.php" class="title"><img src="images/icon_user.gif" width="16" align="absmiddle" /><span style="color: #0067E6">你的简历</span></a></p></td>
        <td width="162">          <p class="links" align="left"> <a href="history.php" class="title"><img border="0" src="images/date.png" width="16" align="absmiddle" /><span style="color: #0067E6">你的历史</span></a></p></td>
        <td width="238" bgcolor="#E8E8E8">          <p class="links" align="left"> <a href="messenger.php" class="title"><img border="0" src="images/email_delete.png" width="16" align="absmiddle" /><span style="color: #0067E6">你的消息 (<?php echo $messages ?>)</span></a></p></td>
      </tr>
      <tr bgcolor="#E8E8E8">
        <td>          <p class="links" align="left"> <a href="referals.php" class="title"><img border="0" src="images/database_gear.png" width="16" align="absmiddle" /><span style="color: #0067E6">你的下线</span></a></p></td>
        <td>          <p class="links" align="left"> <a href="convert.php" class="title"><img border="0" src="images/cog_go.png" width="16" align="absmiddle" /><span style="color: #0067E6">转换现金</span></a></p></td>
        <td bgcolor="#E8E8E8">          <p class="links" align="left"> <a href="upgrade.php" class="title"><img border="0" src="images/coins_add.png" width="16" align="absmiddle" /><span style="color: #0067E6">升级会员</span></a></p></td>
      </tr>
      <tr bgcolor="#E8E8E8">
        <td>          <p class="links" align="left"> <a href="purchase.php" class="title"><img border="0" src="images/database_key.png" width="16" align="absmiddle" /><span style="color: #0067E6">购买下线</span></a></p></td>
        <td>          <p class="links" align="left"> <a href="adver.php" class="title"><img border="0" src="images/transmit.png" width="16" align="absmiddle" /><span style="color: #0067E6">发布广告</span></a></p></td>
        <td>          <p class="links" align="left"> <a href="logout.php" class="title"><img border="0" src="images/lock_open.png" width="16" align="absmiddle" /><span style="color: #0067E6">退出</span></a></p></td>
        </tr>
      <tr>
        <td colspan="3">
         </td>
        </tr>
      <tr>
        <th colspan="4" class="top"></th>
      </tr>
    </table>
</div>




</div>
<?php include('footer.php'); ?>