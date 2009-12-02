<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ENTER DESCRIPTION HERE" />
<meta name="keywords" content="ENTER KEYWORDS SEPARATED BY COMMAS" />
<meta name="owner" content="ENTER THE SITE OWNER NAME" />
<meta name="copyright" content="ENTER SITE COPYRIGHT INFO" />
<meta name="author" content="ENTER THE AUTHOR INFO" />
<meta name="rating" content="General" />
<meta name="revisit-after" content="7 days" />
<script type="text/javascript" src="js/rounded-corners.js"></script>
<script type="text/javascript" src="js/form-field-tooltip.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/tooltip.js"></script>
<script type="text/javascript" src="js/showdetail.js"></script>
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
<link rel="stylesheet" media="print" type="text/css" href="css/print.css" />
<title>
<?php include('sitename.php');?>
---只要用鼠标点点就可以赚钱！</title>

</head>
<body style="margin-top:0px; padding-top:0px;">
<div id="main">
<?php include('funciones.php'); 
$elref=limpiar($_GET["r"]);
?>
  <div id="header">
    <h1 id="logo"><a href="#"><img src="images/logo.gif" alt="" /></a></h1>
    <hr  class="noscreen"/>
    <!-- Date -->
    <?php
      $today = getdate();
      echo "  <div class='date date-".date("d",$today["mday"])."'>
              <p class='nom'>Today is <strong>".$today["weekday"].",".$today["month"]." ".date("d",$today["mday"])." ".$today["year"]."</strong><br />
              <span  class='nonhigh'><a href='#'>Make Catalogio your homepage</a></span></p>
              </div>" 
    ?> 
    <!-- /date -->
    <hr class="noscreen" />
  </div>
  <div id="navtoplistlineup">&nbsp;</div>
  <!-- /header -->
  <!-- Tabs -->
  <?php include('menu.php');?>
  <!--/Tabs-->
  <!-- TextRow -->
  <div id="row-top"></div>
  <div id="row-center">
  <div id="row-in">
  <div id="nodemarqee" style="float:left;width:70%;hight:100%">
  left
  </div>
  <div style="float:right">right</div>
  </div>
  </div>
  <div id="row-bottom"></div>
  <script type="text/javascript">
    var getUL=document.getElementById("Tablistdetail");
    var Tabs=getUL.getElementsByTagName("a");
    var url=window.location.toString();
    for(var n=0;n<Tabs.length;n++)
    {
      var Tab=Tabs[n];
      if(Tab.href.indexOf(url)!=-1)
      {
        Tab.setAttribute("class","active");
        break;
      }
    }


    var oMarquee = document.getElementById("nodemarqee"); //滚动对象 
    var iLineHeight = 14; //单行高度，像素 
    var iLineCount = 6; //实际行数 
    var iScrollAmount = 1; //每次滚动高度，像素 
    function run() { 
    oMarquee.scrollTop += iScrollAmount; 
    if ( oMarquee.scrollTop == iLineCount * iLineHeight ) 
    oMarquee.scrollTop = 0; 
    if ( oMarquee.scrollTop % iLineHeight == 0 ) { 
    window.setTimeout( "run()", 2000 ); 
    } else { 
    window.setTimeout( "run()", 50 ); 
    } 
    } 
    oMarquee.innerHTML += oMarquee.innerHTML; 
    window.setTimeout( "run()", 2000 ); 
    </script>
  <!-- /TextRow -->
<div id="navtoplistlinedown">&nbsp;</div>
<div id="contentwrapper">
<div id="maincolumn">
<div class="text">
