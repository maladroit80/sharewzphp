<?php
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{
	echo "9";
	exit();
}
session_start();
$username=$_GET["name"]; 
$password=$_GET["psw"];
$code=$_GET["code"];
if(strtolower($code)!= strtolower($_SESSION['texto']))
{
	echo "2";
	exit();
} 
require('funciones.php');
$username=uc($username);
$password=uc($password);

require('config.php');
$query = mysql_query("SELECT username,password FROM tb_users WHERE username = '$username'") or die(mysql_error());
$data = mysql_fetch_array($query);
if(passport_decrypt($data['password'],$encryptkey) != $password){
echo "1";
}
else{
$query = mysql_query("SELECT username,password FROM tb_users WHERE username = '$username'") or die(mysql_error());
$row = mysql_fetch_array($query);
mysql_close($con);
$nicke=$row['username'];
$passe=$row['password'];

//90 dias dura la cookie
setcookie("usNick",$nicke,time()+7776000);
setcookie("usPass",$passe,time()+7776000);


$lastlogdate=time();
$lastip = getRealIP();
require('config.php');
$querybt = "UPDATE tb_users SET lastlogdate='$lastlogdate', lastiplog='$lastip' WHERE username='$nicke'";
mysql_query($querybt) or die(mysql_error());
mysql_close($con);
echo "0";
}
?>