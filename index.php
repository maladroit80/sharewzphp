<?php include ('header.php') ?>
<!-- Page -->
<div id="page" class="box">
    <!-- Up Content -->
    <div class="box">
      <!-- col-1 -->
      <div id="col-l">
      	<div class="topleft" sytle="float:left;">
			<!--左上left table head-->      	
          <div class="title01338-top"></div>
		    <div class="title01338">
		      <div class="title01338-in">
		      	<p class="f-right noprint"><strong><a href="#" class="add">more...</a></strong></p>
		        <h3 class="ico-info">今日必做</h3>
		      </div>
		    </div>
		  <div class="title01338-bottom">
		  </div>
		  <!--/左上left table head-->  
		  <!--左上left table content-->  
		  <div class="topleftcontent">
		  <ul>
		  <li>test</li>
		  <li>test</li>
		  </ul>
		  </div>
		  <!--/左上left table content-->  
		  
      	</div>
      	<div class="topright" sytle="float:right">
      		<!--左上right table head-->  
          <div class="title01338-top"></div>
		    <div class="title01338">
		      <div class="title01338-in">
		      	<p class="f-right noprint"><strong><a href="#" class="add">马上发布</a></strong></p>
		        <h3 class="ico-info">发布广告</h3>
		      </div>
		    </div>
		  <div class="title01338-bottom"></div>
		  <!--/左上right table head-->  
		  <!--左上left table content-->  
		  <div class="toprightcontent">
		  <div style="margin-left:5px;margin-top:5px;margin-right:5px;margin-bottom:5px;">
		  <span class="words">
		  <font>◆</font>我们保证来自易网赚的点击是100%真实有效的:
		  <li><span>同用户同IP一天仅有一次有效点击</span></li>
		  <li><span>同IP只能注册一次，您可以亲自尝试</span></li>
		  <li><span>每次浏览停留30秒，只允许一个有效窗口</span></li>
		  <li><span>目前最完善的防作弊机制</span></li>
          <font>◆</font>点击，注册，页面广告等多种广告模式:
          <li><span>无需注册，多种广告价位便于您的选择</span></li>
		  <li><span>我们承诺广告提交24小时内处理</span></li>
		  <li><span>合理的页面广告布局使您的利益最大化&nbsp;&nbsp;&nbsp;<?php echo "<a href=\"adver.php?r=".$elref."\">";?>详细...</a></span></li></span>
          </div>
		  </div>
		  <!--/左上left table content--> 
      	</div>
      
      
        <div class="title01690-top" style="clear:both;"></div>
        <!--head down table head-->
        <div class="title01690">
          <div class="title01690-in">
            <p class="f-right noprint"><strong><a href="#" class="add">马上注册开始赚钱</a></strong></p>
            <h2 class="ico-list">如何在本站赚钱</h2>
          </div>
        </div>
        <!--/head down left table head-->
        
        
        <!--middle left table content-->
        <div class="box">
        <div style="margin-left:50px;margin-top:20px;margin-right:50px;">
          1.在<? include('sitename.php'); ?>,你可以通过浏览网站和完成任务赚钱．<br>
2.操作很简单，你不需要任何技术，你只需要浏览网站和完成简单任务．<br>
3.你可以通过推荐更多的人加入赚更多的钱，下线提成为<span style="color: #333333">50%</span>．<br>
4.我们通过支付宝支付会员，达到<? require ('config.php');
								$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result); echo $row["price"];
								mysql_close($con); ?>元就可以申请支付!<br>
