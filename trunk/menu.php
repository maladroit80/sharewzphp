<div id="Tablist" class="box" 
<?php if(strpos($_SERVER["HTTP_USER_AGENT"],"Chrome")) echo "style='bottom:-6px'";
      else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 7.0")) echo "style='bottom:-1.5px'";
      else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 6.0")) echo "style='bottom:-10px'";
?>>  
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
<input type="image" value="重新载入" onClick="window.location.reload()" src="images/reload-button.gif">
<?php
exit();
}

// Se sanitiza la cookie usPass

$wazk = uc($_COOKIE["usPass"]);

// Se define $wezk como el nombre de usuario de la tabla tb_users

$wezk = $row['password'];

// Se comprueba que el dato de la cookie sea el mismo que el de la tabla, de lo contrario se muestra error, se termina
// el script y se borra la cookie.

if(strtolower($wezk)!= strtolower($wazk)) {
echo "登陆错误.";
?>
<input type="image" value="重新载入" onClick="window.location.reload()" src="images/reload-button.gif">
<?php
exit();
}

echo"
			<ul id='Tablistdetail'>
				<li><a href=\"index.php\"><span>首页</span></a></li>
				<li><a href=\"masterads.php\"><span>浏览赚钱</span></a></li>";
				
// ver si es administrador
require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
$administrator = $row['user_status'];

		if($administrator == "admin") {

		   echo "<li><a href=\"admin/\" target=\"_blank\"><span>管理</span></a></li>"; 
										}
echo"            <li><a href=\"regads.php\"><span>注册赚钱</span></a></li>
				<li><a href=\"members.php\"><span>我的账户</span></a></li>
				<li><a href=\"adver.php\"><span>发布广告</span></a></li>
				<li><a href=\"article.php?no=index\"><span>经验心得</span></a></li>
				<li><a href=\"contact.php\"><span>联系我们</span></a></li>
				<li><a href=\"bbs.php\"><span>论坛</span></a></li>
			</ul>	
			";
       if($administrator=="admin")
       {
	        $userstatus="<span>欢迎回来，</span><a href='member.php'>".$row['username']."</a><span style='color:#f00;'>（管理员）</span>";
       }
       else if($row['account'] =="")
       {
	        $userstatus="<span>欢迎回来，</span><a href='member.php'>".$row['username']."</a><span style='color:#808080;'>（会员）</span><a href='upgrade.php'>【升级】</a>";
       }
       else
       {
       	    $userstatus="<span>欢迎回来，</span><a href='member.php'>".$row['username']."</a><span style='color:#f00;'>（高级会员）</span>";
       }				
			
}
		
else
{

// funcion para sanitizar variables
$userstatus="<span>欢迎光临，</span><a href='#'>访客</a>";


echo "
			<ul id='Tablistdetail'><li><a href=\"index.php\"><span>首页</span></a></li>
				<li><a href=\"masterads.php\"><span>浏览赚钱</span></a></li>
				<li><a href=\"regads.php\"><span>注册赚钱</span></a></li>
				<li><a href=\"adver.php\"><span>发布广告</span></a></li>
				<li><a href=\"article.php?no=index\"><span>经验心得</span></a></li>
				<li><a href=\"contact.php\"><span>联系我们</span></a></li>
				<li><a href=\"bbs.php\"><span>论坛</span></a></li>
			</ul>
";
}
?>



</div>