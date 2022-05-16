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
    <a href="contract_signing.php" class="breadcrumbs__item">Back</a>
  <a href="#" class="breadcrumbs__item is-active">Employee Information</a>
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
          <input type="checkbox"  name="cont_signing" onclick="return false" <?php 
          if($applicant['status'] != 'for contract signing' AND $applicant['status'] != 'ongoing contract signing' OR
          $applicant['status'] == 'for orientation'){


              echo "checked";

            }

           ?>>

          
        </div>
         <div class="col-md-12">
           <label>Orientation</label>
          <input type="checkbox" name="orientation" onclick="return false"<?php 

            if($applicant['status'] == 'for training' OR $applicant['status'] == 'for deployment' OR $applicant['status'] == 'ongoing training'){
              echo 'checked';
            }
          ?>>
        </div>
         <div class="col-md-12">
           <label>Training</label>
          <input type="checkbox" name="training"onclick="return false" <?php echo ($applicant['status'] == 'for deployment')? 'checked ':'' ; ?>>
        </div>







      




   <div class="col-md-12" style="margin-top: 5vh;">
   <?php if($applicant['status'] == 'ongoing contract signing'){ 

    $sql = "SELECT * FROM hr1files WHERE req_id = '$id' ";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc();

    if($emp['status'] == '1'){
    ?>

    <a href="download-contract.php?id=<?php echo $emp['req_id']; ?>&urlpath=<?php echo $emp['urlpath']?>" class="btn btn-sm btn-success" >Download Contract</a>

    

  <?php
}
if($emp['status'] === 'downloaded'){ ?>
<form method="POST" action="upload_contract.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $emp['req_id']?>">
    <input type="file" name="cont" class="form-control" required style="width:30%"><br>
   <button type="submit" name="upload" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i>Upload Contract</button>
   <a href="newhire-onboard.php" class="btn btn-sm btn-danger">Back</a>
 </form>
  <?php } 

if($emp['status'] == 'signed'){
  ?>



<a href="proceed_to_orientation.php?id=<?php echo $applicant['employee_id']; ?>" class="btn btn-sm btn-success" >Proceed to orientation</a>

<?php 
}

   }

    if($applicant['status'] == 'for orientation' OR $applicant['status'] == 'ongoing orientation'){ ?>

    <a href="sched_orientation.php?id=<?php echo $applicant['employee_id']; ?>" class="btn btn-sm btn-success" ><i class="bi bi-calendar"></i>Schedule Orientation</a>


  <?php } ?>


    
   
    </div>
      </div>
      </div>
    </div>
     </div>
     </div>
     </div>
     
   

 <?php include_once('layouts/footer.php'); ?>