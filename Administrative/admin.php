<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>


<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
     $all_com_announcement= find_all('com_announcement')
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

<?php

 $all_users = find_all_user();
?>

<?php include_once('layouts/header.php'); ?>

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
	
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
      <div class="card-body py-10"><p> <?php echo "<h2>$pdoVisitors</h2>"; ?><br><span><i class="bi bi-people"></i> Total Visitor </span></p></div>
      
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <button class="btn bg-gradient text-light" type="button" name="button" data-bs-toggle="modal" data-bs-target="#DetailsModal"><i class="bi bi-chevron-right"></i></button>
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
          <button class="btn bg-gradient text-light" type="button" name="button" data-bs-toggle="modal" data-bs-target="#DetailsModal2"><i class="bi bi-chevron-right"></i></button>
        </span>
      </div>
    </div>
  </div>

</div>



 <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Company Announcement</h6>

                    </div>
                     <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>

            </thead>
            <tbody>

          <?php foreach ($all_com_announcement as $anounce):?>
          <tr>
					<td><?php echo remove_junk(ucfirst($anounce['title'])); ?></td>
					<td><?php echo remove_junk(ucfirst($anounce['description'])); ?></td>

                    <td class="text-center">
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>

          </table>
        </div>
      </div>
                </div>
            </div>

			<!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>

                    </div>
					 <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    </div>
                    </div>
            </div>
            
            
            <!-- Modal -->
<div class="modal fade" id="DetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary bg-gradient text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Visitor Report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <ul type='none'>
            <div style="display: flex;">
            <li style='flex-basis: 30.5%;'>Request Code :</li>
            <li style='flex-basis: 40.5%;'></li>
          </div>
            <div style='display: flex;'>
          <li style='flex-basis: 30.5%;'>Date :</li>
            <li style='flex-basis: 40.5%;'></li>
            </div>
            <div style='display: flex;'>
            <li style='flex-basis: 30.5%;'>Source :</li>
            <li style='flex-basis: 40.5%;'></li>
            </div>
            <div style='display: flex;'>
            <li style='flex-basis: 30.5%;'>Total :</li>
            <li style='flex-basis: 40.5%;'></li>
            </div>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal -->




 <!-- Modal -->
<div class="modal fade" id="DetailsModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-warning bg-gradient text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Facility Complaint</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <ul type='none'>
            <div style="display: flex;">
            <li style='flex-basis: 30.5%;'>Request Code :</li>
            <li style='flex-basis: 40.5%;'></li>
          </div>
            <div style='display: flex;'>
          <li style='flex-basis: 30.5%;'>Date :</li>
            <li style='flex-basis: 40.5%;'></li>
            </div>
            <div style='display: flex;'>
            <li style='flex-basis: 30.5%;'>Source :</li>
            <li style='flex-basis: 40.5%;'></li>
            </div>
            <div style='display: flex;'>
            <li style='flex-basis: 30.5%;'>Total :</li>
            <li style='flex-basis: 40.5%;'></li>
            </div>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal -->
 <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>






<?php include_once('layouts/footer.php'); ?>
