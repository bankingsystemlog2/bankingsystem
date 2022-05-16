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

//$sql = "SELECT applicants.first_name,initial_interview.*,applicants.last_name,final_interview.*,passed_applicant.*,applications.* FROM applicants";
//$sql .= " JOIN initial_interview ON applicants.applicant_id = initial_interview.applicant_id JOIN final_interview ";
//$sql .= " ON applicants.applicant_id = final_interview.applicant_id JOIN passed_applicant ON passed_applicant.applicant_id = applicants.applicant_id ";
//$sql .= "JOIN applications ON applicants.applicant_id = applications.applicant_id";
$sql = "SELECT applicants.* ,initial_interview.*,final_interview.*,applications.* FROM applicants";
$sql .= " JOIN applications ON applicants.applicant_id = applications.applicant_id";
$sql .= " JOIN initial_interview ON applications.applicant_id = initial_interview.applicant_id";
$sql .= " JOIN final_interview ON applications.applicant_id = final_interview.applicant_id WHERE";
$sql .= " applications.status = 'qualified for hiring'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
include_once('layouts/header.php'); ?>


<nav class="breadcrumbs">
  
    <a href="final-interview.php" class="breadcrumbs__item ">Final Interview Schedules</a>
  
   
  <a href="#" class="breadcrumbs__item is-active">Qualified for hiring</a>
</nav>


<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-people"></i>Applicants for hiring</span>
         
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
            <?php  if(empty($info['initial_average']) or empty($info['final_average'])){  

                echo "Completion of interview required";


           }else{
           if($info['status'] == "hired"){ 

            echo "Hired";
            echo "</td>";
            echo '<td class="text-center"><a href="remove-result.php?id='.$info['applicant_id'].'" class="btn btn-danger btn-sm">remove</a>';
             }else{ ?>
             <div class="btn-group">
             
                     <a href="hiring-request.php?id=<?php echo $info['applicant_id']; ?>" class="btn btn-sm btn-success">Request Approval</a>
               
                </div>
               <?php } } ?>
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