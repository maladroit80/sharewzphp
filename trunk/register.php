<?php
session_start();
?>
<?php include('header.php'); ?>



<?php

if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{

?>

 <b><a href="logout.php">您已登陆，请安全退出再执行注册操作，或尝试刷新</a></b></br>
  
<input type="image" value="重新载入" onClick="window.location.reload()" src="images/reload-button.gif">

<?php include('footer.php'); ?>


<?php exit(); } ?>



<?php



// incluimos archivos necesarios

require('config.php');
//require('admin/funciones.php');

if (isset($_POST["username"])) {

if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){

echo "<br><br>验证码错误... ";

include('footer.php'); exit();
}


// Declaramos las variables

$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$email = $_POST["email"];
$cemail = $_POST["cemail"];
$pemail = $_POST["pemail"];


// comprobamos que no haya campos en blanco

if($username==NULL|$password==NULL|$cpassword==NULL|$email==NULL|$cemail==NULL|$pemail==NULL) {
echo "填写不完整";
}else{


// sanitizamos las variables

$username = uc($username);
$password = uc($password);
$cpassword = uc($cpassword);
$email = limpiar($email);
$cemail = limpiar($cemail);
$pemail = limpiar($pemail);



// limitamos el numero de caracteres

$username=limitatexto($username,15);
$password=limitatexto($password,15);
$cpassword=limitatexto($cpassword,15);
$email=limitatexto($email,100);
$cemail=limitatexto($cemail,100);
$pemail=limitatexto($pemail,100);



// comprobamos que tengan un minimo de caracteres

minimo($username);
minimopass($password);


// ¿Coinciden las contraseñas?
if($password!=$cpassword) {
echo "密码不正确";
}else{


// ¿Coinciden los emails?
if($email!=$cemail) {
echo "电子邮件有误";
}else{


// Comprobamos que sea un email valido
ValidaMail($email);





// Comprobamos que no se haya creado otra cuenta desde la misma ip

$laip = getRealIP();


if($laip!="127.0.0.1")
{

    $checkip = mysql_query("SELECT ip FROM tb_users WHERE ip='$laip'");
    $ip_exist = mysql_num_rows($checkip);

}

if ($ip_exist>0) {
echo "错误: 你已经创建了一个账户.";
}else{


// Comprobamos que el nombre de usuario, email y el email de paypal no existan

$checkuser = mysql_query("SELECT username FROM tb_users WHERE username='$username'");
$username_exist = mysql_num_rows($checkuser);

$checkemail = mysql_query("SELECT email FROM tb_users WHERE email='$email'");
$email_exist = mysql_num_rows($checkemail);

$checkpemail = mysql_query("SELECT pemail FROM tb_users WHERE pemail='$pemail'");
$pemail_exist = mysql_num_rows($checkpemail);

if ($email_exist>0|$username_exist>0) {
echo "电子邮件地址已存在.";
}else{

if ($pemail_exist>0) {
echo "你的支付宝已经存在.";
}else{


// Si se ha introducido un referer comprobamos que exista

if ($_POST["referer"] != "") {

// Sanitizamos la variable

$referer = limpiar($_POST["referer"]);
$referer=limitatexto($referer,15);

$checkref = mysql_query("SELECT username FROM tb_users WHERE username='$referer'");
$referer_exist = mysql_num_rows($checkref);

if ($referer_exist<1) {
// En caso de no existir el referer damos un mensaje de error
echo "错误，您的推荐人不存在"; include('footer.php');exit();
}else{
// Si todo parece correcto procedemos con la inserccion
      $sqlz = "SELECT * FROM tb_users WHERE username='$referer'";
      $resultz = mysql_query($sqlz);
      $myrowz = mysql_fetch_array($resultz);

$numero=$myrowz["referals"];

      $sqlex = "UPDATE tb_users SET referals='$numero' +1 WHERE username='$referer'";
      $resultex = mysql_query($sqlex);
}

}


// Si todo parece correcto procedemos con la inserccion

$joindate=time();
$password=passport_encrypt($password,$encryptkey);
$query = "INSERT INTO tb_users (username, password, ip, email, pemail, referer, joindate) VALUES('$username','$password','$laip','$email','$pemail','$referer','$joindate')";
mysql_query($query) or die(mysql_error());

echo "您已经正确注册 <b>$username</b>. 现在您可以 <a href=\"login.php\">登录</a>.";


}
}
}
}
}
}

