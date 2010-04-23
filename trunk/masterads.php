<?php include('header.php');
?>
<div style="margin:15px auto 0 auto;width:600px;">
<div class="title600px-top"></div>
<div class="title600px">
<div class="title600px-in">
<h2 align="center"><a href="advertise.php">浏览广告</a></h2>
</div>
</div>
<div class="title600px-bottom"></div>
</div>
<div> 
<?php
require('config.php');
$UserName=$_COOKIE["usNick"];
?>
<table width="100%" bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF" border="1" cellspacing="0">
<tr>
<th width="50%" background="images/fh/nav_lift.jpg">
<b>广告名称（本站公告区）</b></th>
<th width="12%" background="images/fh/nav_lift.jpg">
<div align="center">
<b>可点次数</b></div>
</th>
<th width="12%" background="images/fh/nav_lift.jpg">
<div align="center">
<b>已点次数</b></div>
</th>
<th width="12%" background="images/fh/nav_lift.jpg">
<div align="center">
<b>广告价值</b></div>
</th>
<th width="14%" background="images/fh/nav_lift.jpg">
<div align="center">
<b>非会员浏览</b></div>
</th>
</tr>
<?php 

$ads_number = mysql_query("Select * From p2c Where P2CGroup like '%公告%' and P2CValid = '1' And P2CClick <= P2CLimit Order by P2CType, P2CValuation DESC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
while($ads = mysql_fetch_array($ads_number)){
$P2CID = $ads["ID"];
$P2CName = $ads["P2CName"];
$P2CLink = $ads["P2CLink"];
$P2CImg = $ads["P2CImg"];
$P2CText = $ads["P2CText"];
$P2CValuation = $ads["P2CValuation"];
$P2CType_C = "元";
$P2CClick = $ads["P2CClick"];
$P2CLimit = $ads["P2CLimit"];
$MemberPriority = $ads["MemberPriority"];
echo "<tr><th><div align='left'>";

$dt = date("y-m-d H:i");
$adsinfo_number = mysql_query("Select * From memberp2c Where UserName = '$UserName ' And P2CID = '$P2CID' And P2CDate = '$dt'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
$adsinfo = mysql_fetch_array($adsinfo_number);

$adsinfo_records = mysql_num_rows($adsinfo_number);

$ClickFlag=true;
if($adsinfo_records>0){
	$status = $adsinfo["Status"];
	if($status!='Finish')
	{
		$ClickFlag=false;
	}
}
else{
	$ClickFlag = false;
}

if($ClickFlag=false)
{
	if($P2CImg != ""){
		echo "1<a href='surf2.asp?P2CName=".$P2CName."&P2CLink=".$P2CLink."' target='". $DomainName ."'><img src='".$P2CImg ."' width='400' height='60' border='0'></a><br />".$P2CText."";
	}
	else{
		echo "2<a href='surf2.asp?P2CName=".$P2CName."&P2CLink=".$P2CLink."' target='". $DomainName ."'>".$P2CText."</a>";
	}
}  
else{
	if($P2CImg != ""){
		echo "3<img src='".$P2CImg ."' width='400' height='60' border='0'><br /><font style='text-decoration:line-through'>". $P2CText ."</font>";
	}
	else{
		echo "4<font style='text-decoration:line-through'>".$P2CText."</font>";
	}
}
echo "</div></th>";

echo "<th>". $P2CLimit ."</th>";
echo "<th>". $P2CClick ."</th>";
echo "<th>". $P2CValuation ."</th>";
echo "<th>". $P2CType_C ."</th>";
echo "<th><a href='". $P2CLink ."' target='_blank'>非会员浏览</a></th>";
echo "</tr>";
}
?>



<!--footer starts here-->
<?php include('footer.php'); ?>