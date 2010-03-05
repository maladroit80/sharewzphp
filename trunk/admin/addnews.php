<?php
if (isset($_POST["title"])&&isset($_POST["author"])&&isset($_POST["adminfck"]))
{

$title=$_POST["title"];
$author=$_POST["author"];
$content=stripslashes($_POST["adminfck"]);
$type=$_POST["type"];
if ($fp = fopen("../news/temp/newstemplate.php", "r")) {
	$page=fread ($fp,filesize ("../news/temp/newstemplate.php"));
	fclose($fp);
	$page=str_replace ("{newstitle}",$title,$page);
	$page=str_replace ("{newsdatefrom}",$author.'('.date("y-m-d H:i").')',$page);
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
include_once("../fckeditor/fckeditor.php") ;
?>





<form action='index.php?op=42' method='POST'>
<div>
<lable>标题：</lable><input type="text" name="title" style="width:500px;"></input><br/>
<lable>作者：</lable><input type="text" name="author" style="width:200px;"></input><br/>
<?php
$oFCKeditor = new FCKeditor('adminfck') ;
$oFCKeditor->BasePath = '../fckeditor/' ;
$oFCKeditor->Height='500';
//$oFCKeditor->ToolbarSet = 'MySetting';
//$oFCKeditor->Value = '<p>This is some <strong>sample text</strong>. You are using <a href="http://www.fckeditor.net/">FCKeditor</a>.</p>' ;
$oFCKeditor->Create() ;
?>
</br>
<input type=radio name="type" CHECKED value="经验心得">经验心得</input>
<input type=radio name="type" value="建站交流">建站交流</input>
<input type=radio name="type" value="通告">通告</input>

<input type="submit" value="确定" onclick="javascript:Submit();"/>
</div>
</form>
<?php 
}
?>
