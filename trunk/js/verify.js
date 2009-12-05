function signin()
{
 var xmlHttp=null;
 var tip=document.getElementById("signintip");
 var name=document.getElementsByName("username").value;
 var psw=document.getElementsByName("password");
 var code=document.getElementsByName("code");
 if(name==""||psw=="")
 {
   tip.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;用户名密码为空";
   tip.style.display="";
   return;
 }
 if(code=="")
 {
   tip.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;请填写验证码";
   tip.style.display="";
    return;
 }
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
if (xmlHttp.readyState==4)
{ 
   if(xmlHttp.responseText=="9")
   {
      window.location.reload();
   }
   if(xmlHttp.responseText=="1")
   {
      tip.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;用户名或密码错误";
      tip.style.display="";
   }
    if(xmlHttp.responseText=="2")
   {
      tip.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;验证码错误";
      tip.style.display="";
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
