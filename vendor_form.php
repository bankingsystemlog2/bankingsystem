<?php
  $page_title = 'Vendor Form';
  require_once('includes/load.php');
  // $users_id = current_user()['id'];
?>
<link rel="stylesheet" href="datatables.css">
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
 $groups = find_all('vendors');
 $users_id = current_user()['id'];
//  $result = find_vendor_by_id('vendors',$users_id);
//  $is_show = 1;
 $all_vendors = find_all_inner('vendors');
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
//           redirect('vendor_form.php', false);
//         } else {
         
//           $session->msg('d',' Sorry Application form failed to send!');
//           redirect('vendor_form.php', false);
//         }
//    } else {
//      $session->msg("d", $errors);
//       redirect('vendor_form.php',false);
//    }
//  }
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Vendor</span>
       </strong>
         
      </div>
     <div class="panel-body">
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                body {font-family: Arial;}

                /* Style the tab */
                .tab {
                    overflow: hidden;
                    border: 1px solid #ccc;
                    background-color: #f1f1f1;
                }

                /* Style the buttons inside the tab */
                .tab button {
                    background-color: inherit;
                    float: left;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 14px 16px;
                    transition: 0.3s;
                    font-size: 17px;
                }

                /* Change background color of buttons on hover */
                .tab button:hover {
                    background-color: #ddd;
                }

                /* Create an active/current tablink class */
                .tab button.active {
                    background-color: #ccc;
                }

                /* Style the tab content */
                .tabcontent {
                    display: none;
                    padding: 6px 12px;
                    border: 1px solid #ccc;
                    border-top: none;
                }
                /* Table Scroll */
                #ViewData{
                    overflow-x: auto;

                 }
            </style>
        </head>
        <body>
        <!-- <div class="tab">
            <button class="tablinks" onclick="Tab(event, 'ApplicationForm')">Register Application</button>
            <button class="tablinks" onclick="Tab(event, 'ViewData')">View Request</button>
        </div>

        <div id="ApplicationForm" class="tabcontent">
            <form method="post" action="vendor_form.php" autocomplete="off" > 
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

        <div id="ViewData">
            <table class="table table-bordered table-striped" id="myTable">
            <thead>
            <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>Product Name</th>
                <th>Name</th>
                <th>Address</th>
                <th class="text-center" style="width: 15%;">Company Name</th>
                <th class="text-center" style="width: 15%;">Email</th>
                <th class="text-center" style="width: 15%;">Item Description</th>
                <?php if($user['user_level'] === '1'): ?>
                <th class="text-center" style="width: 15%;">Bidding Price</th>
                <?php endif;?>
                <th class="text-center" style="width: 15%;">Contact #</th>
                <th class="text-center" style="width: 15%;">Category</th>
                <th class="text-center" style="width: 10%;">Status</th>
                <?php if($user['user_level'] === '1'): ?>
                <th class="text-center" style="width: 100px;">Actions</th>
                <?php endif;?>
            </tr>
            </thead>
            <tbody>
            <?php foreach($all_vendors as $a_vendor): ?>
            <?php if($a_vendor['users_id'] == $users_id){ ?>
            <tr>
            <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['product_name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Address']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Company']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Email']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['item_description']))?></td>
            <?php if($user['user_level'] === '1'): ?>
            <td><?php echo remove_junk(ucwords($a_vendor['Offer']))?></td>
            <?php endif;?>
            <td><?php echo remove_junk(ucwords($a_vendor['Phone']))?></td>
            <td>
            <?php if($a_vendor['category'] == 0): ?>
                <span class="label label-success"><?php echo "Contractor"; ?></span>
                <?php elseif($a_vendor['category'] == 1):?>
                <span class="label label-danger"><?php echo "Supplier"; ?></span>
                <?php endif;?>
            </td>
            <td>
            <?php if($a_vendor['statuss'] === '1'): ?>
                <span class="label label-success"><?php echo "Approved"; ?></span>
                <?php elseif($a_vendor['statuss'] === '0'): ?>
                <span class="label label-default"><?php echo "Pending"; ?></span>
                <?php elseif($a_vendor['statuss'] === '2'): ?>
                <span class="label label-danger"><?php echo "Rejected"; ?></span>
            <?php else: ?>
                <span class="label label-danger"><?php echo "Error"; ?></span>
            <?php endif;?>
            </td>
            <?php if($user['user_level'] === '1'): ?>
            <td class="text-center">
                <div class="btn-group">
                  <?php if ($a_vendor['statuss'] === '0'): ?>
                    <a href="vendor_approval.php?id=<?php echo (int)$a_vendor['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="vendor_delete.php?id=<?php echo (int)$a_vendor['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                    <?php elseif ($a_vendor['statuss'] === '1' || $a_vendor['statuss'] === '2'): ?>
                    <?php endif; ?>
                     
                </div>
            </td>
            <?php endif;?>
            </tr>
            <?php }?>
            <?php endforeach;?>
        </tbody>
        </table>
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
        <script>
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
        </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

</script>
        </body>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
