<?php
 
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

 page_require_level(1);

$sql = "SELECT new_hires.*,employees.* FROM new_hires JOIN employees ON new_hires.employee_id = employees.employee_id";
$sql .= " WHERE new_hires.status = 'requesting for deployment approval'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;

 include_once('layouts/header.php'); 
 ?>


<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-file-post"></i>Deployment Requests</span>
         
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <thead>
          <?php if($row>0){ ?>
          <tr>
            <th class="text-center" >Employee name</th>
            <th class="text-center" style="">Job Title </th>
           <th class="text-center" style="">Status </th>
            <th class="text-center" style="width: 10%;">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['designation']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['status']))?></td>
           
           
           <td class="text-center">
             <div class="btn-group">
                <a href="view-deployment-request.php?id=<?php echo $info['employee_id'];?>" class="btn btn-sm btn-info"  title="view">
                  <span>View</span>
               </a>
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




 <?php include_once('layouts/footer.php'); ?>s