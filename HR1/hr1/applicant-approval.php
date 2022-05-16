<?php
  $page_title = 'HR manager';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);


 include_once('layouts/header.php'); 





$sql =" SELECT applicants.*,applications.* FROM applications JOIN applicants ON applications.applicant_id = applicants.applicant_id ";
$sql .= " WHERE applications.status = 'application for approval'";
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Applicant approval Table</span>
        
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <?php if($row>0){ ?>
          <tr>
            <th class="text-center" >Applicant name</th>
            <th class="text-center" style="">Job title</th>
            <th class="text-center" style="">Date of application</th>
            <th class="text-center" style="">Status</th>
            <th class="text-center" style="">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
            <tr>
              <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['job_title']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date_of_application']))))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['status']))?></td>
           <td class="text-center">
            <a href="approve-applicant.php?id=<?php echo $info['applicant_id']; ?>" class="btn btn-success btn-sm" title="Approve"><i class="bi bi-check"></i>Approve</a>
            <a href="reject-applicant-approval.php?id=<?php echo $info['applicant_id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-x"></i>Reject</a>
           </td>
            </tr>
         
            <?php }while($info =$result->fetch_assoc());   } ?>
           
       </tbody>
      
     </table>
   </div>
 </div>
</div>
</div>
</div>



 <?php include_once('layouts/footer.php'); ?>