<?php 
if(!isset($_COOKIE["usNick"]) && !isset($_COOKIE["usPass"]))
{
	include('accessdeny.php');
	exit();
}

include_once('header.php'); 
?>

<div style="margin:15px auto 0 auto;width:600px;">
<div class="title600px-top"></div>
<div class="title600px">
<div class="title600px-in">
<h2 align="center"><a href="adsignup.php">注册广告 - 注册赚钱</a></h2>
</div>
</div>
<div class="title600px-bottom"></div>
</div>
<?php
if (isset($_GET["id"]))
{
$id=$_GET["id"];
require('config.php');
$status="yes";
$tabla = mysql_query("SELECT * FROM tb_signupads WHERE id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre      
$registro = mysql_fetch_array($tabla);
mysql_close($con);
?>
<div style="width:60%;margin:15px auto;">
<table cellspacing="1" bgcolor="#009900">
<?php echo "
<tr>
<th bgcolor=\"#FFFFFF\" class=\"top\"><div align=\"center\"><FONT style='color:#FFAC00;' size=5 face=\"Verdana, Arial, Helvetica, sans-serif\">". $registro["adname"] ."</FONT></div></th>
</tr>
    <tr>
    <th bgcolor=\"#FFFFFF\" class=\"top\"><div align=\"left\"><FONT color=black size=3 face=\"Verdana, Arial, Helvetica, sans-serif\">注册链接:<a href=\"".$registro['url']."\" target=\"_blank\">".$registro['url']."</FONT></div></a>
	<div align=\"left\"><strong><FONT color=red size=2 face=\"Verdana, Arial, Helvetica, sans-serif\">点击上面的链接注册.如果你已经注册或者已经完成了这个任务,请不要做,否则会导致你的帐户被删除.</FONT></strong></div>
</th>
   </tr>
   <tr>
      <th bgcolor=\"#FFFFFF\" class=\"top\"><div align=\"left\"><strong><FONT color=black size=3 face=\"Verdana, Arial, Helvetica, sans-serif\">广告主附加说明:</font></strong></div><div align=\"left\"><FONT size=2 face=\"Verdana, Arial, Helvetica, sans-serif\">". $registro["instruction"] ."
	  </font></div><br><div align=\"left\"><FONT color=red size=3 face=\"Verdana, Arial, Helvetica, sans-serif\">注意:</font></div>
	  <div align=\"left\">如果你没有按照上面的链接注册,请不要点击下面的按钮,我们会毫不犹豫地删除那些恶意提交者的帐户.</div>
	  </th>
  </tr>
";
?>

<tr>
  <th bgcolor="#FFFFFF" class="top">
  <form  method="post" action="takeoffers.php?id=<?php echo $registro["id"] ?>"> 
    <div align="center">
      <p>
        提交在(<?php echo $registro["adname"]?>)注册的用户名(<span style="color: #0000FF">强烈建议使用本站用户名</span>)
                <input name="regname" type="text" id="regname" size="25" maxlength="100" autocomplete="off">
                <br><br>
                <input type="submit" name="Submit" value="完成这个注册" />  
          </p>
      </div>
  </form></th>
</tr>
<tr>
  <th bgcolor="#FFFFFF"  class="top"><div align="center"><a href="regads.php" style="font-size: 24px">后退</a></div></th>
</tr>

</table>

</div>
<?php
}
?>
		<!--footer starts here-->
<?php include('footer.php'); ?>