<?php
  $page_title = 'General Journal';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);

?>
<?php include_once('layouts/header.php'); ?>
<?php
$code=$_GET['id'];
$row=Find_collection_Details($code);
 ?>
<!-- Notification div -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="Collections.php" class="breadcrumbs__item">All Collections</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Details</a>
</nav>
<!-- /Breadcrumb -->

<div class="container">
<div class="row">
    <div class="col-lg-11">
        <div class="offset-md-2 card card-outline-info">
            <div class="card-header" style="background-color: #2B547E;">
            <span class="badge rounded-pill bg-success" style="font-size:14px;"><i class="bi bi-table"></i> List of Transactions</span>
                <ul class="nav navbar-nav" style="float:right">
                  <button class="btn btn-success bg-gradient" type="submit" name="Forward">
                  <i class="bi bi-printer-fill"></i>
                    Print
                  </button>
                   </form>
                </ul>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <h5 class="box-title m-t-13">Account Info</h5>
                        <hr class="m-t-0 m-b-40">
                        <?php foreach ($row as $details): ?>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Account Name :</label>
                                    <div class="col-md-7">
                                        <p class="form-control-static"> <?php echo $details['LS_Account_name']; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-9">
                                <div class="form-group row ">
                                    <label class="control-label text-right col-md-3">Account Number :</label>
                                    <div class="col-md-7">
                                        <p class="form-control-static"> <?php echo $details['A_Number']; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Loan Ammount :</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> Male </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Beginning date :</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> 11/06/1987 </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Remaining Balance :</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> Category1 </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Interest :</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> Free </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                      <?php endforeach; ?>
                        <!--/row-->
                        <h5 class="box-title m-t-13">Transactions</h5>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Note :</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> All Recorded AR Transactions Are confirmed by collection officer. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                          <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="text-white" style="background-color: #2B547E;">
                                      <tr>
                                          <th>#</th>
                                          <th>Date</th>
                                          <th>Beginning Balance</th>
                                          <th>Payment</th>
                                          <th>Interest</th>
                                          <th>Penalty</th>
                                          <th>Remaining Balance</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>012</td>
                                          <td>ss</td>
                                          <td>ss</td>
                                          <td>ss</td>
                                          <td>ss</td>
                                          <td>ss</td>
                                          <td>ss</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>

                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
