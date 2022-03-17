<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List of Users</a>
</nav>
<!-- /Breadcrumb -->


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
            <th>#</th>
            <th>Name </th>
            <th>Username</th>
            <th>User Role</th>
            <th>Status</th>
            <th>Last Login</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
          <?php if ($a_user['user_level']===$user['user_level'] && $a_user['username']===$user['username']): ?>
            <tr>
             <td><?php echo count_id();?></td>
             <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
             <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
             <td><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
             <td>
             <?php if($a_user['status'] === '1'): ?>
              <span class="badge rounded-pill bg-success"><?php echo "Active"; ?></span>
            <?php else: ?>
              <span class="badge rounded-pill bg-danger"><?php echo "Deactive"; ?></span>
            <?php endif;?>
             </td>
             <td><?php echo read_date($a_user['last_login'])?></td>
              <td> <span class="badge rounded-pill bg-warning">You</span> </td>
            </tr>
          <?php elseif ($a_user['user_level']===$user['user_level']): ?>
            <tr>
             <td><?php echo count_id();?></td>
             <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
             <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
             <td><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
             <td>
             <?php if($a_user['status'] === '1'): ?>
              <span class="badge rounded-pill bg-success"><?php echo "Active"; ?></span>
            <?php else: ?>
              <span class="badge rounded-pill bg-danger"><?php echo "Deactive"; ?></span>
            <?php endif;?>
             </td>
             <td><?php echo read_date($a_user['last_login'])?></td>
               <div class="btn-group">
                <td>
                  <a href="edit_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                    <i class="bi bi-pencil-fill"></i>
                 </a>
                  </td>
                  </div>
            </tr>
            <?php else: ?>
              <tr>
               <td class="text-center"><?php echo count_id();?></td>
               <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
               <td>
               <?php if($a_user['status'] === '1'): ?>
                <span class="badge rounded-pill bg-success"><?php echo "Active"; ?></span>
              <?php else: ?>
                <span class="badge rounded-pill bg-danger"><?php echo "Deactive"; ?></span>
              <?php endif;?>
               </td>
               <td><?php echo read_date($a_user['last_login'])?></td>
                 <div class="btn-group">
                  <td>
                    <a href="edit_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                      <i class="bi bi-pencil-fill"></i>
                   </a>
                   <a href="delete_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                   <i class="bi bi-eraser-fill"></i>
                   </a>
                    </td>
                    </div>
              </tr>
          <?php endif; ?>
        <?php endforeach;?>
       </tbody>
       <tfoot>
         <tr>
           <th>#</th>
           <th>Name </th>
           <th>Username</th>
           <th>User Role</th>
           <th>Status</th>
           <th>Last Login</th>
           <th>Actions</th>
         </tr>
       </tfoot>
     </table>
   </div>
 </div>
</div>
</div>
</div>
  <?php include_once('layouts/footer.php'); ?>
