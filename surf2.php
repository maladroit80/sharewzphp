<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    echo "此页面为会员浏览页面，请<a href='login.php'>登陆</a>或<a href='register.php'>注册</a></h2>";
    exit();
}

require('config.php');
  $P2CName = $_GET["P2CName"];

  $sqlg = mysql_query("Select * From p2c Where P2CName = '$P2CName'");
  $resultg = mysql_fetch_array($sqlg);
  $P2CType = $resultg["P2CType"];
  $P2CLink = $resultg["P2CLink"];
  $P2CTime = $resultg["P2CTime"];
  $P2CValuation = $resultg["P2CValuation"];
  $P2CRate = $resultg["P2CRate"];

?>


<html>

<head>

<meta http-equiv="Pragma" content="no-cache">

<meta http-equiv="Expires" content="-1">


<title><?php include('sitename.php'); ?> | .浏览赚钱中</title>
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
<frame name="header" src=surf3.php?P2CName=<? echo "$P2CName" ?> scrolling="no" noresize>
<?php
}
else
{?>
<frame name="header" src=surf32.php?P2CName=<? echo "$P2CName" ?> scrolling="no" noresize>
<?php
}
?>
  <frame name="121" src="IP.php" target="_self" scrolling="no" noresize marginwidth="1" marginheight="1">
  <frame name="main" src=<? echo "$P2CLink" ?> scrolling="auto" noresize style="mso-linked-frame:auto" marginwidth="0" marginheight="0">
  <noframes>
  <body>

  <p>此网页使用了框架，但您的浏览器不支持框架。</p>

  </body>
  </noframes>
</frameset>
</html>