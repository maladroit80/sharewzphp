<?php include('header.php'); 
if(!isset($_COOKIE["usNick"]) || !isset($_COOKIE["usPass"]))
{
    echo "<h2>注册用户才能发布文章，请<a href='login.php'>登陆</a>或<a href='register.php'>注册</a></h2>";
    exit();
}
$title=isset($_POST['title'])?$_POST['title']:'';
$content=isset($_POST['userfck'])?stripslashes($_POST['userfck']):'';
$postboardtype=isset($_POST['boardtype'])?$_POST['boardtype']:'';
if(isset($_POST['original']))
{
	if($_POST['original']=='1')
		$isoriginal=true;
	else if($_POST['original']=='0')
		$isoriginal=false;
	else
		$isoriginal='';
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if($_POST['title']==''||$isoriginal===''||$_POST['boardtype']==''||$_POST['userfck']=='')
	{
		echo '<br/><div style="text-align:center;color:red"  ><b>请填写完整的文章信息</b></br></div>';
	}
	else
	{
		include('config.php');
		$author=$_COOKIE["usNick"];
		$sql = "SELECT * FROM tb_users WHERE username='$author'";
		$result = mysql_query($sql);        
		$row = mysql_fetch_array($result);
		$userid=$row['id'];
		$fileid=$userid.str_shuffle(date("YmdHis"));
		$original=$isoriginal?'1':'0';
		$query ="INSERT INTO tb_news (id,title,url,author,date, counts, type, origin, content) VALUES (NULL, '".$title." ', '".$fileid." ', '".$author."', '".date("y-m-d H:i")." ', '1', '".$postboardtype."','".$original."','".mysql_escape_string($content)."');";
 		mysql_query($query) or die(mysql_error());
 		echo '<br/><div style="text-align:center"><b>文章发布成功</b>&nbsp; <input id="clock" size="3" readonly="readonly" style="border: medium none ; padding: 0pt; font-size: 12pt;" type="text"/></br></div>';
 		echo '<script>
				var x = 4
				var y = 1
				function startClock(){
				if(x!=="Done"){
				x = x-y
				document.getElementById("clock").value = x
				setTimeout("startClock()", 1000)
				}
				if(x==0){
				x="Done";
				location.href="members.php";
				}}
				window.onload=startClock();
				</script>';
		include("footer.php");
		exit();
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
      <div id="format">
      	<div>    	
  		<form action="addboard.php" method="post">
      	<lable>标题：</lable><input type="text" name="title" style="width:500px;" value="<?=$title ?>"></input><br/><br/> 
  		<input type="radio" <?php if($isoriginal===true) echo 'checked="checked"'; ?> name="original" value="1">原创</input><input type="radio" <?php if($isoriginal===false) echo 'checked="checked"'; ?> name="original" value="0">转贴</input>
  		&nbsp; <lable>分类：</lable>
  		<select name="boardtype" size="1">
  		<?php 
  		foreach($boardTypes as $key=>$boardType)
  		{
  			$isselect=$key==$postboardtype?'selected="selected"':'';
  			echo '<option value="'.$key.'"'.$isselect.'>'.$boardType.'</option>';
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