<?php
session_start();

if ($_POST['email']) {

require('config.php');

session_start(); 
if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
	
include('header.php');

echo "<br><br>验证码错误... ";
include('footer.php');
exit();
}


//Comprobacion del envio del nombre de usuario y password
function limpiar($mensaje)
{
$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;
}
$email=limpiar($_POST['email']);

$checkpemail = mysql_query("SELECT * FROM tb_users WHERE email='$email'");
$pemail_exist = mysql_num_rows($checkpemail);

if ($pemail_exist<1) {
echo "邮件地址不存在.";
include('header.php');

echo "<br><br>邮件地址不存在.";
include('footer.php');
exit();
}

$sqle = "SELECT * FROM tb_users WHERE email='$email'";
$resulte = mysql_query($sqle);        
$rowe = mysql_fetch_array($resulte);

$elpass=$rowe["password"];
$eluser=$rowe["username"];

$dia=date("m.d.Y");
$hora=date("H:i:s");
$destinatari=$email;
$subject= "Your lost password";
$desde = 'From: recover@password.com';
$contingut = "
Username: $eluser\n
Password: $elpass\n
";
mail($destinatari, $subject, $contingut, $desde);


?>

<?php


}else{
?>



<?php include('header.php'); ?>
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





<h3 style="font-weight: bold">忘记密码</h3>
<br>

<div align="center"><div id="form">
<fieldset>
<legend>&nbsp;找回密码&nbsp;</legend>
<form action='recoverpwd.php' method='POST'onKeyUp="highlight(event)" onClick="highlight(event)">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p>
      <label>» 你的电子邮件</label>
    </p></td>
    <td width="250" align="left"><input type='text' size='15' maxlength='50' name='email' autocomplete="off" class="field" value="" tabindex="1" /></p>

</td>
  </tr>
  <tr>
    <td width="150" align="left"><p>
      <label>» 验证码</label>
    </p></td>
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




		<!--footer starts here-->
<?php include('footer.php'); ?>
<?php
}
?>