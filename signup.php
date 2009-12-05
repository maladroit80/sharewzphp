<?php
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{
	echo "<div style='border:1px solid #FFCC00;height:228px;'>11111111</div>
	
	
	
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

<script type="text/javascript" language="javascript">

function signinAjax()
{
 var tip=document.getElementById("signintip");
 var name=document.getElementById("uname").value;
 var psw=document.getElementById("upsw").value;
 var code=document.getElementById("seccode").value;
 if(name=="")
 {
   tip.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;用户名？";
   tip.style.display="inline";
   return;
 }
 if(psw=="")
 {
   tip.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;密码？";
   tip.style.display="inline";
   return;
 }
 if(code=="")
 {
   tip.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;请填写验证码";
   tip.style.display="inline";
    return;
 }

 var xmlHttp;
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
   document.getElementById("btnsub").submit();
   return;
  }
var url="verify.php?name="+name+"&psw="+psw+"&code="+code;
xmlHttp.open("POST",url,true);
xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xmlHttp.onreadystatechange=stateChanged; 
xmlHttp.send(url);
}


function stateChanged()
{
var tip=document.getElementById("signintip");
if (xmlHttp.readyState==4)
{ 
   if(xmlHttp.responseText=="9")
   {
      window.location.reload();
   }
   if(xmlHttp.responseText=="1")
   {
      tip.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;用户名密码错误";
      var image=document.getElementById('securitycode');
      image.src=image.src+'?';
      tip.style.display="inline";
   }
    if(xmlHttp.responseText=="2")
   {
      tip.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;验证码错误";
      var image=document.getElementById('securitycode');
      image.src=image.src+'?';
      tip.style.display="inline";
   }
   if(xmlHttp.responseText=="0")
   {
      window.location.reload();
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

        <!-- Login -->
        <div id="signup">
          <h3>登陆易网赚<span class="signintip" id="signintip">&nbsp;&nbsp;&nbsp;&nbsp;欢迎登陆网赚网</span></h3>
          <div class="in">


<form action='login.php' method='POST' onKeyUp="highlight(event)" onClick="highlight(event)" >

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
				    <td ><input type='text' style="width: 30px;" size='4' maxlength='4' name='code' class="securitycode" value="" id="seccode"/></td>			  	
				  </tr>
				  <tr>
				  <td align="center" colspan='2'><img id="securitycode" src="image.php" /><a id="changimg" href="javascript:var image=document.getElementById('securitycode');image.src=image.src+'?';">看不清？</a></td>
				  </tr>
                <tr>
                  <td align="center" class="smaller"><input type="checkbox" name="" id="inp-remember" />
                    <label for="inp-remember" title="保存14天" class="help">记住登录</label></td>
                  <td class="t-right"><input class="btn" type="button" id="btnsub" value="登陆" onclick="signinAjax()"/></td>
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