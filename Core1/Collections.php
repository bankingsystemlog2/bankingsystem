<?php
  $page_title = 'Client Information';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $col=client_info();
?>

<?php include_once('layouts/header.php'); ?>
<!-- Notification div -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '2'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '3'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Client Information</a>
</nav>

<!-- /Breadcrumb -->

 <div class="container mt-5">  
     <!-- MODAl FOR APPROVE AND DECLINE BUDGET -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header  p-3 mb-2 bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> Client Information</h5>
                    
                </div>
                <form  method="POST" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label><b>Full Name</b></label>
                            <input type="text" name="fname" id="fname" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label><b>Date of Birth</b></label>
                            <input type="text" name="dob" id="dob" class="form-control" readonly>
                        </div>

                         <div class="form-group">
                            <label><b>Sex</b></label>
                            <input type="text" name="sex" id="sex" class="form-control" readonly>
                        </div>                       

                        <div class="form-group">
                            <label><b>Contact Number</b></label>
                            <input type="text" name="cn" id="cn" class="form-control" readonly>
                        </div>                     
                       
                         <div class="form-group">
                            <label><b>Email Address</b></label>
                            <input type="text" name="emailadd" id="emailadd" class="form-control" readonly>
                        </div>

                          <div class="form-group">
                            <label><b>Employeer Name</b></label>
                            <input type="text" name="employname" id="employname" class="form-control" readonly>
                        </div>

                          <div class="form-group">
                            <label><b>Position</b></label>
                            <input type="text" name="position" id="position" class="form-control" readonly>
                        </div>   
                                                                   
                         <div class="form-group">
                            <label><b>Permanent Address</b></label>
                            <input type="text" name="permaadd" id="permaadd" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                         <button type="submit" class="btn btn-secondary btn-sm">Close</button>
                         
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>

<!-- Data table start -->
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Client Information</span>
     <div class="text-end">
       
     </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
          <thead>
            <tr>

              <th> Full Name </th>
              <th> Sex </th>
              <th> Date of Birth</th>
              <th> Contact Number </th>
              <th> Email Address </th>
              <th> employeer_name </th>
              <th> Position </th>
              <th> Permanent Address </th>
              <th>Action</th>
          </thead>
         <tbody>
            
          <?php foreach ($col as $col): ?>
          <tr>
          <td><?php echo $col['fname']." ".$col['mname']." ".$col['lname'].""; ?></td>
          <td><?php echo $col['sex']?></td>
          <td><?php echo $col['date_0f_birth']?></td>
          <td><?php echo $col['mobile_no']?></td>
          <td><?php echo $col['email_address']?></td>
          <td><?php echo $col['employeer_name']?></td>
          <td><?php echo $col['position']?></td>
          <td><?php echo $col['perma_address']?></td>
          <td><button type="button" class="btn btn-outline-primary  btn-sm editbtn">View</button></td>
           </tr>
         <?php endforeach; ?>
         </tbody>
         <tfoot>
         </tfoot>
       </table>
     </div>
   </div>
 </div>
</div>
</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<!-- End of Data table  -->
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
                $('#sex').val(data[1]);
                $('#dob').val(data[2]);
                $('#cn').val(data[3]);
                $('#emailadd').val(data[4]);
                $('#employname').val(data[5]);
                $('#position').val(data[6]);
                $('#permaadd').val(data[7]);
                
                
            });
        });
    </script>



<?php include_once('layouts/footer.php'); ?>
