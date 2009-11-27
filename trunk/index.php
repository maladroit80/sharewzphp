<?php include ('header.php');

?>
<h3 style="font-family: Geneva, Arial, Helvetica, sans-serif; font-weight: bold">马上加入浏览网站和完成任务赚钱！</h3>

<p><img class="rimg-left" src="images/users.png" width="85" height="68" alt="Image" / align="absmiddle" >
在<?php include('sitename.php'); ?>
,你可以通过浏览网站和完成任务赚钱．操作很简单，你不需要任何技术，因为你只需要浏览我们提供的网站和完成一些简单的注册任务．你可以通过推荐更多的人加入赚更多的钱，下线提成为50%．我们通过支付宝支付会员，达到<span style="color: #0000FF"><? require ('config.php');
								$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result); echo $row["price"];
								mysql_close($con); ?>元</span>就可以申请支付!<span style="font-weight: bold; color: #FF0000">注意：7月1日前提供0.50元最低支付，7月1日后1.00元支付.<br>
<a href="payment_proof.php">最近付款图</a></span></p>
<p align="right"><?php echo "<a href=\"register.php?r=".$elref."\">";?>马上加入!</a></p>

<h3 style="font-family: Geneva, Arial, Helvetica, sans-serif; font-weight: bold">在这里发布点击广告和任务很便宜！</h3>

<p><img class="img-left" src="images/advertiser.jpg" width="85" height="68" alt="Image" / align="absmiddle" />在这里打广告给<? include('sitename.php'); ?>的会员浏览是很简单的．我们提供<? 
								require ('config.php');
								$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result); echo $row["price"]; mysql_close($con);?>元每<? require ('config.php');
							 	$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result);echo $row["howmany"]; mysql_close($con);?>次会员浏览的广告，并且每次浏览会持续30秒．当你提交广告代码后,我们会在24小时内处理您的广告．您想打广告并不需要<?php include ('sitename.php');?>的账户，你只要简单的填写表格并且支付广告费即可．我们不接受非法的、带有色情内容的和病毒的广告．</p>
<p align="right"><?php echo "<a href=\"adver.php?r=".$elref."\">";?>更多...</a></p>
<table width="598" border="0" cellpadding="2">
  <tr>
    <td width="151"><div align="center"><a href="contact.php">广告位招租</a></div></td>
    <td width="151"><div align="center"><a href="contact.php">广告位招租</a></div></td>
    <td width="151"><div align="center"><a href="contact.php">广告位招租</a></div></td>
    <td width="117"><div align="center"><a href="contact.php">广告位招租</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="contact.php">广告位招租</a></div></td>
  <td><div align="center"><a href="contact.php">广告位招租</a></div></td>
    <td><div align="center"><a href="contact.php">广告位招租</a></div></td>
    <td><div align="center"><a href="contact.php">广告位招租</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="contact.php">广告位招租</a></div></td>
  <td><div align="center"><a href="contact.php">广告位招租</a></div></td>
    <td><div align="center"><a href="contact.php">广告位招租</a></div></td>
    <td><div align="center"><a href="contact.php">广告位招租</a></div></td>
  </tr>
</table>
<p>    <?					require ('config.php');
					$sqlzdu = "SELECT * FROM tb_config WHERE item='referalclick' and howmany='1'";
					$resultzdu = mysql_query($sqlzdu);        
					$myrowzdu = mysql_fetch_array($resultzdu);
					$elprecioref=$myrowzdu["price"];

					$sqlzduz = "SELECT * FROM tb_config WHERE item='click' and howmany='1'";
					$resultzduz = mysql_query($sqlzduz);        
					$myrowzduz = mysql_fetch_array($resultzduz);
					$elprecioa=$myrowzduz["price"];

					$elprecio=$elprecioa*10;
					$cien=$elprecioref*100*10;
					$daily=$elprecio+$cien;
					$monthly=$daily*30;
					$yearly=$monthly*12;
					mysql_close($con);

				?>
    

    

</p>
<?php include ('footer.php'); ?>