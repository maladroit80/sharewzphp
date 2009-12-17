<?php 
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=members.php">
<?php
}
else{
include('header.php');
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
function change()
{
	var image=document.getElementById('securitycode');
	image.src=image.src+"?";
}
</script>

<div align="center"><div id="form">

<form action='login.php' method='POST' onKeyUp="highlight(event)" onClick="highlight(event)">

<table id="loginin" width="350" border="6" align="center" style="BORDER-RIGHT: lightsteelblue 2px solid; BORDER-TOP: lightsteelblue 2px solid; BORDER-LEFT: lightsteelblue 2px solid; BORDER-BOTTOM: lightsteelblue 2px solid;" cellSpacing=0 cellPadding=15 align=center>
  <tr>
    <td colspan="2" class="reg_table">欢迎登录易网赚</td>
  </tr>
  <!--<tr>
    <td colspan="2" class="reg_table"><span class="signintip" id="signintip"></span></td>
  </tr>-->
  <tr>
    <td width="150" align="right"><p><label>用户名 »</label></p></td>
    <td width="250" align="left"><input type='text' size='15' maxlength='25' name='username' id="uname" autocomplete="off"value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="right"><p><label>密码 »</label></p></td>
	<td width="250" align="left"><input type='password' size='15' maxlength='25' name='password' id="upsw" autocomplete="off" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="right"><p><label>验证码 »</label></p></td>
    <td width="250" align="left"><input type='text' size='4' maxlength='4' name='code' autocomplete="off"   id="seccode" class="securitycode" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td align="center" colspan='2'><img id="securitycode" src="image.php" /><a id="changimg" href="javascript:change()">看不清？</a></td>
  </tr>

  <tr align="center">
    <td width="250" colspan="2" align="center">
  <input type="image" src="./images/submit-button.gif" onclick="signinAjax();return false;"/>  
       <a href="recoverpwd.php">» 忘记密码?</a> 
	</td>
  </tr>
</table>
</form>
</div></div>



<?php include('footer.php');
}
?>