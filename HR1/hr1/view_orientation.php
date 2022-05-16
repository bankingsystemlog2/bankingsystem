<?php
 $page_title = 'New Hire Onboard';
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


$id = $_GET['id'];
$sql = "SELECT employees.*,new_hires.* FROM employees JOIN new_hires ON employees.employee_id = new_hires.employee_id WHERE new_hires.employee_id = '$id';";
$result = $db->query($sql);
$applicant = $result->fetch_assoc();
$row = $result->num_rows;


include_once('layouts/header.php'); ?>

<nav class="breadcrumbs">
    <a href="orientation.php" class="breadcrumbs__item">Back</a>
  <a href="#" class="breadcrumbs__item is-active">Orientation Scheduling</a>
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
       
     <div class="col-md-12 " style="margin-top: 5vh;">
      <div class="row">
        
         
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
          <p> <b>Designation:</b> <?php echo $applicant['designation']; ?> </p>
        </div>
        <div class="col-md-6" style="margin-bottom: 7vh;">
          <p> <b>Address:</b> <?php echo $applicant['address']; ?> </p>
        </div>
         <div class="col-md-12 text-center" style="margin-bottom: 2vh;">
          <h3>Onboarding Checklist</h3>
        </div>

         <div class="col-md-12">
          <label>Contract Signing</label>
          <input type="checkbox"  name="cont_signing" onclick="return false"<?php 
          if($applicant['status'] != 'for orientation' OR $applicant['status'] != 'ongoing contract signing'){

              echo "checked";

            }

           ?>>

          
        </div>
         <div class="col-md-12">
           <label>Orientation</label>
          <input type="checkbox" name="orientation" onclick="return false"<?php 

            if($applicant['status'] == 'for training' OR $applicant['status'] == 'for deployment' OR $applicant['status'] == 'ongoing training' OR $applicant['status'] == 'ongoing deployment'){
              echo 'checked';
            }
          ?>>
        </div>
         <div class="col-md-12">
           <label>Training</label>
          <input type="checkbox" name="training"onclick="return false" <?php
           
           if($applicant['status'] == 'for deployment' OR $applicant['status'] == 'ongoing deployment'){
              echo 'checked';
           }
            ?>>
        </div>







      




   <div class="col-md-12" style="margin-top: 5vh;">
   <?php if($applicant['status'] == 'ongoing orientation'){ ?>

    <a href="proceed_to_training.php?id=<?php echo $applicant['employee_id']; ?>" class="btn btn-sm btn-success" >Proceed to Training</a>

  <?php }

    if($applicant['status'] == 'for training' OR $applicant['status'] == 'ongoing training'){ ?>

    <a href="sched_training.php?id=<?php echo $applicant['employee_id']; ?>" class="btn btn-sm btn-success" ><i class="bi bi-calendar"></i>Schedule Training</a>


  <?php } ?>


    <a href="newhire-onboard.php" class="btn btn-sm btn-danger">Back</a>
    </div>
      </div>
      </div>
    </div>
     </div>
     </div>
     </div>



<?php include_once('layouts/footer.php'); ?>