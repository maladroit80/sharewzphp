<?php
if (!isset($_GET["no"]))
{
include ('header.php');
?>
<!-- Page -->
    <!-- Content -->
    <div class="box" style="margin-top:20px;">
      <!-- col-1 -->
      <div style="float:left;width:700px;">
      <div class="tipblock" style="float:left;width:200px;">
        <h3>最近推荐</h3>
        <div style="padding:5px 5px" id="format">
        <div>
        <?php
        require('config.php');
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
    	$articles=mysql_query("SELECT * FROM tb_news order by date desc LIMIT 0 , 20");
    	if ($myrow = mysql_fetch_array($articles))
    	{
    		do {
    			$a=$myrow['title'];
    			$a=cut_str($a,11);
    			echo '<li style="list-style-type:none;"><a title="'.$myrow['title'].'" target="_blank" href="./article/'.$myrow["url"].'.html">'.$a.'</a></li>';
    		}
    		while($myrow = mysql_fetch_array($articles));
    	}
        ?>
        </div>
		</div>
      </div>
		<div style="float:right;width:460px;margin-right:20px;">
			<!--左上left table head-->      	
          <div class="title01460-top"></div>
		    <div class="title01460">
		      <div class="title01460-in">
		        <h3 class="ico-info">文章</h3>
		      </div>
		    </div>
		  <div class="title01460-bottom">
		  </div>
		  <!--/左上left table head-->  
		  <!--左上left table content-->  
		  <div class="articlecontent">
        <?php
        require('config.php');
    	$articles=mysql_query("SELECT * FROM tb_news order by date desc LIMIT 0 , 10");
    	if ($myart = mysql_fetch_array($articles))
    	{
    		do {
    			$mytitle=$myart['title'];
    			$mytitle=cut_str($mytitle,50);
    			$content=cut_str(strip_tags($myart['content']),100);
?>
		<div>
 		<h3><a target="_blank" href="./article/<?=$myart["url"] ?>.html" title="<?=$myart['title'] ?>"><?=$mytitle ?></a></h3>               	
		<p><?=$content ?></p>                   
		<div>                    
		<span style="color:#0067E6"><?php if($myart['author']=='admin') echo 'march-autumn'; else echo $myart['author']; ?></span> 
		发布于 <?=$myart['date'] ?> 
		<span>&nbsp;</span> <span><a href="./article/<?=$myart["url"] ?>.html">
		阅读(<span><?=$myart['counts'] ?></span>)</a></span></div>
		</div>
		<hr style="border:1px dotted #0067E6;">
<?php
    		}
    		while($myart = mysql_fetch_array($articles));
    	}
       ?>
		 </div>
		  <!--/左上left table content-->  		  
      	</div>
      </div>
      <!-- /col-1 -->
      <!-- col-signip --> 
      <div id="col-signup">
	    <?php include ('signup.php')?>
        <hr class="noscreen" />
    </div>
    <!-- /col-signip -->
    </div>    
    <!-- Content -->
  <!-- footer -->
  <?php include("footer.php") ?>;
  <!-- /footer -->
<?php
}
else
{
	$node=strtolower($_GET["no"]);
    if(file_exists("./news/".$node.".php"))
    {
    	require('config.php');
    	mysql_query("update tb_news set counts=counts+1 where url='$node'") or die(mysql_error());
    	include("./news/".$node.".php");
    }
    else if(file_exists("./news/".$node.".html"))
    {
    	mysql_query("update tb_news set counts=counts+1 where url='$node'") or die(mysql_error());
    	include("./news/".$node.".html");
    }
    else
    {
    	require('config.php');
    	$htmlarticles=mysql_query("SELECT * FROM tb_news WHERE url='$node'");
    	if(mysql_num_rows($htmlarticles)>0)
    	{
    		mysql_query("update tb_news set counts=counts+1 where url='$node'") or die(mysql_error());
    		$htmlarticle=mysql_fetch_array($htmlarticles);
    		$title=$htmlarticle['title'];
    		$author=$htmlarticle['author'];
    		$content=$htmlarticle['content'];
    		$date=$htmlarticle['date'];
    		if ($fp = fopen("article/usertemp.html", "r")) {
			$page=fread ($fp,filesize ("article/usertemp.html"));
			fclose($fp);
			$page=str_replace ("{newstitle}",$title,$page);
			$page=str_replace ("{newsdatefrom}",$author.'('.$date.')',$page);
			$page=str_replace ("{newscontents}",$content,$page);
			if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
			$page=str_replace ("<a href='../login.php'>登陆</a>","<span>欢迎回来，</span><a href='../members.php'>".$_COOKIE["usNick"]."</a>",$page);
			if(strpos($_SERVER["HTTP_USER_AGENT"],"Chrome")) 
			$page=str_replace ("{stylecontrol}","style='bottom:-2px'",$page);
     		else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 7.0")) 
     		$page=str_replace ("{stylecontrol}","style='bottom:-1.5px'",$page);
      		else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 6.0")) 
      		$page=str_replace ("{stylecontrol}","style='bottom:-10px'",$page);
      		else 
      		$page=str_replace ("{stylecontrol}","",$page);
			echo $page;
			}
    	}
    	else
    	{
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=article.php">
<?php
    	}
    }
}  
?>

