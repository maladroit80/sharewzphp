
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    echo "此页面为会员浏览页面，请<a href='login.php'>登陆</a>或<a href='register.php'>注册</a></h2>";
    exit();
}

require('config.php');
	$sql_DomainName = mysql_query("select * from tb_common where itemid='DomainName'");
	$result_DomainName = mysql_fetch_array($sql_DomainName);
	$DomainName = $result_DomainName["value"];

	$sql_ContinueClick = mysql_query("select * from tb_common where itemid='ContinueClick'");
	$result_ContinueClick = mysql_fetch_array($sql_ContinueClick);
	$ContinueClick = $result_ContinueClick["value"];
	
  $P2CName = $_GET["P2CName"];
  $P2CLink = $_GET["P2CLink"];

  $sqlg = mysql_query("Select * From p2c Where P2CName = '$P2CName'");
  $resultg = mysql_fetch_array($sqlg);
  $ID = $resultg["id"];
  $P2CLink = $resultg["P2CLink"];
  $P2CVisit = $resultg["P2CVisit"];
  $P2CClick = $resultg["P2CClick"];
  $P2CRate = $resultg["P2CRate"]; 
  $ADing = "$_COOKIE(". $DomainName .")ADing";
if($ContinueClick==true)
{	
	if($ADing!="")
	{
		$ADMessage = "您必须等待上一个广告结束才能点击下一个广告！";
	}
	else{
		setcookie($UserName,"$DomainName"+"ADing");
	}
}
else
{
	if($ADing!=""){
		$ADMessage = "";
	}
	else{
		setcookie($UserName,"$DomainName"+"ADing");
	}
}
?>



<html>

<head>
<link REL="StyleSheet" HREF="css/layout-6-master.css" TYPE="text/css" MEDIA="screen">
<title>浏览广告</title>
<?php
if($ADMessage=="")
{?>
	<SCRIPT LANGUAGE="JavaScript">
  var st = <% = P2CTime %>;
  var od = 1;
  function gocl()
  {
   st = st - od;
   document.value = st;
   document.time.timer.value = st;
   setTimeout("gocl()", 1000);
   if (st == 0)
   window.location="surf4.php?P2CName=<? echo "$P2CName" ?>";
  }
<?}
?>
</head>
<body topmargin="7" leftmargin="0" ONLOAD="gocl()">

<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="100%" align="center" valign="top">
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td width="15%" height="60" align="center" valign="middle"><h1><font color=red>易网赚</font></h1><br>
          </td>
          <td width="35%" height="60" align="center">
          <?
            if($ADMessage != ""){
            	echo "$ADMessage";
            }
          ?>          
            <form name="time">
              <p align="center">此广告价值<font color="#00FF00"> <? echo "$P2CValuation" ?></font>元，增值价值 <font color="#00FF00"><? echo "$P2CValuation2" ?></font> 元。<br>您必须停留 <input type="text" name="timer" style="background-color: #DBEAF5; color: #FF0000; font-weight: bold; width: 24; text-align: center" size="1"> 秒才能得到奖励。<br>如果广告条未显示，请刷新页面。</p>  
            </form> 
          </td> 
          <td width="20%" height="60" align="center" valign="middle"><div align="center"><a href="<? echo "$P2CLink" ?>" target="_blank"><h3>在新窗口打开此站</h3></a>
          </div>
          <td width="30%" height="60" align="center" valign="middle"><div align="center">
<div id=ad24060 style="float:right;width:240px;height:60px;">易网赚</div>       
          </div></td>  
        </tr>  
      </table>  
    </td>  
  </tr>  
</table>  
  
</body>  
  
</html>

