<?php
  $page_title = 'Forgot Password Approval';
  require_once('includes/load.php');
  
  $all_users = find_all_password_request();
?>





<?php include_once('layouts/header.php'); ?>

<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>User management Table</span>
         <div class="text-end">
          <a href="add_user.php" class="btn btn-info pull-right"> Add New User</a>
         </div>
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            
            <th>Name </th>
            <th>Reason</th>
            <th>Position</th>
            <th>Department</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
          
              <tr>
              
               <td><?php echo remove_junk(ucwords($a_user['first_name'])).' '.remove_junk(ucwords($a_user['last_name'])) ?></td>
               <td><?php echo remove_junk(ucwords($a_user['reason']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['designation']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['department']))?></td>
                 <div class="btn-group">
                  <td>
                    <a href="approve_pass.php?id=<?php echo (int)$a_user['employee_id'];?>" class="btn btn-xs btn-success" data-toggle="tooltip" title="Approve">
                      <i class="bi bi-check"></i>
                   </a>
                    <a href="decline_pass.php?id=<?php echo (int)$a_user['employee_id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Decline">
                      <i class="bi bi-x"></i>
                   </a>
                   
                    </div>
              </tr>
          
        <?php endforeach;?>
       </tbody>
      
     </table>
   </div>
 </div>
</div>
</div>
</div>


<?php include_once('layouts/footer.php'); ?>