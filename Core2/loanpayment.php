  <?php
  $page_title = 'Payment Monitoring';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $stat="";
?>
<?php
$Table="collection";
$row = loan_payment();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Loan Monitoring</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

<!-- MODAl FOR APPROVE AND DECLINE BUDGET -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Loan Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form  method="POST">

                    <div class="modal-body">

                       
                        <div class="form-group">
                            <label>Requestors Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" name="dept" id="dept" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amt" id="amt" class="form-control"
                                placeholder="Enter Course" readonly>
                        </div>

                        <div class="form-group">
                            <label>Porpose</label>
                            <input type="text" name="por" id="por" class="form-control"
                                placeholder="Enter Your Email" readonly>
                        </div>
                       
                         <div class="form-group">
                            <label> Status </label>
                            <input type="text" name="status" value="status" id="status" class="form-control"
                              placeholder="Enter Your Email" readonly>
                        </div>
                         

                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="approved" class="btn btn-success btn-sm">Aproved</button>
                        <button type="submit" name="declined" class="btn btn-danger btn-sm">Decline</button>
                         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Loan Processing</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <tr>
                  
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Reference Number</th>
                  <th>Next Payment Monitoring</th>
                  <th>Status</th>
                  <th>Date Released</th>
                  <th>Actions</th>
               </tr>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($row as $row): ?>
               
              <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['Full_name']; ?></td>
              <td><?php echo $row['Ref_number']; ?></td>
              <td><?php echo $row['next_payment_monitoring']; ?></td>
             
             
              <?php if ($row['status']=="approved") { ?>
              <td>
              <span class="badge rounded-pill bg-primary"><?php echo remove_junk($row['status']); ?></span>
              </td>
            <?php } else{ ?>
               <td>
              <span class="badge rounded-pill bg-primary"><?php echo remove_junk($row['status']); ?></span>
              </td>
            <?php } ?>
              <td><?php echo $row['d_released']; ?></td>
              <td>
                <button type="button" class="btn btn-info btn-sm editbtn" style="width:100%;" > Details </button>
               </tr>

             <?php endforeach; ?>
          </tbody>
         
        </table>
      </div>
      </div>
      </div>
      </div>
    </div>
      <!-- End of Data table  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
 <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#fname').val(data[0]);
                $('#dept').val(data[1]);
                $('#amt').val(data[2]);
                $('#por').val(data[3]);
                $('#status').val(data[4]);
                
                
            });
        });
    </script>



<?php include_once('layouts/footer.php'); ?>
