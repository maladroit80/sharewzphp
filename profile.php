<?
session_start();
?>
<? include('header.php'); ?>


<h3>
<img border="0" src="images/profile.jpg" width="74" height="65" align="absmiddle" ><span style="font-weight: bold">更新个人简历</span></h3>
<br>
<?



// incluimos archivos necesarios

require('config.php');

if (isset($_POST["password"])) {
 

if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
echo "验证码错误... ";include('footer.php'); exit();
}

// Declaramos las variables
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$email = $_POST["email"];
$pemail = $_POST["pemail"];
$country = $_POST["country"];


// comprobamos que no haya campos en blanco

if($password==NULL|$cpassword==NULL|$email==NULL|$pemail==NULL|$country==NULL) {
echo "所有地方都要填写.";
}else{


// sanitizamos las variables

$password = uc($password);
$cpassword = uc($cpassword);
$email = limpiar($email);
$pemail = limpiar($pemail);
$country = $country;


// limitamos el numero de caracteres

$password=limitatexto($password,15);
$cpassword=limitatexto($cpassword,15);
$email=limitatexto($email,100);
$pemail=limitatexto($pemail,100);
$country=limitatexto($country,15);


// comprobamos que tengan un minimo de caracteres

minimopass($password);


// ¿Coinciden las contraseñas?
if($password!=$cpassword) {
echo "密码不匹配";
}else{





// Comprobamos que sea un email valido
ValidaMail($email);




// Comprobamos que no se haya creado otra cuenta desde la misma ip

$laip = getRealIP();










$trok=uc($_COOKIE["usNick"]);

// Si todo parece correcto procedemos con la inserccion

$queryb = "UPDATE tb_users SET password='$password', ip='$laip', email='$email', pemail='$pemail', country='$country' WHERE username='$trok'";
mysql_query($queryb) or die(mysql_error());

echo "...";

?>
<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=logoutp.php">
<?

}


}

// En caso de no haber sido enviado los datos mostramos el formulario

}else{

$uzer=uc($_COOKIE["usNick"]);
$pazz=uc($_COOKIE["usPass"]);

$sql = "SELECT * FROM tb_users WHERE username='$uzer'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

if ($pazz != $row["password"]){ exit(); }


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

</script>




<div align="center"><div id="form">
<fieldset>
<legend>&nbsp;所有区域都需要填写&nbsp;</legend>



<form action="profile.php" method="POST" onKeyUp="highlight(event)" onClick="highlight(event)">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>» 密码</label></label></p></td>
    <td width="250" align="left"><input type="password" size="25" maxlength="15" name="password" value="<? echo $row["password"]; ?>" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 重复密码</label></p></td>
    <td width="250" align="left"><input type="password" size="25" maxlength="15" name="cpassword" value="<? echo $row["password"]; ?>" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 电子邮件</label></p></td>
    <td width="250" align="left"><input type="text" size="25" maxlength="100" name="email" value="<? echo $row["email"]; ?>" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 支付宝账户</label></p></td>
    <td width="250" align="left"><input type="text" size="25" maxlength="100" name="pemail" value="<? echo $row["pemail"]; ?>" class="field" value="" tabindex="1" /></td>
  </tr>
 <tr>
    <td width="150" align="left"><p><label>» 省份</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="country" autocomplete="off" class="field" value="<? echo $row["country"]; ?>" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 验证码 </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="提交" class="submit" tabindex="4" />
	</td>
  </tr>
</table>
</form>
</fieldset>
</div></div>

<?
}
mysql_close($con);
?>








		<!--footer starts here-->
<? include('footer.php'); ?>