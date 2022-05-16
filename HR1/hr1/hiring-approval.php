<?php include_once('includes/load.php'); 

$user_id = $_SESSION['user_id'] ;
$current_user = current_user($user_id);


	page_require_level(1);

 $sql = "SELECT applications.*,applicants.* FROM applications JOIN applicants ON applications.applicant_id = ";
          $sql .= "applicants.applicant_id WHERE applications.status = 'requesting for approval'";
          $result = $db->query($sql);
      $info = $result->fetch_assoc();
      $row = $result->num_rows;

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
        <span class="badge rounded-pill bg-success"><i class="bi bi-people"></i>Hiring Approval</span>
        
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
        <?php  if($row>0){ ?>
          <tr>
            <th class="text-center" >Applicants name</th>
            <th class="text-center" style="">Job title</th>
            <th class="text-center" style="">Date of Application</th> 
            <th class="text-center" style="">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['job_title']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date_of_application']))))?></td>
           
           
           
          
           
           <td class="text-center">
             
                <a href="view-hiring-approval.php?id=<?php echo $info['applicant_id']; ?>" class="btn btn-info btn-sm">View</a>

                
           </td>
          </tr>
        <?php }while($info =$result->fetch_assoc());   }?>
         
       </tbody>
       
     </table>
   </div>
 </div>
</div>
</div>
</div>













<?php include_once('layouts/footer.php'); ?>