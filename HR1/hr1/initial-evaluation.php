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

if(isset($_POST['submit'])){




	if(empty($_POST['com_skill'])){
		 
            $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('initial-evaluation.php?id='.$id,false);
	}else{
		$com_skill = remove_junk($db->escape($_POST['com_skill']));
	}

	if(empty($_POST['work_exp'])){
		 $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('initial-evaluation.php?id='.$id,false);
	}else{
		$work_exp = remove_junk($db->escape($_POST['work_exp']));
	}

	if(empty($_POST['back_ed'])){
		 $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('initial-evaluation.php?id='.$id,false);
	}else{
		$back_ed = remove_junk($db->escape($_POST['back_ed']));
	}

	if(empty($_POST['att'])){
		  $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('initial-evaluation.php?id='.$id,false);
	}else{
		$att = remove_junk($db->escape($_POST['att']));
	}

  if(empty($_POST['exam'])){
     $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('initial-evaluation.php?id='.$id,false);
  }else{
    $exam = remove_junk($db->escape($_POST['exam']));
  }

	$total = $com_skill + $work_exp + $back_ed + $att + $exam ;
	$average = $total/5;

if($average >= 75){

$sql = "UPDATE applications set status = 'for final interview' WHERE applicant_id = '$id';";
if($db->query($sql)){

$sql = "UPDATE initial_interview SET initial_average = '$average' WHERE applicant_id = '$id'";
if($db->query($sql)){

  $sql  =" SELECT email FROM applicants WHERE applicant_id = '$id'";
  $res = $db->query($sql);
  $email = $res->fetch_assoc();
  if($db->query($sql)){
  $to_email = $email['email'];
            $subject = "Interview Notification";
            $body = "<p>Congratulations these is the result of your Initial Interview.<br>";
            $body .= "Please see the details below:</p> <br>";
            $body .= "<ul>";
            $body .= "<li>Average: ".$average." </li>";
            $body .= "<li> Status: Passed </li></ul><br>";
            $body .= "<p>Please wait for the schedule of you final interview</p><br>";


            $headers = "From:  bankingandfinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

if(mail($to_email, $subject, $body, $headers)){
    $sql = "UPDATE initial_interview set initial_average = '$average' WHERE applicant_id = '$id'";
	if($db->query($sql)){
  
		 $_SESSION['status'] ="Evaluation complete";
            $_SESSION['status_code'] = "success";
    redirect('initial-interviews.php',false);
  
	}
}else{
    	 $_SESSION['status'] ="Error sending email";
            $_SESSION['status_code'] = "error";
    redirect('initial-interviews.php.php',false);
}
}else{
      	 $_SESSION['status'] ="query error";
            $_SESSION['status_code'] = "error";
    redirect('initial-interviews.php',false);
  }



  
  }
}
}else{
$sql = "UPDATE applications set status = 'failed' WHERE applicant_id = '$id';";
if($db->query($sql)){

$q = "SELECT * FROM applications WHERE applicant_id = '$id'";
if($db->query($q)){
$result = $db->query($q);
$job = $result->fetch_assoc();
$job_id = $job['job_id'];




$sq = "UPDATE job_vacancy SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($sq)){

  $s = "UPDATE posted_jobs SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($s)){

     $sql  =" SELECT email FROM applicants WHERE applicant_id = '$id'";
     $res = $db->query($sql);
     $email = $res->fetch_assoc();
  $to_email = $email['email'];
            $subject = "Interview Notification";
            $body = "<p>We are sorry to tell you that you failed the interview.<br>";
            $body .= "Please see the details below:</p> <br>";
            $body .= "<ul>";
            $body .= "<li>Average: ".$average." </li>";
            $body .= "<li> Status: Failed </li></ul><br>";


            $headers = "From:  bankingandfinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

           if( mail($to_email, $subject, $body, $headers)){
               $sql = "UPDATE initial_interview set initial_average = '$average' WHERE applicant_id = '$id';";
	if($db->query($sql)){
  
		 $_SESSION['status'] ="Evaluation complete";
            $_SESSION['status_code'] = "success";
    redirect('evaluate-initial-interview.php',false);
  
	}
           }


}
}
}
 

	
}
}
}

include_once('layouts/header.php'); ?>


<nav class="breadcrumbs">
 
    <a href="initial-interviews.php" class="breadcrumbs__item">Back</a>
  
   
  
  <a href="#" class="breadcrumbs__item is-active">Initial Interview Evaluation</a>
</nav>

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <div class="col-md-6">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Initial interview evaluation</span>
       </strong>
     </div>
 

</div>
	<div class="col">
      		<p><i>each criteria is equivalent to 20% of the total average</i></p>
      	</div>
      </div>

     <div class="panel-body">
      <form method="post" action="initial-evaluation.php?id=<?php echo $id; ?>">

      	<div class="col-md-6" style="margin-bottom: 30px;">
      		<div class="col-md-5">
      			<label>Communication skills</label>
      		</div>
      		<input type="number" min="1" max="100" name="com_skill" ><span>%</span>
      	</div>
      		<div class="col-md-6" style="margin-bottom: 30px;">
      		<div class="col-md-5">
      			<label>Work experience</label>
      		</div>
      		<input type="number" min="1" max="100" name="work_exp" ><span>%</span>
      	</div>
      	<div class="col-md-6" style="margin-bottom: 30px;">
      		<div class="col-md-5">
      			<label>Educational background</label>
      		</div>
      		<input type="number" min="1" max="100" name="back_ed" ><span>%</span>
      	</div>
      		<div class="col-md-6" style="margin-bottom: 30px;">
      		<div class="col-md-5">
      			<label>Attitude</label>
      		</div>
      		<input type="number" min="1" max="100" name="att" ><span>%</span>
      	</div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Exam</label>
          </div>
          <input type="number" min="1" max="100" name="exam" ><span>%</span>
        </div>
      	<div class="col-md-5">
      		<button type="submit" name="submit" class="btn btn-success btn-sm"><i class="bi bi-file-post"></i>Submit evaluation</button>
      	</div>









      </form>
     </div>
    </div>
  </div>
</div>










<?php include_once('layouts/footer.php'); ?>