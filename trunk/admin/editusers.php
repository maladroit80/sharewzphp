<b>编辑用户</b>

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
$vistis=$_POST["vistis"];
$account=$_POST["account"];
$referals=$_POST["referals"];
$referalvisits=$_POST["referalvisits"];
$money=$_POST["money"];
$user_status=$_POST["user_status"];

    $query = "UPDATE tb_users SET username='$username', password='$password', referer='$referer', email='$email', pemail='$pemail', country='$country', visits='$vistis', referals='$referals', referalvisits='$referalvisits', money='$money', user_status='$user_status', account='$account' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>用户被编辑.</b></font><br><br>";

}


if (isset($_GET["id"]))
{

$id=$_GET["id"];

if ($_GET["option"]=="edit")
{
?>

<?

$tablae = mysql_query("SELECT * FROM tb_users where id='$id'");

while ($registroe = mysql_fetch_array($tablae)) 
{ 
?>

<form method="post" action="index.php?op=7">

  <p>序号: 
    <input type="hidden" name="id" value="<?= $registroe["id"] ?>">
    <?= $registroe["id"] ?>
    <br>
用户名: 
<input type="text" name="username" value="<?= $registroe["username"] ?>">
<br>
密码: 
<input type="text" name="password" value="<?= $registroe["password"] ?>">
<br>
上线: 
<input type="text" name="referer" value="<?= $registroe["referer"] ?>">
<br>
电子邮件l: 
<input type="text" name="email" value="<?= $registroe["email"] ?>">
<br>
支付宝帐号: 
<input type="text" name="pemail" value="<?= $registroe["pemail"] ?>">
<br>
省份: 
<input type="text" name="country" value="<?= $registroe["country"] ?>">
<br>
点击数量: 
<input type="text" name="vistis" value="<?= $registroe["visits"] ?>">
<br>
下线数量: 
<input type="text" name="referals" value="<?= $registroe["referals"] ?>">
<br>
下线点击数: 
<input type="text" name="referalvisits" value="<?= $registroe["referalvisits"] ?>">
<br>
账户余额: $
<input type="text" name="money" value="<?= $registroe["money"] ?>">
<br>
组:&nbsp; (
<?= $registroe["user_status"] ?>
)&nbsp;&nbsp;

<select name="user_status">
  
					<option value="<?= $registroe["user_status"] ?>"></option>
					  <option value="admin">Admin</option>
					  <option value="user">User</option>
</select>
<br>
帐户类型: 
<input type="text" name="account" value="<?= $registroe["account"] ?>">
premium-高级会员<br>

  IP地址: 
    <?= $registroe["ip"] ?>
    <br>
  注册时间: 
  <?= $registroe["joindate"] ?>
  <br>
  最后登陆时间: 
  <?= $registroe["lastlogdate"] ?>
  <br>
  最后登陆IP:
  <?= $registroe["lastiplog"] ?>
  <br>
  

  
  <input type="submit" value="保存" class="button">
  </p>
</form>

<?

}
?>


<?
}

if ($_GET["option"]=="delete")
{

    $queryz = "DELETE FROM tb_users WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>用户被删除.</b></font><br><br>";
}

}

?>
<table>
<tr>
<th>序号</th>
<th>用户名</th>
<th>IP地址</th>
<th>电子邮件</th>
<th>上线</th>
<th>点击数</th>
<th>账户余额</th>
<th></th>
<th></th>
</tr>
<?

$TAMANO_PAGINA = 50;
$pagina = limpiar($_GET["pagina"]);
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
} 

$tabla = mysql_query("SELECT * FROM tb_users ORDER BY id ASC limit $inicio,$TAMANO_PAGINA"); 

while ($registro = mysql_fetch_array($tabla)) 
{ 
echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["ip"] ."</td>
<td>". $registro["email"] ."</td>
<td>". $registro["referer"] ."</td>
<td>". $registro["visits"] ."</td>
<td>". $registro["money"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=7&id=<?= $registro["id"] ?>&option=edit">
<input type="submit" value="编辑" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=7&id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="删除" class="button">
</form>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>

<?
$uno = limpiar($_GET["pagina"]);

if (empty($uno))
{ 
$uno = 1;
$mos = $uno + 1;
echo "<a href='index.php?op=7&pagina=$mos'><font face=\"verdana\" style=\"font-size:11px;\" color=\"#000000\"><b>Next page</b></font></a> ";
} else 
{

$mos = $uno + 1;

for ($z=$mos;$z<=$mos;$z++)
{
echo "<a href='index.php?op=7&pagina=$z'><font face=\"verdana\" style=\"font-size:11px;\" color=\"#000000\"><b>Next page</b></font></a> ";

}



}
?>