<?php include('header.php'); ?>

<h3 style="font-weight: bold; color: #009900">注册广告 - 注册赚钱</h3>
<p><br>
    

</p>
<table width="89%" align="center" cellspacing="1" bgcolor="#C1CE97">
  <tr bgcolor="#FFFFFF">
    <td height="24" colspan="4"><div align="center" style="color: #CC0066">
      此处放您的广告代码
    </div></td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24"><div align="center" style="color: #009900; font-weight: bold">广告位0.3元/天</div></td>
  <td><div align="center" style="color: #009900; font-weight: bold">广告位0.3元/天</div></td>
    <td><div align="center" style="color: #009900; font-weight: bold">广告位0.3元/天</div></td>
    <td><div align="center" style="color: #009900; font-weight: bold">广告位0.3元/天</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24" colspan="4"><span style="font-size: 14px">1.会员提交虚假注册，广告主可以拒绝会员的任务奖励申请，会员作弊3次即被删除帐号. </span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24" colspan="4"><span style="font-size: 14px">2.会员完成注册但是申请被拒绝的，可到论坛投诉，广告主恶意拒绝3次即取消该广告. </span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="12" colspan="4"><span style="font-size: 14px">3.在本站<span style="color: #FF0000; font-weight: bold">注册作弊举报区</span>投诉作弊者，需写清广告名称和链接及作弊者</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="6" colspan="4"><span style="font-size: 14px">4.加本站注册任务群：<span style="color: #0000FF; font-weight: bold">51639830 <span style="color: #996600">提供最新注册任务奖励及返佣</span></span></span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="6" colspan="4"><span style="font-size: 14px">5.每人每个注册任务只可做一次，发现多次提交者立即删除账号，余款不付</span></td>
  </tr>
</table>
<div id="tables">
<table width="90%" align="center">


<tr bgcolor="#666666">
<th width="51%" bgcolor="#999999" class="top">
  <div align="left" style="font-size: 18px"><b> </b>
  注册广告名</div></th>
<th width="27%" class="top">
  <div align="left" style="font-size: 18px"><span style="font-weight: bold">奖励(元)</span></div></th>
<th width="22%" class="top">
  <div align="left" style="font-size: 18px"><b>剩下数目</b></div></th>
</tr>
<?php 
require('config.php');
$status="yes";
$tabla = mysql_query("SELECT * FROM tb_signupads WHERE status='$status' and adnum>0 ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
mysql_close($con);
while ($registro = mysql_fetch_array($tabla))
{
echo "
<tr>
<td><a href=\"viewregads.php?id=".$registro['id']."\"><FONT color=green size=3 face=\"Verdana, Arial, Helvetica, sans-serif\">".$registro['adname']."</font></a></td>
<td><FONT color=green size=3 face=\"Verdana, Arial, Helvetica, sans-serif\"> ". $registro['value'] ."元</font></td>
<td><FONT color=green size=3 face=\"Verdana, Arial, Helvetica, sans-serif\">". $registro['adnum'] ."</font></td>
<tr>
";
}
?>
</table>

</div>


		<!--footer starts here-->
<?php include('footer.php'); ?>