<?php 
session_start();
?>

<?php
 include('header.php');
require ('config.php');

function limpiare($mensaje)
{$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;}
$id=limpiare($_GET["id"]);
$lole=$_COOKIE["usNick"];
$sql = "SELECT * FROM tb_messenger where id='$id' and sendto='$lole'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
$query = "UPDATE tb_messenger SET status='read' where id='$id'"; mysql_query($query) or die(mysql_error());
mysql_close($con);
?>
<br>
<div align="center"><div id="form">
<fieldset>
<legend>读取消息</legend>

<form method="POST" action="replysms.php?to=<?php echo $row["sendfrom"] ?>">
<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><label>日期</label></td>
    <td width="250" align="left"><?php echo $row["date"]; ?></td>
  </tr>
  <tr>
    <td width="150" align="left"><label>从</label></td>
	<td width="250" align="left"><?php echo $row["sendfrom"]; ?></td>
  </tr>
  <tr>
    <td width="150" align="left"><label>消息</label></td>
	<td width="250" align="left"><?php echo $row["comments"]; ?></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right">
      <div align="left">
        <input type="submit" value="回复" class="submit" tabindex="4" />
	    </div></td>
  </tr>
</table>
</form>
</fieldset>
</div></div>
<?php include('footer.php'); ?>