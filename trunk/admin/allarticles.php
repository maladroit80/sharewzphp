<?php
$status=array(	
				"全部"=>"select * from tb_news order by date desc limit ",
				"用户原创"=>"select * from tb_news where origin='1' order by date desc limit ",
				"用户转帖"=>"select * from tb_news where origin='0' order by date desc limit ",
				"管理员发布"=>"select * from tb_news where origin='3' order by date desc limit ",
				"推荐"=>"select * from tb_news where status='c' order by date desc limit ",
				"置顶"=>"select * from tb_news where status='t' order by date desc limit "
);
$querystr=$status["全部"];
if($_SERVER['REQUEST_METHOD']=='POST') 
{
	$url=$_GET['name'];
	$thestatus=$_POST['status'];
	$theorigin=$_POST['origin'];
	require('config.php');
	if(isset($_POST['commend']))
	{
		if($thestatus=='c')
		mysql_query("update tb_news set status='' where url='$url'") or die(mysql_error());
		else if($thestatus!='t')
		mysql_query("update tb_news set status='c' where url='$url'") or die(mysql_error());
	}
	if(isset($_POST['top']))
	{
		if($thestatus=='t')
		mysql_query("update tb_news set status='' where url='$url'") or die(mysql_error());
		else
		mysql_query("update tb_news set status='t' where url='$url'") or die(mysql_error());
	}
	if(isset($_POST['edit']))
	{
		echo '<meta http-equiv="refresh" content="0;url=index.php?op=45&&name='.$url.'&&origin='.$theorigin.'" />';
		exit();		
	}
	if(isset($_POST['del']))
	{
		if($_POST['origin']=='3')
		{
			$filename=$url.".php";
			if(file_exists("../news/".$filename)){
				if(!unlink("../news/".$filename)){
					echo "删除文件../news/".$filename."失败";
					exit();
				}
				else
				{
					include('config.php');
        			$query ="delete from tb_news where url='".$url."'";
         			mysql_query($query) or die(mysql_error());
         			mysql_close($con);
				}
			}			
		}
		else
		{
			include('config.php');
        	$query ="delete from tb_news where url='".$url."'";
         	mysql_query($query) or die(mysql_error());
         	mysql_close($con);
		}
	}
	if(isset($_POST['status']))
	{
		$querystr=$status[$_POST['status']];
	}
}
?>

<form action="index.php?op=431" method="post">
  <select name="status">
  <?php
  	foreach($status as $key=>$s)
  	{
  		if($key==$_POST['status'])
  		echo '<option value ="'.$key.'" selected >'.$key.'</option>';
  		else
  		echo '<option value ="'.$key.'">'.$key.'</option>';
  	} 
  ?>
  </select> 
  <input type="submit" value="查看"/> 
</form>
  
<?php
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
$querystr=$querystr.$offset.','.$pagesize;
$rs=mysql_query($querystr);
if ($myrow = @mysql_fetch_array($rs))
{
$i=0;
?>
<table border="0" >
　　<tr>
　　　<td>
　　　　<p class="edithead">标题</p>
     </td>
　　　<td>
　　　　<p class="edithead">发布时间</p>
     </td>
     <td>
　　　　<p class="edithead">提交人</p>
     </td>
     <td>
　　　　<p class="edithead">浏览次数</p>
     </td>
      <td>
　　　　<p class="edithead">文件名</p>
     </td>
     <td> 
　　　　<p class="edithead">类别</p>
     </td>
    <td> 
　　　　<p class="edithead">状态</p>
     </td>
     <td> 
　　　　<p class="edithead">操作</p>
     </td>
　　</tr>
<?php
do {
$i++;
?>
<tr>
<td><a target="_blank" href="<?php if($myrow["origin"]=='3') echo '../'.$myrow["url"].'.html'; else echo '../article/'.$myrow["url"].'.html'; ?>"><?php echo $myrow["title"]?></a></td>
<td><?php echo $myrow["date"]?></td>
<td><?php echo $myrow["author"]?></td>
<td><?php echo $myrow["counts"]?></td>
<td><?php echo $myrow["url"]?></td>
<td><?php echo $myrow["type"]?></td>
<td><?php if($myrow["status"]=='c') echo "推荐";else if($myrow["status"]=='t') echo "置顶"; else echo $myrow["status"]==""?"一般":$myrow["status"]; ?></td>
<form action="index.php?op=431&page=<?php echo $page ?>&name=<?php echo $myrow["url"]?>" method="post">
<td>
<nobr>
  <input type="hidden" name="status" value="<?=$myrow["status"] ?>"/>
  <input type="hidden" name="origin" value="<?=$myrow["origin"] ?>"/>  
  <input name='commend' type="submit" value="推荐"/>
  <input name='top' type="submit" value="置顶"/>
  <input name='edit' type="submit" value="编辑"/>
  <input name='del' type="submit" value="删除"/>
</nobr>
</td>
</form>
</tr>
<?php
}
while ($myrow = @mysql_fetch_array($rs));
echo "</table>";
}
echo "<div align='center'>共有".$pages."页(".$page."/".$pages.")";
for($i=1;$i<=$pages;$i++)
echo "<a href='index.php?op=43&page=".$i."'>[".$i ."]</a> ";
echo "</div>";
?>
