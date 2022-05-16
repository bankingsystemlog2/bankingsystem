<?php
  $page_title = 'Applicant Management';
  require_once('includes/load.php');
   require_once('includes/activitylog.inc.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(3);
}else{
	page_require_level(1);
}

$sql = "SELECT applicants.first_name, applicants.last_name, applications.* ,initial_interview.*,final_interview.* FROM applicants JOIN ";
$sql .= "applications ON applicants.applicant_id = applications.applicant_id JOIN initial_interview ON applicants.applicant_id = initial_interview.applicant_id";
$sql .= " JOIN final_interview ON applicants.applicant_id = final_interview.applicant_id WHERE applications.status = 'failed' ";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;

include_once('layouts/header.php'); ?>



<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-danger"><i class="bi bi-people"></i>Final Interview Failed Applicants</span>
         <div class="text-end">
          <a href="failed-applicant-report.php" class="btn btn-info pull-right"> <i class="bi bi-file-post"></i>Print report</a>
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
            <th class="text-center" >Job title</th>
            <th class="text-center" style="">Initial interview average</th>
            <th class="text-center" >Final interview average</th>
            <th class="text-center" style=";">Overall average</th>
            <th class="text-center" style="width: 15%;">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ $initial = (int)$info['initial_average'];
$final = (int)$info['final_average'];
$overall = $initial + $final ;
$average = $overall / 2; ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['job_title'])) ?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['initial_average'])).'%' ?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['final_average'])).'%' ?></td>
           <td class="text-center"><?php echo $average.'%' ?></td>
           
           
           <td class="text-center">
             <div class="btn-group">
                <a href="delete-failed-applicant.php?id=<?php echo $info['applicant_id'];?>" class="btn btn-xs btn-danger"  title="Post Job">
                  <span>Delete</span>
               </a>
                </div>
           </td>
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
</div>









<?php include_once('layouts/footer.php'); ?>