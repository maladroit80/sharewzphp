<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/showdetail.js"></script>
<script type="text/javascript" language="javascript" src="js/verify.js"></script>
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
<link rel="stylesheet" media="print" type="text/css" href="css/print.css" />
<title>
<?php include('sitename.php');?>
</title>

</head>
<body style="margin-top:0px; padding-top:0px;">
<div id="main">
<?php include('functions.php');
@session_start();
if(isset($_GET['referer']))
{
	$_SESSION["referer"]=limpiar($_GET['referer']);
}
?>
  <div id="header">
    <h1 id="logo"><a href="#"><img src="images/logo.gif" alt="" /></a></h1>
    <hr  class="noscreen"/>
    <!-- Date -->
    <?php
    if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
    {
    	$tiplink="<a href='logout.php'>安全退出</a>";
    }
    else
    {
    	$tiplink="<a href='login.php'>登陆</a>";
    }
      $today = getdate();
      echo "  <div class='date date-".date("d")."'>
              <p class='nom'>Today is <strong>".$today["weekday"].",".$today["month"]." ".date("jS")." ".$today["year"]."</strong><br />
              <span  class='nonhigh'>".$tiplink."</span></p>
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
  <div id="nodemarqee">
  <?php include('ulintabs.php');?>
  </div>
  <div id="userinfo">
  <?php echo $userstatus;?>
  </div> 
  </div>
  <div id="row-bottom"></div>
  <script language="JavaScript">
    var getUL=document.getElementById("Tablistdetail");
    var Tabs=getUL.getElementsByTagName("a");
    var url=window.location.toString();
    for(var n=0;n<Tabs.length;n++)
    {
      var Tab=Tabs[n];
      var linkurl=Tab.href.split("?",1);
      if(url.indexOf(linkurl)!=-1)
      {
        Tab.setAttribute("class","active");
        Tab.setAttribute("className","active");
        break;
      }
    }




     var scrollnews = document.getElementById('nodemarqee');
     var lis = scrollnews.getElementsByTagName('a');
     var ml = 0;
     var timer1 = setInterval
     (function()
       {
        var liHeight = lis[0].offsetHeight;
        var timer2 = setInterval
        (function()
          {
            scrollnews.scrollTop = (++ml);
            if(ml == liHeight)
           {
            clearInterval(timer2);
            scrollnews.scrollTop = 0;
            ml = 0;
            lis[0].parentNode.appendChild(lis[0]);
           }
          },1000
        ); 
       },3000
     );
    </script>
  <!-- /TextRow -->