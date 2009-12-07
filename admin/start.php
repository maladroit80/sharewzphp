<?



if(!isset($_COOKIE["usNick"]) && !isset($_COOKIE["usPass"]))
{
exit();
}
require('config.php');
require('funciones.php');

$user=uc($_COOKIE["usNick"]);


$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);


$wask = uc($_COOKIE["usNick"]);

$wesk = $row['username'];

if("$wesk" != "$wask") {
echo "无权访问本页面。";
include('footer2.php');
?>

<?
exit();
}

$wazk = uc($_COOKIE["usPass"]);

$wezk = $row['password'];

if("$wezk" != "$wazk") {
echo "无权访问本页面。";
include('footer2.php');
?>

<?
exit();
}

$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

$administrator = $row['user_status'];

		if($administrator != "admin") {

echo "<center>无权访问本页面。</center>";
include('footer2.php');
exit();
		}
		?>