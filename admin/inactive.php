<b>清除不活跃用户</b><br>
<br>


<?php


if (isset($_POST["id"]))
{

$id=$_POST["id"];
$username=$_POST["username"];
$password=$_POST["password"];
$referer=$_POST["referer"];
$email=$_POST["email"];
$pemail=$_POST["pemail"];
$country=$_POST["country"];
$vistis=$_POST["vistis"];
$referals=$_POST["referals"];
$referalvisits=$_POST["referalvisits"];
$money=$_POST["money"];
$user_status=$_POST["user_status"];


    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_users SET username='$username', password='$password', referer='$referer', email='$email', pemail='$pemail', country='$country', visits='$vistis', referals='$referals', referalvisits='$referalvisits', money='$money', user_status='$user_status' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>User</font> ".$username." <font color=\"green\">edited.</b></font><br><br>";

}


if (isset($_GET["id"]))
{

$id=$_GET["id"];

if ($_GET["option"]=="edit")
{


$tablae = mysql_query("SELECT * FROM tb_users where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


?>

<form method="post" action="index.php?op=29">

Id: <input type="hidden" name="id" value="<?php echo $registroe["id"] ?>"><?php echo $registroe["id"] ?><br>
Username: <input type="text" name="username" value="<?php echo $registroe["username"] ?>"><br>
Password: <input type="text" name="password" value="<?php echo $registroe["password"] ?>"><br>
Referer: <input type="text" name="referer" value="<?php echo $registroe["referer"] ?>"><br>
E-mail: <input type="text" name="email" value="<?php echo $registroe["email"] ?>"><br>
Alertpat e-mail: <input type="text" name="pemail" value="<?php echo $registroe["pemail"] ?>"><br>
Country: <input type="text" name="country" value="<?php echo $registroe["country"] ?>"><br>
Visits: <input type="text" name="vistis" value="<?php echo $registroe["visits"] ?>"><br>
Referals: <input type="text" name="referals" value="<?php echo $registroe["referals"] ?>"><br>
Referals visits: <input type="text" name="referalvisits" value="<?php echo $registroe["referalvisits"] ?>"><br>
Money: $<input type="text" name="money" value="<?php echo $registroe["money"] ?>"><br>
Group:&nbsp; (<?php echo $registroe["user_status"] ?>)&nbsp;&nbsp;

<select name="user_status">

					<option value="<?php echo $registroe["user_status"] ?>"></option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
</select>
<br>


Ip: <?php echo $registroe["ip"] ?><br>
Join date: <?php echo $registroe["joindate"] ?><br>
Last log date: <?php echo $registroe["lastlogdate"] ?><br>
Last ip log: <?php echo $registroe["lastiplog"] ?><br>



<input type="submit" value="Save" class="button">

</form>

<?php

}

}

if ($_GET["option"]=="delete")
{

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_users WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>User deleted.</b></font><br><br>";
}

}

?>


<br>



<?php
$now=time();
$daysnum=$_POST["daysnum"];
$daysmax=$now-($daysnum*86400);
if($_POST['daysnum'])
{
	$resp = mysql_query("select * from tb_users where lastlogdate<'$daysmax'") or die (mysql_error());
	$deletenum=mysql_num_rows($resp);
    if($deletenum == "0") 
	{
     echo "没有找到对应结果 .";
    } else 
	{
		$queryz = "DELETE FROM tb_users WHERE lastlogdate<'$daysmax'";
   		mysql_query($queryz) or die(mysql_error());
		echo $deletenum;
		echo"<strong>个会员被删除! </strong><br>";
			
		}
	}
else{

	?>

<form action="" method="POST" name='form1'>

<table>
<tr>
<th width="150">不活跃时间</th>
<td><select name="daysnum">
					<option value="7" selected>14天没有登陆</option>
					<option value="14">30天没有登陆</option>
					<option value="30">45天没有登陆</option>
					<option value="60">60天没有登陆</option>
                    <option value="60">90天没有登陆</option>
					
	</select>
	  </td></tr>


<tr><td></td><td>
<input type="submit" value="批量删除" class="button" name="Submit"></td></tr></table>

</form>
<br><br>





<?php
}
?>
