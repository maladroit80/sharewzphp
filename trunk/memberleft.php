<?php
require ('config.php');
$lole=$_COOKIE["usNick"];
$check_messages = mysql_query("SELECT * FROM tb_messenger WHERE sendto='$lole' and status='unread'");
$messages = mysql_num_rows($check_messages);
mysql_close($con);
?>
<?php include('memberstats.php')?>
    <table id="mem" width="200" style="border-bottom:1px solid #FC0;border-top:1px solid #FC0;border-right:1px solid #FC0;border-left:1px solid #FC0;border-collapse: collapse" bordercolor="#111111" cellpadding="0" cellspacing="0">
      <tr bgcolor="#E8E8E8">
        <td height="28"><div style="font-size: 18px">
          <div align="left"><span class="links" style="font-size: 16px"><a href="buxscript.php" class="title"><img src="images/icon_user.gif" width="16" height="16" align="absmiddle" /><span style="color: #687733; font-size: 14px">本站程序</span></a></span></div>
        </div>
        </td>
     </tr>
     <tr bgcolor="#E8E8E8">
        <td height="35"><div align="left"><a href="regads.php" class="title"><img src="images/icon_user.gif" width="16" height="16" align="absmiddle" /><span style="color: #687733">注册赚钱</span></a>
        </div></td>
        </tr>
   	 <tr bgcolor="#E8E8E8">
        <td height="35"><div align="left"><a href="myregads.php" class="title"><img src="images/icon_user.gif" width="16" height="16" align="absmiddle" /><span style="color: #687733">你的注册广告</span></a></div></td>
      </tr>
      <tr bgcolor="#E8E8E8">
        <td height="35" width="162"><p class="links" align="left"><a href="profile.php" class="title"><img src="images/icon_user.gif" width="16" height="16" align="absmiddle" /><span style="color: #687733">你的简历</span></a></p></td>
     	</tr>
      <tr bgcolor="#E8E8E8">
        <td height="35" width="162"><p class="links" align="left"> <a href="history.php" class="title"><img border="0" src="images/date.png" width="16" height="16" align="absmiddle" /><span style="color: #687733">你的历史</span></a></p></td>
      	</tr>
      <tr bgcolor="#E8E8E8">
        <td height="35" width="238" bgcolor="#E8E8E8"><p class="links" align="left"> <a href="messenger.php" class="title"><img border="0" src="images/email_delete.png" width="16" height="16" align="absmiddle" /><span style="color: #687733">你的消息 (<?php echo $messages ?>)</span></a></p></td>
      </tr>
      <tr bgcolor="#E8E8E8">
        <td height="35"><p class="links" align="left"> <a href="referals.php" class="title"><img border="0" src="images/database_gear.png" width="16" height="16" align="absmiddle" /><span style="color: #687733">你的下线</span></a></p></td>
        </tr>
      <tr bgcolor="#E8E8E8">
        <td height="35"><p class="links" align="left"> <a href="convert.php" class="title"><img border="0" src="images/cog_go.png" width="16" align="absmiddle" /><span style="color: #687733">转换现金</span></a></p></td>
        </tr>
      <tr bgcolor="#E8E8E8">
        <td height="35" bgcolor="#E8E8E8"><p class="links" align="left"> <a href="upgrade.php" class="title"><img border="0" src="images/coins_add.png" width="16" align="absmiddle" /><span style="color: #687733">升级会员</span></a></p></td>
      </tr>
      <tr bgcolor="#E8E8E8">
        <td height="35"><p class="links" align="left"> <a href="purchase.php" class="title"><img border="0" src="images/database_key.png" width="16" align="absmiddle" /><span style="color: #687733">购买下线</span></a></p></td>
        </tr>
      <tr bgcolor="#E8E8E8">
        <td height="35"><p class="links" align="left"> <a href="adver.php" class="title"><img border="0" src="images/transmit.png" width="16" align="absmiddle" /><span style="color: #687733">发布广告</span></a></p></td>
      	</tr>
      <tr bgcolor="#E8E8E8"> 
        <td height="35"><p class="links" align="left"> <a href="logout.php" class="title"><img border="0" src="images/lock_open.png" width="16" align="absmiddle" /><span style="color: #687733">退出</span></a></p></td>
        </tr>
    </table>