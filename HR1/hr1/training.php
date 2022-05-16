<?php
 $page_title = 'New Hire Onboard';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
	page_require_level(1);
}

$sql =" SELECT employees.*,training.*,new_hires.* FROM employees JOIN training ON employees.employee_id = training.employee_id ";
$sql .= "JOIN new_hires ON employees.employee_id = new_hires.employee_id";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;

include_once('layouts/header.php'); ?>

<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-calendar"></i>Training Schedules</span>
         <div class="text-end">
          <a href="training-report.php" class="btn btn-info btn-sm pull-right"><i class="bi bi-file-post"></i>Print report</a>
         </div>
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
 <?php if($row>0){ ?>
          <tr>
            <th class="text-center" >Applicants name</th>
            <th class="text-center" style="">Designation</th>
            <th class="text-center" style="">Date start</th>
            <th class="text-center" style="">Date end</th>
            <th class="text-center" style="">Location</th>
            <th class="text-center" style="">Department</th>
            <th class="text-center" style="">Status</th>
            <th class="text-center" style=""></th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['designation']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date_start']))))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date_end']))))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['department']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['location']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['status']))?></td>
           
           <td class="text-center">
             <div class="btn-group">
              <?php 
              $today = date('Y-m-d');
              if($info['date_end']<$today){ ?>

                <a href="view_training.php?id=<?php echo $info['employee_id']; ?>" class="btn btn-info btn-sm">View</a>
           <?php }else{ ?>

              <a href="cancel_training.php?id=<?php echo $info['employee_id']; ?>" class="btn btn-danger btn-sm">
                <i class="bi bi-x"></i>Cancel</a>

            <?php } ?>
                </div>
           </td>
          </tr>
        <?php }while($info =$result->fetch_assoc());   } ?>

</tfoot>
     </table>
   </div>
 </div>
</div>
</div>
</div>
  <?php include_once('layouts/footer.php'); ?>