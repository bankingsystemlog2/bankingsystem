<?php
  $page_title = 'List of Calims and Reimbursment';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);

?>
<?php include_once('layouts/header.php'); ?>
<!-- Content Row -->
<div class="row">

    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas class="chart1" height="100"></canvas>
                </div>
                <hr>
                Full details can be found in.
                <code>/js/demo/chart-bar-demo.js</code> file.
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas class="chart2" height="100"></canvas>
                </div>
                <hr>
                Full details can be found in.
                <code>/js/demo/chart-bar-demo.js</code> file.
            </div>
        </div>

    </div>

    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                  <canvas class="chart1"></canvas>
                </div>
                <hr>
                Full details can be found in.
                <code>/js/demo/chart-bar-demo.js</code> file.
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
