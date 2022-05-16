<?php
  $page_title = 'Register Visitor';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
?>
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
        redirect('register_visitor.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('register_visitor.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('register_visitor.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="visitorinformation.php" class="breadcrumbs__item">List of visitor</a>
  <a href="register_visitor.php" class="breadcrumbs__item is-active">Add Visitor</a>
</nav>
<!-- /Breadcrumb -->

  <div class="row">
    <?php echo display_msg($msg); ?>
  <div class="col-sm-6 mx-auto">
    <div class="card-header bg-dark">
    <span style="color:White"><i class="bi bi-person-plus-fill"></i> Add new visitor</span>
  </div>
  
  
    <div class="card">
      <div class="card-body">
        <form method="post" action="register_visitor.php">
          <div class="form-group">
                
				<input type="text" class="form-control" name="visitor-last_name" placeholder="Last Name" required><br>
				<input type="text" class="form-control" name="visitor-first_name" placeholder="First Name" required><br>
				<input type="text" class="form-control" name="visitor-middle_name" placeholder="Middle Name" required><br>
				<input type="text" class="form-control" name="visitor-department" placeholder="Department" required><br>
				<input type="text" class="form-control" name="visitor-address" placeholder="Address" required><br>
				<input type="text" class="form-control" name="visitor-email" placeholder="Email" required><br>
				<input type="number_format" class="form-control" name="visitor-contact" placeholder="Contact" required><br>
		
				<input type="text" class="form-control" name="visitor-visitor_type" placeholder="Visitor Type" required><br>
				<input type="text" class="form-control" name="visitor-visitor_purpose" placeholder="Visitor Purpose" required>
				
            </div>
           
          <br>
          <div class="form-group clearfix">
            <button type="submit" name="add_vis" class="btn btn-primary">Add User</button>
          </div>
      </form>
      </div>
    </div>
  </div>
  </div>


<?php include_once('layouts/footer.php'); ?>
