<?php
	$page_title = 'Blacklisted Person';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   
    $all_blacklist_person = find_all('blacklist_person')
?>





<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('last_name','first_name', 'middle_name' , 'department' , 'address' , 'email' , 'contact' , 'visitor_type' , 'visitor_purpose');
   
   validate_fields($req_field);
	
	$vis_last_name = remove_junk($db->escape($_POST['visitor-last_name']));
	$vis_first_name = remove_junk($db->escape($_POST['visitor-first_name']));
	$vis_middle_name = remove_junk($db->escape($_POST['visitor-middle_name']));
	$vis_department = remove_junk($db->escape($_POST['visitor-department']));
	$vis_address = remove_junk($db->escape($_POST['visitor-address']));
	$vis_email = remove_junk($db->escape($_POST['visitor-email']));
	$vis_contact = remove_junk($db->escape($_POST['visitor-contact']));
	
	$vis_visitor_type = remove_junk($db->escape($_POST['visitor-visitor_type']));
	$vis_visitor_purpose = remove_junk($db->escape($_POST['visitor-visitor_purpose']));
	
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO visitor_registration ( last_name, first_name, middle_name, department, address, email, contact, visitor_type, visitor_purpose)";
	 $sql .= " VALUES ('{$vis_last_name}','{$vis_first_name}','{$vis_middle_name}','{$vis_department}','{$vis_address}',' {$vis_email}','{$vis_contact}','{$vis_visitor_type}','{$vis_visitor_purpose}')";
      
	 
      if($db->query($sql)){
        $session->msg("s", "Successfully Added New Visitor");
        redirect('visitorinformation.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('visitorinformation.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('visitorinformation.php',false);
   }
 }
?>
<!-- add visitor function ---------------------------------------------------------------------------------------------------------------------------------------- -->


<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="blacklistedperson.php" class="breadcrumbs__item is-active">List of Blacklisted Person</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>

<!-- Data table start -->
<div class="row">

  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-secondary"><i class="bi bi-table"></i> Table of Visitor Information</span>
		
		<div class="text-end">
          <a href="register_visitor.php" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add New Visitor</a>
        </div>
		 
		 
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
               <th class="text-center" style="width: 50px;">Id</th>
				
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>Contact Number</th>
                <th>Company Department</th>
                <th>Reason</th>
                <th>Date</th>
               
				
				
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_blacklist_person as $visitor):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitor['id'])); ?></td>
                    
          
					    <td><?php echo remove_junk(ucfirst($visitor['fname'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($visitor['mname'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($visitor['lname'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($visitor['contact_no'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($visitor['company_department'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($visitor['reason'])); ?></td>
						   
						    <td><?php echo remove_junk(ucfirst($visitor['date'])); ?></td>
							
							  
						    
                    <td class="text-center">
                      <div class="btn-group">
					  <button type="button"  href="edit_visitor.php?id=<?php echo $visitor['visitor_id'];?>" class="btn btn-success">Success</button>
                    
                           
                      <a href="delete_visitor.php?id=<?php echo $visitor['visitor_id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  
  
  
  <!-- add visitor-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="visitorinformation.php">
          <div class="form-group">
                
				<input type="text" class="form-control" name="visitor-last_name" placeholder="Last Name" required><br>
				<input type="text" class="form-control" name="visitor-first_name" placeholder="First Name" required><br>
				<input type="text" class="form-control" name="visitor-middle_name" placeholder="Middle Name" required><br>
				<input type="text" class="form-control" name="visitor-department" placeholder="Department" required><br>
				<input type="text" class="form-control" name="visitor-address" placeholder="Address" required><br>
				<input type="email" class="form-control" name="visitor-email" placeholder="Email" required><br>
				<input type="number" class="form-control" name="visitor-contact" placeholder="Contact" required><br>
				<input type="text" class="form-control" name="visitor-visitor_type" placeholder="Visitor Type" required><br>
				<input type="text" class="form-control" name="visitor-visitor_purpose" placeholder="Visitor Purpose" required>
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
<!-- End of Data table  -->




<?php include_once('layouts/footer.php'); ?>
