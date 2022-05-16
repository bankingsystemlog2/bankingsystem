<?php

  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

 page_require_level(1);

 $c_user          = count_by_id('users');

 include_once('layouts/header.php');
 ?>


<div class="row">
  <div class="col-md-12">

     <?php echo display_msg($msg); ?>
   </div>




</div>
  <div class="row">

     <div class="col-md-4 mb-3 " >
       <a href="users.php" style="color:black; text-decoration: none;" >
    <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1><?php echo $c_user['total']; ?></h1></center><br><h3><i class="bi bi-people-fill"></i>  users <h3></div>
      </div>
    </a>
  </div>
 <?php

$sql = "SELECT * FROM applications";
$result = $db->query($sql);
$c = $result->num_rows;

?>


    <div class="col-md-4 mb-3 " >
     <a href="applicants.php" style="color:black; text-decoration: none;">
    <div class="card bg-primary text-white h-10 ">
     <div class="card-body py-15"><center><h1><?php echo $c; ?></h1></center><br><h3><i class="bi bi-people"></i> applicants <h3></div>
      </div>
    </a>
  </div>


<?php

$sql = "SELECT * FROM job_vacancy";
$result = $db->query($sql);
$c = $result->num_rows;

?>


   <div class="col-md-4 mb-3 " >
    <a href="job-posting.php" style="color:black; text-decoration:none; ;">
    <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1><?php echo $c; ?></h1></center><br><h3><i class="bi bi-list"></i> Job requests <h3>
      </div>
      </div>
    </a>
  </div>


<?php

$sql = "SELECT * FROM posted_jobs";
$result = $db->query($sql);
$c = $result->num_rows;

?>


     <div class="col-md-4 mb-3 " >
      <a href="job-posting.php" style="color:black; text-decoration: none;">
    <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1><?php echo $c; ?></h1></center><br><h3><i class="bi bi-list"></i> Posted Jobs <h3></div> </div>
  </a>
  </div>


<?php

$sql = "SELECT * FROM posted_jobs WHERE status = 'request for approval'";
$result = $db->query($sql);
$c = $result->num_rows;

?>


    <div class="col-md-4 mb-3 " >
      <a href="jobposting-approval.php" style="color:black; text-decoration:none;">
    <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1><?php echo $c; ?></h1></center><br><h3><i class="bi bi-list"></i>Job posting requests<h3></div> </div>
  </a>
  </div>


<?php

$sql = "SELECT * FROM applications WHERE status = 'application for approval'";
$result = $db->query($sql);
$c = $result->num_rows;

?>


 <div class="col-md-4 mb-3 " >
   <a href="applicant-approval.php" style="color:black; text-decoration:none;">
    <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15" ><center><h1><?php echo $c; ?></h1></center><br><h3 style="font-size: 22px;margin-top: 6.5px;"><i class="bi bi-list"></i>Qualified applicant requests <h3></div> </div>
  </a>
  </div>

<?php

$sql = "SELECT * FROM applications WHERE status = 'requesting for approval'";
$result = $db->query($sql);
$c = $result->num_rows;

?>


    <div class="col-md-4 mb-3 " >
      <a href="hiring-approval.php" style="color:black; text-decoration:  none;">

    <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1><?php echo $c; ?></h1></center><br><h3><i class="bi bi-list"></i>Hiring requests<h3></div> </div>
  </a>
  </div>
<?php

$sql = "SELECT * FROM new_hires WHERE status = 'requesting for deployment approval'";
$result = $db->query($sql);
$c = $result->num_rows;

?>


   <div class="col-md-4 mb-3 " >
  <a href="deployment_requests.php" style="color:black;text-decoration:  none; ">
         <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1><?php echo $c; ?></h1></center><br><h3><i class="bi bi-list"></i>Deployment requests<h3></div> </div>
  </a>
  </div>
<?php

$sql = "SELECT * FROM performance_review WHERE status = 'for approval'";
$result = $db->query($sql);
$c = $result->num_rows;

?>


    <div class="col-md-4 mb-3 " >
 <a href="pr-requests.php" style="color:black;text-decoration:  none;">
         <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1><?php echo $c; ?></h1></center><br><h3><i class="bi bi-list"></i>Evaluation requests<h3></div> </div>
  </a>
  </div>

<?php

$sql = "SELECT * FROM performance_review WHERE status = 'for approval'";
$result = $db->query($sql);
$c = $result->num_rows;

?>


    <div class="col-md-4 mb-3 " >
  <a href="cert-request.php" style="color:black;text-decoration:  none;">
         <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1><?php echo $c; ?></h1></center><br><h3 style="font-size: 22px;margin-top: 6.5px;"><i class="bi bi-list"></i>Certificate printing requests<h3></div> </div>
  </a>
  </div>

</div>

<a href="print-audit.php" class="btn btn-info"><i class="bi bi-activity"></i>Print Audit Trail</a>

 <?php include_once('layouts/footer.php'); ?>
