<?
if (isset($_POST["click"]))
{


$sitename=$_POST["sitename"];
$sitepp=$_POST["sitepp"];
$click=$_POST["click"];
$referalclick=$_POST["referalclick"];
$payment=$_POST["payment"];
$premiumclick=$_POST["premiumclick"];
$premiumreferalc=$_POST["premiumreferalc"];
$upgrade=$_POST["upgrade"];



$hits500=$_POST["hits500"];
$hits1000=$_POST["hits1000"];
$hits2000=$_POST["hits2000"];
$hits3000=$_POST["hits3000"];
$hits5000=$_POST["hits5000"];
$hits10000=$_POST["hits10000"];
$hits20000=$_POST["hits20000"];
$hits30000=$_POST["hits30000"];
$hits50000=$_POST["hits50000"];
$hits100000=$_POST["hits100000"];







    //Todo parece correcto procedemos con la inserccion


	$query = "UPDATE tb_site SET sitename='$sitename' where id='1'";
    mysql_query($query) or die(mysql_error());

	$query = "UPDATE tb_site SET sitepp='$sitepp' where id='1'";
    mysql_query($query) or die(mysql_error());




    $query = "UPDATE tb_config SET price='$click' where item='click' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$referalclick' where item='referalclick' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$premiumclick' where item='premiumclick' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$premiumreferalc' where item='premiumreferalc' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$payment' where item='payment' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$upgrade' where item='upgrade' and howmany='1'";
    mysql_query($query) or die(mysql_error());





    $query = "UPDATE tb_config SET price='$hits500' where item='hits' and howmany='500'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits1000' where item='hits' and howmany='1000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits2000' where item='hits' and howmany='2000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits3000' where item='hits' and howmany='3000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits5000' where item='hits' and howmany='5000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits10000' where item='hits' and howmany='10000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits20000' where item='hits' and howmany='20000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits30000' where item='hits' and howmany='30000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits50000' where item='hits' and howmany='50000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits100000' where item='hits' and howmany='100000'";
    mysql_query($query) or die(mysql_error());









    echo "<font color=\"green\"><b>配置被修改.</b></font><br><br>";


}


?>

<form method="post" action="index.php?op=9">


<?
$sql = "SELECT * FROM tb_site WHERE id='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
?>

<b>站点参数配置</b><br>
<table>
<tr>
  <th width="200">
站点名称</th>
  <td> <input type="text" name="sitename" value="<? echo $row["sitename"]; ?>" 

size="30" maxlength="30">
</td></tr>

<tr>
  <th>

站点支付宝帐号</th>
  <td> <input type="text" name="sitepp" value="<?

$sql = "SELECT * FROM tb_site WHERE id='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

 echo $row["sitepp"]; ?>" size="30" maxlength="30"></td></tr>
 </table>




<?

$sql = "SELECT * FROM tb_config WHERE item='click' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

?>
<b>普通会员参数</b><br>
<table>
<tr>
<th width="200">每个用户点击价值:</th>
<td> <input type="text" name="click" value="<? echo $row["price"]; ?>">
  元</td>
</tr>
<tr>
<th width="200">每个下线点击价值</th><td> <input type="text" name="referalclick" value="<?

$sql = "SELECT * FROM tb_config WHERE item='referalclick' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

 echo $row["price"]; ?>">
元</td>
</tr>
<tr>
<th width="200">最小支付</th><td> <input type="text" name="payment" value="<?

$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["price"]; ?>">
  元</td>
</tr>

<tr>
<th width="200">升级高级会员价格</th>
<td> <input type="text" name="upgrade" value="<?

$sql = "SELECT * FROM tb_config WHERE item='upgrade' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["price"]; ?>">
元</td>
</tr></table>


<?

$sql = "SELECT * FROM tb_config WHERE item='premiumclick' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

?>
<b>高级会员参数</b><br>
<table>
<tr>
<th width="200">每个高级会员点击价值:</th>
<td> <input type="text" name="premiumclick" value="<? echo $row["price"]; ?>">
  元</td>
