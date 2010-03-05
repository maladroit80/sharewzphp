<?php include ('header.php') ?>
<!-- Page -->
    <!-- Content -->
    <div class="box" style="padding-top:20px">
      <!-- col-1 -->
      <div class="tempcolleft">
        <div class="temphead">
          <h1>{newstitle} </h1>
          <span>{newsdatefrom} </span>
        </div>
        <br/>
        <div>
          <!-- rc --><p>{newscontents}</p><!-- /rc -->
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
   <?php include('footer.php')?>
