<?php
  $page_title = 'Vendor List';
  require_once('includes/log2load.php');
  // $users_id = current_user()['id'];
?>
<link rel="stylesheet" href="datatables.css">
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
 $groups = vendor_request_tbl();
//  $result = find_vendor_by_id('vendors',$users_id);
//  $is_show = 1;
 $all_vendors = vendor_request_pending();
?>
<?php
//   if(isset($_POST['applicationform'])){

//    $req_fields = array('name','address','company','email','item_description','offer','phone','category');
//    validate_fields($req_fields);

//    if(empty($errors)){
//        $name   = remove_junk($db->escape($_POST['name']));
//        $address   = remove_junk($db->escape($_POST['address']));
//        $company   = remove_junk($db->escape($_POST['company']));
//        $email   = remove_junk($db->escape($_POST['email']));
//        $item_description   = remove_junk($db->escape($_POST['item_description']));
//        $offer   = remove_junk($db->escape($_POST['offer']));
//        $phone   = remove_junk($db->escape($_POST['phone']));
//        $category   = remove_junk($db->escape($_POST['category']));
//         $query = "INSERT INTO vendors (";
//         $query .="Name,Address,Company,Email,item_description,Offer,Phone,category,users_id";
//         $query .=") VALUES (";
//         $query .="'{$name}', '{$address}', '{$company}', '{$email}', '{$item_description}', '{$offer}', '{$phone}', '{$category}', '{$users_id}'";
//         $query .=")";


        
//         if($db->query($query)){
          
//           $session->msg('s',"Application form sent! ");
//           // for Audit Log
//           // $link = $_SERVER['PHP_SELF'];
//           // $link_array = explode('/',$link);
//           // $page = end($link_array);
//           // $now =  date('Y-m-d H:i:s');
        
//           // $sqlAudit = "INSERT INTO `audit_logs`(`module`, `action_taken`, `users_id`, `datetime_created`) values ('{$page }','New added record where vendor is {$name}','{$_SESSION['user_id']}','{$now}' )";
//           // $db->query($sqlAudit);

//           //end AuditLog Insert
//           redirect('vendor_list.php', false);
//         } else {
         
//           $session->msg('d',' Sorry Application form failed to send!');
//           redirect('vendor_list.php', false);
//         }
//    } else {
//      $session->msg("d", $errors);
//       redirect('vendor_list.php',false);
//    }
//  }
?>
        <!-- <div class="tab">
            <button class="tablinks" onclick="Tab(event, 'ApplicationForm')">Register Application</button>
            <button class="tablinks" onclick="Tab(event, 'ViewData')">View Request</button>
        </div>

        <div id="ApplicationForm" class="tabcontent">
            <form method="post" action="vendor_list.php" autocomplete="off" > 
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="address">
                </div>
                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" class="form-control" name ="company"  placeholder="company">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name ="email"  placeholder="email">
                </div>
                <div class="form-group">
                    <label for="item_description">Item Description</label>
                    <textarea type="text" class="form-control" name ="item_description"  placeholder="item description"></textarea>
                </div>
                <div class="form-group">
                    <label for="offer">Bidding Price</label>
                    <input type="text" class="form-control" name ="offer"  placeholder="offer">
                </div>
                <div class="form-group">
                    <label for="phone">Contact #</label>
                    <input type="text" class="form-control" name ="phone"  placeholder="contact#">
                </div>
            <div class="form-group">
            <label for="category">Type of Application</label>
                    <select class="form-control" name="category" placeholder="category">
                    <option <?php if('category')  echo 'selected="selected"';?>value="1">Supplier</option>
                    <option <?php if('category')  echo 'selected="selected"';?>value="0">Contractor</option>
                    </select>
                </div>
                <div class="form-group clearfix">
            <?php //f($result == null): ?> 
                <button type="submit" name="applicationform" style="float: right;" class="btn btn-success">Submit</button>
                <?php //endif?>
                </div>
                
            </form>
        </div> -->
<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" href="datatables.css">
<!-- <style>
@media print{
	#button{
		display: none; !important;
	}
  #example_length{
		display: none; !important;
	}
  #example_filter{
		display: none; !important;
	}
  .topNavBar{
    display: none; !important;
  }
  #example_info{
    display: none; !important;
  }
  #example_previous{
    display: none; !important;
  }
  #example_next{
    display: none; !important;
  }
  .page-link{
    display: none; !important;
  }
	.breadcrumbs{
		display: none; !important;
	}
  table{
    zoom: 80%;
  }
}
@page {
       /* auto is the initial value */
    size: auto%;
    margin: 0;  /* this affects the margin in the printer settings */
}


</style> -->
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
   <?php elseif ($user['user_level'] === '4'): ?>
   <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">List Of Request</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Vendor Portal</span>
      
      <div class="card-body">
        <div class="table-responsive">
        <form method="post" action="contractor_button_approve.php">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Name</th>
                <th class="text-center" style="width: 15%;">Department</th>
                <th class="text-center" style="width: 15%;">Request Type</th>
                <th class="text-center" style="width: 15%;">Date Requested</th>
                <?php if($user['user_level'] === '1'): ?>
                <th class="text-center" style="width: 100px;">Actions</th>
                <?php endif;?>
            </tr>
            </thead>
            <tbody>
            <?php foreach($all_vendors as $a_vendor): ?>
            <tr>
           <td><?php echo remove_junk(ucwords($a_vendor['product_name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['department']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['req_type']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['date_of_request']))?></td>
              <td>
              <button type="button" class="btn btn-sm btn-success"data-bs-toggle="modal" data-bs-target="#ModalApprove">Approved and Post</i>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDecline">Decline</button>
            </td>
            </tr>
            <?php ?>
            <?php endforeach;?>
        </tbody>
        </table>
        </div>
 <div class="modal fade" id="ModalApprove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you Sure ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       <div class="modal-body">
        Do you want to Approved and Post this Request?
       </div>
       <div class="modal-footer">
       <button type="submit" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-check">Approved and Post</i></a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalDecline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you Sure ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       <div class="modal-body">
       Do you want to Declined this Request?
       </div>
       <div class="modal-footer">
       <button type="submit" name="vendor_reject" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="fa fa-close">Decline</i>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <!-- <script>
        function Tab(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        </script> -->
        <!-- <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
        </script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="datatables.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script>
   $("#myTable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    }
  );

</script> -->
        </body>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>