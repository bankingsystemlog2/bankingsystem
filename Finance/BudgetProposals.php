<?php
  $page_title = 'Budget Proposals';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Budget Proposals</a>
</nav>
<!-- /Breadcrumb -->

<!-- Notification div -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->
<div class="container">
  <div class="nav-wrapper position-relative mb-2">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row bg-light" id="tabs-text" role="tablist">
        <li class="nav-item fw-bold" style="background-color: #2B547E;">
            <a class="nav-link mb-sm-3 mb-md-0 active border bg-gradient text-light" id="tabs-text-1-tab" data-bs-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Proposals List</a>
        </li>
        <li class="nav-item fw-bold" style="background-color: #2B547E;">
            <a class="nav-link mb-sm-3 mb-md-0 border bg-gradient text-light" id="tabs-text-2-tab" data-bs-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Under Releasing</a>
        </li>
        <li class="nav-item fw-bold" style="background-color: #2B547E;">
            <a class="nav-link mb-sm-3 mb-md-0 border bg-gradient text-light" id="tabs-text-3-tab" data-bs-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3" aria-selected="false">Released</a>
        </li>
    </ul>
</div>
<div class="card border-0">
    <div class="card-body p-0">
        <div class="tab-content" id="tabcontent1">
            <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
              <div class="col-md-12 mb-3">
                <div class="card">
                  <div class="card-header">
                    <span class="badge rounded-pill bg-success bg-gradient" style="font-size:14px;"><i class="bi bi-table"></i> Proposals List</span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="example"
                        class="table table-striped data-table"
                        style="width: 100%" >
                        <thead>
                          <tr class="bg-success bg-gradient text-light">
                            <th>Invoice #</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                         <tr>
                         <td>Sample</td>
                         <td>Sample</td>
                         <td>Sample</td>
                         <td>Sample</td>
                         <td><span class="badge rounded-pill bg-danger bg-gradient"></span></td>
                         <td>
                           <a href="" class="btn btn-success bg-gradient btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</a></td>
                          </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Collection Code</th>
                          <th>Account Name</th>
                          <th>Account Number</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  </div>
                  </div>
                  </div>
            </div>
            <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
                <p>Photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod
                    Pinterest in do umami readymade swag.</p>
                <p>Day handsome addition horrible sensible goodness two contempt. Evening for married his account removal. Estimable me disposing of be moonlight cordially curiosity.</p>
            </div>
            <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus,
                    Marfa eiusmod Pinterest in do umami readymade swag.</p>
                <p>Day handsome addition horrible sensible goodness two contempt. Evening for married his account removal. Estimable me disposing of be moonlight cordially curiosity.</p>
            </div>
        </div>
    </div>
</div>


<?php include_once('layouts/footer.php'); ?>
