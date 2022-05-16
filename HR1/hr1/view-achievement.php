<?php
  $page_title = 'Applicant Management';
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
$sql = "SELECT award_history.*, employees.* FROM award_history JOIN employees ON award_history.employee_id ";
$sql .= "= employees.employee_id WHERE award_history.employee_id = '$id' ";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
?>
<?php include_once('layouts/header.php'); ?>


<nav class="breadcrumbs">
  
  
   <a href="performance-management.php" class="breadcrumbs__item">Employees</a>
    <a href="view-past-evaluation.php" class="breadcrumbs__item">Employee Evaluation</a>

  <a href="#checkout" class="breadcrumbs__item is-active">Awards History</a>
</nav>


<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <div class="text-end">
         </div>
      </div>

      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <?php if($row>0){ ?>
            <tr>
            <th class="text-center" >Employee Name</th>
            <th class="text-center" style="">Designation </th>
            <th class="text-center" >Department</th>
            <th class="text-center" style="">Award Title</th>
            <th class="text-center" style="">Date</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['designation']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['department']))?></td>
            <td class="text-center"><?php echo remove_junk(ucwords($info['award_title']))?></td>
             <td class="text-center"><?php echo remove_junk(ucwords($info['date']))?></td>
           
           
          
          </tr>
        <?php }while($info =$result->fetch_assoc());

          }
         ?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
  
</div>

 <?php include_once('layouts/footer.php'); ?>