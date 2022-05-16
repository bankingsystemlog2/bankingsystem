<?php
  $page_title = 'Visitor Registration';
// Include config file
require_once('includes/load.php');
require_once('layouts/footer.php');
?>

<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('last_name','first_name', 'middle_name' , 'department' , 'address' , 'email' ,'gender' , 'contact' , 'visitor_type' , 'visitor_purpose');
   
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
      $sql  = "INSERT INTO visitor_registration ( last_name, first_name, middle_name, department, address, email, contact, gender,  visitor_type, visitor_purpose)";
	 $sql .= " VALUES ('{$vis_last_name}','{$vis_first_name}','{$vis_middle_name}','{$vis_department}','{$vis_address}',' {$vis_email}','{$vis_contact}','{$vis_gender}','{$vis_visitor_type}','{$vis_visitor_purpose}')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Visitor";
        $_SESSION['status_code'] =  "success";
        redirect('index.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('index.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('index.php',false);
   }
 }
?>
<!-- add visitor function ---------------------------------------------------------------------------------------------------------------------------------------- -->

<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/background.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/visitor.png" alt="">
				</div>
				<form method="post" action="index.php">
					<h3>Electronic Logbook</h3>
					<div class="form-group">
						<input type="text" name="visitor-first_name" placeholder="First Name" class="form-control">
						
					</div>
					<div class="form-group">
						<input type="text"  name="visitor-middle_name" placeholder="Middle Name" class="form-control">
						
						<input type="text" name="visitor-last_name" placeholder="Last Name" class="form-control">
						
					</div>
					<div class="form-wrapper">
						<input type="text"   name="visitor-department" placeholder="Department" class="form-control">
						
					</div>
					<div class="form-wrapper">
						<input type="text" name="visitor-address" placeholder="Address" class="form-control">
						
					</div>
					<div class="form-wrapper">
						<input type="text" name="visitor-email" placeholder="Email Address" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					
					
					<div class="form-wrapper">
						<input type="text" name="visitor-contact" placeholder="Contact" class="form-control">
						<i class="zmdi zmdi-account-box"></i>  
					</div>
					<div class="form-wrapper">
						<select name="visitor-gender" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					
					
					<div class="form-wrapper">
						<input type="text" name="visitor-visitor_type" placeholder="Visitor Type" class="form-control">
						<i class="zmdi zmdi-accounts-outline"></i> 
					</div>
					<div class="form-wrapper">
						<input type="text" name="visitor-visitor_purpose"placeholder="Your Purpose" class="form-control">
						
					</div>
					
        
        <button type="submit" name="add_vis" class="btn btn-primary">Save changes</button>
     
				</form>
			</div>
		</div>

<?php include_once('layouts/footer.php'); ?>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
	
</html>
