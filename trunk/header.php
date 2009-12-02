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
    <div class="date date-24">
      <p class="nom">Today is <strong>Monday, March 24th 2009</strong><br />
        <span  class="nonhigh"><a href="#">Make Catalogio your homepage</a></span></p>
    </div>
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
  1111111
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
    </script>
  <!-- /TextRow -->
<div id="navtoplistlinedown">&nbsp;</div>
<div id="contentwrapper">
<div id="maincolumn">
<div class="text">
