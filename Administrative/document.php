<?php
	$page_title = 'Visitor Information';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_visitor_registration = find_all('visitor_registration')
?>

<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>



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
  <a href="visitorinformation.php" class="breadcrumbs__item is-active">List of visitor information</a>
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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Table of Visitor Information</span>
		
		<div class="text-end">
          <a href="register_visitor.php" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add New Visitor</a>
        </div>
		 
		 
      </div>
	  
	  
   
	    <div class="row-fluid">
	        <div class="span12">
	            <div class="container">
		<br />
		<h1><p>Upload  And  Download Files</p></h1>	
		<br />
		<br />
			<form enctype="multipart/form-data" action="" name="form" method="post">
				Select File
					<input type="file" name="file" id="file" /></td>
					<input type="submit" name="submit" id="submit" value="Submit" />
			</form>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from upload order by id desc");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
	</div>
	</div>
	</div>
    </div>
  
  
  
  <!-- add visitor-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	
        <h5 class="badge rounded-pill bg-success" class="modal-title" id="exampleModalLabel">Visitor Sign in</h5>
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
