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
$sql = "SELECT employees.*,performance_review.* FROM performance_review JOIN employees ON ";
$sql .= "performance_review.employee_id = employees.employee_id WHERE performance_review.status = 'for approval'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;

include_once('layouts/header.php'); ?>


<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '5'): ?>
   <a href="performance-management.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Pending Evaluation List</a>
</nav>

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
            <th class="text-center" >Applicants name</th>
            <th class="text-center" style="">Job Title </th>
            <th class="text-center" >Department</th>
            <th class="text-center" >Date of Evaluation</th>
            <th class="text-center" >Rating</th>
            <th class="text-center" style="width: 10%;">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['designation']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['department']))?></td>
           <td class="text-center"><?php echo date('m-d-Y',strtotime($info['date']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['average']))?></td>
           
           
           <td class="text-center" width="15%">
             <div class="btn-group">
                <a href="view-past-pr.php?id=<?php echo $info['employee_id'];?>" class="btn btn-sm btn-info"  title="view">
                  <span>View</span>
               </a>
                </div>
                 <div class="btn-group">
                <a href="remove-past-evaluation.php?id=<?php echo $info['employee_id'];?>" class="btn btn-sm btn-danger"  title="cancel">
                  <span>Cancel</span>
               </a>
                </div>

           </td>
          </tr>
        <?php }while($info =$result->fetch_assoc());

        	}
         ?>
         </tr>
       </tbody>
     </table>

   
    
      
     </div>

    </div>
  </div>
</div>




 <?php include_once('layouts/footer.php'); ?>