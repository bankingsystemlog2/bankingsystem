<?php
  $page_title = 'Fleet Management';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_all_user();
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
          <span>Vehicle Reservation</span>
       </strong>
      </div>
      <div class="col-md-3">  
            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
      </div>  
      <div class="col-md-3">  
            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
      </div>  
      <div class="panel-body" id="documentTrackingTable">
      <table class="table table-bordered table-striped" id="myTable">
        <thead>
          <tr>
            <th class="text-center" style="width: 15%;">Date Receive</th>
            <th>Request By</th>
            <th class="text-center" style="width: 15%;">Document Date</th>
            <th>Document Subject</th>
            <th>Document Sender</th>
            <th class="text-center" style="width: 15%;">Application Date</th>
            <th>Application Remarks</th>
            <th class="text-center" style="width: 15%;">Reference Number</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $a_vendor): ?>
            <tr>
            <td><?php echo str_replace('.php', '', (ucwords($a_vendor['module'])))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['action_taken']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['datetime_created']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['module']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['action_taken']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['datetime_created']))?></td>
          <?php endforeach;?>
       </tbody>
     </table>
     </div>
      
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
