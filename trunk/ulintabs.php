<?php
include('config.php');
$query="select count(*) from tb_signupads where status='yes' and adnum>0";
$result=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['count(*)']>0)
{
	$num=mt_rand(0,$row['count(*)']-1);
	$query="select * from tb_signupads where status='yes' and adnum>0 limit $num,1";
	$result=mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	if($row['gradeuser']!="")
	{
		$echostr="<a href='regads.php'><span>会员".$row['gradeuser']."于".$row['gradetime']."推荐注册任务<strong>".$row['adname']."</strong>，快去看看吧<br/></span></a>";
	}
	else
	{
		$echostr="<a href='regads.php><span>新加入注册任务".$row['adname']."，快去看看吧<br/></span></a>";
	}
}
else 
{
	$echostr="<a href='adsignup.php'><span>注册任务优惠中，快来发布您自己的注册任务吧<br/></span></a>";
}
echo $echostr."
      <a href='#s02'><span>点击赚钱<br/></span></a>
      <a href='#s03'><span>发布广告<br/></span></a>
      <a href='#s04'><span>留言板<br/></span></a>
      <a href='#s05'><span>我的账户<br/></span></a>

"
?>