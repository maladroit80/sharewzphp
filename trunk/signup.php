<?php require('config.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
$visit = $row["visits"];
$refer = $row["referals"];
$refervisit = $row["referalvisits"];
$money  = $row["money"];
$paid  =$row["paid"];
	echo "<div id='signup'>
          <h3>易网赚欢迎您归来</h3>
          <div class='in'>
            <table width='100%' class='nom'>
            <tr>
			<td nowrap>
			<img border='0' src='images/bullet2.gif' width='7' height='7'  align='absmiddle' > 广告点击</td>
			<td width='130'> $visit </td>
			</tr>
			<tr>
			<td>
			<img border='0' src='images/bullet2.gif' width='7' height='7'  align='absmiddle' > 下线个数</td>
			<td> $refer </td>
			</tr>
			<tr>
			<td>
			<img border='0' src='images/bullet2.gif' width='7' height='7'  align='absmiddle' > 下线点击</td>
			<td> $refervisit </td>
			</tr>
			<tr>
			<td>
			<img border='0' src='images/bullet2.gif' width='7' height='7'  align='absmiddle' > 帐户余额</td>
			<td> $money </td>
			</tr>
			<tr>
			<td>
			<img border='0' src='images/bullet2.gif' width='7' height='7'  align='absmiddle' > 总计支付</td>
			<td> $paid </td>
			</tr>			
			</table>
</div>
          <!-- /in -->
          <div class='in02'>
            <ul class='nom'>
               <li class='ico-upgrade' ><strong><a href='upgrade.php'>会员升级</a></strong></li>
              <li class='ico-link'><a href='addlink.php' style='padding-right:8px;'>我的链接</a></li>
            </ul>
          </div>
          <!-- /in02 -->
        </div>
        <hr class='noscreen' />
        <div id='signup-bottom' style='margin-bottom:16px;'></div>
";

}
else
{
?>




<script language="JavaScript1.2">


//Highlight form element- © Dynamic Drive (www.dynamicdrive.com)
//For full source code, 100's more DHTML scripts, and TOS,
//visit http://www.dynamicdrive.com

var highlightcolor="#eef4ff";

var ns6=document.getElementById&&!document.all;
var previous='';
var eventobj;

//Regular expression to highlight only form elements
var intended=/INPUT|TEXTAREA|SELECT|OPTION/;

//Function to check whether element clicked is form element
function checkel(which){
if (which.style&&intended.test(which.tagName)){
if (ns6&&eventobj.nodeType==3)
eventobj=eventobj.parentNode.parentNode;
return true;
}
else
return false;
}

//Function to highlight form element
function highlight(e){
eventobj=ns6? e.target : event.srcElement;
if (previous!=''){
if (checkel(previous))
previous.style.backgroundColor='';
previous=eventobj;
if (checkel(eventobj))
eventobj.style.backgroundColor=highlightcolor;
}
else{
if (checkel(eventobj))
eventobj.style.backgroundColor=highlightcolor;
previous=eventobj;
}
}

</script>
<script type="text/javascript">
function change()
{
	var image=document.getElementById('securitycode');
	image.src=image.src+"?";
}
</script>
        <!-- Login -->
        <div id="signup">
          <h3>登陆易网赚<span class="signintip" id="signintip">&nbsp;&nbsp;&nbsp;&nbsp;欢迎登陆网赚网</span></h3>
          <div class="in">


<form action='login.php' method='POST' onKeyUp="highlight(event)" onClick="highlight(event)" id="signupform">

<table class="nom" id="signuptable">
				  <tr>
				    <td><label>用户名:</label></td>
				    <td ><input type='text' style="width: 90px;" size='10' maxlength='20' name='username' value="" id="uname" /></td>
				  </tr>
				  <tr>
				    <td><label>密码:</label></td>
					<td ><input type='password' style="width: 90px;" size='10' maxlength='20' name='password' autocomplete="off" value="" id="upsw"/></td>
				  </tr>
				  <tr>
				    <td><label>验证码:</label></td>
				    <td ><input type='text' style="width: 50px;" size='4' maxlength='4' name='code' class="securitycode" autocomplete="off" value="" id="seccode"/></td>			  	
				  </tr>
				  <tr>
				  <td align="center" colspan='2'><img id="securitycode" src="image.php" /><a id="changimg" href="javascript:change()">看不清？</a></td>
				  </tr>
                <tr>
                  <td align="center" class="smaller"><input type="checkbox" name="" id="inp-remember" />
                    <label for="inp-remember" title="保存14天" class="help">记住登录</label></td>
                  <td class="t-right"><input type="image" src="./images/signup-button.gif" onclick="signinAjax();return false;"/></td>
                </tr>
				</table>
</form>
</div>
          <!-- /in -->
          <div class="in02">
            <ul class="nom">
              <li class="ico-reg" ><strong><a href="register.php">注册</a></strong></li>
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
          <?php include ('sitestats.php') 
          ?>