<?php
  $page_title = 'Recruitment | Applicants';
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

$sql = "SELECT applicants.*,applications.* FROM applicants JOIN applications ON applicants.applicant_id = applications.applicant_id AND status = 'pending';";
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Applicant Table</span>
         <div class="text-end">
          <a href="../job-portal/register.php" class="btn btn-success pull-right" target="blank"><i class="bi bi-people"></i> Add Applicant</a>
         </div>
        
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            
            <th class="text-center">Applicants name </th>
            <th class="text-center">Job Title</th>
            <th class="text-center">Date of application</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
       <?php if($row > 0) { do {?>
            <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['job_title']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date_of_application']))))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['status']))?></td>
             <td>
             <a href="view-applicant.php?id=<?php echo $info['id'];?>" class="btn btn-sm btn-success"  title="Post Job">
                  <span>View</span>
               </a>  
             </td>
            
            </tr>
         
         <?php }while ($info = $result->fetch_assoc()); } ?>
        
       </tbody>
       <tfoot>
        <tr>
         
            <div class="text-end mb-3">
          <a href="applicant-report.php" class="btn btn-info pull-right"><i class="bi bi-file-post"></i> Print report</a>
         </div>

           <tr>
         </tfoot>
       
     </table>
   </div>
 </div>
</div>
</div>
</div>





 <?php include_once('layouts/footer.php'); ?>