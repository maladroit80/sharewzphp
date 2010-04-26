<?php
//普通会员浏览页面
session_start();

require('config.php');
  $P2CName = $_GET["P2CName"];
  $P2CLink = $_GET["P2CLink"];

  $sqlg = mysql_query("Select * From p2c Where P2CName = '$P2CName'");
  $resultg = mysql_fetch_array($sqlg);
  $ID = $resultg["id"];
  $P2CLink = $resultg["P2CLink"];
  $P2CVisit = $resultg["P2CVisit"];
  $P2CClick = $resultg["P2CClick"];
  $P2CRate = $resultg["P2CRate"];


?>


<html>

<head>

<meta http-equiv="Pragma" content="no-cache">

<meta http-equiv="Expires" content="-1">

<link rel="stylesheet" type="text/css" href="css.css"><title><?php include('sitename.php'); ?> | .浏览赚钱中</title>
</head>
<script language="javascript">
kstatus();
function kstatus(){
  self.status="请将本站添加到收藏夹以便下次访问！";
  setTimeout("kstatus()",0);
}
</script>

<frameset rows="75,20,94%,*" framespacing="0" border="0" frameborder="0">
<?php
if ($P2CVisit * $P2CRate >= $P2CClick)
{
?>
<frame name="header" src=surf3.php?P2CName=<? $P2CName ?> scrolling="no" noresize>
<?php
}
else
{?>
<frame name="header" src=surf32.php?P2CName=<? $P2CName ?> scrolling="no" noresize>
<?php
}
?>
  <frame name="121" src="IP.asp" target="_self" scrolling="no" noresize marginwidth="1" marginheight="1">
  <frame name="main" src=<% = P2CLink %> scrolling="auto" noresize style="mso-linked-frame:auto" marginwidth="0" marginheight="0">
  <noframes>
  <body>

  <p>此网页使用了框架，但您的浏览器不支持框架。</p>

  </body>
  </noframes>
</frameset>
</html>
