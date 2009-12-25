<?php include('header.php'); ?>
<div style="margin:15px auto 0 auto;width:600px;">
<div class="title600px-top"></div>
<div class="title600px">
<div class="title600px-in">
<h2 align="center"><a href="advertise.php">注册广告 - 注册赚钱</a></h2>
</div>
</div>
<div class="title600px-bottom"></div>
</div>
<div style="width:95%;height:50px;margin:15px auto 0 auto;border:1px solid #FFCC00">
广告位
</div>
<div style="width:95%;margin:15px auto 0 auto;border:2px solid #FFCC00">
<h3 align="center">同意条款：</h3>
<div style="width:60%;margin:15px auto">
<img width="7" height="7" border="0" align="absmiddle" src="images/bullet2.gif"/><span style="margin-left:10px;">会员提交虚假注册，广告主可以拒绝会员的任务奖励申请，会员作弊3次即被删除帐号.</span><br/>
<img width="7" height="7" border="0" align="absmiddle" src="images/bullet2.gif"/><span style="margin-left:10px;">会员完成注册但是申请被拒绝的，可到论坛投诉，广告主恶意拒绝3次即取消该广告.</span><br/>
<img width="7" height="7" border="0" align="absmiddle" src="images/bullet2.gif"/><span style="margin-left:10px;">本站会员和广告主可至<span style="color: #FF0000; font-weight: bold">注册作弊举报区</span>投诉作弊者，需写清广告名称和链接及作弊者.</span><br/>
<img width="7" height="7" border="0" align="absmiddle" src="images/bullet2.gif"/><span style="margin-left:10px;">每人每个注册任务只可做一次，发现多次提交者立即删除账号，余款不付.</span><br/>
</div>
</div>

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