<b>添加新的返佣站点</b>
<br>
<br>

<?
$id=$_POST["id"];
$user = $_POST["user"];
$tipo = $_POST["tipo"];
$plan = $_POST["plan"];
$url = $_POST["url"];
$description = $_POST["description"];
$category = $_POST["category"];




if($url==NULL) {
}else{


// sanitizamos las variables

//$user = limpiar($user);
//$tipo = limpiar($tipo);
//$plan = limpiar($plan);
//$url = limpiar($url);
//$description = limpiar($description);
//$category = limpiar($category);


$query = "INSERT INTO tb_ads (user, tipo, plan, url, description, category) VALUES( 'admin', 'ads', '1000', '$url', '$description', '$category')";
mysql_query($query) or die(mysql_error());

echo "广告被添加..";


}




?>

<form action="index.php?op=55" method="POST">

<table>
<tr>
<th width="150">站点id:</th>
<td><input type="text" size="25" maxlength="100" name="siteid" autocomplete="off" value="<?php

$sql = "SELECT select max(site_id) from  FROM tb_back_site WHERE id='1'";
$result = mysql_query($sql);        
//$row = mysql_fetch_array($result);

 //echo $row["sitepp"]; 
 if ($result = 0){
 echo "0";}
 else {echo $result+1;}
 ?>"></td>
</tr>
<tr>
  <th width="150">站点名:</th>
  <td><input type="text" size="25" maxlength="100" name="sitename" autocomplete="off"></td></tr>
<tr>
  <th width="150">点击值:</th>
  <td><input type="text" size="25" maxlength="100" name="clickvalue" autocomplete="off"></td></tr>
<tr>
  <th width="150">货币单位:</th>
  <td>
<select name='moneyunit'>
<option value="title">人民币</option>

<option value="content">美元</option>
</select>
</td></tr>
<tr>
  <th width="150">下线提成比例:</th>
  <td><input type="text" size="25" maxlength="100" name="referearnpercent" autocomplete="off"></td></tr>
<tr>
  <th width="150">返佣比例:</th>
  <td>

<select name='backpercent'>
<option value="title">50%</option>

<option value="content">70%</option>
</select>
</td></tr>
<tr>
  <th width="150">最小支付:</th>
  <td><input type="text" size="25" maxlength="100" name="minpay" autocomplete="off"></td></tr>
<tr>
  <th width="150">支付方式:</th>
  <td><input type="text" size="25" maxlength="100" name="paymethod" autocomplete="off"></td></tr>
<tr>
  <th width="150">下线最大数目:</th>
  <td><input type="text" size="25" maxlength="100" name="maxrefernumber" autocomplete="off"></td></tr>
<tr>
  <th width="150">当前下线人数:</th>
  <td><input type="text" size="25" maxlength="100" name="nowrefernumber" autocomplete="off"></td></tr>
<tr>
  <th width="150">返佣次数:</th>
  <td><input type="text" size="25" maxlength="100" name="backnumber" autocomplete="off"></td></tr>
<tr>
  <th width="150">站点状态:</th>
  <td>

<select name='backpercent'>
<option value="title">金钻推荐</option>
<option value="title">银钻推荐</option>
<option value="title">铜钻推荐</option>
<option value="content">推荐</option>
</select>
</td></tr>
<tr>
  <th width="150">站点类别:</th>
  <td><input type="text" size="25" maxlength="100" name="sitecategory" autocomplete="off"></td></tr>
<tr>
  <th width="150">下线链接:</th>
  <td><input type="text" size="25" maxlength="100" name="referlink" autocomplete="off"></td></tr>
<tr>
  <th width="150">教程链接:</th>
  <td><input type="text" size="25" maxlength="100" name="helplink" autocomplete="off"></td></tr>
<tr>
  <th width="150">站点说明:</th>
  <td><input type="text" size="25" maxlength="100" name="sitecomment" autocomplete="off"></td></tr>
<tr>
  <th width="150">加入时间:</th>
  <td><input type="text" size="25" maxlength="100" name="sitetime" autocomplete="off" value="<?php echo date("l   dS   of   F   Y   h:i:s   A"); ?>"></td></tr>

<tr><td></td><td>
<input type="submit" value="添加" class="button"></td></tr></table>

</form>