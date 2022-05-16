<?php
  $page_title = 'Financial Approvals';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $row=Call_Pending_Request();
?>
<?php include_once('layouts/header.php'); ?>
<style>
#wrapper{
	background-color: white;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding-left: 2%;
	padding-right: 2%;
	padding-bottom: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
#ulo{
	font-size: 20px;
	background-color: #d6d6d6;
}
td{
	height: 50px;
}
@media print{
	#button{
		display: none; !important;
	}
	.breadcrumbs{
		display: none; !important;
	}
	.card-header{
		display: none; !important;
	}
	
	.card-header{
		display: none; !important;
	}
	a.nav-link, a.navbar-brand{
		display: none; !important;
	}
}table-responsive
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="document_approval.php" class="breadcrumbs__item">Back</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Approvals</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Request Table</span>
        <div class="text-end">
          <button onclick="print()" id="button"  class="btn btn-warning btn-xs-block" type="button">
         <i class="bi bi-printer-fill"></i>
          Print Report
         </button>
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
                <th>#</th>
                <th>Purpose</th>
                <th>Amount</th>
                <th> Date </th>
                <th> type </th>
                <th> Action </th>
             </tr>
            </thead>
           <tbody>
            <?php foreach ($row as $row): ?>
             <tr>
            <td><?php echo $row['P_Code']; ?></td>
            <td><?php echo $row['P_Purpose']; ?></td>
            <td><?php echo $row['P_Amount']; ?></td>
            <td><?php echo $row['P_Date']; ?></td>
            <td><span class="badge rounded-pill bg-secondary"><?php if ($row['NAME'] == "Ongoing") {
             echo "Pending";
            } ?></span></td>
            <td>
              <form action="Settle.php?id=<?php echo $row['P_Code']. "&Tablename=". urlencode($row['P_Tablename']);?>" method="post">
              <button class="btn btn-success" type="submit" name="Settle"><i class="fas fa-file-alt"></i> Approve</button>
              </form>
              </td>
             </tr>
           <?php endforeach; ?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
