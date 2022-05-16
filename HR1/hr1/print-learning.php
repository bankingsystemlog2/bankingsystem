<?php
include('includes/load.php');




  
$id = $_GET['id'];
$award = $_GET['award'];
$date = $_GET['date'];
$sql = "SELECT social_recognition.*,employees.* FROM social_recognition";
$sql .= " JOIN employees ON social_recognition.employee_id = employees.employee_id WHERE social_recognition.employee_id = '$id'";
$sql .= " AND award = '$award' AND date = '$date'";
$result = $db->query($sql);
$info = $result->fetch_assoc();



if(isset($_POST['done'])){
$id = $_POST['id'];
$award = $_POST['award'];
$sql = "UPDATE social_recognition SET status = 'printed' WHERE  employee_id = '$id' AND award = '$award'";
if($db->query($sql)){
	 $_SESSION['status'] ="Printing success";
            $_SESSION['status_code'] = "success";
      redirect('seminar-awards.php');
}
}

	
?>




<!DOCTYPE html>
<html>
<head>
	<title>Training Certificate</title>
	 <link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css?v=<?php echo time(); ?>">



    
    <!--from startbootstrap.com this is for Datatables...
    <link href="dist/css/styles.css" rel="stylesheet" />
    -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
       
</head>
<style type="text/css">
	@media print{
		body{
			background-color: #53b3db  !important;
        -webkit-print-color-adjust: exact; 
	}
	#a{
		display: none; !important;
	}
	#button{
		display: none; !important;
	}
</style>
<body onload="print()" style="padding-top: 5vh; background-color:  #53b3db ">
	
	
<div style="width:900px; height:650px; padding:20px; text-align:center; border: 10px solid black;margin:auto;background-color: #53b3db ;">
<div style="width:850px; height:600px; padding:20px; text-align:center; border: 5px solid black;background-color: #53b3db ;">
       <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
       <br><br>
       <span style="font-size:25px"><i>This is to certify that</i></span>
       <br><br>
       <span style="font-size:30px"><b><?php echo ucwords($info['first_name']).' '.ucwords($info['last_name']); ?></b></span><br/><br/>
       <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
       <span style="font-size:30px"><b><?php echo ucwords($info['award']) ?></b></span> <br/><br/>
       
       <span style="font-size:25px"><i>dated</i></span><br>
    
      <span style="font-size:30px"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date']))))?></span>
</div>
</div>
<div><form method="post" action="print-learning.php?id=<?php echo $info['employee_id']; ?>">
	<button type="submit" id="button" name="done" class="btn btn-success btn-xs">Done</button>
	<a class="btn btn-danger btn-xs" id="a" href="seminar-awards.php">Back</a></div>
	<input type="hidden" name="id" value="<?php echo $info['employee_id']?>">
	<input type="hidden" name="award" value="<?php echo $info['award']?>">
</body>
<script type="text/javascript">
	document.style.background = " #53b3db";
</script>
</html>