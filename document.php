<?php
  $page_title = 'Document Tracking';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $data =  getAuditlog('docu_tracking');
?>
<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" href="datatables.css">
<style>
   #documentTrackingTable{
     overflow-x:auto;
   }
  #myInput{
    margin-bottom: 15px;
    float: right;
    border-color: #2B547E;
  }
#myTable:hover:not(.active) {background-color: #ddd;}
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
          <span>Document Tracking</span>
       </strong>
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
            <td><?php echo remove_junk(ucwords($a_vendor['module']))?></td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="datatables.js"></script>
<script>
  $("#myTable").DataTable();

</script>

  <?php include_once('layouts/footer.php'); ?>
