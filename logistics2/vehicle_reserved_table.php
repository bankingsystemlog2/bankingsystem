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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Complain Table</span>
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
                <th>buttons</th>
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
						    
                    <td class="text-center">
                      <div class="btn-group">
                         <a href="edit_visitor.php?id" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>      
                      <a href="delete_complain.php?id" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="bi bi-trash"></i></a>
                      <a href="delete_contractrequest.php?id" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                      </div>
                    </td>

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