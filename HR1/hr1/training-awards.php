<?php
  $page_title = 'Social Recognition';
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

$sql = "SELECT employees.*,training_management.* FROM employees JOIN training_management ON ";
$sql .="employees.employee_id = training_management.employee_id WHERE training_management.status = 'complete'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
?>
<?php include_once('layouts/header.php'); ?>



<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <div class="text-end">
          <a href="trainings-report.php" class="btn btn-info btn-sm pull-right"><i class="bi bi-printer-fill"></i> Print Report</a>
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
            <th class="text-center" >Employee Name</th>
            <th class="text-center" style="">Designation </th>
            <th class="text-center" >Department</th>
            <th class="text-center" >Training title</th>
            <th class="text-center" >Date</th>
            <th class="text-center" style="">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['designation']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['department']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['training_title']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date']))))?></td>           
           
           <td class="text-center">
             <div class="btn-group">


           <?php 
           $emp = $info['employee_id'];
           $title =$info['training_title'];
           $s = "SELECT * FROM social_recognition WHERE employee_id = '$emp' AND award = '$title'";
           $r = $db->query($s);
           $ro = $r->num_rows;
           $stat = $r->fetch_assoc();

           if($row>0){

            if($stat['status'] == 'approved'){ ?>
              
             <a href="print-training.php?id=<?php echo $stat['employee_id'] ?>&award=<?php echo $stat['award'] ?>&date=<?php echo $stat['date'] ?>" class="btn btn-sm btn-success"  title="">Print Certificate</a>
                  
               
         <?php   }
        
          if($stat['status'] == 'rejected'){
              
           ?>

    <a href="delete-training-award.php?id=<?php echo $info['employee_id']; ?>" 
    class="btn btn-danger btn-xs" ><span>Rejected   </span><i class="glyphicon glyphicon-remove"></i></a>
            

             <?php } 


             if($stat['status'] == 'printed'){ echo '<span>printed</span>'; ?>

           <?php  


           }}else { ?>
                <a href="request-training-certificate.php?id=<?php echo $info['employee_id'];?>" class="btn btn-sm btn-info"  title="">
                  <span>Request Certificate</span>
               </a> 
               
             <?php }  ?>
                </div>
           </td>
          </tr>
        <?php }while($info =$result->fetch_assoc());

          }
         ?>
       </tbody>
       
     </table>
   </div>
 </div>
</div>
</div>
</div>

 <?php include_once('layouts/footer.php'); ?>