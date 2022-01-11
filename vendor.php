<?php
  $page_title = 'Vendor Portal';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_vendors = find_all_inner('vendors');
?>
<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" href="datatables.css">
<style>
  #vendorTableBodyPanel{
    overflow-x: auto;

  }

</style>

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
          <span>List of Applicant</span>
       </strong>


      </div>
     <div class="panel-body"  id="vendorTableBodyPanel">
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
            <span class="label label-default"><?php echo "Supplier"; ?></span>
            <?php endif;?>
           </td>
           <td>
           <?php if($a_vendor['statuss'] === '1'): ?>
            <span class="label label-success"><?php echo "Approved"; ?></span>
            <?php elseif($a_vendor['statuss'] === '0'): ?>
            <span class="label label-default"><?php echo "Pending"; ?></span>
            <?php elseif($a_vendor['statuss'] === '3'): ?>
            <span class="label label-danger"><?php echo "Rejected"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Error"; ?></span>
          <?php endif;?>
           </td>
           <?php if($user['user_level'] === '1'): ?>
           <td class="text-center">
             <div class="btn-group">
                <a href="vendor_approval.php?id=<?php echo (int)$a_vendor['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="vendor_delete.php?id=<?php echo (int)$a_vendor['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
           <?php endif;?>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
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
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
  );

</script>
  <?php include_once('layouts/footer.php'); ?>
