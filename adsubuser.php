<?php session_start(); ?>
<?php include('header.php'); ?>
        <!-- Pagetitle -->
        <br>
        <h3>
<img border="0" src="images/orders.gif" align="absmiddle" width="32" height="32"> <span style="font-weight: bold">在
<a href="index.php"><?php include('sitename.php'); ?></a>
发布下线链接</span></h3>
<br>
<?php 
if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    echo "<h2>注册用户才能提交任务广告，请<a href='login.php'>登陆</a>或<a href='register.php'>注册</a></h2>";
    exit();
}
		$owner=uc($_COOKIE["usNick"]);
		if (isset($_POST["paypal"]))
		{
			
				require('config.php');
			    if( strtolower($_POST['code'])!= strtolower($_SESSION['texto']))
				{
					echo "验证码错误 <br>
					
					";
					
					 include('footer.php');
					exit();
				}
			
			
				$paypal=$_POST["paypal"];
				$url=$_POST["url"];
				$instruction=$_POST["instruction"];
				$adname=$_POST["adname"];
				$adnum=$_POST["adnum"];
				$value=$_POST["value"];

			
			if($adnum==""||$value==""||$paypal==""||$owner==""||$url==""||$instruction=="")
			{
				echo "信息不全，为了您的广告利益，请<a href='adsignup.php'>返回</a>完善您的信息。";
				include('footer.php');
				exit();
			}
			if($value<0.1)
			{
				echo "任务奖励单价过低，请<a href='adsignup.php'>返回</a>修改。";
				include('footer.php');
				exit();
			}			
				require ('config.php');
				$status="subno";
				$query = "INSERT INTO tb_signupads (owner, paypal, adname, url, adnum, value, instruction, status, allnum) VALUES( '$owner', '$paypal', '$adname', '$url', '$adnum', '$value', '$instruction', '$status','$adnum')";
				mysql_query($query) or die(mysql_error());				
				$precio=$adnum*$value*1.2;
				if ($precio>0)
				{
				?>
				您的订购已提交， 在我们允许你的广告之前，你必须通过支付宝给本站付款 <?php
				echo $precio;
				?> 元.
			
			<br>
			<div align="center">
			  <table width="397" border="0" cellpadding="3" cellspacing="1" bordercolor="#009900" bgcolor="#009900">
                <tr>
                  <td width="391" bgcolor="#FFFFFF"><div align="center">
                      <p>本站支付宝：
                          <?php include('paypal.php'); ?>
                      </p>
                  </div></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><div align="center">
                      <p style="color: #FF0000; font-weight: bold"><a href="https://www.alipay.com/" target="_blank"><img src="images/alipay.gif" width="254" height="43" border="1" /></a></p>
                      <p style="color: #FF0000; font-weight: bold"><a href="https://www.alipay.com/" target="_blank">支付宝安全支付</a></p>
                  </div></td>
                </tr>
              </table>
			</div>
			<?php
			}
			?>
			
					<!--footer starts here-->
			<?php include('footer.php'); ?>
			<?php
			exit();
			}
		?>







<ul><li>请准确填写您的推广网站提供给您的下线链接,如有错误,请联系我们,但对此造成的后果我们概不负责.</li>
<li>当您为您发布的下线链接支付了广告费用,我们将激活您的广告,会员就可以注册您的下线链接.</li>
<li>我们提供的注册广告订购数量最少20个,会员完成任务奖励单价自定,最低0.1元,特惠广告总费用:数量*单价*1.2.</li>
<li>会员提交虚假注册,广告主可以拒绝会员的任务奖励申请,会员作弊3次即被删除帐号.</li>
<li>会员完成注册但是申请奖励被拒绝的情况,可向管理员投诉,广告主恶意拒绝3次我们有权取消该广告.</li>
<li>广告提交以后,广告主可以去“我的账户->注册广告”中查看广告状态及对我们会员注册的有效性进行验证.</li>
<li>为保证您的下线的活跃性,请详细填写您推广的网站信息.</li>
</ul>
<script language="JavaScript1.2">

//Highlight form element- © Dynamic Drive (www.dynamicdrive.com)
//For full source code, 100's more DHTML scripts, and TOS,
//visit http://www.dynamicdrive.com

var highlightcolor="lightyellow"

var ns6=document.getElementById&&!document.all
var previous=''
var eventobj

//Regular expression to highlight only form elements
var intended=/INPUT|TEXTAREA|SELECT|OPTION/

//Function to check whether element clicked is form element
function checkel(which){
if (which.style&&intended.test(which.tagName)){
if (ns6&&eventobj.nodeType==3)
eventobj=eventobj.parentNode.parentNode
return true
}
else
return false
}

//Function to highlight form element
function highlight(e){
eventobj=ns6? e.target : event.srcElement
if (previous!=''){
if (checkel(previous))
previous.style.backgroundColor=''
previous=eventobj
if (checkel(eventobj))
eventobj.style.backgroundColor=highlightcolor
}
else{
if (checkel(eventobj))
eventobj.style.backgroundColor=highlightcolor
previous=eventobj
}
}
function change()
{
	var image=document.getElementById('securitycode');
	image.src=image.src+"?";
}
</script>





<div align="center"><div id="form"onKeyUp="highlight(event)" onClick="highlight(event)">

<form method="post" action="adsignup.php">

<table border="0" align="left" style="margin-left:15px; BORDER-RIGHT:1px solid; BORDER-TOP:  1px solid; BORDER-LEFT: 1px solid; BORDER-BOTTOM:  1px solid;">
  <tr>
    <td colspan="2" align="left" class="reg_table">下线推广任务</td>
  </tr>
  <tr>
    <td width="150" align="left">» 支付宝账户 </td>
    <td width="250" align="left"><input type="text" name="paypal" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 推广网站名称</label></p></td>
    <td width="250" align="left"><input type="text" name="adname" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 您的下线链接</label></p></td>
    <td width="250" align="left"><input type="text" name="url" size="25" maxlength="150" autocomplete="off" class="field" value="http://" tabindex="3"/></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 广告数量</label></p></td>
    <td width="250" align="left"><select name="adnum">
	<option value="50" selected>50个会员任务</option>
	<option value="100">100个会员任务</option>
	<option value="200">200个会员任务</option>
	<option value="500">500个会员任务</option>
  </select></td>
  </tr>
<tr>
    <td width="150" align="left"><p><label>» 单个价值</label></p></td>
    <td width="250" align="left"><input type="text" name="value" size="25" maxlength="3" autocomplete="off" class="field" tabindex="3"/></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 站点介绍（可参考您推广的网站）</label></p></td>
    <td width="250" align="left"><textarea name="instruction" cols="40" rows="5" id="instruction" autocomplete="off"></textarea></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 验证码 </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="6" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img id="securitycode" src="image.php?<?php echo $res; ?>" /><a id="changimg" href="javascript:change()">看不清？</a></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="center"><input type="submit" value="提交" class="submit" tabindex="6" />
	</td>
  </tr>
</table>
</form>
</div></div>




		<!--footer starts here-->
<?php include('footer.php'); ?>