<?php
  $page_title = 'User Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$pdoVisitors;
$pdOfacility;

$sql1 = "SELECT count(*) as allVisitors FROM visitor_registration";
$sql2 = "SELECT count(*) as allfacility FROM facility_complain";

$result = $db->query($sql1);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 $pdoVisitors=$row['allVisitors'];
 }
}
$result = $db->query($sql2);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 $pdOfacility=$row['allfacility'];
 }
}

?>



<?php include_once('layouts/header.php'); ?>


<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>

<div class="row">
  <div class="col-md-12">
    <h4>Admin Staff Dashboard</h4>
  </div>
</div>
  <div class="row">
    <a href="users.php" style="color:black;">
		<div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-secondary1">
          <i class="glyphicon glyphicon-user"></i>
        </div>
       </div>
    </div>
	</a>
</div>



<div class="row">
  <div class="col-md-3 mb-3">
    <div class="card bg-primary text-white h-100">
      <div class="card-body py-10"><p> <?php echo "<h2>$pdoVisitors</h2>"; ?><br><span><i class="bi bi-people"></i> Total Visitor </span></p></div>
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
      <div class="card-body py-10"><p> <?php echo "<h2>$pdOfacility</h2>"; ?><br> <span><i class="bi bi-list-columns"></i> Facility Complaint</span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  
  



<?php include_once('layouts/footer.php'); ?>
