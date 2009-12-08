<?php
 if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    include("accessdeny.php");
}
include("header.php");
?>
<script type="text/javascript"> 
var act; 
function drop(s,nMax){ 
  var obj=document.getElementById(s); 
  var h = parseInt(obj.offsetHeight); 
  if (h < nMax){ 
    obj.style.height = (h + 5)+"px"; 
    clearTimeout(act); 
    act = setTimeout("drop('"+s+"',"+nMax+")", 10); 
  } 
} 
function close(s,nMin){ 
  var obj=document.getElementById(s); 
  var h = parseInt(obj.offsetHeight); 
  if (h > nMin){ 
    obj.style.height = (h - 5)+"px"; 
    clearTimeout(act); 
    act = setTimeclose("close('"+s+"',"+nMin+")", 10); 
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
<div class="browser" id="browser1" style="background:#FFCC00;">
<h3 onclick="drop('browser1',300)">点我</h3>
<div>
</div>
<!-- /browser1 -->
<!-- content -->
</div>
<!-- /content -->
</div>
<!-- /Page -->