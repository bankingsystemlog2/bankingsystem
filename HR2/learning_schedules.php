<?php
  $page_title = 'Learning Schedules';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(2);
//pull out all user form database
 $all_users = find_all_learning_sched();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List of Schedules</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Learning Management Schedules</span>
         <div class="text-end">
          <a href="add_learning_sched.php" class="btn btn-info pull-right"> Add New Schedule</a>
         </div>
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            
            <th>Seminar Title </th>
            <th>Date</th>
            <th>Time</th>
            <th>Location/Room</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
              <tr>
             
               <td><?php echo remove_junk(ucwords($a_user['title']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['date']))?></td>
               <td><?php echo remove_junk(ucwords(date('h:i:s a',strtotime($a_user['time']))))?></td>
               <td><?php echo remove_junk(ucwords($a_user['location']))?></td>
               <td>
                <?php if($a_user['approval_status'] === 'pending'){ echo $a_user['approval_status'];

              }else{?>

                  <a href="view_learning_schedule.php?id=<?php echo $a_user['seminar_id']?>" class="btn btn-warning"><i class="bi bi-eye"></i></a></td>
                    </div>
              </tr>
       
        <?php }
      endforeach;?>
       </tbody>
       
     </table>
   </div>
 </div>
</div>
</div>
</div>
  <?php include_once('layouts/footer.php'); ?>
