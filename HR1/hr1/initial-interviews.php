<?php
  $page_title = 'Applicant Management';
  require_once('includes/load.php');
  require_once('includes/activitylog.inc.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user();

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
	page_require_level(1);
}

if(isset($_POST['cancel'])){
$id = $_POST['id'];




	$sql = "UPDATE applications set status ='On Hiring Process' WHERE applicant_id = '$id'";
	if($db->query($sql)){
    $sql = "DELETE FROM initial_interview WHERE applicant_id = '$id'";
    $re = $db->query($sql);
    
   $sql = "SELECT * FROM users WHERE id = '$current_user'";
      $result = $db->query($sql);
      $username = $result->fetch_assoc();
       $log = $username['username']." cancelled initial interview schedule";
        logger($log);

        $sql = "SELECT email FROM applicants WHERE applicant_id = '$id'";
$result = $db->query($sql);
$e_mail = $result->fetch_assoc();
   $to_email = $e_mail['email'];
            $subject = "Initial Interview notice";
            $body = "<p>Good day we are sorry to say the your interview schedule has been cancelled <br>";
            $body .= 'Please please wait for another email for your new interview schedule. <br>';
           
           

            $headers = "From:  Banking And finance Applicant management \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail($to_email, $subject, $body, $headers)) {
  
    $_SESSION['status'] ="Schedule cancelled";
            $_SESSION['status_code'] = "warning";
      redirect('initial-interviews.php',false);
}else{

      $_SESSION['status'] ="Email sendng error";
            $_SESSION['status_code'] = "error";
          redirect('schedule-initial-interview.php?id='.$id, false);
}

	 
  }




}

$sql = "SELECT applicants.first_name,applicants.last_name,initial_interview.*, applications.status FROM applicants";
$sql .= " JOIN initial_interview ON applicants.applicant_id = initial_interview.applicant_id ";
$sql .= " JOIN applications ON applicants.applicant_id = applications.applicant_id WHERE applications.status = 'For initial interview'";
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Applicants for initial interview table</span>
         <div class="text-end">
          <a href="initial_interview_sched_report.php" class="btn btn-info btn-sm pull-right"><i class="bi bi-file-post"></i> Print report</a>
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
            <th class="text-center" style="width: 12%;">Action</th>
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
             
                   <?php $today = date('Y-m-d');

                    if($today < $info['date']){?>
            <form action="initial-interviews.php" method="post">
              <input type="hidden" name="id" value="<?php echo $info['applicant_id'] ?>">
            <button type="submit" name="cancel" class="btn btn-danger btn-sm" ><i class="bi bi-x"></i> Cancel</button>
           </form>
          
                    
                   <?php }elseif($today == $info['date']){ ?>

                    <a href="send_exam_link.php?id=<?php echo $info['applicant_id']?>" class="btn btn-info btn-sm">
                      <i class="bi bi-file-post"></i>Send Exam
                    </a>
                  
                <?php  }else{?>
                  <a href="initial-evaluation.php?id=<?php echo $info['applicant_id']; ?>" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i>evaluate</a>


             <?php   }
                    ?>
              
              
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