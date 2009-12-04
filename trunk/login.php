<?php
session_start();


if ($_POST['username']) {





if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 

 include('header.php'); 


echo "<br><br>验证码有误。。。"; 

include('footer.php');

exit();
}


//Comprobacion del envio del nombre de usuario y password
require('funciones.php');
$username=uc($_POST['username']);
$password=uc($_POST['password']);

if ($password==NULL) {
echo ("密码不能空");
}else{
require('config.php');
$query = mysql_query("SELECT username,password FROM tb_users WHERE username = '$username'") or die(mysql_error());
$data = mysql_fetch_array($query);
if($data['password'] != $password) {
$string="密码错误";

$out = iconv( "UTF-8", "gb2312" , $string); 
echo "<script language=javascript> alert('$out');   history.back();</script>";

}else{
$query = mysql_query("SELECT username,password FROM tb_users WHERE username = '$username'") or die(mysql_error());
$row = mysql_fetch_array($query);
mysql_close($con);
$nicke=$row['username'];
$passe=$row['password'];

//90 dias dura la cookie
setcookie("usNick",$nicke,time()+7776000);
setcookie("usPass",$passe,time()+7776000);


$lastlogdate=time();
$lastip = getRealIP();
require('config.php');
$querybt = "UPDATE tb_users SET lastlogdate='$lastlogdate', lastiplog='$lastip' WHERE username='$nicke'";
mysql_query($querybt) or die(mysql_error());
mysql_close($con);

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=members.php">

<?php
}
}
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

<div align="center"><div id="form">
<fieldset>
<legend>登录</legend>

<form action='login.php' method='POST' onKeyUp="highlight(event)" onClick="highlight(event)">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>» 用户名</label></p></td>
    <td width="250" align="left"><input type='text' size='15' maxlength='25' name='username' tooltipText= " 请输入您的用户名 ." autocomplete="off"value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 密码</label></p></td>
	<td width="250" align="left"><input type='password' size='15' maxlength='25' name='password' tooltipText= " 请输入您的密码  ." autocomplete="off" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 验证码 </label></p></td>
    <td width="250" align="left"><input type='text' size='4' maxlength='4' name='code' autocomplete="off"   tooltipText= " 请输入验证码  ." class="securitycode" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><div align="left">
  <input type="submit" value="提交" class="submit" tabindex="4" />
  <br>
  </p>
       <a href="recoverpwd.php">» 忘记密码?</a>
  
	</div></td>
  </tr>
</table>
</form>
</fieldset>
</div></div>



<?php include('footer.php'); ?><?php
}
?>