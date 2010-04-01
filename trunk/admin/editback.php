<?php
if($_SERVER['REQUEST_METHOD']=='POST') 
{
if (isset($_POST["title"])&&isset($_POST["author"])&&isset($_POST["adminfck"])&&isset($_GET["name"]))
{
$title=$_POST["title"];
$author=$_POST["author"];
$content=stripslashes($_POST["adminfck"]);
$type=$_POST["type"];
if($_POST["origin"]=='3')
{
	$filename=$_GET["name"].".php";
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
$query ="update tb_news set title='".$title."',author='".$author."',date='".date("y-m-d H:i")."',type='".$type."',content='".mysql_escape_string($content)."' where url='".$_GET["name"]."'";
mysql_query($query) or die(mysql_error());
echo "编辑成功";
}
else
{
	include('config.php');
	$query ="update tb_news set title='".$title."',author='".$author."',type='".$type."',content='".mysql_escape_string($content)."' where url='".$_GET["name"]."'";
	mysql_query($query) or die(mysql_error());
	echo "编辑成功";
}


}
}
else if(isset($_GET["name"]))
{
if(isset($_GET["origin"])&&$_GET["origin"]!='3')
{
	require_once("config.php");
	$rs=mysql_query("select * from tb_news where url='".$_GET["name"]."'");
	$data=mysql_fetch_array($rs);
	mysql_close($con);
	$boardTypes=array(
				"experience"=>"经验心得",
				"freetalk"=>"家常闲话",
				"recommend"=>"站点推荐",
				"CHM"=>"网赚教程"
		);
}
else
{
	$filename=$_GET["name"].".php";
	if ($fp = fopen("../news/".$filename, "r"))
	{
		$fcontent=fread ($fp,filesize ("../news/".$filename));
		preg_match("/<!-- rc -->.*<!-- \/rc -->/si",$fcontent, $matches);
		$matches[0]=substr($matches[0],14,strlen($matches[0])-30);
		require_once("config.php");
		$rs=mysql_query("select * from tb_news where url='".$_GET["name"]."'");
		$data=mysql_fetch_array($rs);
		mysql_close($con);
	}
	else
	{
		echo "网页不存在！"; 
		exit();
	}
}
include_once("../fckeditor/fckeditor.php");
?>
<lable>文章ID：<?=$_GET["name"]?></lable>
<br/>
<br/>
<form action='index.php?op=45&&name=<?php echo $_GET["name"]?>' method='POST'>
<div>
<lable>标题：</lable><input type="text" name="title" style="width:500px;" value="<?php echo $data["title"]?>"></input><br/>
<lable>作者：</lable><input type="text" name="author" style="width:200px;" value="<?php echo $data["author"]?>"></input><br/>
<?php
$oFCKeditor = new FCKeditor('adminfck') ;
$oFCKeditor->BasePath = '../fckeditor/' ;
$oFCKeditor->Height='500';
//$oFCKeditor->ToolbarSet = 'MySetting';
$oFCKeditor->Value = isset($matches)?$matches[0]:$data["content"];
$oFCKeditor->Create() ;
?>
<br/>
<?php
if(!isset($boardTypes))
{
?>
<input type=radio name="type" CHECKED value="经验心得">经验心得</input>
<input type=radio name="type" value="建站交流">建站交流</input>
<input type=radio name="type" value="通告">通告</input>
<?php
}
else
foreach($boardTypes as $key=>$boardType)
{
?>
<input type=radio name="type" <?php if($key==$data["type"]) echo "CHECKED"; ?> value="<?=$key ?>"><?=$boardType ?></input>
<?php
}
?>
<input type="hidden" name="origin" value="<?=$data["origin"] ?>"/> 
<input type="submit" value="确定" onclick="javascript:Submit();"/>
</div>
</form>
<?php	
}
?>