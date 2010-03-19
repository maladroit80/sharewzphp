<?php include('header.php'); ?>
<br>
<?php
require('config.php');
if (isset($_GET["id"]))
{
$id=$_GET["id"];
$option=$_GET["option"];

$user=$_COOKIE["usNick"];

	 $query1 = mysql_query("select * from tb_signupusers WHERE id='$id'");
	 $registro = mysql_fetch_array($query1);
	 $username=$registro["username"];
	 $owner=$registro["owner"];
	 $status=$registro["status"];
	 $adid=$registro["adid"];
	if($option=="Grade")
	{
		$score=$_POST["score"];
		if($score=="好评")
		{
			$queryz="update tb_signupusers set graded=1 where id='$id'";
			mysql_query($queryz) or die(mysql_error());
			$datetime=date("Y-n-d H:i");
			$queryz="update tb_signupads set score=score+1,gradeuser='$user',gradetime='$datetime' where id='$adid'";
			mysql_query($queryz) or die(mysql_error());
			echo "感谢您对本任务给与评价。";
		}
		else if($score=="忽略")
		{
			$queryz="update tb_signupusers set graded=1 where id='$id'";
			mysql_query($queryz) or die(mysql_error());
			echo "感谢您对本任务给与评价。";
		}
	} 
	if ($option=="Remove")
	{	
		if($username==$user)
		{	
			if($status=="pending")
			{
			$queryz = "DELETE FROM tb_signupusers WHERE id='$id'";
			mysql_query($queryz) or die(mysql_error());
			echo "您已把注册广告删除。<br/>感谢您保持诚实。";
			}
			if($status=="deny"||$status=="paid")
			{
				$queryz = "DELETE FROM tb_signupusers WHERE id='$id'";
				mysql_query($queryz) or die(mysql_error());
				echo "您已经删除这条无用的记录，<br/>感谢您保持活跃。";
			}
		}
		else
		{
			echo "无效的操作，请不要重复提交。";
		}
	}
	if ($option=="Approve")
	{
		if($owner==$user&$status=="pending")
		{	 $status="approved";
			 $query = "UPDATE tb_signupusers SET status='$status' WHERE id='$id'";
			 $resultex = mysql_query($query);
			echo "您验证通过了这个注册。";
		}
		else
		{
			echo "无效的操作，请不要重复提交。";
		}
	}
	if ($option=="Deny")
	{	    
			if($owner==$user&$status=="pending")
			{
			
			$tabla = mysql_query("SELECT * FROM tb_signupusers WHERE id='$id'"); 
			$registro = mysql_fetch_array($tabla);
			$adid=$registro["adid"];
			
			$status="deny";
			$query = "UPDATE tb_signupusers SET status='$status' WHERE id='$id'";
			 $resultex = mysql_query($query);
			 
			$tablb = mysql_query("SELECT * FROM tb_signupads WHERE id='$adid'"); 
			$registra= mysql_fetch_array($tablb);
			$adnum=$registra["adnum"];
			 
			$adnum=$adnum+1;
			$query1 = "UPDATE tb_signupads SET adnum='$adnum' WHERE id='$adid'";
			$resultex = mysql_query($query1);
			 
			echo "你拒绝了这个用户，用户有向我们申诉的权利。";
			}
			else
			{
				echo "无效的操作，请不要重复提交。";
			}
	}
	
}
?>
<!-- 注册任务 -->
<div style="width:900px; margin:0 auto;">
<div class="tipblock">
<h3>注册任务：</h3>
<div style="padding:15px;" id="format">
<table  width="100%" cellpadding="0" style="border:1px solid orange;">
<tr>
<th class="top">广告名称</th>
<th class="top">注册名字</th>
<th class="top">价值</th>
<th class="top">状态</th>
<th class="top">申请时间</th>
<th class="top">支付时间</th>
<th class="top">操作</th>
<th class="top">评价</th>
</tr>
<?php
require('config.php');
$user=$_COOKIE["usNick"];

$tabla = mysql_query("SELECT * FROM tb_signupusers where username='$user' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
mysql_close($con);
while ($row = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "<tr><td align='center'>";
echo $row["adname"];

echo "</td><td align='center'>";
echo $row["regname"];

echo "</td><td align='center'>";
echo $row["value"];

echo "元</td><td align='center'>";
echo $row["status"];

echo "</td><td align='center'>";
echo $row["reqdate"];

echo "</td><td align='center'>";
if($row["paiddate"]=="N") echo "未支付";
else echo $row["paiddate"];
;

echo "</td><td align='center'>";
$status=$row["status"];
if($status=="pending"||$status=="deny"||$status=="paid")
{
?>
<form method="post" action="myregads.php?id=<?php echo $row["id"] ?>&option=Remove">
<input type="submit" value="删除" class="button">
</form>
</td><td align='center'>
<?php
}
else
{
	echo "等待付款";
	echo "</td><td align='center'>";
}
if($row['graded']==0)
{
	if($status=="paid")
	{
?>
<form method="post" action="myregads.php?id=<?php echo $row["id"] ?>&option=Grade" style="float:left;">
<input type="submit" name="score" value="好评" class="button"/>
</form>
<form method="post" action="myregads.php?id=<?php echo $row["id"] ?>&option=Grade" style="margin-left:-25px;float:right;">
<input name="score" type="submit" value="忽略" class="button"/>
</form>
</td>
<?php
	}
	else echo "任务未完成</td>";
}
else
{
	echo "已评</td>";
}
?>
</tr>
<?php
}
?>
</table>
</div>
</div>
</div>
<!-- /注册任务 -->

<!-- 投放广告 -->
<div style="width:900px; margin:15px auto;">
<div class="tipblock">
<h3>注册任务：</h3>
<div style="padding:15px;" id="format">
<table  width="100%" cellpadding="0" style="border:1px solid orange;">
<tr>
    <th class="top">广告名称</th>
    <th class="top">注册名字</th>
	<th class="top">本站用户</th>
    <th class="top">价值</th>
	<th class="top">申请时间</th>
    <th class="top">允许</th>
	<th class="top">拒绝</th>
</tr>
<?php
require('config.php');
$user=$_COOKIE["usNick"];
$status="pending";
$tabla = mysql_query("SELECT * FROM tb_signupusers where owner='$user' and status='$status' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
mysql_close($con);
while ($row = mysql_fetch_array($tabla))
{ 

echo "<tr><td align='center'>";
echo $row["adname"];

echo "</td><td align='center'>";
echo $row["regname"];

echo "</td><td align='center'>";
echo $row["username"];

echo "</td><td align='center'>";
echo $row["value"];

echo "元</td><td align='center'>";
echo $row["reqdate"];

echo "</td><td align='center'>";
?>
<form method="post" action="myregads.php?id=<?php echo $row["id"] ?>&option=Approve">
<input type="submit" value="允许" class="button">
</form>
</td><td align='center'>
<form method="post" action="myregads.php?id=<?php echo $row["id"] ?>&option=Deny">
  <input type="submit" value="拒绝" class="button" onclick="return confirm('确认拒绝？被拒用户保留向我们申诉的权利。');"/>
</form>
</td>
</tr>
<?php
}
?>
</table>
</div>
</div>
</div>
<!-- /投放广告 -->
<!--footer starts here-->
<?php include('footer.php'); ?>