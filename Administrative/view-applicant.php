<?php
  $page_title = 'Recruitment | Applicants';
  require_once('includes/load.php');
  require_once('includes/activitylog.inc.php');
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


$id = $_GET['id'];
$sql = "SELECT * FROM applications WHERE id = '$id'";
$result = $db->query($sql);
$app_id = $result->fetch_assoc();
    

if(isset($_POST['accept'])){

$id = $app_id['applicant_id'];
  $sql = "UPDATE applications SET status = 'application for approval' WHERE applicant_id = '$id'; ";
  if($db->query($sql)){
    $id = $current_user['id'];
    $sql = "SELECT name FROM users WHERE id = '$id'";
    $result = $db->query($sql);
    $pangalan = $result->fetch_assoc();
    $name = $pangalan['name'];
    $log=$name.' has request approval for application';
    logger($log);
     $session->msg("s", "Request for approval was sent to the HR manager");
      redirect('applicants.php',false);
  }
    
 }


if(isset($_POST['decline'])){




$id = $app_id['applicant_id'];
  $sql = "UPDATE applications SET status = 'declined' WHERE applicant_id = '$id'; ";
  if($db->query($sql)){

$q = "SELECT * FROM applications WHERE applicant_id = '$id'";
if($db->query($q)){
$result = $db->query($q);
$job = $result->fetch_assoc();
$job_id = $job['job_id'];




$sq = "UPDATE job_vacancy SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($sq)){

  $s = "UPDATE posted_jobs SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($s)){

    $id = $current_user['id'];
    $sql = "SELECT name FROM users WHERE id = '$id'";
    $result = $db->query($sql);
    $pangalan = $result->fetch_assoc();
    $name = $pangalan['name'];
    $log=$name.' declined application';
    logger($log);
     $session->msg("d", "application declined");
      redirect('applicants.php',false);
    
    }
  }
  }
   }
  }

if(isset($_POST['delete'])){
$id = $app_id['applicant_id'];
$sql = "DELETE FROM applications WHERE applicant_id ='$id'";
if($db->query($sql)){
 $id = $current_user['id'];
    $sql = "SELECT name FROM users WHERE id = '$id'";
    $result = $db->query($sql);
    $pangalan = $result->fetch_assoc();
    $name = $pangalan['name'];
    $log=$name.' deleted a rejected application';
    logger($log);
     $session->msg("d", "application deleted");
      redirect('applicants.php',false);
}
}

$id = $app_id['applicant_id'];
$sql = "SELECT * FROM applicants WHERE applicant_id = '$id';";
$result = $db->query($sql);
$applicant = $result->fetch_assoc();

include_once('layouts/header.php');

?>
<nav class="breadcrumbs">
  
    <a href="applicants.php" class="breadcrumbs__item">Back</a>
  
   <a href="#"  class="breadcrumbs__item is-active">View applicant</a>
  
  
</nav>

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <h3><?php echo ucfirst($applicant['last_name'])." ".ucfirst($applicant['first_name'])." ".ucfirst($applicant['middle_name']).","; ?></h3>
       </strong>
        
      </div>
     <div class="panel-body">
       
     <div class="col-md-12">
      <div class="row">
        
         <div class="col-md-10 text-center">
          <h3>Applying for <?php echo ucfirst($app_id['job_title']) ; ?></h3>
        </div>
        <div class="col-md-6">
        <p> <b> E-mail:</b>  <?php echo $applicant['email']; ?> </p>
        </div>
        <div class="col-md-6">
          <p> <b>Cellphone no.:</b> <?php echo $applicant['contact_number']; ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Birth date:</b> <?php echo date('m-d-Y',strtotime($applicant['birth_date'])); ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Gender:</b> <?php echo $applicant['gender']; ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Age:</b> <?php echo $applicant['age']; ?> </p>
        </div>
        <div class="col-md-6">
          <p> <b>Civil status:</b> <?php echo $applicant['civil_status']; ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Religion:</b> <?php echo $applicant['religion']; ?> </p>
        </div>
        <div class="col-md-6">
          <p> <b>Address:</b> <?php echo $applicant['address']; ?> </p>
        </div>


<?php 
$sql = "SELECT * FROM education_background WHERE applicant_id = '$id';";
$result = $db->query($sql);
$educ = $result->fetch_assoc();
 ?>

 <div class="col-md-10 text-center">
          <h3>Educational Background</h3>
        </div>
   
         <div class="col-md-12">
          <p> <b>Elementary:</b> <?php echo $educ['elementary']; ?> </p>
        </div>
         <div class="col-md-12">
          <p> <b>Junior high school:</b> <?php echo $educ['junior_high_school']; ?> </p>
        </div>
         <div class="col-md-12">
          <p> <b>Senior high school:</b> <?php echo $educ['senior_high_school']; ?> </p>
        </div>
      


<?php
$query = " SELECT * FROM college WHERE applicant_id = '$id';";
$result = $db->query($query);
$college = $result->fetch_assoc();
$row = $result->num_rows;

if($row>0){
?>

         <div class="col-md-10 text-center">
          <h4>College Education</h4>
        </div>

<?php do{ ?>

        <div class="col-md-12">
          <p> <b>Name of school:</b> <?php echo $college['name_of_school']; ?> </p>
        </div>
         <div class="col-md-12 " style="margin-bottom: 30px;">
          <p> <b>Course:</b> <?php echo $college['course']; ?> </p>
        </div>

     <?php }while($college = $result->fetch_assoc()); } ?>   
        


<?php

$query = " SELECT * FROM job_history WHERE applicant_id = '$id';";
$result = $db->query($query);
$job = $result->fetch_assoc();
$row = $result->num_rows;
if($row>0){
?>
   <div class="col-md-10 text-center">
          <h3>Work Experience</h3>
        </div>

<?php do{ ?>



       <div class="col-md-12">
          <p> <b>Company:</b> <?php echo $job['company']; ?> </p>
        </div>
         <div class="col-md-12">
          <p> <b>Position:</b> <?php echo $job['position']; ?> </p>
        </div>
         <div class="col-md-12">
          <p> <b>Date started:</b> <?php echo date('m-d-Y',strtotime($job['date_started'])); ?> </p>
        </div>
         <div class="col-md-12" style="margin-bottom: 30px;">
          <p> <b>Date ended:</b> <?php echo date('m-d-Y',strtotime($job['date_ended'])); ?> </p>
        </div>


<?php }while($job = $result->fetch_assoc()); } ?>  


<?php 




if($app_id['status'] === 'pending'){

?>
<div class="col-md-12">
         <form method="post" action="view-applicant.php?id=<?php echo $_GET['id']; ?>">
           <button type="submit" name="accept" class="btn btn-success">Request Approval</button>
           <button type="submit"name="decline" class="btn btn-danger">Decline application</button>


         </form>
        </div>

      <?php } ?>
      <?php if($app_id['status'] === 'declined'){?>
<div class="col-md-12">
         <form method="post" action="view-applicant.php?id=<?php echo $_GET['id']; ?>">
           <button type="submit" name="delete" class="btn btn-danger"><i class="bi bi-x"></i>Delete Application</button>
           

         </form>
        </div>
     <?php  } ?>
      </div>


      </div>
    </div>
    
     </div>
    </div>
  </div>


 
</div>




<?php include_once('layouts/footer.php'); ?>