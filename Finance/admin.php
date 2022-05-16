<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php
// All Variables ----------------------------------------------------------------------
$Expenses=0;
$Collections=0;
$rev=0;
$total=0;
$c_user = count_by_id('users');
$Expense=Expenses();
$Budget=Budget();
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
    <div class="card bg-primary bg-gradient text-white h-100">
      <div class="card-body py-5"><p>₱ <?php echo $Expense['Collection']; ?><br><span><i class="bi bi-building"></i> Total Assets </span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-warning bg-gradient text-dark h-100">
      <div class="card-body py-5"><p>₱ <?php echo $Liabilities; ?><br> <span><i class="bi bi-list-columns"></i> Total Liabilities</span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-success bg-gradient text-white h-100">
      <div class="card-body py-5"><p>₱ <?php $rev=$Expense['Collection']+$com;
                         echo $total=$rev-$Expense['Expenses']; ?><br><span><i class="bi bi-piggy-bank-fill"></i>  Total Revenue</span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-danger bg-gradient text-white h-100">
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

<!-- Start of Charts -->

<div class="row">
  <div class="col-md-6 mb-3">
    <div class="card h-100">
      <div class="card-header">
        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
        Sales
      </div>
      <div class="card-body">
        <canvas class="chart1" width="500" height="200"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <div class="card h-100">
      <div class="card-header">
        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
        Yearly Budget
      </div>
      <div class="card-body">
        <canvas class="chart2" width="500" height="200"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- End of Charts -->

<!-- Data table start -->
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span><i class="bi bi-person-lines-fill me-2"></i></span> Users Table
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>

                <th>Name</th>
                <th>Username</th>
                <th>Position</th>
                <th>Status</th>
                <th>Last Log-in</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach($all_users as $a_user): ?>
                   <?php if($a_user['user_level']===$user['user_level'] && $a_user['username']===$user['username']): ?>
                     <tr>
                      <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
                      <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
                      <td><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
                      <td>
                       <span class="badge rounded-pill bg-warning"> <?php echo "You"; ?></span>
                      </td>
                      <td><?php echo read_date($a_user['last_login'])?></td>
                     </tr>
                     <?php else: ?>
                       <tr>
                        <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
                        <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
                        <td><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
                        <td>
                        <?php if($a_user['status'] === '1'): ?>
                         <span class="badge rounded-pill bg-success"> <?php echo "Active"; ?></span>
                       <?php else: ?>
                         <span class="badge rounded-pill bg-danger"><?php echo "Deactive"; ?></span>
                       <?php endif;?>
                        </td>
                        <td><?php echo read_date($a_user['last_login'])?></td>
                       </tr>
                   <?php endif; ?>
                      <?php endforeach;?>

            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Position</th>
                <th>Status</th>
                <th>Last Log-in</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
<!-- End of Data table  -->
<?php include_once('layouts/footer.php'); ?>
