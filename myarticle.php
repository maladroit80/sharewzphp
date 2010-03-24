<?php
if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
	include("accessdeny.php");
    exit();
}
?>
<?php include('header.php'); ?>
<div class="mem_left">
<?php include('memberleft.php')?>
</div>
    <div class="box" style="margin-top:20px;">
      <!-- col-1 -->
      <strong style="margin-left:20px;font-size:15px;">与站友交换信息？说说自己的网赚心得？看到好东西想与大家分享？欢迎<a href="addboard.php" alt="发布网赚文章">发布文章</a></strong><br/><br/>
      <div style="float:left;width:670px;margin-left:20px" class="tipblock">
      <h3 style="border-bottom:1px solid #FFCC00;">我的文章</h3>
<?php
    $boardTypes=array(
				"experience"=>"经验心得",
				"freetalk"=>"家常闲话",
				"recommend"=>"站点推荐",
				"CHM"=>"网赚教程"
		);
$author=$_COOKIE["usNick"];
require("config.php");
$pagesize=2;
//取得记录总数$rs，计算总页数用
$rs=mysql_query("select count(*) from tb_news where author='$author' and origin<>'3'");
$myrow = mysql_fetch_array($rs);
$numrows=$myrow[0];
//计算总页数

$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
$pages++;
//设置页数
//设置为第一页
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
//设置为第一页
$page=1;
}

//计算记录偏移量
$offset=$pagesize*($page - 1);
//读取指定记录数
$rs=mysql_query("select * from tb_news where author='$author' and  origin<>'3' order by date asc limit $offset,$pagesize");
if ($myrow = mysql_fetch_array($rs))
{
$i=0;
echo '<table>';
do {
$i++;
?>
<tr>
<td width="500">
<a target="_blank" style="margin-left:20px;color:#105CB6;font-size:16px;font-weight:bold;" href="./article/<?=$myrow["url"] ?>.html">
<?php 
if($myrow['origin']=='1') 
echo '[原创]'; 
else if($myrow['origin']=='0') 
echo '[转贴]'; 
foreach($boardTypes as $key=>$boardType)
{
	if($key==$myrow['type'])
	{
		echo "[".$boardType."]";
		break;
	}
} 
?>
<?=$myrow["title"] ?></a>
</td>
<td>
<span>发布于 <?=$myrow["date"]?></span>
</td>
</tr>
<?php
}
while ($myrow = mysql_fetch_array($rs));
echo '</table>';
}
echo "<div align='center'>共有".$pages."页(".$page."/".$pages.")";
for($i=1;$i<=$pages;$i++)
if($i==$page)
echo " $i  ";
else
echo "<a href='myarticle.php?page=".$i."'>[".$i ."]</a> ";
echo "</div>";
?>
      </div>
</div>
<?php include('footer.php'); ?>