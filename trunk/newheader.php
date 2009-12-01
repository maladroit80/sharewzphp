
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
<link rel="stylesheet" href="css/form-field-tooltip.css" media="screen" type="text/css" />
<script type="text/javascript" src="js/rounded-corners.js"></script>
<script type="text/javascript" src="js/form-field-tooltip.js"></script>
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/style.css" />
<title>
<?php include('sitename.php');?>
---只要用鼠标点点就可以赚钱！</title>

</head>
<body style="margin-top:0px; padding-top:0px;">
<div id="maincontainer">
<?php include('funciones.php'); 
$elref=limpiar($_GET["r"]);
?>
  <div id="header">
    <h1 id="logo"><a href="#"><img src="design/logo.gif" alt="" /></a></h1>
    <hr class="noscreen" />
    <!-- Date -->
    <div class="date date-24">
      <p class="nom">Today is <strong>Monday, March 24th 2009</strong><br />
        <span class="nonhigh"><a href="#">Make Catalogio your homepage</a></span></p>
    </div>
    <!-- /date -->
    <hr class="noscreen" />
  </div>
  <!-- /header -->
  <!-- Tabs -->
  <div id="search-tabs" class="box">
    <ul id="search-type">
      <li><a href="#s01"><span>Internet</span></a></li>
      <li><a href="#s02"><span>Firms</span></a></li>
      <li><a href="#s03"><span>Articles</span></a></li>
      <li><a href="#s04"><span>Images</span></a></li>
      <li><a href="#s05"><span>News</span></a></li>
    </ul>
  </div>
  <!-- /search-tabs -->
  <!-- Search -->
  <div id="search-top"></div>
  <div id="search">
    <div id="search-in">
      <div id="s01">
        <form action="#" method="get">
          <p class="nom t-center">
            <label for="search-input01">Internet:</label>
            <input type="text" size="75" name="" id="search-input01" />
            <input type="image" value="Search" src="design/search-button.gif" class="search-submit" />
          </p>
        </form>
      </div>
      <div id="s02">
        <form action="#" method="get">
          <p class="nom t-center">
            <label for="search-input02">Firms:</label>
            <input type="text" size="75" name="" id="search-input02" />
            <input type="image" value="Search" src="design/search-button.gif" class="search-submit" />
          </p>
        </form>
      </div>
      <div id="s03">
        <form action="#" method="get">
          <p class="nom t-center">
            <label for="search-input03">Articles:</label>
            <input type="text" size="75" name="" id="search-input03" />
            <input type="image" value="Search" src="design/search-button.gif" class="search-submit" />
          </p>
        </form>
      </div>
      <div id="s04">
        <form action="#" method="get">
          <p class="nom t-center">
            <label for="search-input04">Images:</label>
            <input type="text" size="75" name="" id="search-input04" />
            <input type="image" value="Search" src="design/search-button.gif" class="search-submit" />
          </p>
        </form>
      </div>
      <div id="s05">
        <form action="#" method="get">
          <p class="nom t-center">
            <label for="search-input05">News:</label>
            <input type="text" size="75" name="" id="search-input05" />
            <input type="image" value="Search" src="design/search-button.gif" class="search-submit" />
          </p>
        </form>
      </div>
      <hr class="noscreen" />
    </div>
    <!-- /search-in -->
  </div>
  <!-- /search -->
  <div id="search-bottom"></div>
  <script type="text/javascript">
    new Control.Tabs('search-type');
    </script>
</div>
	<?php include('menu.php');?>
<div id="navtoplistline">&nbsp;</div>

<div id="contentwrapper">
<div id="maincolumn">
<div class="text">
