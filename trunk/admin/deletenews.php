<?php
if(isset($_POST['del']))
{
	if(isset($_GET['name']))
	{
		$filename=$_GET['name'];
		if(file_exists("../news/".$filename)){
			if(!unlink("../news/".$filename)){
				echo "删除文件../news/".$filename."失败";
				exit();
			}
			else
			{
				include('config.php');
        		$query ="delete from tb_news where url='".$_GET['name']."'";
         		mysql_query($query) or die(mysql_error());
         		echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.php?op=44'>";
			}
		}			
		
	}
}
require_once("config.php");
$pagesize=50;
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


  

  　　
<table border="0" >
　　<tr>
　　　<td>
　　　　<p class="edithead" style="width:250px">标题</p>
     </td>
　　　<td>
　　　　<p class="edithead" style="width:100px">发布时间</p>
     </td>
     <td>
　　　　<p class="edithead" style="width:100px">提交人</p>
     </td>
     <td>
　　　　<p class="edithead" style="width:80px">浏览次数</p>
     </td>
      <td>
　　　　<p class="edithead" style="width:200px">文件名</p>
     </td>
     <td> 
　　　　<p class="edithead" style="width:100px">类别</p>
     </td>
     <td> 
　　　　<p class="edithead" style="width:50px">操作</p>
     </td>
　　</tr>
<?php
do {
$i++;
?>
<tr>
<td name="deletetitle"><a href="index.php?op=45&page=<?php echo $page ?>&name=<?php echo $myrow["url"]?>"><?php echo $myrow["title"]?></a></td>
<td><?php echo $myrow["date"]?></td>
<td><?php echo $myrow["author"]?></td>
<td><?php echo $myrow["counts"]?></td>
<td><?php echo $myrow["url"]?></td>
<td><?php echo $myrow["type"]?></td>
<form action="index.php?op=44&page=<?php echo $page ?>&name=<?php echo $myrow["url"]?>" method="post">
<td><input name='del' type="submit" value="删除"></input></td>
</form>
</tr>
<?php
}
while ($myrow = mysql_fetch_array($rs));
echo "</table>";
}
echo "<div align='center'>共有".$pages."页(".$page."/".$pages.")";
for($i=1;$i<=$pages;$i++)
echo "<a href='index.php?op=43&page=".$i."'>[".$i ."]</a> ";
echo "</div>";
?>