<?php
  $page_title = 'Document Tracking';
  require_once('../includes/log2load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(4);
//pull out all user form database
$groups = find_all('docu_tracking');
$users_id = current_user()['id'];
$all_vendors = find_all('docu_tracking');
$data =  getDocuTracking('docu_tracking');

global $db;
   $id = $_GET['id'];
   $sql = $db->query("SELECT * FROM docu_tracking WHERE id='{$id}' LIMIT 1");
          //if(
            $docu_tracking = $db->fetch_assoc($sql);
            //return $vendors;
            
?>

<?php

 //update user other info
 if(isset($_POST['docu_tracking'])) {
  $req_fields = array('Action','Remarks','Location','Date_Created');
  //validate_fields($req_fields);
  
  if(empty($errors)){
      
      $Action   = remove_junk($db->escape($_POST['Action']));
      $Date_Created   = remove_junk($db->escape(date('Y-m-d', strtotime($_POST['Date_Created']))));
      $Document_Subject   = remove_junk($db->escape($_POST['Document_Subject']));
      $Remarks   = remove_junk($db->escape($_POST['Remarks']));
      $Location   = remove_junk($db->escape($_POST['Location']));
       $query = "UPDATE docu_tracking SET ";
       $query .="Action = '{$Action}',Date_Created = '{$Date_Created}',Document_Subject = '{$Document_Subject}',Remarks = '{$Remarks}',Location = '{$Location}'";
       $query .=" WHERE ";
       $query .="id = '{$id}'";
  }
  
}

?>

<?php include_once('../layouts/header.php'); ?>
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
          <th class="text-center" style="width: 15%;">Location</th>
            <th>Action</th>
            <th class="text-center" style="width: 15%;">Name</th>
            <th class="text-center" style="width: 15%;">Document Subject</th>
            <th class="text-center" style="width: 15%;">Date Created</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $a_vendor): ?>
            <tr>
            <td><?php echo str_replace('.php', '', (ucwords($a_vendor['Location'])))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Action']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Document_Subject']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Date_Created']))?></td>
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
            'csv', 'excel', 'pdf', 'print'
        ]
    }
  );
</script>

  <?php include_once('../layouts/footer.php'); ?>
