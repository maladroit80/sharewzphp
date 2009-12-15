<?php
if($_GET["regpage"])
{
	if($_GET["username"])
	{
		require('config.php');
		$username=$_GET["username"];
		$checkuser = mysql_query("SELECT username FROM tb_users WHERE username='$username'");
        $username_exist = mysql_num_rows($checkuser);
	if ($username_exist>0) {
     echo "该用户名已存在.";
     }
	}
	if($_GET["email"])
	{
		require('config.php');
		$email=$_GET["email"];
		$checkemail = mysql_query("SELECT email FROM tb_users WHERE email='$email'");
        $email_exist = mysql_num_rows($checkemail);
	if ($email_exist>0) {
     echo "该E-mail地址已存在.";
     }
	}
	if($_GET["pemail"])
	{
		require('config.php');
		$pemail=$_GET["pemail"];
		$checkpemail = mysql_query("SELECT pemail FROM tb_users WHERE pemail='$pemail'");
        $pemail_exist = mysql_num_rows($checkpemail);
	if ($pemail_exist>0) {
     echo "该支付宝已使用，请核实.";
     }
	}
	if($_GET["referer"])
	{
		require('config.php');
		$referer=$_GET["referer"];
		$checkref = mysql_query("SELECT username FROM tb_users WHERE username='$referer'");
        $referer_exist = mysql_num_rows($checkref);
	if ($referer_exist<1) {
     echo "该推荐人不存在，请核实或不填.";
     }
	}
    if($_GET["code"])
	{
		if(strtolower($_GET["code"])!= strtolower($_SESSION['texto']))
		{
			echo "验证码错误.";
		}
	}
}
else
{
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
}
?>