<strong>查看用户点击记录</strong><br>
<br>



<br>



<?php

$username=$_POST["username"];
if($username!=NULL)
{
	
		$visit="visit";
		$resp = mysql_query("select * from tb_ads where user='$username' and tipo='$visit' ORDER BY id ASC") or die (mysql_error());
		$rows=mysql_num_rows($resp);
	if($rows == "0") 
	{
     echo "没有查找到结果 .";
    } else 
	{
      echo "<center><strong>查找结果</strong></center><br>";

	?>
				
				<table>
	<tr>
	<th>序号</th>
	<th>用户名</th>
	<th>类型</th>
	<th>点击时间</th>
	<th>时间间隔</th>
	<th>广告序号</th>
	</tr>
	<?php
	$providittime=0;
	while($cat = mysql_fetch_array($resp)) 
	{
	$jiange=$cat["visitime"]-$providittime;
	echo "
	<tr>
	<td>". $cat["id"] ."</td>
	<td>". $cat["user"] ."</td>
	<td>". $cat["tipo"] ."</td>
	<td>". $cat["visitime"] ."</td>
	<td>$jiange</td>
	<td>". $cat["ident"] ."</td>
	</tr>";
	$providittime=$cat["visitime"];
	}
	?>

	</table>  
	
<?php
}
}

else
{
?>

<form action="" method="POST" name='form1'>

<table><tr>
<th width="150">用户名:</th>
<td><input type="text" size="25" maxlength="100" name="username" autocomplete="off" value="" id="username"></td></tr>


<tr><td></td><td>
<input type="submit" value="查找" class="button" name="Submit"></td></tr></table>

</form>
<br><br>
<?php
}
?>
