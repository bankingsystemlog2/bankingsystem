<?php
  $page_title = 'List of Complains';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   
?>



<?php include_once('layouts/header.php'); ?>

<?php
 if(isset($_POST['add_loan'])){
    $req_fields = array('loan_amount,loan_terms,property_address,property_type,fname,mname,lname,sex,civil_status,home_address,perma_address,date_0f_birth,place_of_birth,mobile_no,email_address,tin_sss_gsis_no,source_of_income,monthly_income ,employeer_name,position');
   
   validate_fields($req_field);
   $loan_loan_amount = remove_junk($db->escape($_POST['houseloan-loan_amount']));
   $loan_loan_terms = remove_junk($db->escape($_POST['houseloan-loan_terms']));
   $loan_property_address = remove_junk($db->escape($_POST['houseloan-property_address']));
   $loan_property_type = remove_junk($db->escape($_POST['houseloan-property_type']));
   $loan_fname = remove_junk($db->escape($_POST['houseloan-fname']));
   $loan_mname = remove_junk($db->escape($_POST['houseloan-mname']));
   $loan_lname = remove_junk($db->escape($_POST['houseloan-lname']));
   $loan_sex = remove_junk($db->escape($_POST['houseloan-sex']));
   $loan_civil_status = remove_junk($db->escape($_POST['houseloan-civil_status']));
   $loan_home_address = remove_junk($db->escape($_POST['houseloan-home_address']));
   $loan_perma_address = remove_junk($db->escape($_POST['houseloan-perma_address']));	
   $loan_date_0f_birth = remove_junk($db->escape($_POST['houseloan-date_0f_birth']));
   $loan_place_of_birth = remove_junk($db->escape($_POST['houseloan-place_of_birth']));
   $loan_mobile_no = remove_junk($db->escape($_POST['houseloan-mobile_no']));
   $loan_email_address = remove_junk($db->escape($_POST['houseloan-email_address']));
   $loan_tin_sss_gsis_no = remove_junk($db->escape($_POST['houseloan-tin_sss_gsis_no']));
   $loan_source_of_income = remove_junk($db->escape($_POST['houseloan-source_of_income']));
   $loan_monthly_income = remove_junk($db->escape($_POST['houseloan-monthly_income']));
   $loan_employeer_name = remove_junk($db->escape($_POST['houseloan-employeer_name']));
   $loan_position = remove_junk($db->escape($_POST['houseloan-position']));
  
 
   if(empty($errors)){
      $sql  = "INSERT INTO mortgages (loan_amount, loan_terms, property_address, property_type,fname, mname, lname, sex,civil_status, home_address, perma_address,date_0f_birth, place_of_birth, mobile_no, email_address, tin_sss_gsis_no, source_of_income, monthly_income, employeer_name, position)";
	  
			$sql .= " VALUES ('{$loan_loan_amount}','{$loan_loan_terms}','{$loan_loan_terms}','{$loan_loan_terms}','{$loan_fname}','{$loan_mname}','{$loan_lname}','{$loan_sex}','{$loan_civil_status}','{$loan_home_address}','{$loan_perma_address}','{$loan_date_0f_birth}','{$loan_place_of_birth}','{$loan_mobile_no}','{$loan_email_address}','{$loan_tin_sss_gsis_no}','{$loan_source_of_income}','{$loan_monthly_income}','{$loan_employeer_name}','{$loan_position}')";
      
	 
				if($db->query($sql)){
					$session->msg("s", "Successfully Added New housingloan");
						redirect('addhousing.php',false);
							} else {
								$session->msg("d", "Sorry Failed to insert.");
									redirect('addhousing.php',false);
										}
											} else {
												$session->msg("d", $errors);
													redirect('addhousing.php',false);
														}
															}
?>


<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List of Complains</a>
</nav>
<!-- /Breadcrumb -->

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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Housing loan Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
         <div class="panel-body">
          <form method="post" action="housing_loan.php">
            <div class="form-group">
                <input type="number_format" class="form-control" name="houseloan-loan_amount" placeholder="Loan Amount" required><br>
                <input type="number_format" class="form-control" name="houseloan-loan_terms" placeholder="Loan Term" required><br>
                <input type="number_format" class="form-control" name="houseloan-property_address" placeholder="Property Address" required><br>
                <input type="number_format" class="form-control" name="houseloan-property_type	" placeholder="Property Type" required><br>
                <input type="number_format" class="form-control" name="houseloan-fname" placeholder="First Name" required><br>
                <input type="number_format" class="form-control" name="houseloan-mname" placeholder="Middle Name" required><br>
                <input type="number_format" class="form-control" name="houseloan-lname" placeholder="Last Name" required><br>
                <input type="number_format" class="form-control" name="houseloan-sex" placeholder="Sex" required><br>
                <input type="number_format" class="form-control" name="houseloan-civil_status" placeholder="Civil Status" required><br>
                <input type="number_format" class="form-control" name="houseloan-home_address" placeholder="Home Address" required><br>
                <input type="number_format" class="form-control" name="houseloan-perma_address" placeholder="Perma Address" required><br>
                <input type="number_format" class="form-control" name="houseloan-date_0f_birth" placeholder="Date of Birth" required><br>
                <input type="number_format" class="form-control" name="houseloan-place_of_birth" placeholder="Place of Birth" required><br>
                <input type="number_format" class="form-control" name="houseloan-mobile_no" placeholder="Mobile Number" required><br>
                <input type="email" class="form-control" name="houseloan-email_address" placeholder="Email Address" required><br>
                <input type="number_format" class="form-control" name="houseloan-tin_sss_gsis_no" placeholder="TIN/SSS/GSIS Number" required><br>
                <input type="number_format" class="form-control" name="houseloan-source_of_income" placeholder="Source of Income" required><br>
                <input type="number_format" class="form-control" name="houseloan-monthly_income" placeholder="Monthly Income" required><br>
                <input type="number_format" class="form-control" name="houseloan-employeer_name" placeholder="Employeer Name" required><br>
                <input type="number_format" class="form-control" name="houseloan-position" placeholder="Position" required><br>
				
				
            </div>
            <button type="submit" name="add_loan" class="btn btn-primary">Add</button>
		    </form>
        </div>
      </div>
    </div>
  </div>
  </div>
<!-- End of Data table  -->


<?php include_once('layouts/footer.php'); ?>
