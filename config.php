<?php

$bd_host = "localhost";     // Database host
$bd_usuario = "root";       // Database username
$bd_password = "1";      // Database password
$bd_base = "sharewz";            // Database name
$link = "http://www.easywzw.com/";            // Your Site url
$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
mysql_select_db($bd_base, $con);     // Dont Edit

$SetCharacterSetSql = "SET NAMES 'utf8'";
mysql_query($SetCharacterSetSql, $con) or die(mysql_error());

$encryptkey="scyhh";
?>
