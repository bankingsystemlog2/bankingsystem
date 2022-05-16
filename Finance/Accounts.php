<?php
  $page_title = 'Chart of Accounts';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $i = 1;
  $acc=account_list();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Chart of Accounts</a>
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
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Chart of Accounts</span>
        <div class="text-end">
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">


          <!-- Modal start -->
              <div class="modal fade" id="AccountsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Account details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">



                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Modal End -->


        <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr class="bg-success bg-gradient text-light">
                <th>#</th>
    						<th>Date Created</th>
    						<th>Account</th>
    						<th>Description</th>
    						<th>Status</th>
    						<th>Action</th>
             </tr>
            </thead>
           <tbody>
             <?php foreach ($acc as $acc): ?>
               <?php if ($acc['definedStat']==104): ?>
                 <?php
                 $name=$acc['name'];
                 $id=$acc['id'];
                  ?>
                <tr>
               <td><?php echo $i++; ?></td>
               <td><?php echo date("Y-m-d H:i",strtotime($acc['date_created'])) ?></td>
               <td><?php echo $acc['name'] ?></td>
               <td><p class="m-0 truncate-1"><?php echo $acc['description'] ?></p></td>
               <td>
                 <?php
                    switch($acc['status']){
                      case 0:
                        echo '<span class="badge rounded-pill bg-danger bg-gradient">Inactive</span>';
                        break;
                      case 1:
                        echo '<span class="badge rounded-pill bg-primary bg-gradient">Active</span>';
                        break;
                      default:
                        echo '<span class="badge rounded-pill bg-warning bg-gradient">N/A</span>';
                          break;
                    }
                  ?>
               </td>
               <td>
                 <div class="dropdown">
                <button class="btn btn-success bg-gradient dropdown-toggle btn-sm" type="button" id="dropdownMenuAccounts" data-bs-toggle="dropdown" aria-expanded="false">
                  Action
                </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuAccounts">
                    <li><a  class="dropdown-item view_data" data-id ="<?= $acc['id'] ?>" data-tbl="account_list"><span class="text-success bi bi-eye-fill"></span> View</a></li>
                    <li><a class="dropdown-item delete_data"><span class="text-danger bi bi-trash"></span> Delete</a></li>
                  </ul>
              </div>
               </td>
                </tr>
               <?php endif; ?>
            <?php endforeach; ?>
           </tbody>
           <tfoot>
             <tr>
               <th>#</th>
   						<th>Date Created</th>
   						<th>Account</th>
   						<th>Description</th>
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
  <script>
  $(document).ready(function(){
      $('.view_data').click(function(){

          var userid = $(this).data('id');
          var tbl = $(this).data('tbl');

          $.ajax({
              url: 'ajax.php',
              type: 'post',
              data: {userid: userid, tbl: tbl},
              success: function(response){
                  // Add response in Modal body
                  $('.modal-body').html(response);

                  // Display Modal
                  $('#AccountsModal').modal('show');
              }
          });
      });
  });
  </script>

<?php include_once('layouts/footer.php'); ?>
