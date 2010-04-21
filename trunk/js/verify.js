var glimmerobj;
function glimmer(id)  
{
  glimmerobj=document.getElementById(id);
  self.setInterval("delegate()",800);
 }
 
 function delegate()
  {
  glimmerit(glimmerobj);
  }    
 
  function glimmerit(element)  
 { 
  var bg='#';  
  var color=new Array("A","B","C","D","E","F");  
  for(var j=1;j<7;j++)  
  {  
  var i=Math.round(Math.random()*10);  
  if(i>=5)  
  { bg=bg+color[i-5]; }  
  else  
  { bg=bg+i; }  
  }  
  element.style.color=bg;  
  }   
﻿function signinAjax()
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
   document.getElementById("signupform").submit();
   return;
  }
var url="verify.php?name="+name+"&psw="+psw+"&code="+code;
if(document.getElementById("inp-remember").checked==true)
{
	url=url+"&remember=1";
}
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

function submiturl()
{
	if(document.getElementsByName("urlpath")[0].value=="")
	{
	   document.getElementById("addtip").innerHTML="&nbsp;&nbsp;请输入网址.";
	    return false;
	}
	else if(document.getElementsByName("urlpath")[0].value!=""&&document.getElementsByName("urlname")[0].value=="")
	{
	    document.getElementById("addtip").innerHTML="&nbsp;&nbsp;给网站写个名字吧.";
	    return false;
	}
	else
	{
		if(getLength(document.getElementsByName("urlname")[0].value)>20)
		{
			document.getElementById("addtip").innerHTML="&nbsp;&nbsp;网站名过长.";
		    return false; 
		}
		if(!isurl(document.getElementsByName("urlpath")[0].value)) 
		{ 
			document.getElementById("addtip").innerHTML="&nbsp;&nbsp;请输入合法的网址.";
		    return false; 
		}  
	    return true;
	}
}
function getLength(str) {
    var len = str.length;
    var reLen = 0;
    for (var i = 0; i < len; i++) {        
        if (str.charCodeAt(i) < 27 || str.charCodeAt(i) > 126) {
            // 全角    
            reLen += 2;
        } else {
            reLen++;
        }
    }
    return reLen;    
}
function isurl(s)
{
    regExp = /(http[s]?|ftp):\/\/[^\/\.]+?\..+\w$/i;
    if (s.match(regExp))return true;
    else return false;   
}