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
 page_require_level(2);
}else{
	page_require_level(1);
}

$sql = "SELECT applicants.first_name,applications.status,applicants.last_name,final_interview.* FROM applicants";
$sql .= " JOIN final_interview ON applicants.applicant_id = final_interview.applicant_id";
$sql .= " JOIN applications ON applicants.applicant_id = applications.applicant_id ;";
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
        <div class="text-end">
          <a href="applicants-for-hiring.php" class="btn btn-info btn-sm pull-right"><i class="bi bi-people"></i>Qualified applicants for hiring</a>
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
            <th class="text-center" style="">Date</th>
            <th class="text-center" >Time</th>
            <th class="text-center" style=";">Location</th>
            <th class="text-center" style="width: 15%;">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date']))))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['time']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['location']))?></td>

           
           <td class="text-center">
             <div class="btn-group">
              <?php 
                $today = date('Y-m-d');
                if($info['status'] === 'on final interview'){
                if($today > $info['date']) { ?>
                     <a href="final-evaluation.php?id=<?php echo $info['applicant_id']; ?>" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i>evaluate</a>
                <?php  }else{ 
            echo 'on going interview'; } }else{
              echo $info['status']; 
            }  ?>
                </div>
             </td>
          </tr>
        <?php }while($info =$result->fetch_assoc()); } ?>
       </tbody>
     
     </table>
   </div>
 </div>
</div>
</div>
</div>


<?php include_once('layouts/footer.php'); ?>