<?php
  $page_title = 'List of Procurments';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $stat="";
?>
<?php
$Table="collection";
$row = loan_process();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Loan Processing</a>
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
  

 <div class="container mt-5">
<!--APPROVED AND DECLINE -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header  p-3 mb-2 bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Budget Request</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form  method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Reference Number</label>
                            <input type="text" name="repn" id="repn" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Type of Loan</label>
                            <input type="text" name="tloan" id="tloan" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Amount Loan</label>
                            <input type="text" name="aml" id="aml" class="form-control" readonly>
                        </div>
                       
                         <div class="form-group">
                            <label> Date Release </label>
                            <input type="text" name="dr" id="dr" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="approved" class="btn btn-success btn-sm">Aproved</button>
                        <button type="submit" name="declined" class="btn btn-danger btn-sm">Decline</button>
                         <button type="button" class="btn btn-secondary btn-sm"  data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
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
                  <th> Full Name </th>
                  <th>Reference Number</th>
                  <th>Type of Loan</th>
                  <th>Amount Loan</th>
                  <th>Status</th>
                  <th>Date Released</th>
                  <th>Actions</th>
               </tr>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($row as $row): ?>
               
              <tr>
              
              <td><?php echo $row['Full_Name']; ?></td>
              <td><?php echo $row['Ref_Number']; ?></td>
              <td><?php echo $row['Type_of_loan']; ?></td>
              <td><?php echo $row['Amount_loan']; ?></td>
              <?php if ($row['Status']=="approved") { ?>
              <td>
              <span class="badge rounded-pill bg-primary"><?php echo remove_junk($row['Status']); ?></span>
              </td>
            <?php } else{ ?>
               <td>
              <span class="badge rounded-pill bg-danger"><?php echo remove_junk($row['Status']); ?></span>
              </td>
            <?php } ?>
              <td><?php echo $row['D_released']; ?> </td>
              <td><button type="button" class="btn btn-outline-primary btn-sm editbtn">Select</button></td>
           </tr>
              
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
                $('#repn').val(data[1]);
                $('#tloan').val(data[2]);
                $('#aml').val(data[3]);
                $('#status').val(data[4]);
                 $('#dr').val(data[5]);
                
                
            });
        });
    </script>


<?php include_once('layouts/footer.php'); ?>
