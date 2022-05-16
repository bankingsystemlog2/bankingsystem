<?php
  $page_title = 'Settings Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php include_once('layouts/header.php'); ?>
<link href="libs/css/calendar2/pignose.calendar.min.css" rel="stylesheet">
<div class="row">
    <div class="col-lg-6">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-dark">Settings</h4>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="form-body">
                        <h3 class="card-title m-t-15">Security Settings</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Change Theme :</label>
                                    <a href="#" class="btn-theme-change btn btn-sm btn-primary shadow-sm"><i
                                    class="bi bi-cloud-arrow-down-fill fa-sm text-white-50"></i> Dark Blue</a>
                                   <br><br>
                                    <label class="control-label">Mapping :</label>
                                    <a href="#" class="btn btn-sm btn-info shadow-sm"><i
                                    class="bi bi-cloud-arrow-down-fill fa-sm text-white-50"></i> Map Report</a>
                                    <br><br>
                                     <label class="control-label">Date Set :</label>
                                     <a href="#" class="btn btn-sm btn-secondar shadow-sm"><i
                                     class="bi bi-cloud-arrow-down-fill fa-sm text-dark-50"></i> Fix Date</a>
                                  </div>
                              </div>

                          </div>
                      </div>
                    </div>
                  </div>
                </div>

        </div>
<?php include_once('layouts/footer.php'); ?>
