<?php
  $page_title = 'Recruitment';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
	page_require_level(1);
}

$sql = "SELECT * FROM available_job;";
$result = $db->query($sql);
$job = $result->num_rows;


?>
<?php include_once('layouts/header.php'); ?>



<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    <a href="#" style="color:black;">
		<div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top">  </h2>
          <p >Posted Jobs</p>
          <h3><?php echo $job ; ?><h3>
        </div>
       </div>
    </div>
	</a>
<?php

$sql = "SELECT * FROM applications";
$result = $db->query($sql);
$job = $result->num_rows;


?>
  
  <div class="row">
    <a href="#" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top">  </h2>
          <p >Applicants</p>
          <h3><?php echo $job ; ?><h3>
        </div>
       </div>
    </div>
  </a>
 <?php include_once('layouts/footer.php'); ?>