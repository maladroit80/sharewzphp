<?php
include ('header.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{
	$user=$_COOKIE["usNick"];
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
	<div style="float:left;width:655px;border:1px solid #FFCC00;height:1400px;padding:10px;">
	<!-- bbs -->
	<div style="border:1px solid #E8E7D0;margin-bottom:10px;width:99.5%;">
		<div style="border-bottom:1px dashed #E8E7D0;color:#666666;height:30px;line-height:30px;padding-left:10px;padding-right:15px;">
			<div style="float:right;text-align:right;width:160px;">
			<a href="#">回复</a>
			<a href="#">引用</a>
			<a target="_blank" href="#" title="查看该作者发表过的评论">查看</a>
			</div>
			<a href="#1791377">#3楼</a>
			<a name="1791377"/>[<span>楼主</span>]2010-03-31 18:56 |
			<a target="_blank" href="#">Artech</a>
		</div>
		<div style="border-bottom:1px solid #E8E7D0;line-height:1.5em;min-height:35px;padding:15px 18px 15px 18px;">
		<span>求高手告诉我怎样让英文自动换行且不要出现断词现像，在这里搜到的结果“word-wrap: break-word;word-break: break-all;”只能让英文自动换行，但却出现断词现像. ...</span>
		</div>
		<div style="text-align:right;border-bottom:0 solid #CCCCCC;height:30px;line-height:30px;padding-left:10px;padding-right:15px;">
		<img height="13" width="13" src="images/mail.gif" title="发送邮件"/><span>邮件&nbsp;|&nbsp;</span> 
		<img height="13" width="13" src="images/qq.gif" title="QQ号"/><span>邮件&nbsp;|&nbsp;</span>
		<img height="13" width="13" src="images/ip.gif" title="127.0.0.1"/>IP</span>
		</div>
	</div>
	<div style="border:1px solid #E8E7D0;margin-bottom:10px;width:99.5%;">
		<div style="border-bottom:1px dashed #E8E7D0;color:#666666;height:30px;line-height:30px;padding-left:10px;padding-right:15px;">
			<div style="float:right;text-align:right;width:160px;">
			<a href="#">回复</a>
			<a href="#">引用</a>
			<a target="_blank" href="#" title="查看该作者发表过的评论">查看</a>
			</div>
			<a href="#1791377">#3楼</a>
			<a name="1791377"/>[<span>楼主</span>]2010-03-31 18:56 |
			<a target="_blank" href="#">Artech</a>
		</div>
		<div style="border-bottom:1px solid #E8E7D0;line-height:1.5em;min-height:35px;padding:15px 18px 15px 18px;">
		<span>求高手告诉我怎样让英文自动换行且不要出现断词现像，在这里搜到的结果“word-wrap: break-word;word-break: break-all;”只能让英文自动换行，但却出现断词现像. ...</span>
		</div>
		<div style="text-align:right;border-bottom:0 solid #CCCCCC;height:30px;line-height:30px;padding-left:10px;padding-right:15px;">
		<img height="13" width="13" src="images/mail.gif" title="发送邮件"/><span>邮件&nbsp;|&nbsp;</span> 
		<img height="13" width="13" src="images/qq.gif" title="QQ号"/><span>邮件&nbsp;|&nbsp;</span>
		<img height="13" width="13" src="images/ip.gif" title="127.0.0.1"/>IP</span>
		</div>
	</div>
	<!-- /bbs -->
	<!-- textarea -->
	<div>
	<form action="msgboard.php" id="commentform" name="commentform" method="post" onsubmit="return inputcheck();">
	<p>
	昵称:<input name="nickname" id="nickname" type="text" <?php echo isset($_COOKIE["usNick"])?'value="'.$_COOKIE["usNick"].'" disabled="disabled"':'value="游客"'; ?> style="font-size:12px;border:1px solid #CCCCCC;padding:2px 2px 2px 10px;width:150px;height:15px;margin-left:10px; "><span style="color: red">*</span>
	</p>
	<p style="margin-top:5px;">
	邮箱:<input name="mailbox" id="mailbox" type="text" value="无名.net" style="font-size:12px;border:1px solid #CCCCCC;padding:2px 2px 2px 10px;width:150px;height:15px;margin-left:10px; ">
	&nbsp;&nbsp;&nbsp;&nbsp;QQ :<input name="qq" id="qq" type="text" value="无名.net" style="font-size:12px;border:1px solid #CCCCCC;padding:2px 2px 2px 10px;width:150px;height:15px;margin-left:10px; ">
	</p>
	<p style="margin-top:5px;">
	发表留言：
	</p>
	<textarea onkeydown="return clt_enter(event)" style="height:300px;width:450px;" name="tbCommentBody" id="tbCommentBody"></textarea>
	<p style="margin-top:5px;">
	验证码：<input id="securecode" name="securecode" type="text" style="font-size:12px;border:1px solid #CCCCCC;padding:2px 2px 2px 10px;width:50px;height:15px;margin-left:10px; ">
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