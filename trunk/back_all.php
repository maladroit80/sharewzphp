<?php include('header.php'); ?>
<?php
require ('config.php');
?>
<div class="mem_left">
<?php include('memberbackleft.php')?>
</div>
<div align="center">
    <table width="680" style="border-collapse: collapse" bordercolor="#111111" cellpadding="0" cellspacing="0">
      <tr bgcolor="#FFFFFF">
      <td>
      </tr>
      <tr bgcolor="#FFFFFF" id="sitemenu">
		<td><a href="sites_available.php" >可做站点</a></td>
		<td><a href="sites_joined.php" >已做站点</a></td>
		<td><a href="sites_notavailable.php" >受限站点</a></td>
		<td><a href="sites_paid.php" >收款站点</a></td>
		<td><a href="sites_scam.php" >停止推荐</a></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td height="10">&nbsp;</td>
      </tr>
      <tr><td colspan="5">
      <table width="100%" border="0" cellspacing="1" cellpadding="5" style="border:1px solid #FFCC00;">
					   <tr align="center"><td colspan="5">返佣记录</td></tr>
                        <tr style="background-color:#D9EDff;" align="center">
                            <td>
                               编号
                            </td>
                            <td>
                            	站点名
                            </td>
                            <td>
                                用户名
                            </td>
                            <td>
                                返佣金额
                            </td>
                            <td>
                                时间
                            </td>
                        </tr> 	
                        <?php
$perNumber=20; //每页显示的记录数
$page=$_GET['page']; //获得当前的页面值
$count=mysql_query("select count(*) from tb_back_history"); //获得记录总数
$rs=mysql_fetch_array($count); 
$totalNumber=$rs[0];
$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
if (!isset($page)) {
 $page=1;
} //如果没有值,则赋值1
$startCount=($page-1)*$perNumber; //分页开始,根据此方法计算出开始的记录
$result=mysql_query("select * from tb_back_history limit $startCount,$perNumber"); //根据前面的计算出开始的记录和记录数
while ($row=mysql_fetch_array($result)) {	
					echo "
					<tr>
					<td style='background-color: #FAFAFA;text-align:center;height:30px;'>". $row["id"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $row["site_name"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $row["username"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>￥". $row["pay_sum"] ."</td>
					<td style='background-color: #FAFAFA;text-align:center;'>". $row["time"] ."</td>";
					}?>

<tr align="right"><td colspan="5">
<?php
if ($page != 1) { //页数不等于1
?>
<a href="back_all.php?page=<?php echo $page - 1;?>">上一页</a> <!--显示上一页-->
<?php
}
for ($i=1;$i<=$totalPage;$i++) {  //循环显示出页面
?>
<a href="back_all.php?page=<?php echo $i;?>"><?php echo $i ;?></a>
<?php
}
if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
?>
<a href="back_all.php?page=<?php echo $page + 1;?>">下一页</a></td></tr>
<?php
} 
?>
					</table>
  
      </td></tr>
      <tr bgcolor="#FFFFFF">
        <td height="28">&nbsp;</td>
        <td height="28">&nbsp;</td>
        <td height="28">&nbsp;</td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td height="28" colspan="5"><div align="center"><a href="contact.php">黄金广告位50元/月</a></div></td>
      </tr>
    </table>
</div>




</div>
<?php include('footer.php'); ?>