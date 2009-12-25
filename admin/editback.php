<?php
if($_SERVER['REQUEST_METHOD']=='POST') 
{
if (isset($_POST["title"])&&isset($_POST["author"])&&isset($_POST["content"])&&isset($_GET["name"]))
{
$title=$_POST["title"];
$author=$_POST["author"];
$content=$_POST["content"];
$type=$_POST["type"];
$filename=$_POST["name"];
if(file_exists("../news/".$filename))
{
	if(!unlink("../news/".$filename))
	{
		echo "删除文件../news/".$filename."失败";
		exit();
	}
}
if ($fp = fopen("../news/temp/newstemplate.php", "r")) {
	$page=fread ($fp,filesize ("../news/temp/newstemplate.php"));
	fclose($fp);
	$page=str_replace ("{newstitle}",$title,$page);
	$page=str_replace ("{newsdatefrom}",$author,$page);
	$page=str_replace ("{newscontents}",$content,$page);
}
file_put_contents("../news/".$filename,$page);
include('config.php');
$query ="update tb_news set title='".$title."',author='".$author."',date='".date("y-m-d H:i")."',type='".$type."' where url='".$filename."'";
mysql_query($query) or die(mysql_error());
echo "编辑成功";
}
}
else if(isset($_GET["name"]))
{
$filename=$_GET["name"];
if ($fp = fopen("../news/".$filename, "r"))
{
	$fcontent=fread ($fp,filesize ("../news/".$filename));
	require_once("config.php");
	$rs=mysql_query("select * from tb_news where url='".$filename."'");
	$date=mysql_fetch_array($rs);
	mysql_close($con);
	$pageno=explode('.',$filename);
	 echo "<script>window.open('../article.php?no=".$pageno[0]."','');</script>";
}
else{echo "网页不存在！"; 
exit();
}
?>
<form action='index.php?op=45&&page=<?php echo $_GET["page"]?>&&name=<?php echo $_GET["name"]?>' method='POST'>
<div>
<lable>标题：</lable><input type="text" name="title" style="width:500px;" value="<?php echo $date["title"]?>"></input><br/>
<lable>作者：</lable><input type="text" name="author" style="width:200px;" value="<?php echo $date["author"]?>"></input><br/>
<input type="hidden" value="" name="content"></input>
<script type="text/javascript" charset="utf-8" src="./../js/KindEditor.js"></script>
<script type="text/javascript"> 
var editor = new KindEditor("editor");
editor.hiddenName = "content";
editor.skinPath = "./../editor/skins/default/";
editor.iconPath = "./../editor/icons/";
editor.imageAttachPath = "./editor/attached/";
editor.imageUploadCgi = "./../editor/upload_cgi/upload.php";
editor.cssPath = "./common.css";
editor.editorWidth = "800px";
editor.editorHeight = "400px";
editor.show();
function Submit() {
	editor.data();
}
</script>
<input type=radio name="type" CHECKED value="经验心得">经验心得</input>
<input type=radio name="type" value="建站交流">建站交流</input>
<input type=radio name="type" value="通告">通告</input>

<input type="submit" value="确定" onclick="javascript:Submit();"/>
</div>
</form>
<?php	
}
?>