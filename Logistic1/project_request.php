<?php
  $page_title = 'Proposed Project';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
 $all_contract = find_all_dept('request_contract')
?>
<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('req_id','req_class', 'fname' , 'mname' , 'lname' , 'type_of_contract' , 'department' , 'status');
   
	validate_fields($req_field);
	
	$vis_req_id = remove_junk($db->escape($_POST['visitor-req_id']));
	$vis_class = remove_junk($db->escape($_POST['visitor-class']));
	$vis_first_name = remove_junk($db->escape($_POST['visitor-first_name']));
	$vis_middle_name = remove_junk($db->escape($_POST['visitor-middle_name']));
	$vis_last_name = remove_junk($db->escape($_POST['visitor-last_name']));
	$vis_contract = remove_junk($db->escape($_POST['visitor-contract']));
	$vis_department = remove_junk($db->escape($_POST['visitor-department']));
	
	
   
   
   if(empty($errors)){
	$sql  = "INSERT INTO request_contract ( req_id, req_class, fname, mname, lname,type_of_contract, department, status)";
	$sql .= "VALUES ('{$vis_req_id}','{$vis_class}','{$vis_first_name}','{$vis_middle_name}','{$vis_last_name}',' {$vis_contract}','{$vis_department}','Pending')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Visitor";
        $_SESSION['status_code'] =  "success";
        redirect('project_request.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('project_request.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('project_request.php',false);
   }
 }
?>
<!-- add visitor function -------->
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">
<style>
#request_contract{
	margin: 10px;
}
#wrapper{
	background-color: white;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
</style>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Request Project Contract</a>
</nav>
<!-- /Breadcrumb -->


<div class="col-md-12 mb-3" id="wrapper">
    <div class="card">
      <div class="card-header">
        <span class="badge square-pill bg-success"><i class="bi bi-list"></i> Project Contract Request</span>
      </div>
	<div class="text-end">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" id="request_contract" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		 + Request Project Contract
		</button>
	</div>
    

      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
			    <th>Request ID</th>
				<th>Class</th>
                <th>Name of Requestor</th>
				<th>Department</th>
                <th>Type of Contract</th>
                <th>Status</th>
                <th>Date of Request</th>
              </tr>
            </thead>
					<tbody>

						<?php foreach ($all_contract as $visitor):?>
							<tr>
								<td><?php echo remove_junk(ucfirst($visitor['req_id'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['req_class'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['fname'].' '.$visitor['mname'].' '.$visitor['lname'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['type_of_contract'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['department'])); ?></td>
								
								<td><?php if($visitor['status'] == 'Approve'){ ?>
								<span class="badge rounded-pill bg-success">
								<?php echo remove_junk(ucwords($visitor['status']))?></span>
								<?php }else{ ?>
								<span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($visitor['status'])); }?></span></td>
								
								<td><?php echo remove_junk(ucfirst($visitor['date_of_request'])); ?></td>
										
							</tr>       
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Project Contract Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
        
			
			<form method="post" action="project_request.php">
			<div class="form-group">
                
				<input type="number" class="form-control" name="visitor-req_id" placeholder="Request Id" required><br>
				<input type="text" class="form-control" name="visitor-class" placeholder="Class" required><br>
				<input type="text" class="form-control" name="visitor-first_name" placeholder="First Name" required><br>
				<input type="text" class="form-control" name="visitor-middle_name" placeholder="Middle Name" required><br>
				<input type="text" class="form-control" name="visitor-last_name" placeholder="Last Name" required><br>
				
				<input type="text" class="form-control" name="visitor-department" value="LOGISTIC1"><br>
				
				<input type="text" class="form-control" name="visitor-contract" placeholder="Type of Contract" required><br>
				
			</div>
		    <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="add_vis" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	  </div>
    </div>
  </div>
</div>





<?php include_once('layouts/footer.php'); ?>