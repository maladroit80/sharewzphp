<?php
if (isset($_POST["title"])&&isset($_POST["author"])&&isset($_POST["content"]))
{

$title=$_POST["title"];
$author=$_POST["author"];
$content=$_POST["content"];
$type=$_POST["type"];
if ($fp = fopen("../news/temp/newstemplate.php", "r")) {
	$page=fread ($fp,filesize ("../news/temp/newstemplate.php"));
	fclose($fp);
	$page=str_replace ("{newstitle}",$title,$page);
	$page=str_replace ("{newsdatefrom}",$author,$page);
	$page=str_replace ("{newscontents}",$content,$page);
}
$filename=str_shuffle(date("YmdHis"));
$path="./../news/".$filename.".php";
file_put_contents("$path",$page);
include('config.php');
$query ="INSERT INTO tb_news (id,title,url,author,date, counts, type) VALUES (NULL, '".$title." ', '".$filename.".php"." ', '".$author."', '".date("y-m-d H:i")." ', '1', '".$type."');";
 mysql_query($query) or die(mysql_error());
 echo "成功发布";
}


else
{

?>





<form action='index.php?op=42' method='POST'>
<div>
<lable>标题：</lable><input type="text" name="title" style="width:500px;"></input><br/>
<lable>作者：</lable><input type="text" name="author" style="width:200px;"></input><br/>
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
