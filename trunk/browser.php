<?php
 if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    include("accessdeny.php");
}
include("header.php");
?>
<script type="text/javascript"> 
var intervalId = null; 
function move(id,evt){
 var e = window.event?window.event:evt;
 var element = e.srcElement?e.srcElement:e.target;
 var state;
 var path= element.src.split('/');
 var picname=path[path.length-1];
 if(picname=="arrow-down.gif")
 {
 	state="down";
 }
 else
 {
 	state="up"; 
 }
 element.src=(picname=="arrow-down.gif")? "./images/arrow-up.gif":"./images/arrow-down.gif";
 if(intervalId != null) 
 window.clearInterval(intervalId); 
 function change(){
 var obj = document.getElementById(id); 
 var h = parseInt(obj.offsetHeight);
 if(state == "down")
 {
 if(h<300)
 {
 obj.style.height = (h + 5)+'px';
 }
 }
 else if(state == "up")
 {
 	if(h>0)
 {
 obj.style.height = (h -5)+'px';
 }
 }
 } 
 intervalId = window.setInterval(change,10); 
} 




function readlink(browser)
{
   var ul=document.getElementById(browser).getElementsByTagName("ul")[0];
   var frame=document.getElementById(browser).getElementsByTagName("iframe")[0];
    var doc;
    //IE or FF
    if (document.all)
       {
         doc = frame.document;
       }
        else
        {   
          doc = frame.contentDocument;
        }
    var link=doc.getElementsByTagName("a");
    for(var i=0;i<link.length;i++)
    {
      var myElement = document.createElement("<li><a href='"+link[i].href+"'>"+link[i].href+"</a></li>");
      ul.appendChild(myElement);
    }
}
</script>
<!-- Page -->
<div style="padding-top:20px">
<!-- leftmenu -->
<div>
</div>
<!-- /leftmenu -->
<!-- content -->
<div class="browsercontent">
<!-- browser1 -->
<div class="browser">
<h3 class="browserh"><input class="urlenter" type="text"></input><input class="dropbtn" type="image" src="./images/arrow-down.gif" onclick="move('browser1',event);return false;"></input></h3>
<br/>
<div class="realbrowser" id="browser1">
<iframe src="http://www.163.com" class="leftbrowser"></iframe>
<div class="rightlink">
<input type="image" src="./images/readlink-button.gif" onclick="readlink('browser1');return false;"></input>

  <ul>
                <li><a href=\"regads.php\">11111111111111111111111</a></li>
				<li><a href=\"members.php\">222222222222222222</a></li>
				<li><a href=\"adver.php\">3333333333333333333333333</a></li>
				<li><a href=\"article.php?no=index\">555555555555555555</a></li>
				<li><a href=\"contact.php\">777777777777777777777</a></li>
				<li><a href=\"bbs.php\">9999999999999999999</a></li>
				  <li><a href=\"regads.php\">11111111111111111111111</a></li>
				<li><a href=\"members.php\">222222222222222222</a></li>
				<li><a href=\"adver.php\">3333333333333333333333333</a></li>
				<li><a href=\"article.php?no=index\">555555555555555555</a></li>
				<li><a href=\"contact.php\">777777777777777777777</a></li>
				<li><a href=\"bbs.php\">9999999999999999999</a></li>
				  <li><a href=\"regads.php\">11111111111111111111111</a></li>
				<li><a href=\"members.php\">222222222222222222</a></li>
				<li><a href=\"adver.php\">3333333333333333333333333</a></li>
				<li><a href=\"article.php?no=index\">555555555555555555</a></li>
				<li><a href=\"contact.php\">777777777777777777777</a></li>
				<li><a href=\"bbs.php\">9999999999999999999</a></li>
				  <li><a href=\"regads.php\">11111111111111111111111</a></li>
				<li><a href=\"members.php\">222222222222222222</a></li>
				<li><a href=\"adver.php\">3333333333333333333333333</a></li>
				<li><a href=\"article.php?no=index\">555555555555555555</a></li>
				<li><a href=\"contact.php\">777777777777777777777</a></li>
				<li><a href=\"bbs.php\">9999999999999999999</a></li>
  </ul>
  
</div>
</div>
</div>
<!-- /browser1 -->
<!-- content -->
</div>
<!-- /content -->
</div>
<!-- /Page -->