<?php



if ($_POST['username']) {





if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 




echo "<br><br>验证码有误。。。"; 



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


<div id="col-signup">
        <!-- Login -->
        <div id="signup">
          <h3>登陆易网赚</h3>
          <div class="in">


<form action='login.php' method='POST' onKeyUp="highlight(event)" onClick="highlight(event)">

<table class="nom">
				  <tr>
				    <td><label for="inp-user">用户名:</label></td>
				    <td ><input type='text' style="width: 100px;" size='10' maxlength='20' name='username' autocomplete="off" value="" /></td>
				  </tr>
				  <tr>
				    <td><label for="inp-pass" width="50">密码:</label></td>
					<td ><input type='password' style="width: 100px;" size='10' maxlength='20' name='password' autocomplete="off" value=""/></td>
				  </tr>
				  <tr>
				    <td><label for="inp-pass">验证码:</label></td>
				    <td ><input type='text' style="width: 100px;" size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value=""/></td>			  	
				  </tr>
				  <tr>
				  <td align="center" colspan='2'><img src="image.php?<?php echo $res; ?>" /></td>
				  </tr>
                <tr>
                  <td align="center" class="smaller"><input type="checkbox" name="" id="inp-remember" />
                    <label for="inp-remember" title="保存14天" class="help">记住登录</label></td>
                  <td class="t-right"><input type="image" value="提交登录" src="images/signup-button.gif"/></td>
                </tr>
				</table>
</form>
</div>
          <!-- /in -->
          <div class="in02">
            <ul class="nom">
              <li class="ico-reg" ><strong><a href="#">注册</a></strong></li>
              <li class="ico-send"><a href="recoverpwd.php" style="padding-right:8px;">忘记密码?</a></li>
            </ul>
          </div>
          <!-- /in02 -->
        </div>

        <hr class="noscreen" />
        <div id="signup-bottom"></div>

<?php
}
?>