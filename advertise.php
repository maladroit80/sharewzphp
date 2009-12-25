<?php session_start(); ?>


<?php include('header.php'); ?>
        <!-- Pagetitle -->
        <br>
        <h3>
<img border="0" src="images/orders.gif" align="absmiddle" width="32" height="32"><span style="font-weight: bold">在
<?php include('sitename.php'); ?>
上投放点击广告</span></h3>
<br>

<?php

if (isset($_POST["pemail"])) 
{

  	require('config.php');


	if( strtolower($_POST['code'])!= strtolower($_SESSION['texto']))
	{
		echo "SECURITY CODE ERROR... <br>

		";

 		include('footer.php');
		exit();
	}

// funcion para sanitizar variables
	function limpiarez($mensaje)
	{
	$mensaje = htmlentities(stripslashes(trim($mensaje)));
	$mensaje = str_replace("'"," ",$mensaje);
	$mensaje = str_replace(";"," ",$mensaje);
	$mensaje = str_replace("$"," ",$mensaje);
	return $mensaje;
	}


// ip real
	function getRealIPe()
	{
	
	   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
	   {
		  $client_ip =
			 ( !empty($_SERVER['REMOTE_ADDR']) ) ?
				$_SERVER['REMOTE_ADDR']
				:
				( ( !empty($_ENV['REMOTE_ADDR']) ) ?
				   $_ENV['REMOTE_ADDR']
				   :
				   "unknown" );
	
		  // los proxys van añadiendo al final de esta cabecera
		  // las direcciones ip que van "ocultando". Para localizar la ip real
		  // del usuario se comienza a mirar por el principio hasta encontrar
		  // una dirección ip que no sea del rango privado. En caso de no
		  // encontrarse ninguna se toma como valor el REMOTE_ADDR
	
		  $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
	
		  reset($entries);
		  while (list(, $entry) = each($entries))
		  {
			 $entry = trim($entry);
			 if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
			 {
				// http://www.faqs.org/rfcs/rfc1918.html
				$private_ip = array(
					  '/^0\./',
					  '/^127\.0\.0\.1/',
					  '/^192\.168\..*/',
					  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
					  '/^10\..*/');
	
				$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
	
				if ($client_ip != $found_ip)
				{
				   $client_ip = $found_ip;
				   break;
				}
			 }
		  }
	   }
	   else
	   {
		  $client_ip =
			 ( !empty($_SERVER['REMOTE_ADDR']) ) ?
				$_SERVER['REMOTE_ADDR']
				:
				( ( !empty($_ENV['REMOTE_ADDR']) ) ?
				   $_ENV['REMOTE_ADDR']
				   :
				   "unknown" );
	   }
	
	   return $client_ip;
	
	}



$pemail=$_POST["pemail"];
$plan=$_POST["plan"];
$url=$_POST["url"];
$description=$_POST["description"];
$bold=$_POST["bold"];
$highlight=$_POST["highlight"];

if ($pemail==""){echo "Error"; exit();}
if ($plan==""){echo "Error"; exit();}
if ($url==""){echo "Error"; exit();}
if ($description==""){echo "Error"; exit();}


$laip = getRealIPe();

require ('config.php');
$query = "INSERT INTO tb_advertisers (pemail, plan, url, description, category, ip, bold, highlight) VALUES('$pemail','$plan','$url','$description','$category','$laip','$bold','$highlight')";
mysql_query($query) or die(mysql_error());


$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];
$wop1=$row["bold"];
$wop2=$row["highlight"];

if ($plan==$wop){

?>

<?php

$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>
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
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='2000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?php
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>

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
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='3000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?php
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>
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
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='5000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?php
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>
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
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='10000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?php
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>
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
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='500'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?php
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>
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
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='20000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?php
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>
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
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='30000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?php
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>
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
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='50000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?php
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>
您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>
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
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='100000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?php
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

您的订购已提交， 在我们允许你广告之前，你必须通过支付宝给本站付款
<?php
				echo $precio;
				?>
元. <br>
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
</font>

		<!--footer starts here-->
<?php include('footer.php'); ?>
<?php
exit();
}
?>


<ul><li>我们提供<?php include('config.php');
		$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);

 echo $row["price"]; ?>元每<?php
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);
echo $row["howmany"];

?> 次会员浏览您的广告，且每次浏览最少持续30秒钟.</li>
<li>站外的浏览是没有限制的，我们将在24小时内激活您投放的广告.</li>
<li>禁止发布含有色情、暴力、政治、宗教等非法广告，禁止插入各种病毒、跳转代码等</li>
<li>如果您的网页存在禁止iframe的脚本，请一定去掉，否则将造成您的广告可重复点击</li>
<li>每天的点击是唯一的，每个会员24小时内只能浏览您的广告一次.
</ul>
<br>

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
<fieldset><legend>&nbsp;在<?php include('sitename.php');?>投放广告&nbsp;</legend>

<form method="post" action="advertise.php">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>» 支付宝帐号 </label></p></td>
    <td width="250" align="left"><input type="text" name="pemail" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 广告文字描述</label></p></td>
    <td width="250" align="left"><input type="text" name="description" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 广告链接</label></p></td>
    <td width="250" align="left"><input type="text" name="url" size="25" maxlength="150" autocomplete="off" class="field" value="http://" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 选择一个计划</label></p></td>
<td width="250" align="left"><select name="plan" class="combo" tabindex="4" />

<option value="<?php
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='500'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>


<option value="<?php

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>
<option value="<?php

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='2000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>
<option value="<?php

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='3000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>
<option value="<?php

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='5000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>
<option value="<?php

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='10000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>







<option value="<?php

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='20000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>

<option value="<?php

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='30000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>

<option value="<?php

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='50000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>

<option value="<?php

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='100000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);
echo $row["howmany"];

?>"><?php echo $row["howmany"] ?> 次会员浏览<?php echo $row["price"] ?>元</option>

</select></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 验证码 </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="5" /></td>
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
</fieldset>
</div></div>




		<!--footer starts here-->
<?php include('footer.php'); ?>