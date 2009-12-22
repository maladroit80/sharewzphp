<?php
if (isset($_POST["adid"]))
{

$adid=$_POST["adid"];
$cheattype=$_POST["cheattype"];
$cheatvalue=$_POST["cheatvalue"];



    $query = "UPDATE tb_config SET price='$cheattype',howmany='$adid',signupvalue='$cheatvalue' where item='cheat'";
    mysql_query($query) or die(mysql_error());









    echo "<font color=\"green\"><b>防欺骗配置被修改.</b></font><br><br>";


}


?>

<form method="post" action="index.php?op=41">
<br>
<b>欺骗参数配置</b><br>
<table width="589">
<tr>
<th width="200">欺骗链接ID号:</th>
<td> <input type="text" name="adid" value="<?php

$sqlfn = "SELECT * FROM tb_config WHERE item='cheat'";
$resultfn = mysql_query($sqlfn);        
$rowfn = mysql_fetch_array($resultfn);

echo $rowfn["howmany"];

?>">  </td>
</tr>




<tr>
<th width="200">点中欺骗操作类型:</th>
<td><input type="text" name="cheattype" value="<?php
echo $rowfn["price"];
?>">  
  0--帐户清零 1--帐户扣除</td>
</tr>

<tr>
<th width="200">点中扣除金额:</th>
<td> <input type="text" name="cheatvalue" value="<?php
echo $rowfn["signupvalue"];
?>">
  元 （欺骗操作类型置1有效） </td>
</tr></table>


<center><input type="submit" value="保存修改" class="button">
</center>


</form>