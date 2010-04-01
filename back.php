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
      <tr bgcolor="#FFFFFF">
        <td colspan="5" height="">
		   	<div class="sitestatus">
		    
		    <!--bot1 table head-->
		        <div class="title01225">
		          <div class="title01225-in">
		           <h2 class="ico-list">站点状态</h2>
		          </div>
		        </div>
		    <!--/bot1 table head-->
		    	<div id="back_sitestatus">
				  <table width="100%">
				    <tr>
				      <td>最低支付</td>
				    </tr>
				    <tr>
				      <td><font color="blue"><?php include('config.php');
								$result =mysql_query("SELECT * FROM tb_common WHERE itemid='leastpay'");
								$row = mysql_fetch_array($result); echo $row["value"];?>&nbsp;元</font></td>
				    </tr>
				    <tr>
				      <td>有效站点数量</td>
				    </tr>
				    <tr>
				      <td><font color="blue"><?php include('config.php');
								$result =mysql_query("SELECT * FROM tb_back_site WHERE site_status!='停止'");
								$row = mysql_num_rows($result); echo $row; ?>&nbsp;个</font></td>
				    </tr>
				    <tr>
				      <td>返佣支付总额</td>
				    </tr>   
				    <tr>
				      <td><font color="blue"><?php include('config.php');
								$result =mysql_query("SELECT sum(all_back_sum) FROM tb_back_account");
								$row = mysql_fetch_array($result); 
								$sum = number_format($row[0], 2);
								echo $sum;?>&nbsp;元</font></td>
				    </tr> 
				    <tr>
				      <td>支付次数</td>
				    </tr>   
				    <tr>
				      <td><font color="blue"><?php include('config.php');
								$result =mysql_query("SELECT max(pay_number) FROM tb_backpay_history");
								$row = mysql_fetch_array($result); 
								echo $row[0]; ?>&nbsp;次</font></td>
				    </tr>  
				    <tr>
				      <td>返佣次数</td>
				    </tr>   
				    <tr>
				      <td><font color="blue"><?php include('config.php');
								$result =mysql_query("SELECT max(back_pay_number) FROM tb_back_account");
								$row = mysql_fetch_array($result); 
								echo $row[0];
								 ?>&nbsp;次</font></td>
				    </tr>     
				  </table>
				</div>
		    </div>
        	<div class="paid">
    
		    <!--bot1 table head-->
		        <div class="title01225">
		          <div class="title01225-in">
		          <p class="f-right noprint"><strong><a href="backpay_all.php" class="add">更多</a></strong></p>
		           <h2 class="ico-list">最新支付</h2>
		          </div>
		        </div>
		    <!--/bot1 table head-->
    			
		    	<div id="back_paid">
				
					  <table>
					  
					<th>用户名</th>
					<th>金额</th>
					<th>时间</th> 			
					<?php
					
					$tabla = mysql_query("SELECT * FROM tb_backpay_history ORDER BY pay_time desc"); 
					while ($registro = mysql_fetch_array($tabla)) { 
					$temptime = $registro["pay_time"];
					$backtime = explode(" ", $temptime);
					echo "
					<tr align='center'>
					<td><font color='blue'>". $registro["username"] ."</font></td>
					<td>". $registro["pay_sum"] ."&nbsp;元</td>
					<td>". $backtime[0] ."</td>
					</tr>";
					?>
					  
					<?php
					} // fin del bucle de ordenes
					?>
					</table>
  
		    	</div>
    		</div>
	        <div class="back">
	    
		    <!--bot1 table head-->
		        <div class="title01225">
		          <div class="title01225-in">
		          <p class="f-right noprint"><strong><a href="back_all.php" class="add">更多</a></strong></p>
		           <h2 class="ico-list">最新返佣</h2>
		          </div>
		        </div>
		    <!--/bot1 table head-->
	    			<div id="back_paid">
				
					  <table>
					  
					<th>用户名</th>
					<th>金额</th>
					<th>时间</th> 			
					<?php
					
					$tabla = mysql_query("SELECT * FROM tb_back_history ORDER BY time desc"); 
					while ($registro = mysql_fetch_array($tabla)) { 
					$temptime = $registro["time"];
					$backtime = explode(" ", $temptime);
					echo "
					<tr align='center'>
					<td><font color='blue'>". $registro["username"] ."</font></td>
					<td>". $registro["pay_sum"] ."&nbsp;元</td>
					<td>". $backtime[0] ."</td>
					</tr>";
					?>
					  
					<?php
					} // fin del bucle de ordenes
					?>
					</table>
					  
							    	</div>
	    	</div>
    	</td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td height="28" colspan="5"><div align="center"><a href="contact.php">黄金广告位50元/月</a></div></td>
      </tr>
      <!--<tr><td colspan="5">
      <table style="width:100%;">
      <tr bgcolor="#FFFFFF" id="sitemenu">
		<td><a href="sites_click_rank.php" >累计点击排名</a></td>
		<td><a href="sites_bac_krank.php" >累计返佣排名</a></td>
		<td colspan="2"><a href="sites_number_rank.php" >登记返佣站点数量排名</a></td>
      </tr></table>
      </td></tr>-->
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