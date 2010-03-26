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
	<li><a href="buxscript.php" >国内点击赚钱</a></li>
	<li><a href="regads.php" >国外点击赚钱</a></li>
	<li><a href="myregads.php">注册赚钱</a></li>
	<li><a href="myregads.php">调查赚钱</a></li>
	<li><a href="profile.php" >投票赚钱</a></li>
	<li><a href="history.php" >冲浪赚钱</a></li>
	<li><a href="messenger.php" >投资赚钱</a></li>
	<li><a href="referals.php" >购物返利</a></li>
	<li><a href="convert.php" >威客赚钱</a></li>
	<li><a href="upgrade.php" >另类赚钱</a></li>
	</ul>
	
  <hr width="100!"! size="2">
  
  
	<ul>
	<li><a href="purchase.php" >购买下线</a></li>
	<li><a href="addlink.php" >收藏链接</a></li>
	<li><a href="adver.php" >发布广告</a></li>
	<li><a href="myarticle.php" >我的文章</a></li>
	<li><a href="logout.php" >退出</a></li>
	</ul>
	</div>
  