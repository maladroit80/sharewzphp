<?php
if (!isset($_GET["no"]))
{
include ('header.php');
?>
<!-- Page -->
<!-- Content -->
<div class="box" style="margin-top: 20px;">
<div style="float: left; width: 700px;">
<div style="float: left; width: 200px;"><!-- col-1 -->
<div class="tipblock" style="float: left; width: 200px;">
<h3>最近推荐</h3>
<div style="padding: 5px 5px" id="format">
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
    	$articles=mysql_query("SELECT * FROM tb_news where status='c' order by date desc LIMIT 0 , 10");
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
<!-- /col-1 --> <!-- col-2 -->
<div class="tipblock"
	style="float: left; width: 200px; margin-top: 15px;">
<h3>一周人气</h3>
<div style="padding: 5px 5px" id="format">
<div>
        <?php
        require('config.php');
    	$articles=mysql_query("SELECT * FROM tb_news order by date desc LIMIT 0 , 10");
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
<!-- /col-2 --> <!-- col-3 -->
<div class="tipblock"
	style="float: left; width: 200px; margin-top: 15px;">
<h3>随机文章</h3>
<div style="padding: 5px 5px" id="format">
<div>
        <?php
        require('config.php');
    	$articles=mysql_query("SELECT t1.id as id,title,url FROM tb_news AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(id) FROM tb_news)-(SELECT MIN(id) FROM tb_news))+(SELECT MIN(id) FROM tb_news)) AS id) AS t2 WHERE t1.id >= t2.id ORDER BY t1.id LIMIT 10");
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
<!-- /col-3 --></div>
<div style="float: right; width: 460px; margin-right: 20px;">
<div class="title01460-top"></div>
<div class="title01460">
<div class="title01460-in">
<h3 class="ico-info">文章</h3>
</div>
</div>
<div class="title01460-bottom"></div>
<div
	style="width: 100%; margin-top: 5px; font-size: 120%; text-align: right;"><a
	href="./addboard.php" title="<?=$myart['title'] ?>">我要发布</a>&nbsp;&nbsp;</div>
<div class="articlecontent">
        <?php
        $myarts=array();
        require('config.php');
        $pagesize=10;
		//取得记录总数$rs，计算总页数用
		$rs=mysql_query("select count(*) from tb_news");
		$myrow = @mysql_fetch_array($rs);
		$numrows=$myrow[0];
		//计算总页数
		$numrows=$numrows-3>0?$numrows-3:3;
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
    	$articles=mysql_query("SELECT * FROM tb_news where status='t' order by date desc LIMIT 0 , 3");
    	if ($myart = mysql_fetch_array($articles))
    	{
    		do{
    			$myarts[]=$myart;
    		}
    		while($myart = mysql_fetch_array($articles));
    	}
    	$articles=mysql_query("SELECT * FROM tb_news where url<>'".$myarts[0]['url']."' and url<>'".$myarts[1]['url']."' and url<>'".$myarts[2]['url']."' order by date desc LIMIT $offset , $pagesize");
		if ($myart = mysql_fetch_array($articles))
    	{
    		do{
    			$myarts[]=$myart;
    		}
    		while($myart = mysql_fetch_array($articles));
    	}
    	foreach($myarts as $key=>$myart)
    	{
    		$mytitle=$myart['title'];
    		$mytitle=cut_str($mytitle,50);
    		$content=cut_str(strip_tags($myart['content']),100);
		?>
		<div>
<h3><?php if($key<3) echo '<img alt="置顶" src="./images/top.gif" />';
 		else if($myart['status']=='c'||$myart['status']=='t') echo '<img alt="推荐" src="./images/cool.gif" />';
 		?><a style="TEXT-DECORATION: none"
	href="./article/<?=$myart["url"] ?>.html" title="<?=$myart['title'] ?>">
 		<?php 
 		 $boardTypes=array(
				"experience"=>"经验心得",
				"freetalk"=>"家常闲话",
				"recommend"=>"站点推荐",
				"CHM"=>"网赚教程"
		);
		if($myart['origin']=='1') 
		echo '[原创]'; 
		else if($myart['origin']=='0') 
		echo '[转贴]';
		$flag=true; 
		foreach($boardTypes as $key=>$boardType)
		{
			if($key==$myart['type'])
			{
				$flag=false;
				echo "[".$boardType."]";
				break;
			}
		}
		if($flag)
		{
			echo "[".$myart['type']."]";
		}
?>
<?=$mytitle ?></a></h3>
<p><?=$content ?></p>
<div><span style="color: #0067E6"><?php if($myart['author']=='admin') echo 'march-autumn'; else echo $myart['author']; ?></span> 
		发布于 <?=$myart['date'] ?> 
		<span>&nbsp;</span> <span><a href="./article/<?=$myart["url"] ?>.html">
阅读(<span><?=$myart['counts'] ?></span>)</a></span></div>
</div>
<hr style="border: 1px dotted #0067E6;">
<?php
    		}
    	echo '<div class="pages">';
    	$allpage=$pages;
    	if($page>1)
		echo "<a href='article.php?page=".($page-1)."'>&lt;LAST</a>";
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
		if($page!=$allpage&&$allpage!=0)
		echo "<a href='article.php?page=".($page+1)."'>NEXT></a>";
		echo "</div>";
       ?>
		 </div>
<!--/左上left table content--></div>
</div>
<!-- /col-1 --> <!-- col-signip -->
<div id="col-signup">
	    <?php include ('signup.php')?>
        <hr class="noscreen" />
</div>
<!-- /col-signip --></div>
<!-- Content -->
<!-- footer -->
<?php include("footer.php"); ?>
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
    	//add by user
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
    		$page=str_replace ("{titleinhead}","易网赚-".$title,$page);
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

