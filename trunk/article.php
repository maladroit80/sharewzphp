<?php
if (!isset($_GET["no"])||strtolower($_GET["no"])=="index")
{
include ('header.php');
?>
<!-- Page -->
    <!-- Content -->
    <div class="box" style="margin-top:20px;">
      <!-- col-1 -->
      <div style="float:left;width:700px;">
      <div class="tipblock" style="float:left;width:250px">
        <h3>广告</h3>
        <div style="height:400px">1</div>
      </div>
      <div style="float:right;width:400px;margin-right:20px;height:100px">
      </div>
        <div class="tipblock" style="float:right;width:420px;margin-right:20px;margin-top:20px">
        <h3>广告</h3>
        <div style="height:280px">1</div>
      </div>
      </div>
      <!-- /col-1 -->
      <!-- col-signip --> 
      <div id="col-signup">
	    <?php include ('signup.php')?>    
        <!-- tabs-sidebar -->
        <div class="tabs-sidebar box">
          <ul id="switch">
            <li><a href="#tab-01"><span>Most Recent</span></a></li>
            <li><a href="#tab-02"><span>Most Viewed</span></a></li>
          </ul>
        </div>
        <!-- /tabs-sidebar -->
        <!-- Most Recent -->
        <div id="tab-01">
          <p> <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a> </p>
        </div>
        <!-- /Most Recent -->
        <!-- Most Viewed -->
        <div id="tab-02">
          <p> <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a>, <a href="#" class="l-02">Ipsum</a>, <a href="#">Dolor</a>, <a href="#" class="h-01">Sit</a>, <a href="#" class="h-02">Amet</a>, <a href="#" class="h-02">Lorem</a> </p>
        </div>
        <!-- /Most Viewed -->
        <hr class="noscreen" />
    </div>
    <!-- /col-signip -->
    </div>    
    <!-- Content -->
  <!-- footer -->
  <?php include("footer.php") ?>;
  <!-- /footer -->
</div>
</body>
</html>
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
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=article.php?no=index">
<?php
}
}
?>
