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
<style>
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
          <span>Audit Logs</span>
       </strong>
      </div>
      <div class="panel-body">
      <input type="text" id="myInput" name="searchbar" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
      <table class="table table-bordered table-striped" id="myTable">
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

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
  <?php include_once('layouts/footer.php'); ?>
