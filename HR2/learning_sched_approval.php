<?php
  $page_title = 'Learning Schedule Approval';
  require_once('includes/load.php');

// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$all_users = find_all_learning_sched_approval();
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Learning Schedul Approval</span>
       
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            
            <th>Seminar Title</th>
            <th>Date</th>
            <th>Room/Location</th>
            <th>Participants</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
         
              <tr>
               
               <td><?php echo remove_junk(ucwords($a_user['title']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['date']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['location']))?></td>

               <td>
              <?php 
              $id = $a_user['seminar_id'];
              $sql = "SELECT * FROM seminar_participants WHERE seminar_id = '$id'";
              $res = $db->query($sql);
              $num = $res->num_rows;
              echo $num;
              ?>
               </td>
               
                 <div class="btn-group">
                  <td>
                    <a href="approve_learning_sched.php?id=<?php echo (int)$a_user['seminar_id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Approve">
                      <i class="bi bi-check"></i>
                   </a>
                   <a href="decline_learning_sched.php?id=<?php echo (int)$a_user['seminar_id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Decline">
                   <i class="bi bi-eraser-fill"></i>
                   </a>
                    </td>
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