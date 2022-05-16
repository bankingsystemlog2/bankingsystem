<?php
  $page_title = 'User Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    <a href="users.php" style="color:black;">
		<div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-secondary1">
          <i class="glyphicon glyphicon-user"></i>
          <h4>This Section is on work paki antay ung gawa nila!.</h4>
        </div>
       </div>
    </div>
	</a>
</div>


<?php include_once('layouts/footer.php'); ?>
