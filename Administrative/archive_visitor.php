<?php
	$page_title = 'Visitor Information';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_visitor_registration = find_all('visitor_registration')
    
	
?>

<?php
    $all_archive_visitor_registration = find_all('archive_visitor_registration')
?>





<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('last_name','first_name', 'middle_name' , 'department' , 'address' , 'email' , 'contact' , 'gender' , 'visitor_type' , 'visitor_purpose');
   
   validate_fields($req_field);
	
	$vis_last_name = remove_junk($db->escape($_POST['visitor-last_name']));
	$vis_first_name = remove_junk($db->escape($_POST['visitor-first_name']));
	$vis_middle_name = remove_junk($db->escape($_POST['visitor-middle_name']));
	$vis_department = remove_junk($db->escape($_POST['visitor-department']));
	$vis_address = remove_junk($db->escape($_POST['visitor-address']));
	$vis_email = remove_junk($db->escape($_POST['visitor-email']));
	$vis_contact = remove_junk($db->escape($_POST['visitor-contact']));
	$vis_gender = remove_junk($db->escape($_POST['visitor-gender']));
	$vis_visitor_type = remove_junk($db->escape($_POST['visitor-visitor_type']));
	$vis_visitor_purpose = remove_junk($db->escape($_POST['visitor-visitor_purpose']));
	
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO visitor_registration ( last_name, first_name, middle_name, department, address, email, contact, gender, visitor_type, visitor_purpose)";
	 $sql .= " VALUES ('{$vis_last_name}','{$vis_first_name}','{$vis_middle_name}','{$vis_department}','{$vis_address}',' {$vis_email}','{$vis_contact}','{$vis_gender}','{$vis_visitor_type}','{$vis_visitor_purpose}')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Visitor";
        $_SESSION['status_code'] =  "success";
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
  <a href="visitorinformation.php" class="breadcrumbs__item is-active">List of visitor information</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>



    <div class="card">
      <div class="card-header">
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Table of Visitor Information</span>
		
		<div class="text-end">
          <a  class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add New Visitor</a>
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
               <th class="text-center" style="width: 50px;">Visitor Id</th>
				
                <th>Fullname</th>
                <th>Department</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>Visitor Type</th>
				
				
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_archive_visitor_registration as $visitors):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitors['id'])); ?></td>
                    
          <td><?php echo remove_junk(ucfirst($visitors['first_name'].' '.$visitors['middle_name'].' '.$visitors['last_name'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($visitors['department'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($visitors['address'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($visitors['email'])); ?></td>
						   
						    <td><?php echo remove_junk(ucfirst($visitors['contact'])); ?></td>
						    <td><?php echo remove_junk(ucfirst($visitors['gender'])); ?></td>
							 <td><?php echo remove_junk(ucfirst($visitors['visitor_type'])); ?></td>
							  
						    
                    <td class="text-center">
                      <div class="btn-group">
     
					  <a href="?id=<?php echo $visitors['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-archive"></i></a>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
	
	
	
	
  
  




<?php include_once('layouts/footer.php'); ?>
