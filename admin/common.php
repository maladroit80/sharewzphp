<b>处理中...</b>
<br>
<br>

<?
$category=$_GET["category"];
if($category=='leastpay')
{
	$leastpay_value = $_POST["leastpay"];
	$date = date("Y-n-d H:i");
    $query = "UPDATE tb_common SET value='$leastpay_value', time='$date' where itemid='leastpay'";
    mysql_query($query) or die(mysql_error());
    echo "设置成功";
}
?>

<form action="index.php?op=60" method="post" enctype="text/plain">
  
<input type="submit" value="返回" class="button"></td></tr></table>

</form>