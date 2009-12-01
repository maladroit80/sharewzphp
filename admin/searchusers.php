<b>查找用户</b>

<br><br>

<?php include('config.php')?>

<?


if (isset($_POST["id"]))
{

$id=$_POST["id"];
$username=$_POST["username"];
$password=$_POST["password"];
$referer=$_POST["referer"];
$email=$_POST["email"];
$pemail=$_POST["pemail"];
$country=$_POST["country"];
$account=$_POST["account"];
$vistis=$_POST["vistis"];
$referals=$_POST["referals"];
$referalvisits=$_POST["referalvisits"];
$money=$_POST["money"];
$user_status=$_POST["user_status"];


    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_users SET username='$username', password='$password', referer='$referer', email='$email', pemail='$pemail', country='$country', visits='$vistis', referals='$referals', referalvisits='$referalvisits', money='$money', user_status='$user_status', account='$account' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>用户</font> ".$username." <font color=\"green\">被编辑.</b></font><br><br>";

}


if (isset($_GET["id"]))
{

$id=$_GET["id"];

if ($_GET["option"]=="edit")
{
?>

<?

$tablae = mysql_query("SELECT * FROM tb_users where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


?>

<form method="post" action="index.php?op=29">

序号: 
  <input type="hidden" name="id" value="<?= $registroe["id"] ?>"><?= $registroe["id"] ?><br>
用户名: 
<input type="text" name="username" value="<?= $registroe["username"] ?>"><br>
密码: 
<input type="text" name="password" value="<?= $registroe["password"] ?>"><br>
上线: 
<input type="text" name="referer" value="<?= $registroe["referer"] ?>"><br>
电子邮件: 
<input type="text" name="email" value="<?= $registroe["email"] ?>"><br>
支付宝帐号: 
<input type="text" name="pemail" value="<?= $registroe["pemail"] ?>"><br>
省份: 
<input type="text" name="country" value="<?= $registroe["country"] ?>"><br>
点击数: 
<input type="text" name="vistis" value="<?= $registroe["visits"] ?>"><br>
下线数: 
<input type="text" name="referals" value="<?= $registroe["referals"] ?>"><br>
下线点击数: 
<input type="text" name="referalvisits" value="<?= $registroe["referalvisits"] ?>"><br>
余额: 
<input type="text" name="money" value="<?= $registroe["money"] ?>">
元<br>
组:&nbsp; (<?= $registroe["user_status"] ?>)&nbsp;&nbsp;

<select name="user_status">

					<option value="<?= $registroe["user_status"] ?>"></option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
</select>
<br>帐户类型: 
<input type="text" name="account" value="<?= $registroe["account"] ?>">
premium-高级会员<br>


IP地址: <?= $registroe["ip"] ?><br>
注册时间: <?= $registroe["joindate"] ?><br>
最后登陆时间: <?= $registroe["lastlogdate"] ?><br>
最后登陆IP: <?= $registroe["lastiplog"] ?><br>



<input type="submit" value="保存" class="button">

</form>

<?

}
?>


<?
}

if ($_GET["option"]=="delete")
{

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_users WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>用户被删除.</b></font><br><br>";
}

}

?>


<br>



<?

$search=$_POST["search"];
$metode=$_POST["metode"];

if($_POST['search'])
{
    $resp = mysql_query("select * from tb_users where $metode LIKE '%$search%'") or die (mysql_error());
    if(mysql_num_rows($resp) == "0") 
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
<th>IP地址</th>
<th>电子邮件</th>
<th>上线</th>
<th>点击数</th>
<th>余额</th>
<th></th>
<th></th>
</tr>
<?

          while($cat = mysql_fetch_array($resp)) 
		  {
                  
		   
echo "
<tr>
<td>". $cat["id"] ."</td>
<td>". $cat["username"] ."</td>
<td>". $cat["ip"] ."</td>
<td>". $cat["email"] ."</td>
<td>". $cat["referer"] ."</td>
<td>". $cat["visits"] ."</td>
<td>". $cat["money"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=29&id=<?= $cat["id"] ?>&option=edit">
<input type="submit" value="编辑" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=29&id=<?= $cat["id"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
</tr>



<?


                   }

				   ?>
</table>  
	
<?
}
}else{

	?>

<form action="" method="POST" name='form1'>

<table><tr>
<th width="150">查找用户:</th>
<td><input type="text" size="25" maxlength="100" name="search" autocomplete="off" value="" id="search"></td></tr>
<tr>
<th width="150">按:</th>
<td><select name="metode">
					<option value="username">User Name</option>
					<option value="email">Email</option>
					<option value="pemail">Paypal Email</option>
					<option value="id">ID</option>

					
	</select>
					</td></tr>


<tr><td></td><td>
<input type="submit" value="查找" class="button" name="Submit"></td></tr></table>

</form>
<br><br>





<?
}
?>
