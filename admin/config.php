<?php

$bd_host = "localhost";     // Database host
$bd_usuario = "root";       // Database username
$bd_password = "";      // Database password
$bd_base = "sharewz";            // Database name
$link = "http://localhost:8085/bux/";            // Your Site url
$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
mysql_select_db($bd_base, $con);     // Dont Edit

$SetCharacterSetSql = "SET NAMES 'utf8'";
mysql_query($SetCharacterSetSql, $con) or die(mysql_error());
date_default_timezone_set('Asia/Shanghai'); 
$encryptkey="scyhh";
?>
