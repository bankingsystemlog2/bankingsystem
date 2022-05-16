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

if(empty($_POST['loc'])){
	
	$_SESSION['status'] ="Set the location";
            $_SESSION['status_code'] = "warning";
      redirect('sched_deployment.php?id='.$id,false);
}else{
	$location = remove_junk($db->escape($_POST['loc']));
}

if(empty($_POST['date'])){
	$_SESSION['status'] ="Set the date";
            $_SESSION['status_code'] = "warning";
      redirect('sched_deployment.php?id='.$id,false);
}else{
	$date = remove_junk($db->escape($_POST['date']));
}

if(empty($_POST['time'])){
	
	$_SESSION['status'] ="Set the time";
            $_SESSION['status_code'] = "warning";
      redirect('sched_deployment.php?id='.$id,false);
}else{
	$time = remove_junk($db->escape($_POST['time']));
}



if(empty($_POST['dept'])){
		$_SESSION['status'] ="Set the department";
            $_SESSION['status_code'] = "warning";
      redirect('sched_deployment.php?id='.$id,false);
}else{
	$dept = remove_junk($db->escape($_POST['dept']));
}




	


$sql = "INSERT INTO deployment (employee_id,date,time,department,location) VALUES ('$id','$date','$time','$dept','$location');";
if($db->query($sql)){

	$sql = "UPDATE new_hires SET status = 'ongoing deployment' WHERE employee_id = '$id'";
if($db->query($sql)){

if($db->query($sql)){
  $sql = "SELECT email FROM employees WHERE employee_id = $id";
$result = $db->query($sql);
$e_mail = $result->fetch_assoc();
 	 $to_email = $e_mail['email'];
            $subject = "Deployment notice";
            $body = "<p>Good day we are glad to inform you that your Deployment date is already set.<br>";
            $body .= 'Please attend at the scheduled date, failure to attend at the scheduled date will <br>';
            $body .= "be condsidered failure of your application <br>";
            $body .= "Please see the details below:</p> <br>";
            $body .= "<ul>";
            $body .= "<li> Deployment date: ".date('m-d-Y',strtotime($date_start))."</li>";
            $body .= "<li> Department: ".$dept."</li>";
            $body .= "<li> Time: ".$time."</li>";
            $body .= "<li> Location: ".$location."</li></ul><br>";
            $body .= "Things to bring:<br>";
            $body .= "<ul><li>Basic ID </li>";
            $body .= "<li> Ballpen</li>";
            $body .= "<p>Please wear corporate attire.</p>";
           

            $headers = "From:  Banking And finance Onboarding \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail($to_email, $subject, $body, $headers)) {
  
  $_SESSION['status'] ="Deployment date scheduled and an email was sent to notify the employee";
            $_SESSION['status_code'] = "success";
      redirect('deployment.php',false);
}else{

    
     $_SESSION['status'] ="theres something wrong";
            $_SESSION['status_code'] = "error";
          redirect('deployment.php', false);
}
	

}

}
}
}

include_once('layouts/header.php'); ?>
<nav class="breadcrumbs">
    <a href="deployment.php" class="breadcrumbs__item">Back</a>
  <a href="#" class="breadcrumbs__item is-active">Deployment Scheduling</a>
</nav>

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Deployment Scheduling</span>
       </strong>
        
      </div>



      <div class="panel-body">
		<form method="post" action="sched_deployment.php?id=<?php echo $id; ?>">
			<div class="col">
			<div class="col-md-2">
			<label>Deployment date</label>
			</div>
			<input type="Date" name="date" min="<?php $today = date('Y-m-d'); echo $today ?>" style="width: 300px;">
			</div>

			<div class="col" style="margin-top: 30px;">
			<div class="col-md-2">
			<label>Time</label>
			</div>
			<input type="time" name="time" style="width: 300px; height: 35px;" >
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
				<button type="submit" name="submit" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i><span>Deploy</span></button>
			</div>

		</form>
      </div>
  </div>
  </div>
</div>




  <?php include_once('layouts/footer.php'); ?>