<?php
  $page_title = 'Document Tracking';
  require_once('includes/log2load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$groups = find_all('docu_tracking');
$users_id = current_user()['id'];
$all_vendors = find_all('docu_tracking');
$data =  getDocuTracking('docu_tracking');

global $db;
   
   $sql = $db->query("SELECT * FROM docu_tracking LIMIT 1");
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

<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" href="datatables.css">

<style>
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
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>


<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
   <?php elseif ($user['user_level'] === '4'): ?>
   <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Document Tracking</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Document Tracking</span>
        <div class="text-end">
        <button onclick="print()" id="button" class="btn btn-info md-2"><i class="bi bi-file-post"></i> Print report</button>
        <!-- <div class="text-end">
          <a href="flee t_addvehicle.php" class="btn btn-info pull-right"> View Approved List</a>
         </div> -->
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
          <tr>
          <th class="text-center" style="width: 15%;">ID</th>
          <th class="text-center" style="width: 15%;">Location</th>
            <th>Action</th>
            <th class="text-center" style="width: 15%;">Document Subject</th>
            <th class="text-center" style="width: 15%;">Date Created</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $a_vendor): ?>
            <tr>
              <td><?php echo remove_junk(ucwords($a_vendor['Document_Sender']))?></td>
              <td><?php echo str_replace('.php', '', (ucwords($a_vendor['Location'])))?></td>
              <td><?php echo remove_junk(ucwords($a_vendor['Action']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Document_Subject']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Date_Created']))?></td>
          <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
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

  <?php include_once('layouts/footer.php'); ?>
