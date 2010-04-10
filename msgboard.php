<?php
include ('header.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{
	$user=$_COOKIE["usNick"];
	$sql = "SELECT * FROM tb_users WHERE username='$user'";
	$result = mysql_query($sql);        
	$row = mysql_fetch_array($result);
	$status = $row['user_status'];
	mysql_close();	
}
else
{
	$status="passby";
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
$yz=trim($_POST["securecode"]);
$yzma=trim($_POST["gencode"]);
$nickname=$_POST["nickname"];
$qq = $_POST['qq'];
$qq = strip_tags($qq);
$email = trim($_POST['mailbox']);
$email = strip_tags($email);
$content = $_POST['tbCommentBody'];
$content = strip_tags($content);
$posttime=date("y-m-d H:i");

if (strrpos($nickname,"<")!==false || strrpos($nickname,">")!==false||strrpos($nickname,"@")!==false||strrpos($nickname,"\"")!==false||strrpos($nickname,"'")!==false||strrpos($nickname,"_")!==false)
{
    echo "<script>alert('昵称中不能包含特殊字符！');location.href='msgboard.php';</script>";
    exit();
}

if($nickname=="admin"&&$nickname=="管理员")
{
    echo "<script>alert('请输入合理的昵称');location.href='msgboard.php';</script>";
    exit();
}

if(empty($nickname))
{
    echo "<script>alert('昵称不能为空！必填项');location.href='msgboard.php';</script>";
    exit();
}


if(empty($content))
{
    echo "<script>alert('留言不能为空哦！必填项');location.href='msgboard.php';</script>";
    exit();
}

else if ($yz <> $yzma)
{
  echo "<script>alert('验证码输入错误,请准确输入!');location.href='msgboard.php';</script>";
    exit();
}

else
{    
    $ip = getRealIP();//获取客户端IP地址
    include('config.php');
    $sql = "SELECT * FROM tb_msgboard WHERE ip = '$ip'";
    $result=mysql_query($sql);
    $hasip = mysql_fetch_row($result);
    if($hasip&&$status!="admin")
    {
    	
    }   
	$sql = "insert into tb_msgboard (name,qq,email,ip,content,posttime,belong,user_status) values ('$nickname','$qq','$email','$ip','".mysql_escape_string($content)."','$posttime','msgboard','$status')";
    mysql_query($sql) or die(mysql_error());
    mysql_close();
    echo "<script>location.href='msgboard.php';</script>";
}
}
?>
<script type="text/javascript">
function clt_enter(event) {
    if (event.ctrlKey && event.keyCode == 17) {
    	document.getElementById("commentform").onsubmit();
        return false;
    }
    else {
        return true;
    }
}
function inputcheck()
{
	var verifystr=document.getElementById("nickname").value;
	if(verifystr=="")
	{
		alert("昵称不能为空！");
		return false;
	}
	var myReg = /^[^@\/\'\\\"#$%&\^\*]+$/;
	if(!myReg.test(verifystr))
	{	
		alert("昵称中不能包含特殊字符！");
		return false;
	}
	verifystr=document.getElementById("mailbox").value; 
	if(verifystr!="")
	{
		myReg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
		if(!myReg.test(verifystr))
		{
			alert("请输入合法邮箱！");
			return false;
		}
	}
	verifystr=document.getElementById("qq").value; 
	if(verifystr!="")
	{
		myReg = /^[1-9]\d{3,11}$/;
		if(!myReg.test(verifystr))
		{
			alert("请输入合法QQ号！");
			return false;
		}
	}
	verifystr=document.getElementById("tbCommentBody").value;
	if(verifystr=="")
	{
		alert("请输入留言内容！");
		return false;
	}
	if(verifystr.length>600)
	{
		alert("留言最多300个汉字600个字母！");
		return false;
	}
	verifystr=document.getElementById("securecode").value;
	if(verifystr=="")
	{
		alert("请输入验证码！");
		return false;
	}
	if(verifystr!=document.getElementById("gencode").value)
	{
		alert("验证码输入错误！");
		return false;
	}
	return true;
}
</script>
<div class="box" style="margin-top:20px;">
<!-- left col -->
	<div style="float:left;width:655px;border:1px solid #FFCC00;padding:10px;">
	<!-- bbs -->
<?php 
	include('config.php');
	 $pagesize=20;
		//取得记录总数$rs，计算总页数用
		$rs=mysql_query("select count(*) from tb_msgboard");
		$myrow = @mysql_fetch_array($rs);
		$numrows=$myrow[0];
		//计算总页数
		$pages=intval($numrows/$pagesize);
		if ($numrows%$pagesize)
		$pages++;
		//设置页数
		//设置为第一页
		if (isset($_GET['page'])){
		$page=intval($_GET['page']);
		}
		else{
		//设置为第一页
		$page=1;
		}

		//计算记录偏移量
		$offset=$pagesize*($page - 1);
		if(isset($_GET['getname']))
		{
			$getname=urldecode($_GET['getname']);
			$condition='and name=\''.$_GET['getname'].'\'';
		}
		else
		{
			$condition='';
		}
    $message=mysql_query("SELECT * FROM tb_msgboard where belong='msgboard' $condition order by posttime desc LIMIT $offset , $pagesize");
    if ($myrow = mysql_fetch_array($message))
    	{
    		do {
?>
	<div style="border:1px solid #E8E7D0;margin-bottom:10px;width:99.5%;">
		<div style="border-bottom:1px dashed #E8E7D0;color:#666666;height:30px;line-height:30px;padding-left:10px;padding-right:15px;">
			<div style="float:right;text-align:right;width:160px;">
			<?php if($status=="admin") echo '<a href="#">回复</a>';?>
			<a href="#">引用</a>
			<a target="_blank" href="./msgboard.php?getname=<?php echo urlencode($myrow['name']);?>" title="查看该昵称发表过的留言">查看</a>
			</div>
			<span style="color:#0067E6"><?=$myrow['name'] ?></span>			
			留言于：<?=$myrow['posttime'] ?> |
			<span <?php if($myrow["user_status"]=="admin") echo 'style="color:red;"'; elseif ($myrow["user_status"]=="user") echo 'style="color:#0067E6;"';?>><?php if($myrow["user_status"]=="admin") echo "[管理员]";else if($myrow["user_status"]=="user") echo "[注册用户]";else echo "[游客]";?></span>
		</div>
		<div style="border-bottom:1px solid #E8E7D0;line-height:1.5em;min-height:35px;padding:15px 18px 15px 18px;">
		<span><?php echo nl2br($myrow['content']); ?></span>
		</div>
		<div style="text-align:right;border-bottom:0 solid #CCCCCC;height:30px;line-height:30px;padding-left:10px;padding-right:15px;">
		<img height="13" width="13" src="images/mail.gif" title="<?=$myrow["email"] ?>"/><span>邮件&nbsp;|&nbsp;</span> 
		<img height="13" width="13" src="images/qq.gif" title="<?=$myrow["qq"] ?>"/><span>QQ&nbsp;|&nbsp;</span>
		<img height="13" width="13" src="images/ip.gif" title="<?=$myrow["ip"] ?>"/>IP</span>
		</div>
	</div>
<?php
    		}
    		while($myrow = mysql_fetch_array($message));
    	}
    	echo '<div class="pages">';
    	$allpage=$pages;
    	if($pages>10)
    	{
    		$pages=10;
    		$hasall=true;
    	}
		for($i=1;$i<=$pages;$i++)
		{
			if($page==$i)
			echo '<span>'.$i.'</span>';
			else
			echo "<a href='article.php?page=".$i."'>".$i."</a>";
		}
		if($hasall)
		echo "...<a href='article.php?page=".$allpage."'>".$allpage ."</a>";
		if($page!=$allpage)
		echo "<a href='article.php?page=".($page+1)."'>NEXT></a>";
		echo "</div>";
?>

	<!-- /bbs -->
	<!-- textarea -->
	<div>
	<form action="msgboard.php" id="commentform" name="commentform" method="post" onsubmit="return inputcheck();">
	<p>
	昵称:<input name="nickname" id="nickname" maxlength="15" type="text" <?php echo isset($_COOKIE["usNick"])&&$_COOKIE["usNick"]!="admin"?'value="'.$_COOKIE["usNick"].'" readonly="true"':'value=""'; ?> style="font-size:12px;border:1px solid #CCCCCC;padding:2px 2px 2px 10px;width:150px;height:15px;margin-left:10px; "><span style="color: red">*</span>
	</p>
	<p style="margin-top:5px;">
	邮箱:<input name="mailbox" id="mailbox" type="text" maxlength="15" autocomplete="on" value="" style="font-size:12px;border:1px solid #CCCCCC;padding:2px 2px 2px 10px;width:150px;height:15px;margin-left:10px; ">
	&nbsp;&nbsp;&nbsp;&nbsp;QQ :<input name="qq" id="qq"  maxlength="15" type="text"  autocomplete="on" value="" style="font-size:12px;border:1px solid #CCCCCC;padding:2px 2px 2px 10px;width:150px;height:15px;margin-left:10px; ">
	</p>
	<p style="margin-top:5px;">
	发表留言：
	</p>
	<textarea onkeydown="return clt_enter(event)" style="height:300px;width:450px;" name="tbCommentBody" id="tbCommentBody"></textarea>
	<p style="margin-top:5px;">
	验证码：<input id="securecode" name="securecode"  maxlength="4" type="text" style="font-size:12px;border:1px solid #CCCCCC;padding:2px 2px 2px 10px;width:50px;height:15px;margin-left:10px; ">
<?php
$seedarray =microtime();
$seedstr =split(" ",$seedarray,5);
$seed =$seedstr[0]*10000;
//第二步:使用种子初始化随机数发生器
srand($seed);
//第三步:生成指定范围内的随机数
$random =rand(1000,9999);
echo "<span style=\"color:#0067E6;margin-left:10px; \">".$random."</span>";
?>	<span style="color: red">*</span><input type="hidden" name="gencode" value=<?=$random ?>></input>
	</p>
	<p style="margin-top:5px;">
	<input type="submit" value="提交留言" id="btn_comment_submit" name="btn_comment_submit" />
	</p>
	<p>
	[提示：Ctrl+Enter快速提交]
	</p>
	</form>
	</div>
	<!-- /textarea -->
	</div>
<!-- /left col -->
    <div id="col-signup">
	<?php include ('signup.php')?>
    <hr class="noscreen" />
   	</div>
</div>

<?php include("footer.php"); ?>