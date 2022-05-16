<?php
  $page_title = 'Social Recognition';
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
 


	



 
?>
<?php include_once('layouts/header.php'); ?>

     <?php
$q = "SELECT employees.*,training_management.* FROM employees JOIN training_management ON";
$q.= " employees.employee_id  = training_management.employee_id WHERE status ='complete'";
$r = $db->query($q);
$i = $r->fetch_assoc();
$ro = $r->num_rows;
?>


<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>

  <div class="row">
   

  
     <div class="col-md-4 mb-3 " >
       <a href="training-awards.php" style="color:black; text-decoration: none;" >
    <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1><?php  echo $ro; ?></h1></center><br><h3><i class="bi bi-award"></i>  Pending Training Certificates <h3></div>
      </div>
    </a> 
  </div>
    
  <?php
$sql = "SELECT employees.*,learning_management.* FROM employees JOIN learning_management ON";
$sql .= " employees.employee_id  = learning_management.employee_id WHERE learning_management.status ='complete'";
$result = $db->query($sql);
$infos = $result->fetch_assoc();
$rows = $result->num_rows;

?>


  
     <div class="col-md-4 mb-3 " >
       <a href="seminar-awards.php" style="color:black; text-decoration: none;" >
    <div class="card bg-primary text-white h-10 ">
      <div class="card-body py-15"><center><h1> <?php  echo $rows; ?></h1></center><br><h3><i class="bi bi-award"></i>  Pending Seminar Certificates <h3></div>
      </div>
    </a> 
  </div>
 
    

  </div>


 <?php include_once('layouts/footer.php'); ?>