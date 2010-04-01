<?php include('header.php'); ?>
<?php
require ('config.php');
?>
      <table width="100%" border="0" cellspacing="1" cellpadding="5" style="border:1px solid #ddddFF;">
					   <tr align="center"><td colspan="5">本站支付记录</td></tr>
                        <tr style="background-color:#D9EDff;" align="center">
                            <td>
                               编号
                            </td>
                            <td>
                                用户名
                            </td>
                            <td>
                                支付额
                            </td>
                            <td>
                                支付时间
                            </td>
                        </tr> 	
                        	
                        <?php
$perNumber=20; //每页显示的记录数
$page=$_GET['page']; //获得当前的页面值
$count=mysql_query("select count(*) from tb_history"); //获得记录总数
$rs=mysql_fetch_array($count); 
$totalNumber=$rs[0];
$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
if (!isset($page)) {
 $page=1;
} //如果没有值,则赋值1
$startCount=($page-1)*$perNumber; //分页开始,根据此方法计算出开始的记录
$result=mysql_query("SELECT * FROM tb_history ORDER BY id ASC limit $startCount,$perNumber"); //根据前面的计算出开始的记录和记录数
while ($row=mysql_fetch_array($result)) {
	echo "
	<tr>
	<td style='background-color: #FAFAFA;text-align:center;height:30px;'>". $row["id"] ."</td>
	<td style='background-color: #FAFAFA;text-align:center;'>". $row["user"] ."</td>
	<td style='background-color: #FAFAFA;text-align:center;'>￥". $row["amount"] ."</td>
	<td style='background-color: #FAFAFA;text-align:center;'>". $row["date"] ."</td></tr>";
					
}?>

<tr align="right"><td colspan="4">
<?php
if ($page != 1) { //页数不等于1
?>
<a href="payment_history.php?page=<?php echo $page - 1;?>">上一页</a> <!--显示上一页-->
<?php
}
for ($i=1;$i<=$totalPage;$i++) {  //循环显示出页面
?>
<a href="payment_history.php?page=<?php echo $i;?>"><?php echo $i ;?></a>
<?php
}
if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
?>
<a href="payment_history.php?page=<?php echo $page + 1;?>">下一页</a></td></tr>
<?php
} 
?>
					</table>
  
	<!--footer starts here-->
<?php include('footer.php'); ?>