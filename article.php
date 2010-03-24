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
      <div class="tipblock" style="float:left;width:200px">
        <h3>最近更新</h3>
        <div style="height:400px" id="format">1</div>
      </div>
      <div style="float:right;width:400px;margin-right:20px;height:100px">
      </div>
        <div class="tipblock" style="float:right;width:460px;margin-right:20px;margin-top:20px">
        <h3>广告</h3>
        <div style="height:280px" id="format">1</div>
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
    	include("./news/".$node.".php");
    }
    else if(file_exists("./news/".$node.".html"))
    {
    	include("./news/".$node.".html");
    }
    else
    {
    	require('config.php');
    	$htmlarticles=mysql_query("SELECT * FROM tb_news WHERE url='$node'");
    	if(mysql_num_rows($htmlarticles)>0)
    	{
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

