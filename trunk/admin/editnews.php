<?php
require_once("config.php");
$pagesize=1;
//取得记录总数$rs，计算总页数用
$rs=mysql_query("select count(*) from tb_news");
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
$rs=mysql_query("select * from tb_news order by date desc limit $offset,$pagesize");
if ($myrow = mysql_fetch_array($rs))
{
$i=0;
?>
　　<table border="0" width="60">
　　<tr>
　　　<td width="400" text-align="center" >
　　　　<p >标题</p>
     </td>
　　　<td width="80" text-align="center" >
　　　　<p >发布时间</p>
     </td>
     <td width="100" text-align="center" >
　　　　<p>提交人</p>
     </td>
     <td width="80" text-align="center" >
　　　　<p >浏览次数</p>
     </td>
     <td width="80" text-align="center" > 
　　　　<p >类别</p>
     </td>
　　</tr>
<?php
do {
$i++;
?>
<tr>
<td width="50%"><?php echo $myrow["title"]?></td>
<td width="50%"><?php echo $myrow["url"]?></td>
</tr>
<?php
}
while ($myrow = mysql_fetch_array($rs));
echo "</table>";
}
echo "<div align='center'>共有".$pages."页(".$page."/".$pages.")";
for($i=1;$i<=$pages;$i++)
echo "<a href='editnews.php?page=".$i."'>[".$i ."]</a> ";
echo "</div>";
?>