<?php
 if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    include("accessdeny.php");
}
include("header.php");
?>
<script type="text/javascript"> 
//var act;
//var isdrop=false;
//function drop(s,nMax,evt){
//	if(isdrop)
//	{
//		close(s,20,evt);
//		return;
//	}
//	var e = window.event?window.event:evt;
//    var element = e.srcElement?e.srcElement:e.target;
//    element.src="images/arrow-up.gif";
//  var obj=document.getElementById(s); 
//  var h = parseInt(obj.offsetHeight); 
//  if (h < nMax){ 
//    obj.style.height = (h + 5)+"px"; 
//    clearTimeout(act); 
//    act = setTimeout("drop('"+s+"',"+nMax+")", 10); 
//  } 
//  isdrop=true;
//} 
//function close(s,nMin,evt){
//	var e = window.event?window.event:evt;
//    var element = e.srcElement?e.srcElement:e.target;
//    element.src="images/arrow-down.gif";
//  var obj=document.getElementById(s); 
//  var h = parseInt(obj.offsetHeight); 
//  if (h > nMin){ 
//    obj.style.height = (h - 5)+"px"; 
//    clearTimeout(act); 
//    act = setTimeclose("close('"+s+"',"+nMin+")", 10); 
//  }
//  isdrop=false;
//} 
//var intervalId = null;
//var state="down";
//function move(id,evt){
// var e = window.event?window.event:evt;
// var element = e.srcElement?e.srcElement:e.target;  
// element.src=(state == "down")?"images/arrow-up.gif":"images/arrow-down.gif";
// var obj = document.getElementById(id); 
// if(intervalId != null) 
// window.clearInterval(intervalId); 
// function change(){ 
// var h = parseInt(obj.offsetHeight); 
// obj.style.height = (state == "down") ? (h + 5) : (h - 5); 
// } 
// intervalId = window.setInterval(change,10);
// state=(state=="down")?"up":"down"; 
//} 

var intervalId = null; 
function move(id,state){ 
 var obj = document.getElementById(id); 
 if(intervalId != null) 
 window.clearInterval(intervalId); 
 function change(){ 
 var h = parseInt(obj.offsetHeight);

 obj.style.height = (state == "down") ? (h + 2) : (h - 2); 
 
 } 
 intervalId = window.setInterval(change,10); 
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
<div>
<h3 class="browserh"><input class="urlenter" type="text"></input><input class="dropbtn" type="image" src="images/arrow-down.gif" onclick="move('browser1','down');return false;"></input></h3>
<div style="background-color:red;" id="browser1">1
</div>
</div>
<!-- /browser1 -->
<!-- content -->
</div>
<!-- /content -->
</div>
<!-- /Page -->