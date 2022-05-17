<?php
  $page_title = 'Recruitment | Job posting';
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
 $query = "SELECT * FROM job_vacancy WHERE status = 'approved'";
  $result = $db->query($query);
  $a_jobs  = $result->fetch_assoc();
  $row = $result->num_rows;


?>
<?php include_once('layouts/header.php'); ?>



<div class="row">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>

<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Job requests</span>
      </div>
  <div class="text-end">
          <a href="jobrequest-report.php" class="btn btn-info pull-right"><i class="bi bi-file-post"></i> Print report</a>
         </div>
      
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%;" >
         <thead   >
          <tr >
            <th >Job ID</th>
            <th>Job Title </th>
            <th>No. of vacancy</th>
            <th>Job Description</th>
            <th> Qualification</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
       <?php if($row>0){ do{ ?>
            
              <tr>
           <td class="text-center" style="width:10%"><?php echo $a_jobs['job_id']?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['job_title']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['no_of_vacancy']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['job_description']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['job_qualification']))?></td>
            <td >
            <div class="btn-group">
                <a href="review-post.php?id=<?php echo (int)$a_jobs['job_id'];?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Post Job" style="font-size: 14px; padding:3px;">
                 <i class="bi bi-file-post-fill"></i> Post Job
               </a>
                </div>   
            </td>
                 
              </tr>
          <?php }while($a_jobs = $result->fetch_assoc()); } ?>
       
       </tbody>
      
     </table>
   </div>
 </div>
</div>




</div>






  











 
 <?php include_once('layouts/footer.php'); ?>