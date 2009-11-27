<div id="navtoplist">
<?php 


// Si estan definidas las variables de las cookies se procede a mostrar el menu pero no sin antes comprobar que los
// datos de las cookies verdaderamete son del usuario en cuestion.

if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{

// Se incluyen los archivos necesarios




// Se sanitizan los datos de las cokies

$user=uc($_COOKIE["usNick"]);

// Se selecciona la tabla tb_users donde el usuario es el que se provee en la cookie
require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
// Se sanitiza de nuevo la cookie

$wask = uc($_COOKIE["usNick"]);

// Se define $wesk como el nombre de usuario de la tabla tb_users

$wesk = $row['username'];

// Se comprueba que el dato de la cookie sea el mismo que el de la tabla, de lo contrario se muestra error, se termina
// el script y se borra la cookie.

if("$wesk" != "$wask") {
echo "登陆有误.";
?>
<input type="button" value="Reload Page" onClick="window.location.reload()">
<?php
exit();
}

// Se sanitiza la cookie usPass

$wazk = uc($_COOKIE["usPass"]);

// Se define $wezk como el nombre de usuario de la tabla tb_users

$wezk = $row['password'];

// Se comprueba que el dato de la cookie sea el mismo que el de la tabla, de lo contrario se muestra error, se termina
// el script y se borra la cookie.

if("$wezk" != "$wazk") {
echo "登陆错误.";
?>
<input type="button" value="Reload Page" onClick="window.location.reload()">
<?php
exit();
}

echo"
			<ul>
				<li><a href=\"index.php\">首页</a></li>
				<li><a href=\"masterads.php\">浏览赚钱</a></li>";
				
// ver si es administrador
require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
$administrator = $row['user_status'];

		if($administrator == "admin") {

				echo "<li><a href=\"admin/\" target=\"_blank\">管理</a></li>"; 
										}
echo"            <li><a href=\"regads.php\">注册赚钱</a></li>
				<li><a href=\"members.php\">我的账户</a></li>
				<li><a href=\"logout.php\">退出</a></li>
				<li><a href=\"adver.php\">发布广告</a></li>
				<li><a href=\"contact.php\">联系我们</a></li>
				<li><a href=\"http://www.wycy8.cn\" target=_blank>论坛</a></li>
			</ul>
			<span class='textsmall'>&nbsp;&nbsp;&nbsp;&nbsp;登录为 </span>
			<span class='textblue'>".$row['username']."</span>
			";

if ($row['account'] ==""){
	echo"
			
			<span class='textsmall'>(普通会员)</span>
"; } else{
	echo"
			
			<span class='textsmall'>(高级会员)</span>
"; }

}
else
{

// funcion para sanitizar variables



echo "
			<ul><li><a href=\"index.php\">首页</a></li>
				<li><a href=\"masterads.php?r=".$elref."\">浏览赚钱</a></li>
				<li><a href=\"regads.php?r=".$elref."\">注册赚钱</a></li>
				<li><a href=\"register.php?r=".$elref."\">注册</a></li>
				<li><a href=\"login.php?r=".$elref."\">登录</a></li>
				<li><a href=\"adver.php?r=".$elref."\">发布广告</a></li>
				<li><a href=\"contact.php?r=".$elref."\">联系我们</a></li>
				<li><a href=\"http://www.wycy8.cn\" target=_blank>论坛</a></li>
			</ul>
";
}
?>

</div>