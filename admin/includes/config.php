<?php

// Database configuration

/*$bd_host = "localhost";     // Database host
$bd_usuario = "admin173517";       // Database username
$bd_password = "147258369 ";      // Database password
$bd_base = "db_click_webspacemania_com";            // Database name
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); mysql_select_db($bd_base, $con);*/

$bd_host = "localhost";     // Database host
$bd_usuario = "root";       // Database username
$bd_password = "";      // Database password
$bd_base = "sharewz";            // Database name
$link = "http://localhost:8085/bux/";            // Your Site url
$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
mysql_select_db($bd_base, $con);     // Dont Edit

?>
    