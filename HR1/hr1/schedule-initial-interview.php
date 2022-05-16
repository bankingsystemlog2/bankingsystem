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


$id = $_GET['id'];
if(isset($_POST['submit'])){


if(empty($_POST['date'])){
	$_SESSION['status'] ="Set the date";
            $_SESSION['status_code'] = "warning";
      redirect('schedule-initial-interview.php?id='.$id,false);
}else{
	$date = remove_junk($db->escape($_POST['date']));
}

if(empty($_POST['time'])){
	$_SESSION['status'] ="Set the time";
            $_SESSION['status_code'] = "warning";
      redirect('schedule-initial-interview.php?id='.$id,false);
}else{
	$time = remove_junk($db->escape($_POST['time']));
}

if(empty($_POST['loc'])){
	$_SESSION['status'] ="Set the location";
            $_SESSION['status_code'] = "warning";
      redirect('schedule-initial-interview.php?id='.$id,false);
}else{
	$location = remove_junk($db->escape($_POST['loc']));
}


$sql = "INSERT INTO initial_interview (applicant_id,date,time,location) VALUE ('$id','$date','$time','$location');";
if($db->query($sql)){

 $sql = "UPDATE applications SET status = 'For initial interview' WHERE applicant_id = '$id'";

 if($db->query($sql)){
$sql = "SELECT email FROM applicants WHERE applicant_id = $id";
$result = $db->query($sql);
$e_mail = $result->fetch_assoc();
 	 $to_email = $e_mail['email'];
            $subject = "Initial Interview notice";
            $body = "<p>Good day we are glad to inform you that you are qualified for initial interview <br>";
            $body .= 'Please attend at the scheduled date, failure to attend at the scheduled date will <br>';
            $body .= "be condsidered failure of your application <br>";
            $body .= "Please see the details below:</p> <br>";
            $body .= "<ul>";
            $body .= "<li> Date: ".date('m-d-Y',strtotime($date))."</li>";
            $body .= "<li> Time: ".$time."</li>";
            $body .= "<li> Location: ".$location."</li></ul><br>";
            $body .= "Things to bring:<br>";
            $body .= "<ul><li> All Government Issued ID</li>";
            $body .= "<li> School diploma(from elementary - college)</li>";
            $body .= "<li> Ballpen</li>";
            $body .= "<li> Transcript of records</li>";
            $body .= "<li> NBI clearance</li>";
            $body .= "<li> Birth Certificate</li>";
            $body .= "<li> Copy of resume</li></ul><br>";
            $body .= "<p>Please wear corporate attire.</p>";
           

            $headers = "From:  bankingandfinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail($to_email, $subject, $body, $headers)) {
  $sql = "SELECT name FROM users WHERE id = '$user_id'";
  $result = $db->query($sql);
  $pangalan = $result->fetch_assoc();
    $name = $pangalan['name'];
    $log = $name.' has set schedule initial imterview';
    logger($log);
     
     $_SESSION['status'] ="Initial interview scheduled successfully and an email was sent to notify the applicant";
            $_SESSION['status_code'] = "success";
      redirect('qualified-applicants.php',false);
}else{

     
     $_SESSION['status'] ="theres something wrong";
            $_SESSION['status_code'] = "error";
          redirect('schedule-initial-interview.php?id='.$id, false);
}

	

}
}



}


include_once('layouts/header.php');

?>
<nav class="breadcrumbs">
  
    <a href="view-qualified-applicants.php?id=<?php echo $_GET['id']; ?>" class="breadcrumbs__item">Back</a>
 
  <a href="#" class="breadcrumbs__item is-active">Initial Interview Scheduling</a>
</nav>
<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      
      <div class="card-body">
		<form method="post" action="schedule-initial-interview.php?id=<?php echo $id; ?>">
			<div class="col">
			<div class="col-md-1">
			<label>Date</label>
			</div>
			
			<input  type="Date" name="date" min="<?php $today = date('Y-m-d'); echo $today ?>" style="width: 300px;">
			</div>

			<div class="col " style="margin-top: 30px;">
			<div class="col-md-1">
			<label>Time</label>
			</div>
			<input type="Time" name="time" style="width: 300px;" >
			</div>

			<div class="col" style="margin-top: 30px;">
			<div class="col-md-1">
			<label>Location</label>
			</div>
			<input type="text" name="loc" style="width: 300px; height: 35px;" >
			</div>

			<div class="col" style="margin-top: 30px;">
				<button type="submit" name="submit" class="btn btn-sm btn-success"><i class="bi bi-calendar"></i>Set schedule</button>
			</div>

		</form>
      </div>
  </div>
  </div>
</div>


<?php include_once('layouts/footer.php'); ?>