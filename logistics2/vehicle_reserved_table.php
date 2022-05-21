<?php
  $page_title = 'Audit Management Form';
  require_once('includes/log2load.php');
?>
<link rel="stylesheet" href="datatables.css">
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
 $v_res = find_all_reserved();
 $users_id = current_user()['id'];
// $result = find_vendor_by_id('audit',$users_id);
 $all_vendors = find_all_audit();
?>
<?php include_once('layouts/header.php'); ?>
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
       /* auto is the initial value */
    size: auto%;
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Reserved Table</span>
      
      <div class="text-end">
        <div class="text-end">
        <button onclick="print()" id="button" class="btn btn-info md-2"><i class="bi bi-file-post"></i> Print report</button>
</div>
        <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Model</th>
                <th>Name</th>               
                <th>From date</th>
                <th>To date</th>
                <th>Location</th>
                <th>Remarks</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($v_res as $res):?>
                <tr>
                    <td><?php echo remove_junk(ucfirst($res['v_model'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($res['name'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($res['from_date'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($res['to_date'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($res['location'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($res['Remarks'])); ?></td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
<!-- End of Data table  -->
<?php include_once('layouts/footer.php'); ?>