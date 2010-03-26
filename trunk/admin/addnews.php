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
        function cut_str($sourcestr,$cutlength)
		{
  			$returnstr='';
  			$i=0;
   			$n=0;
  			$str_length=strlen($sourcestr);//字符串的字节数
   			while (($n<$cutlength) and ($i<=$str_length))
   			{
   			   $temp_str=substr($sourcestr,$i,1);
    			$ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码
    			if ($ascnum>=224)    //如果ASCII位高与224，
      			{
					$returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符        
        			 $i=$i+3;            //实际Byte计为3
       				  $n++;            //字串长度计1
     			 }
    			  elseif ($ascnum>=192) //如果ASCII位高与192，
     			 {
      				   $returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
      				   $i=$i+2;            //实际Byte计为2
      				   $n++;            //字串长度计1
     			 }
    			  elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
     			 {
     			    $returnstr=$returnstr.substr($sourcestr,$i,1);
      			   $i=$i+1;            //实际的Byte数仍计1个
         			$n++;            //但考虑整体美观，大写字母计成一个高位字符
      			}
     			 else                //其他情况下，包括小写字母和半角标点符号，
     			 {
		        	 $returnstr=$returnstr.substr($sourcestr,$i,1);
		        	 $i=$i+1;            //实际的Byte数计1个
         				$n=$n+0.5;        //小写字母和半角标点等与半个高位字符宽...
     			 }
   			}
        	 if ($str_length>$i){
          $returnstr = $returnstr . "...";//超过长度时在尾处加上省略号
     		 }
   		 return $returnstr;
	
		}
$content=cut_str(strip_tags($content),110);
$query ="INSERT INTO tb_news (id,title,url,author,date, counts, type, origin, content) VALUES (NULL, '".$title." ', '".$filename."', '".$author."', '".date("y-m-d H:i")." ', '1', '".$type."', '3','".$content."');";
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
