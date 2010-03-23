<?php
require("config.php");
$lole=$_COOKIE["usNick"];
$check_messages = mysql_query("SELECT * FROM tb_messenger WHERE sendto='$lole' and status='unread'");
$messages = mysql_num_rows($check_messages);
mysql_close($con);
?>
<?php include('memberstats.php')?>
	<div class="channel">	
	<ul>
	<li><a href="buxscript.php" >本站程序</a></li>
	<li><a href="regads.php" >注册赚钱</a></li>
	<li><a href="myregads.php">你的注册广告</a></li>
	<li><a href="profile.php" >你的简历</a></li>
	<li><a href="history.php" >你的历史</a></li>
	<li><a href="messenger.php" >你的消息 (<?php echo $messages ?>)</a></li>
	<li><a href="referals.php" >你的下线</a></li>
	<li><a href="convert.php" >转换现金</a></li>
	<li><a href="upgrade.php" >升级会员</a></li>
	<li><a href="purchase.php" >购买下线</a></li>
	<li><a href="addlink.php" >收藏链接</a></li>
	<li><a href="adver.php" >发布广告</a></li>
	<li><a href="myarticle.php" >我的文章</a></li>
	<li><a href="logout.php" >退出</a></li>
	</ul>
	
	</div>
  