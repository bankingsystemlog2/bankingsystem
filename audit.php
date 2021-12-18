<?php
  $page_title = 'Audit Logs';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $data =  getAuditlog('audit_logs');
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
          <span>Audit Logs</span>
       </strong>
      </div>
      <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Module</th>
            <th>Action Taken</th>
            <th class="text-center" style="width: 15%;">Users Id</th>
            <th class="text-center" style="width: 15%;">Date Created</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $a_vendor): ?>
            <tr>
            <td class="text-center"><?php echo count_id();?></td>
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
