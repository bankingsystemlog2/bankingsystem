<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php

 
  try{
    $pdoConnect = new PDO("localhost","u811015322_Systembanking6","Systembanking6@gmail","u811015322_obms_db");
	} catch (PDOException $ex) {
		echo $ex->getMessage();
    exit();
	}

$pdoQuery = "SELECT * FROM visitor_registration";
$pdOQuery = "SELECT * FROM facility_complain";





$pdoResult = $pdoConnect->query($pdoQuery);
$pdOResult = $pdoConnect->query($pdOQuery);



$pdoRowCount = $pdoResult->rowCount();
$pdORowCount = $pdOResult->rowCount();




?>

<?php
// All Variables ----------------------------------------------------------------------
$Expenses=0;
$Collections=0;
$rev=0;
$total=0;
$c_user = count_by_id('users');
$Expense=Expenses();
$Budget= Budget();
$com=0;
$Liabilities=0;
// End of Variable Declarations---------------------------------------------------------

//Sql for Summing the deposits in Collections ------------------------------------------
$sql="SELECT SUM(LT_Recieved) AS allsum FROM collection_transactions  WHERE LT_Type='deposit';";
$result = $db->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 $Liabilities=$row['allsum'];
 }
 }
 // End-----------------------------------------------------------------------------

 $all_users = find_all_user();
?>

<?php include_once('layouts/header.php'); ?>
<!-- Taking Array of Datas From Budget and putting to com Variable...-->
<?php foreach ($Budget as $Budget): ?>
  <?php $com=$Budget['Budget'];?>
<?php endforeach; ?>
<!-- End of Loop-->


<!-- Taking Array of Datas From Expense and putting to Expense Variable...-->
<?php foreach ($Expense as $Expense): ?>

<?php
$Expenses=$Expense['Expenses'];
$Collections=$Expense['Collection'];
 ?>
 
 
<?php endforeach; ?>
<!-- End of Loop-->

<!-- Notification div -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->
<div class="row">
  <div class="col-md-12">
    <h4>Dashboard</h4>
  </div>
</div>


<div class="row">
  <div class="col-md-3 mb-3">
    <div class="card bg-primary text-white h-100">
      <div class="card-body py-10"><p> <?php echo "<h2>$pdoRowCount</h2>"; ?><br><span><i class="bi bi-people"></i> Total Visitor </span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  
 
  <div class="col-md-3 mb-3">
    <div class="card bg-warning text-dark h-100">
      <div class="card-body py-10"><p> <?php echo "<h2>$pdORowCount</h2>"; ?><br> <span><i class="bi bi-list-columns"></i> Facility Complaint</span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 mb-3">
    <div class="card bg-success text-white h-100">
      <div class="card-body py-5"><p> <?php echo $total=$rev-$Expense['Expenses']; ?><br><span><i class="bi bi-piggy-bank-fill"></i>  Total Revenue</span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 mb-3">
    <div class="card bg-danger text-white h-100">
      <div class="card-body py-5"><p>₱ <?php echo $Expense['Expenses']; ?><br><span><i class="bi bi-journal-x"></i> Total expenses</span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
</div>





<?php include_once('layouts/footer.php'); ?>