</tr>
<tr>
<th width="200">高级会员下线点击价值:</th>
<td> <input type="text" name="premiumreferalc" value="<?

$sql = "SELECT * FROM tb_config WHERE item='premiumreferalc' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["price"]; ?>">
  元</td>
</tr></table>


<b>广告参数配置</b><br>




<table>
<tr>
<th width="200">购买500次点击:</th>
<td> <input type="text" name="hits500" value="<?

$sqlfn = "SELECT * FROM tb_config WHERE item='hits' and howmany='500'";
$resultfn = mysql_query($sqlfn);        
$rowfn = mysql_fetch_array($resultfn);

echo $rowfn["price"];

?>">
  元</td>
</tr>




<tr>
<th width="200">购买1000次点击:</th>
<td> <input type="text" name="hits1000" value="<?

$sqla = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$resulta = mysql_query($sqla);        
$rowa = mysql_fetch_array($resulta);

echo $rowa["price"];

?>">
  元</td>
</tr>

<tr>
<th width="200">购买2000次点击:</th>
<td> <input type="text" name="hits2000" value="<?

$sqled = "SELECT * FROM tb_config WHERE item='hits' and howmany='2000'";
$resulted = mysql_query($sqled);        
$rowed= mysql_fetch_array($resulted);

echo $rowed["price"];

?>">
  元</td>
</tr>

<tr>
<th width="200">购买3000次点击:</th>
<td> <input type="text" name="hits3000" value="<?

$sqli = "SELECT * FROM tb_config WHERE item='hits' and howmany='3000'";
$resulti = mysql_query($sqli);        
$rowi = mysql_fetch_array($resulti);

echo $rowi["price"];

?>">
  元</td>
</tr>

<tr>
<th width="200">购买5000次点击:</th>
<td> <input type="text" name="hits5000" value="<?

$sqlo = "SELECT * FROM tb_config WHERE item='hits' and howmany='5000'";
$resulto = mysql_query($sqlo);        
$rowo = mysql_fetch_array($resulto);

echo $rowo["price"];

?>">
  元</td>
</tr>

<tr>
<th width="200">购买10000次点击:</th>
<td> <input type="text" name="hits10000" value="<?

$sqlu = "SELECT * FROM tb_config WHERE item='hits' and howmany='10000'";
$resultu = mysql_query($sqlu);        
$rowu = mysql_fetch_array($resultu);

echo $rowu["price"];

?>">
  元</td>
</tr>


<tr>
<th width="200">购买20000次点击:</th>
<td> <input type="text" name="hits20000" value="<?

$sqltt = "SELECT * FROM tb_config WHERE item='hits' and howmany='20000'";
$resulttt = mysql_query($sqltt);        
$rowtt = mysql_fetch_array($resulttt);

echo $rowtt["price"];

?>">
  元</td>
</tr>

<tr>
<th width="200">购买30000次点击:</th>
<td> <input type="text" name="hits30000" value="<?

$sqltr = "SELECT * FROM tb_config WHERE item='hits' and howmany='30000'";
$resulttr = mysql_query($sqltr);        
$rowtr = mysql_fetch_array($resulttr);

echo $rowu["price"];

?>">
  元</td>
</tr>

<tr>
<th width="200">购买50000次点击:</th>
<td> <input type="text" name="hits50000" value="<?

$sqlft = "SELECT * FROM tb_config WHERE item='hits' and howmany='50000'";
$resultft = mysql_query($sqlft);        
$rowft = mysql_fetch_array($resultft);

echo $rowft["price"];

?>">
  元</td>
</tr>

<tr>
<th width="200">购买100000次点击:</th>
<td> <input type="text" name="hits100000" value="<?

$sqlot = "SELECT * FROM tb_config WHERE item='hits' and howmany='100000'";
$resultot = mysql_query($sqlot);        
$rowot = mysql_fetch_array($resultot);

echo $rowot["price"];

?>">
  元</td>
</tr></table>


<center><input type="submit" value="保存修改" class="button">
</center>


</form>