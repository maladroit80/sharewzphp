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
	 
	if ($option=="Remove")
	{	
		if($username==$user)
		{	
			if($status=="pending")
			{
			$queryz = "DELETE FROM tb_signupusers WHERE id='$id'";
			mysql_query($queryz) or die(mysql_error());
			echo "<font color=\"green\"><b>你把自己从这个注册广告删除.<br>谢谢你保持诚实.
			<br><br>";
			}
			if($status=="deny"|$status=="paid")
			{
				$queryz = "DELETE FROM tb_signupusers WHERE id='$id'";
				mysql_query($queryz) or die(mysql_error());
				echo "<font color=\"green\"><b>你删除这条无用的记录.<br>
			<br><br>";
			}
		}
		else
		{
			echo "这是无效的操作";
		}
	}
	if ($option=="Approve")
	{
		if($owner==$user&$status=="pending")
		{	 $status="approved";
			 $query = "UPDATE tb_signupusers SET status='$status' WHERE id='$id'";
			 $resultex = mysql_query($query);
			echo "<font color=\"green\"><b>您验证通过了这个注册.<br>
		<br><br>";
		}
		else
		{
			echo "不合法";
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
			 
			echo "<font color=\"green\"><b>你拒绝了这个用户.<br>
			<br><br>";
			}
			else
			{
				echo "不合法";
			}
	}
	
}
?>
<h3 style="font-weight: bold">你注册的广告：</h3>
<p>pending-广告审查中 approved-得到验证 deny-得到拒绝 paid-得到管理员付款</p>
<div id="tables">
<table align="center" width="100%" cellpadding="0">
<tr>
<th class="top">广告名称</th>
<th class="top">注册名字</th>
<th class="top">价值</th>
<th class="top">状态</th>
<th class="top">申请时间</th>
<th class="top">支付时间</th>
<th class="top">操作</th>
</tr>
<?php
require('config.php');
$user=$_COOKIE["usNick"];

$tabla = mysql_query("SELECT * FROM tb_signupusers where username='$user' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
mysql_close($con);
while ($row = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "<tr><td align='left'>";
echo $row["adname"];

echo "</td><td align='left'>";
echo $row["regname"];

echo "</td><td align='left'>";
echo $row["value"];

echo "元</td><td align='left'>";
echo $row["status"];

echo "</td><td align='left'>";
echo $row["reqdate"];

echo "</td><td align='left'>";
echo $row["paiddate"];

echo "</td><td>";
?>
<?php
$status=$row["status"];
if($status=="pending"|$status=="deny"|$status=="paid")
{
?>
<form method="post" action="myregads.php?id=<?php echo $row["id"] ?>&option=Remove">
<input type="submit" value="删除" class="button">
</form>
</td>
<?php
}
else
{
	echo $row["status"];
	echo "</td>";
}
?>
</tr>
<?php
}
?>
</table>

<h3 style="font-weight: bold">你投放的注册广告：</h3>
<table align="center" width="100%" cellpadding="0">
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

echo "<tr><td align='left'>";
echo $row["adname"];

echo "</td><td align='left'>";
echo $row["regname"];

echo "</td><td align='left'>";
echo $row["username"];

echo "</td><td align='left'>";
echo $row["value"];

echo "元</td><td align='left'>";
echo $row["reqdate"];

echo "</td><td>";
?>
<form method="post" action="myregads.php?id=<?php echo $row["id"] ?>&option=Approve">
<input type="submit" value="允许" class="button">
</form>
</td><td>
<form method="post" action="myregads.php?id=<?php echo $row["id"] ?>&option=Deny">
  <input type="submit" value="拒绝" class="button" />
</form>
</td>
</tr>
<?php
}
?>
</table>
</div>
<!--footer starts here-->
<?php include('footer.php'); ?>