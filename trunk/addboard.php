<?php include('header.php'); 
if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    echo "<h2>注册用户才能发布文章，请<a href='login.php'>登陆</a>或<a href='register.php'>注册</a></h2>";
    exit();
}
$title=isset($_POST['title'])?$_POST['title']:'';
$content=isset($_POST['userfck'])?$_POST['userfck']:'';;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['sub'])&&$_POST['title']!=''&&$_POST['original']!=''&&$_POST['boardtype']!=''&&$_POST['userfck']!='')
	{
		echo '<b>请填写完整的文章信息</b></br>';
	}
	else
	{
		
	}
}
$boardTypes=array(
				"experience"=>"经验心得",
				"freetalk"=>"家常闲话",
				"recommend"=>"站点推荐",
				"CHM"=>"网赚教程"
		);
?>
<!-- Content -->
    <div class="box" style="margin-top:20px;">
      <!-- col-1 -->
      <div style="float:left;width:670px;margin-left:10px" class="tipblock">
        <ul><li>严禁发布含有敏感的政治、军事、宗教、危害国家安全，泄露国家秘密，破坏国家统一，损害国家荣誉和利益的文章主题.</li>
		<li>严禁发布谣言、淫秽、色情、赌博、暴力、谩骂、恐怖或者教唆犯罪的言论.</li>
		<li>严禁发布垃圾、无效文章.如有发现上述文章，请<a href="contact.php">联系我们</a>，我们将予以奖励</li>
		<li>如果发现发布以上文章，将予以警告，视情节予以扣除账户金额处分.</li>
		<li>请根据您的文章内容正确选择文章分类，以保证更多的站友看到您的文章.</li>
		</ul>
      <h3>发布文章</h3>
      <div id="format" style="height:650px">
      	<div>
      	
  		<form action="addboard.php" method="post" enctype="text/plain">
      	<lable>标题：</lable><input type="text" name="title" style="width:500px;" value="<?=$title ?>"></input><br/><br/> 	
  		<input type="radio" checked="checked" name="original" value="original">原创</input><input type="radio" name="original" value="copy">转贴</input>
  		&nbsp; <lable>分类：</lable>
  		<select name="boardtype" size="1">
  		<?php 
  		foreach($boardTypes as $key=>$boardType)
  		{
  			echo '<option value="'.$key.'">'.$boardType.'</option>';
  		}
  		?>
  		</select>
  		<br/><br/> 
  		<?php
  		include_once("./fckeditor/fckeditor.php") ;
		$oFCKeditor = new FCKeditor('userfck') ;
		$oFCKeditor->BasePath = 'fckeditor/' ;
		$oFCKeditor->Height='500';
		$oFCKeditor->ToolbarSet = 'MySetting';
		$oFCKeditor->Value = $content;
		$oFCKeditor->Create() ;
		?>			
  		<hr width="0%" size="2">  
  		<input type="image" src="./images/submit-button.gif" name="sub" alt="提交"/>
  		</form>
  		</div> 
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