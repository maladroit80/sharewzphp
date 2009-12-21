<?php
if(isset($_POST["mark"]))
{
	$id_mark=implode(",",$_POST['checkbox']);
	 require_once("config.php");
    $query = "update tb_commendurl set status=1 where id in ($id_mark)";
     mysql_query($query) or die(mysql_error());
    $pagenum=$_GET["page"];
?>
<script type="text/javascript">
window.location.href='index.php?op=46&&page=<?php echo $pagenum;?>';
</script>
<?php 
}
require_once("config.php");
$pagesize=50;
//取得记录总数$rs，计算总页数用
$rs=mysql_query("select count(*) from tb_commendurl where status=2");
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
$rs=mysql_query("select * from tb_commendurl where status=2 order by date desc limit $offset,$pagesize");
if ($myrow = mysql_fetch_array($rs))
{
$i=0;
?>
<form action="index.php?op=46&&page=<?php echo $page;?>" method="POST">
<input type="hidden" name="mark" value="mark"/>
　　<table border="0" >
　　<tr>
　　　<td >
　　　　<p class="edithead" style="width:100px">网站名</p>
     </td>
　　　<td>
　　　　<p class="edithead" style="width:200px">地址</p>
     </td>
     <td>
　　　　<p class="edithead" style="width:50px">类型</p>
     </td>
     <td>
　　　　<p class="edithead" style="width:200px">描述</p>
     </td>
     <td>
　　　　<p class="edithead" style="width:70px">用户</p>
     </td>
      <td>
　　　　<p class="edithead" style="width:50px">选择</p>
     </td>
　　</tr>
<?php
do {
$i++;
?>
<tr>
<td><?php echo $myrow["name"]?></td>
<td><?php echo $myrow["url"]?></td>
<td><?php echo $myrow["type"]?></td>
<td><?php echo $myrow["description"]?></td>
<td><?php echo $myrow["username"]?></td>
<td><input type="checkbox" name="checkbox[]" value="<?php echo $myrow["id"]?>"/></td>
</tr>
<?php
}
while ($myrow = mysql_fetch_array($rs));
echo "</table></br>
<input type='submit' value='已阅'/>
</form>";
}
echo "<div align='center'>共有".$pages."页(".$page."/".$pages.")";
for($i=1;$i<=$pages;$i++)
echo "<a href='index.php?op=46&&page=".$i."'>[".$i ."]</a> ";
echo "</div>";

















?>