<?php
  $page_title = 'Budget Releasing';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$total = 0;
$Btotal=0;
$row = join_tables_table();
$formodal = Collection_deposits();
$budget=Budget();
$Expenses=Expenses();
$Code = join_tables_table();
$Current_User = current_user();
$Status="";
$Tablename="";
$id=0;
$getlastid=max_id();
 ?>

<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Budget Releasing</a>
</nav>
<!-- /Breadcrumb -->

<!-- Notification div -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->

<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success" style="font-size:14px;"><i class="bi bi-table"></i> Budget Releasing </span>
        <ul class="nav navbar-nav" style="float:right">
          <?php foreach ($Code as $Code):  ?>
            <?php
            $id=$Code['P_Code'];
            $Status= $Code['Name'];
            $Tablename=$Code['P_Tablename']; ?>
          <?php endforeach; ?>
          <form action="ForwardProcess.php?Tablename=<?php echo $Tablename."&Scode=". urlencode($id); ?>" method="post">
          <button class="btn btn-success bg-gradient" type="submit" name="Forward">
          <i class="bi bi-send-fill"></i>
            Forward Records
          </button>
           </form>
        </ul>
     <div class="text-center">
       <strong>
         <?php foreach ($Expenses as $Expenses): ?>
         <i class="bi bi-list-columns-reverse"></i>
         <span class="fs-5">Expenses: <span class="rounded bg-danger text-white"> &nbsp; <?php echo $Expenses['Expenses'];?> &nbsp;</span></span>
         <?php endforeach; ?>
         &nbsp;&nbsp;&nbsp;
          <?php foreach ($budget as $budget): ?>
            <i class="bi bi-cash-coin"></i>
           <span class="fs-5">Total Budget: <span class="rounded bg-dark text-white"> &nbsp;<?php echo $budget['Budget'];?> &nbsp;</span></span>
       <?php endforeach; ?>
       </strong>
     </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
          <thead>
            <tr class="bg-success bg-gradient text-light">
              <th>Department</th>
              <th>Requestor</th>
              <th>Purpose</th>
              <th>Amount</th>
              <th>Code</th>
              <th> Date </th>
              <th>Status</th>
              <th>Action</th>
           </tr>
          </thead>
         <tbody>
          <?php foreach ($row as $row):  ?>

            <?php if ($row['Name'] === 'Approved' ):?>
              <tr>
              <td><?php echo $row['P_Department']; ?></td>
              <td><?php echo $row['P_Requestor']; ?></td>
              <td><?php echo $row['P_Purpose']; ?></td>
              <td>₱<?php echo $row['P_Amount']; ?></td>
              <td><?php echo $row['P_Code']; ?></td>
              <td><?php echo $row['P_Date']; ?></td>
              <td>
                <span class="badge rounded-pill bg-primary bg-gradient"><?php echo $row['Name']; ?></span>
              </td>
              <td>
              <button type="submit" style="background-color:#008080; color: #ffffff;" class="btn Releasing" data-id="<?php echo $row['P_Code']; ?>" data-tbl="<?php echo $row['P_Tablename']; ?>" data-amount="<?php echo $row['P_Amount']; ?>"><i class="bi bi-wallet-fill"></i> Release</button>
               </td>
               </tr>
         <?php elseif ($row['Name']=='Settled'):?>
         <tr>
         <td><?php echo $row['P_Department']; ?></td>
         <td><?php echo $row['P_Requestor']; ?></td>
         <td><?php echo $row['P_Purpose']; ?></td>
         <td><?php echo $row['P_Amount']; ?></td>
         <td><?php echo $row['P_Code']; ?></td>
         <td><?php echo $row['P_Date']; ?></td>
         <td>
           <span class="badge rounded-pill bg-success bg-gradient"><?php echo $row['Name']; ?></span>
         </td>
         <td>
          <button type="submit" class="btn" style="background-color:#738678; color: #FFFFFF"><i class="bi bi-journal-check"></i> Details</button>
         </td>
          </tr>
        <?php endif; ?>
         <?php endforeach; ?>
       </tbody>
       <tfoot>
         <tr>
           <th>Department</th>
           <th>Requestor</th>
           <th>Purpose</th>
           <th>Amount</th>
           <th>Code</th>
           <th> Date </th>
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
   <!-- End of Data table  -->

   <!-- Modal Start -->
   <!-- Modal start -->
  <div class="modal fade" id="ReleaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Release Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
            <div class="modal-body">
             <div class='ModalTOpContent container-fluid'>
            <!-- AJAX Content output here-->
            </div>
            <hr>
          <form action="Settle_Process.php" method="post">
            <div class='form-group'>
              <label for='description' class='control-label'>Description</label>
              <input type="text" name="user_name" value="<?= $Current_User['name'] ?>" hidden>
            <textarea name='descriptionReleasing' class='form-control form-control-sm rounded-0' placeholder="Enter a Description for journal.." required></textarea>
            </div>
            <div  class='form-group'>
            <label for='status' class='control-label'>Mode of Payment</label>
              <select name='MOFP' id='status' class='form-control form-control-border' required>
              <option value='Cheque' >Cheque</option>
              <option value='Cash' >Cash</option>
              <option value='Partial' >Partial Payment</option>
              </select>
            </div>
           </div>
            <div class='modal-footer'>
            <input type="hidden" name="DataID" id="RespID" value="" />
            <input type="hidden" name="TableName" id="Table" value="" />
            <input type="hidden" name="Amount" id="AmountIP" value="" />
            <?php foreach ($getlastid as $value): ?>
                <input type="hidden" name="max_id" value="<?php echo $value['auto_increment']; ?>"/>
            <?php endforeach; ?>
            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
            <button type='submit' name='Settle' class='btn btn-success bg-gradient'>Confirm</button>
            </div>
            </form>
          </div>
          </div>
          </div>
   <!-- Modal End -->

   <script>
   $(document).ready(function(){
       $('.Releasing').click(function(){
           var Release_id = $(this).data('id');
           var Release_tbl = $(this).data('tbl');
           var Release_amount = $(this).data('amount');

           $.ajax({
               url: 'ajax.php',
               type: 'post',
               data: {Release_id: Release_id, Release_tbl: Release_tbl},
               success: function(response){
                   // Add response in Modal body
                   $('.ModalTOpContent').html(response);

                   // Display Modal
                   $('#ReleaseModal').modal('show');

                   document.getElementById('RespID').value = Release_id;
                   document.getElementById('Table').value = Release_tbl;
                   document.getElementById('AmountIP').value = Release_amount;


               }
           });
       });
   });


   </script>


<?php include_once('layouts/footer.php'); ?>