// En caso de no haber sido enviado los datos mostramos el formulario

}else{

?>

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

//var name=document.getElementsByName("username")[0].value;
//var psw=document.getElementsByName("password")[0].value;
//var cpsw=document.getElementsByName("seccode")[0].value;
//var mail=document.getElementsByName("username")[0].value;
//var cmail=document.getElementsByName("password")[0].value;
//var paynum=document.getElementsByName("seccode")[0].value;
//var area=document.getElementsByName("username")[0].value;
//var psw=document.getElementsByName("password")[0].value;
//var code=document.getElementsByName("seccode")[0].value;

function verify(evt)
{
	var xmlHttp;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	  {
	   return;
	  }
	var e = window.event?window.event:evt;
	var element = e.srcElement?e.srcElement:e.target;
	if(element.name=="username"&&element.value!="")
	{
		var url="verify.php?regpage=true&username="+element.value;
		xmlHttp.open("POST",url,true);
		xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlHttp.onreadystatechange=stateChanged;
		xmlHttp.send(url);
	}
	else if(element.name=="password"&&element.value!="")
	{
		if(element.value.length<6)
		{
			var tip=document.getElementById("regtip");
			tip.innerHTML="密码长度不够，请加强.";
			tip.style.display="inline";
		}
		else
		{
			var tip=document.getElementById("regtip");
			tip.innerHTML="";
		}
	}
	else if(element.name=="cpassword"&&element.value!="")
	{
		if(element.value!=document.getElementsByName("password")[0].value)
		{
			var tip=document.getElementById("regtip");
			tip.innerHTML="两次密码不一致.";
		}
		else
		{
			var tip=document.getElementById("regtip");
			tip.innerHTML="";
		}
	}
	else if(element.name=="email"&&element.value!="")
	{
		var url="verify.php?regpage=true&email="+element.value;
		xmlHttp.open("POST",url,true);
		xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlHttp.onreadystatechange=stateChanged;
		xmlHttp.send(url);
	}
	else if(element.name=="cemail"&&element.value!="")
	{
		if(element.value!=document.getElementsByName("email")[0].value)
		{
			var tip=document.getElementById("regtip");
			tip.innerHTML="请填写正确的邮箱.";
		}
		else
		{
			var tip=document.getElementById("regtip");
			tip.innerHTML="";
		}
	}
	else if(element.name=="pemail"&&element.value!="")
	{
		var url="verify.php?regpage=true&pemail="+element.value;
		xmlHttp.open("POST",url,true);
		xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlHttp.onreadystatechange=stateChanged;
		xmlHttp.send(url);
	}
	else if(element.name=="referer"&&element.value!="")
	{
		var url="verify.php?regpage=true&referer="+element.value;
		xmlHttp.open("POST",url,true);
		xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlHttp.onreadystatechange=stateChanged;
		xmlHttp.send(url);
	}
}

function stateChanged()
{
if (xmlHttp.readyState==4)
{ 
	if(xmlHttp.responseText!="0")
	{
	var tip=document.getElementById("regtip");
	tip.innerHTML=xmlHttp.responseText;
	}
	else
	{
		var tip=document.getElementById("regtip");
	tip.innerHTML="";
	}
}
}

function GetXmlHttpObject()
{
   try
   {
  // Firefox, Opera 8.0+, Safari
      xmlHttp=new XMLHttpRequest();
   }
   catch (e)
   {
  // Internet Explorer
      try
      {
        xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
       catch (e)
      {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
       }
    }
   return xmlHttp;
}

</script>

<div align="middle">
<div class="reg_left">
265*540广告位
</div>
<div id="form" style="width:350px;float:left;margin-left:5px;">
<form action="register.php" method="POST" onKeyUp="highlight(event)" onClick="highlight(event)" id="registerform">


<table id="reg" width="350" border="0" align="left" style="border-bottom:solid 1px blue;border-right:solid 1px blue;border-top:solid 1px blue;border-left:solid 1px blue;">
  <tr>
    <td colspan="2" class="reg_table">欢迎注册易网赚</td>
  </tr>
    <tr>
    <td colspan="2"><label style="color:red;" id="regtip"></label></td>
  </tr>
  <tr>
    <td width="160" align="left"><p><label>» 用户名</label></p></td>
    <td width="80" align="left"><input type='text' maxlength='25' name='username' tooltipText="在本站独一无二的用户名" autocomplete="off" value="" tabindex="1" onblur="verify(event)" /></td>
  </tr>
  <tr>
    <td align="left"><p><label>» 密码</label></p></td>
	<td align="left"><input type="password"  maxlength="15" name="password" tooltipText= "密码必须６－３０位字符长度 ." autocomplete="off" class="field" value="" tabindex="1" onblur="verify(event)" /></td>
  </tr>
  <tr>
    <td  align="left"><p><label>» 重复密码</label></p></td>
	<td  align="left"><input type="password" maxlength="15" name="cpassword" tooltipText="验证密码" autocomplete="off" class="field" value="" tabindex="1" onblur="verify(event)" /></td>
  </tr>
  <tr>
    <td  align="left"><p><label>» 电子邮件</label></p></td>
	<td  align="left"><input type="text"  maxlength="100" name="email" tooltipText=" 输入一个有效的电子邮件地址. " autocomplete="off" class="field" value="" tabindex="1" onblur="verify(event)" /></td>
  </tr>
  <tr>
    <td  align="left"><p><label>» 重复电子邮件</label></p></td>
	<td  align="left"><input type="text"  maxlength="100" name="cemail" tooltipText=" 重复你的电子邮件" autocomplete="off" class="field" value="" tabindex="1" onblur="verify(event)" /></td>
  </tr>
  <tr>
    <td align="left"><p><label>» 支付宝帐号</label></p></td>
	<td  align="left"><input type="text"  maxlength="100" name="pemail" tooltipText="你收款的支付宝帐号" autocomplete="off" class="field" value="" tabindex="1" onblur="verify(event)"/></td>
  </tr>
  <tr>
    <td  align="left"><p><label>» 推荐人</label></p></td>
	<td  align="left"><input type="text"  tooltipText="推荐你的会员 " maxlength="15" name="referer" value="<?php echo limpiar($_GET["r"]); ?>" autocomplete="off" class="field" value="" tabindex="1" onblur="verify(event)" /></td>
  </tr>
  <tr>
    <td align="left"><p><label>» 服务条款</label></p></td>
	<td  align="left"><label class="inline" for="user_terms_of_use">我同意 <?php include('sitename.php'); ?> <a href="tos.php">的使用条例</a></label></td>
  </tr>
  <tr>
    <td  align="left"><p><label>» 验证码:</label></p></td>
	<td  align="left"><input type="text" maxlength="5" tooltipText=" 填入验证码 " name="code" autocomplete="off" class="securitycode" value="" tabindex="1" onblur="verify(event)" /></td>
  </tr>
  <tr>
    <td  align="left">&nbsp;</td>
    <td  align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>
  <tr>
    <td colspan="2" width="250" align="center"><input type="image" src="./images/submit-button.gif"/>
	</td>
  </tr>
</table>
</form>

</div>

<div class="reg_right">
265*540广告位
</div>
<div class="reg_bot">
900*120广告位
</div>
</div>

<?php
}
include('footer.php'); ?>