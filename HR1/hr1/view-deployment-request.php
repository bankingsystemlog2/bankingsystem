<?php
 
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

  page_require_level(1);

$id = $_GET['id'];

 $sql = "SELECT employees.*,new_hires.* FROM employees JOIN new_hires ON employees.employee_id = ";
  $sql .= "new_hires.employee_id WHERE employees.employee_id = '$id'";
  $result = $db->query($sql);
  $applicant = $result->fetch_assoc();
  $row = $result->num_rows;

 



include_once('layouts/header.php');

?>
<nav class="breadcrumbs">
  
    <a href="deployment.php" class="breadcrumbs__item">Back</a>
  <a href="#" class="breadcrumbs__item is-active">Deployment Approval</a>
</nav>
<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span><?php echo $applicant['last_name']." ".$applicant['first_name']." ".$applicant['middle_name'].","; ?></span>
       </strong>
        
      </div>
     <div class="panel-body">
       
     <div class="col-md-12">
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
          <p> <b>Address:</b> <?php echo $applicant['address']; ?> </p>
        </div>








<div class="col-md-12">
        
           <a href="approve-deployment.php?id=<?php echo $applicant['employee_id'] ?>"  class="btn btn-sm btn-success"><i class="bi bi-check"></i>Approve</a>
           <a href="reject-deployment.php?id=<?php echo $applicant['employee_id'] ?>" class="btn btn-sm btn-danger"><i class="bi bi-x"></i>Reject</a>


       
        </div>

      </div>


      </div>
    </div>
    
     </div>
    </div>
  </div>


 
</div>




<?php include_once('layouts/footer.php'); ?>