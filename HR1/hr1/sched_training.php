<?php
 $page_title = 'New Hire Onboard';
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

$today = date('Y-m-d');


if(empty($_POST['loc'])){
	
	$_SESSION['status'] ="Set the location";
            $_SESSION['status_code'] = "warning";
      redirect('sched_training.php?id='.$id,false);
}else{
	$location = remove_junk($db->escape($_POST['loc']));
}

if(empty($_POST['date_start'])){
	$_SESSION['status'] ="Set the date";
            $_SESSION['status_code'] = "warning";
      redirect('sched_training.php?id='.$id,false);
}else{
	$date_start = remove_junk($db->escape($_POST['date_start']));
}

if(empty($_POST['date_end'])){
	$_SESSION['status'] ="Set the date";
            $_SESSION['status_code'] = "warning";
      redirect('sched_training.php?id='.$id,false);
}else{
	$date_end = remove_junk($db->escape($_POST['date_end']));
}


if(empty($_POST['dept'])){
	$_SESSION['status'] ="Set the department";
            $_SESSION['status_code'] = "warning";
      redirect('sched_training.php?id='.$id,false);
}else{
	$dept = remove_junk($db->escape($_POST['dept']));
}


if($date_end <= $date_start){

	$_SESSION['status'] ="Invalid date";
            $_SESSION['status_code'] = "warning";
      redirect('sched_training.php?id='.$id,false);
}


$sql = "INSERT INTO training (employee_id,date_start,date_end,department,location) VALUES ('$id','$date_start','$date_end','$dept','$location');";
if($db->query($sql)){

	$sql = "UPDATE new_hires SET status = 'ongoing training' WHERE employee_id = '$id'";
if($db->query($sql)){

if($db->query($sql)){
 $sql = "SELECT email FROM employees WHERE employee_id = $id";
$result = $db->query($sql);
$e_mail = $result->fetch_assoc();
 	 $to_email = $e_mail['email'];
            $subject = "Training notice";
            $body = "<p>Good day we are glad to inform you that your training date is already set.<br>";
            $body .= 'Please attend at the scheduled date, failure to attend at the scheduled date will <br>';
            $body .= "be condsidered failure of your application <br>";
            $body .= "Please see the details below:</p> <br>";
            $body .= "<ul>";
            $body .= "<li> Date start: ".date('m-d-Y',strtotime($date_start))."</li>";
            $body .= "<li> Date end: ".date('m-d-Y',strtotime($date_end))."</li>";
            $body .= "<li> Department: ".$dept."</li>";
            $body .= "<li> Time: 8:00 AM - 5:00 PM</li>";
            $body .= "<li> Location: ".$location."</li></ul><br>";
            $body .= "Things to bring:<br>";
            $body .= "<ul><li>Basic ID </li>";
            $body .= "<li> Ballpen</li>";
            $body .= "<p>Please wear corporate attire.</p>";
           

            $headers = "From:  Banking And finance Onboarding \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail($to_email, $subject, $body, $headers)) {
	$sql = "DELETE FROM orientation WHEre employee_id = '$id'";
	if($db->query($sql)){
   
   $_SESSION['status'] ="Training date scheduled and an email was sent to notify the employee";
            $_SESSION['status_code'] = "success";
      redirect('training.php',false);
  }
}else{

    
     $_SESSION['status'] ="theres something wrong";
            $_SESSION['status_code'] = "error";
          redirect('traning.php', false);
}
	

}

}
}
}

include_once('layouts/header.php'); ?>


<nav class="breadcrumbs">
    <a href="rientaion.php" class="breadcrumbs__item">Back</a>
  <a href="#" class="breadcrumbs__item is-active">Training Scheduling</a>
</nav>
<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Training Scheduling</span>
       </strong>
        
      </div>



      <div class="panel-body">
		<form method="post" action="sched_training.php?id=<?php echo $id; ?>">
			<div class="col">
			<div class="col-md-2">
			<label>Date start</label>
			</div>
			
			<input type="Date" name="date_start" min="<?php $today = date('Y-m-d'); echo $today ?>" style="width: 300px;">
			</div>

			<div class="col " style="margin-top: 30px;">
			<div class="col-md-2">
			<label>Date end</label>
			</div>
			<input type="date" name="date_end" min="<?php $today = date('Y-m-d'); echo $today ?>" style="width: 300px;" >
			</div>


			<div class="col" style="margin-top: 30px;">
			<div class="col-md-2">
			<label>Department</label>
			</div>
<?php 
				$sql ="SELECT department FROM employees WHERE employee_id = '$id';";
				$result = $db->query($sql);
				$dept = $result->fetch_assoc();
					
				?>
			<input name="dep" type="text" disabled style="width: 300px; height: 35px;" value="<?php echo $dept['department'];?>">
			<input name="dept" type="text" hidden style="width: 300px; height: 35px;" value="<?php echo $dept['department'];?>">

			</div>

			<div class="col" style="margin-top: 30px;">
			<div class="col-md-2">
			<label>Location</label>
			</div>
			<input type="text" name="loc" style="width: 300px; height: 35px;" >
			</div>



			</div>

			<div class="col" style="margin-top: 30px;margin-bottom: 30px; margin-left: 25px;">
				<button type="submit" name="submit" class="btn btn-sm btn-success"><i class="bi bi-calendar"></i>Set schedule</button>
			</div>

		</form>
      </div>
  </div>
  </div>
</div>




  <?php include_once('layouts/footer.php'); ?>