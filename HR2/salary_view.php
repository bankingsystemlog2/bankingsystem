<?php
  $page_title = 'Salary View';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php
$Table="collection";
$row = join_procurment_table();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="salary.php" class="breadcrumbs__item">Salary</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Payslip</a>
</nav>
<!-- /Breadcrumb -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <div class="card-body">
        <?php
        include('function.php');
        $payid = mysqli_real_escape_string($conn, $_GET['id']);

        $query = mysqli_query($conn, "SELECT * FROM sl s, users u WHERE s.s_ide=u.id AND s.s_id = {$payid}");
        $row = mysqli_fetch_array($query);

        ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card-box mb-0">
                <h4 class="payslip-title"> Payslip Month of <?php echo date("F Y", strtotime($row['s_d']));?></h4>
                <div class="row">
                  <div class="col-sm-6 m-b-20">
                    <ul class="list-unstyled m-b-0">
                      <li>Banking And Finance</li>
                    </ul>
                  </div>
                  <div class="col-sm-6 m-b-20">
                    <div class="invoice-details">
                    <h3 class="text-uppercase">Payslip #<?php echo $row['s_id'];?></h3>
                      <ul class="list-unstyled">
                        <li>Salary Month: <span><?php echo date("F Y", strtotime($row['s_d']));?></span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 m-b-20">
                    <ul class="list-unstyled">
                      <li><h5 class="m-b-0"><strong><?php echo $row['name'];?></strong></h5></li>
                      <li>Employee ID: <strong><?php echo $row['employee_id'];?></strong></li>
                      <li>Position : <strong><?php echo $row['position'];?></strong></li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div>
                      <h4 class="m-b-10"><strong>Earnings</strong></h4>
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td><strong>Basic Salary</strong> <span class="float-right">₱<?php echo $row['s_basic'];?></span></td>
                            </tr>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div>
                      <h4 class="m-b-10"><strong>Deductions</strong></h4>
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td><strong>SSS</strong> <span class="float-right">₱<?php echo $row['s_sss'];?></span></td>
                            </tr>
                            <tr>
                            <td><strong>Pag-ibig</strong> <span class="float-right">₱<?php echo $row['s_pi'];?></span></td>
                            </tr>
                             <tr>
                            <td><strong>Philhealth</strong> <span class="float-right">₱<?php echo $row['s_ph'];?></span></td>
                            </tr>
                            <tr>
                            <td><strong>Loan</strong> <span class="float-right">₱<?php echo $row['s_loan'];?></span></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <p><strong>Total Salary: ₱<?php echo $row['s_total'];?></strong> </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