5.升级<a href="upgrade.php" style="color: #333333">高级会员</a>享受100%的下线提成，同时赠送5个下线并享有优先支付权利.<br>
6.大量的忠实的会员得到了我们的付款<a href="payment_proof.php">点击这里看付款</a>.</p>
<p align="right"><?php echo "<a href=\"register.php?r=".$elref."\">";?>马上加入!</a></p>
        </div>
        </div>
        <!-- /middle left table content -->
        <hr class="noscreen" />
      </div>
      <!-- /col-1 -->
      <!-- col-signip --> 
      <div id="col-signup">
	      <?php include ('signup.php')?>    
        
    </div>
    <!-- /col-signip -->
    </div>    
    <!-- /Up Content -->
    <!-- down content -->
    <div>
    
    <div class="middleleft">
    
    <!--middle left table head-->
        <div class="title01690">
          <div class="title01690-in">
            <p class="f-right noprint"><strong><a href="#" class="add">马上注册开始赚钱</a></strong></p>
            <h2 class="ico-list">最新推荐信誉项目</h2>
          </div>
        </div>
    <!--/middle left table head-->
    <!--middle left table content-->
    	<div style="border:1px solid #FFCC00;height:92%;">
    	<ul>
		  <li>test</li>
		  <li>test</li>
		  </ul>
    	</div>
    <!--/middle left table content-->
    </div>
    
    <div class="middleright">
    
    <!--middle right table head-->
        <div class="title01200">
          <div class="title01200-in">
          <p class="f-right noprint"><strong><a href="#" class="add">更多</a></strong></p>
           <h2 class="ico-list">最新支付</h2>
          </div>
        </div>
    <!--/middle right table head-->
    	<div align="center" style="border:1px solid #FFCC00;height:92%;">
    	<table cellpadding="0">
			<tr>
			<th ><b>用户名</b></th>
			<th ><b>支付额</b></th>
			<th ><b>支付时间</b></th></tr>
			<?php
			require('config.php');
			$tabla = mysql_query("SELECT * FROM tb_history ORDER BY id ASC"); 
			mysql_close($con);
			while ($row = mysql_fetch_array($tabla)) {
			
			
			
			
			echo "<tr><td align='center'>";
			
			echo $row["user"];
			
			echo "</td><td align='center'>";
			
			echo $row["amount"];
			
			echo "</td><td align='center'>";
			
			echo substr($row["date"],2);
						
			echo "</td></tr>";
			
			}
			
			echo "</table>";
		?>
    	</div>
    </div>
    
    
    
    
    <div class="bot1">
    
    <!--bot1 table head-->
        <div class="title01225">
          <div class="title01225-in">
          <p class="f-right noprint"><strong><a href="#" class="add">更多</a></strong></p>
           <h2 class="ico-list">网赚心得</h2>
          </div>
        </div>
    <!--/bot1 table head-->
    
    </div>
    <div class="bot2">
    
    <!--bot2 table head-->
        <div class="title01225">
          <div class="title01225-in">
          <p class="f-right noprint"><strong><a href="#" class="add">更多</a></strong></p>
           <h2 class="ico-list">建站心得</h2>
          </div>
        </div>
    <!--/bot2 table head-->
    
    </div>
    <div class="bot3">
    
    <!--bot3 table head-->
        <div class="title01225">
          <div class="title01225-in">
          <p class="f-right noprint"><strong><a href="#" class="add">更多</a></strong></p>
           <h2 class="ico-list">待定模块</h2>
          </div>
        </div>
    <!--/bot3 table head-->
    
    </div>
    <div class="bot4">
    
    <!--bot4 table head-->
        <div class="title01200">
          <div class="title01200-in">
           <h2 class="ico-list">广告招商</h2>
          </div>
        </div>
    <!--/bot4 table head-->
    <ul id="weblinks">
	<li>
	<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > <B><a href="http://www.sharewz.cn" target="_blank">共享网赚网</a></B></li>
	<li>
	<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > <B><a href="buxscript.php" target="_blank">本站代码出售</a></B></li>
	<li>
	<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > <a href="http://www.sharewz.com" target="_blank"><strong>网赚指导</strong></a></li>
	<li>
	<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > <a href="http://shop34895911.taobao.com/" target="_blank"><strong>饰品店</strong></a></li>
	<li>
	<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > <a href="#">广告位2元/月</a></li>
	<li>
	<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > <a href="#">广告位2元/月</a></li>
	<li>
	<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > <a href="#">广告位2元/月</a></li>
	<li>
	<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > <a href="#">广告位2元/月</a></li>
	<li>
	<img border="0" src="images/bullet2.gif" width="7" height="7"  align="absmiddle" > <a href="#">广告位2元/月</a></li>
	</ul>
    </div>
    <div class="advbot1">广告位1(900*60px)</div>
    <div class="advbot2">广告位2(450*60px)</div>
    <div class="advbot3">广告位3(438*60px)</div>
    
    
    </div>
    <!-- /box -->
  </div>
<div class="friendlink">友情链接</div>
 <?php include('footer.php')?>
