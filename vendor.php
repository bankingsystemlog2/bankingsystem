<?php
  $page_title = 'Vendor Portal';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_vendors = find_all('vendors');
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
            <th>Name</th>
            <th>Address</th>
            <th class="text-center" style="width: 15%;">Company Name</th>
            <th class="text-center" style="width: 15%;">Email</th>
            <th class="text-center" style="width: 15%;">Number of year in Business</th>
            <?php if($user['user_level'] === '1'): ?>
            <th class="text-center" style="width: 15%;">Offer</th>
            <?php endif;?>
            <th class="text-center" style="width: 15%;">Phone</th>
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
           <td><?php echo remove_junk(ucwords($a_vendor['Name']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['Address']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['Company']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['Email']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['years']))?></td>
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
<script>
  $("#myTable").DataTable();

</script>
  <?php include_once('layouts/footer.php'); ?>
