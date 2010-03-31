<b>添加新的返佣站点</b>
<br>
<br>

<?
$sitename=$_POST["sitename"];
$siteid=$_POST["siteid"];
$clickvalue = $_POST["clickvalue"];
$moneyunit = $_POST["moneyunit"];
$referearnpercent = $_POST["referearnpercent"];
$backpercent = $_POST["backpercent"];
$minpay = $_POST["minpay"];
$paymethod = $_POST["paymethod"];
$maxrefernumber = $_POST["maxrefernumber"];
$nowrefernumber = $_POST["nowrefernumber"];
$backnumber = $_POST["backnumber"];
$sitestatus = $_POST["sitestatus"];
$sitecategory = $_POST["sitecategory"];
$referlink = $_POST["referlink"];
$helplink = $_POST["helplink"];
$sitecomment = $_POST["sitecomment"];
$sitetime = $_POST["sitetime"];


//$sql = "SELECT select max(site_id) from  FROM tb_back_site WHERE id='1'";
//$result = mysql_query($sql);   

if($siteid==NULL) {
}else{
$query = "INSERT INTO tb_back_site (  site_name, click_value, site_money_unit, refer_earn_per, back_percent," .
		"min_pay,site_pay_method,max_refer_number,now_refer_number,back_number,site_status,site_category,refer_link,help_link,site_comment,site_time) VALUES(" .
		"'$sitename', '$clickvalue', '$moneyunit', '$referearnpercent', '$backpercent', '$minpay', '$paymethod', '$maxrefernumber', " .
		"'$nowrefernumber', '$backnumber', '$sitestatus', '$sitecategory', '$referlink', '$helplink', '$sitecomment', '$sitetime')";
mysql_query($query) or die(mysql_error());

echo "恭喜成功添加网赚站点";


}




?>

<form action="index.php?op=55" method="POST">

<table>
<tr>
<th width="150">站点id:</th>
<td><input type="text" size="25" maxlength="100" name="siteid" autocomplete="off" value="<?php

$sql = "SELECT max(site_id) FROM tb_back_site";
$result = mysql_query($sql); 
$row = mysql_fetch_array($result);
echo $row[0]+ 1;
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
<option value="￥">人民币</option>

<option value="$">美元</option>
</select>
</td>
</tr>
<tr>
  <th width="150">下线提成比例:</th>
  <td><input type="text" size="25" maxlength="100" name="referearnpercent" autocomplete="off"></td></tr>
<tr>
  <th width="150">返佣比例:</th>
  <td>

<select name='backpercent'>
<option value="0.5">50%</option>
<option value="0.7">70%</option>
<option value="1.0">100%</option>
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
  <td><input type="text" size="25" maxlength="100" name="nowrefernumber" autocomplete="off" value="0"></td></tr>
<tr>
  <th width="150">返佣次数:</th>
  <td><input type="text" size="25" maxlength="100" name="backnumber" autocomplete="off" value="0"></td></tr>
<tr>
  <th width="150">站点状态:</th>
  <td>

<select name='sitestatus'>
<option value="金钻推荐">金钻推荐</option>
<option value="银钻推荐">银钻推荐</option>
<option value="铜钻推荐">铜钻推荐</option>
<option value="推荐">推荐</option>
<option value="停止">停止</option>
</select>
</td></tr>
<tr>
  <th width="150">站点类别:</th>
  <td>
  
<select name='sitecategory'>
<option value="国内点击">国内点击</option>
<option value="国外点击">国外点击</option>
<option value="注册">注册赚钱</option>
<option value="调查">调查赚钱</option>
<option value="投票">投票赚钱</option>
<option value="冲浪">冲浪赚钱</option>
<option value="投资">投资赚钱</option>
<option value="威客">威客赚钱</option>
<option value="购物返利">购物返利</option>
<option value="另类">另类赚钱</option>
</select>
  </td></tr>
<tr>
  <th width="150">下线链接:</th>
  <td><input type="text" size="25" maxlength="100" name="referlink" autocomplete="off" value="http://"></td></tr>
<tr>
  <th width="150">教程链接:</th>
  <td><input type="text" size="25" maxlength="100" name="helplink" autocomplete="off" value="http://"></td></tr>
<tr>
  <th width="150">站点说明:</th>
  <td><input type="text" size="25" maxlength="100" name="sitecomment" autocomplete="off" value="注意推荐人为本站ID【easywzw】"></td></tr>
<tr>
  <th width="150">加入时间:</th>
  <td><input type="text" size="25" maxlength="100" name="sitetime" autocomplete="off" value="<?php echo date("Y-n-j"); ?>"></td></tr>

<tr><td></td><td>
<input type="submit" value="添加" class="button"></td></tr></table>

</form>