<?php include('header.php');
?>
<div style="margin:15px auto 0 auto;width:600px;">
<div class="title600px-top"></div>
<div class="title600px">
<div class="title600px-in">
<h2 align="center"><a href="advertise.php">浏览广告 - 访问网站</a></h2>
</div>
</div>
<div class="title600px-bottom"></div>
</div>
<div> 
<?php
require('config.php');
$tabla = mysql_query("SELECT id FROM tb_ads_categories ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
mysql_close($con);
while ($registro = mysql_fetch_array($tabla))
 { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
$indice = $registro["id"];
require('config.php');
$sql = "SELECT * FROM tb_ads_categories WHERE id='$indice'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
?>
<table width="95%" align="center" bordercolor="#009900">

<tr bgcolor="#FFCC00">
<th width="60%" class="top">
  <div align="left"><b> <img src="images/attach.png" width="16" height="16" alt="cat sign"  align="absmiddle" /><?php echo $row["catname"] ?></b>
  </div></th>
<th width="12%" class="top">
  <div align="left"><b>会员点击</b></div></th>
<th width="12%" class="top">
  <div align="left"><b>站外点击</b></div></th>
<th width="8%" class="top">
  <div align="left"><b>总计</b></div></th>
</tr>

<?php
/* Pedimos todos los temas iniciales (identificador==0)
* y los ordenamos por ult_respuesta */

if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{


$lolz=$_COOKIE["usNick"];

require('config.php');
$sqlr = "SELECT * FROM tb_users WHERE username='$lolz'";
$resultr = mysql_query($sqlr);        
$myrowr = mysql_fetch_array($resultr);
mysql_close($con);
$tipr=$myrowr["account"];

switch($tipr) {
case("premium"):
require('config.php');
$sql = "SELECT * ";
$sql.= "FROM tb_ads WHERE tipo='ads' and category='$indice' ORDER BY fechainicia DESC";
$rs = mysql_query($sql, $con);
mysql_close($con);
if(mysql_num_rows($rs)>0)
{
    // Leemos el contenido de la plantilla de temas
    $template = implode("", file("titulosp.php"));

    while($row = mysql_fetch_assoc($rs))
    {


$row["last"]=uc($_COOKIE["usNick"]);


$row["total"]=$row["outside"] + $row["members"];

$bold=$row["bold"];
if ($bold=="1")
{
$row["bold"]="<b>";
$row["boldc"]="</b>";
}


$highlight=$row["highlight"];
if ($highlight=="1")
{
$row["highlight"]="#cccccc";
$row["highlight"]="#cccccc";
}

$ji=$row["members"];
$jo=$row["plan"];
if ($ji >= $jo)
{




$row["description"]="";
$row["members"]="";
$row["outside"]="";
$row["total"]="";
$row["id"]="";
}

        mostrarTemplate($template, $row);

    }
}

      break;

    default:
require('config.php');
$sql = "SELECT * ";
$sql.= "FROM tb_ads WHERE tipo='ads' and category='$indice' ORDER BY fechainicia DESC";
$rs = mysql_query($sql, $con);
mysql_close($con);
if(mysql_num_rows($rs)>0)
{
    // Leemos el contenido de la plantilla de temas
    $template = implode("", file("titulos.php"));

    while($row = mysql_fetch_assoc($rs))
    {


$row["last"]=uc($_COOKIE["usNick"]);


$row["total"]=$row["outside"] + $row["members"];

$bold=$row["bold"];
if ($bold=="1")
{
$row["bold"]="<b>";
$row["boldc"]="</b>";
}


$highlight=$row["highlight"];
if ($highlight=="1")
{
$row["highlight"]="#cccccc";
$row["highlight"]="#cccccc";
}

$ji=$row["members"];
$jo=$row["plan"];
if ($ji >= $jo)
{




$row["description"]="";
$row["members"]="";
$row["outside"]="";
$row["total"]="";
$row["id"]="";
}

        mostrarTemplate($template, $row);

    }
}

}

}else{

require('config.php');
//require('functions.php');

$sqlr = "SELECT * ";
$sqlr.= "FROM tb_ads WHERE tipo='ads' and category='$indice' ORDER BY fechainicia DESC";
$rsr = mysql_query($sqlr, $con);
mysql_close($con);
if(mysql_num_rows($rsr)>0)
{
    // Leemos el contenido de la plantilla de temas
    $templater = implode("", file("titulos1.php"));

    while($rowr = mysql_fetch_assoc($rsr))
    {


$rowr["total"]=$rowr["outside"] + $rowr["members"];


$bold=$rowr["bold"];
if ($bold=="1")
{
$rowr["bold"]="<b>";
$rowr["boldc"]="</b>";
}

$highlight=$rowr["highlight"];
if ($highlight=="1")
{
$rowr["highlight"]="#cccccc";
$rowr["highlight"]="#cccccc";
}


$ji=$rowr["members"];
$jo=$rowr["plan"];
if ($ji >= $jo)
{
$rowr["description"]="";
$rowr["members"]="";
$rowr["outside"]="";
$rowr["total"]="";
$rowr["id"]="";
}


        mostrarTemplate($templater, $rowr);

    }
}



}




?>
</table>



<?php
} // fin del bucle de ordenes
?>
</table>
</div>
<!--footer starts here-->
<?php include('footer.php'); ?>