<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<b>添加注册广告</b><br>
<br>

<?
$id=$_POST["id"];
$adname = $_POST["adname"];
$owner = $_POST["owner"];
$url = $_POST["url"];
$adnum = $_POST["adnum"];
$paypal = $_POST["paypal"];
$value = $_POST["value"];
$instruction = $_POST["instruction"];

if($url==NULL) {
}else{
$paypal=$paypal;
$owner = $owner;
$adname = $adname;
$value = $value;
$adnum = $adnum;
$instruction =$instruction;

$status="no";

$query = "INSERT INTO tb_signupads (owner, paypal, adname, url, adnum, value, instruction, status) VALUES( '$owner', '$paypal', '$adname', '$url', '$adnum', '$value', '$instruction', '$status')";
mysql_query($query) or die(mysql_error());

echo "注册广告被添加..";


}




?>

<form action="index.php?op=32" method="POST">

<table>
  <tr>
    <th>支付宝帐号</th>
    <td><input name="paypal" type="text" id="paypal" size="25" maxlength="100" autocomplete="off"></td>
  </tr>
  <tr>
    <th>广告名称</th>
    <td width="257"><input name="adname" type="text" id="adname" size="25" maxlength="100" autocomplete="off"></td>
  </tr>
  <tr>
<th width="150">链接(包含 http://)</th>
<td><input type="text" size="25" maxlength="100" name="url" autocomplete="off" value="http://"></td>
</tr>
<tr>
  <th width="150">所有者</th>
<td><input name="owner" type="text" id="owner" size="25" maxlength="100" autocomplete="off"></td></tr>
<tr>
  <th width="150">数量</th>
  <td><input name="adnum" type="text" id="adnum" value="50" size="10" maxlength="100" autocomplete="off"></td>
</tr>

<tr><td><div align="center"><strong>价值</strong></div></td><td><input name="value" type="text" id="value" value="0.00" size="10" maxlength="100" autocomplete="off">
  元</td>
</tr>
<tr>
  <td><div align="center"><strong>说明</strong></div></td>
  <td><textarea name="instruction" cols="40" rows="5" id="instruction" autocomplete="off"></textarea></td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td></td>
  <td><input type="submit" value="添加新的注册广告" class="button"></td>
</tr>
</table>

</form>