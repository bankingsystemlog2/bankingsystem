<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('L_amount','L_term','Propoerty_add','Property_type', 'F_name' , 'M_name' , 'L_name' , 'sex' , 'civil_status' , 'home_address' , 'perma_address', 'd_birth', 'p_birth', 'm_number', 'e_address', 'tin_sss_gsis_no', 'source_income', 'monthly_income', 'employeer_name', 'position');
   
   validate_fields($req_field);
  $L_amount = remove_junk($db->escape($_POST['L-amount']));
  $L_term = remove_junk($db->escape($_POST['L-term']));
  $Propoerty_add = remove_junk($db->escape($_POST['Property-address']));
  $Property_type = remove_junk($db->escape($_POST['Property-type']));
  $F_name = remove_junk($db->escape($_POST['f-name']));
  $M_name = remove_junk($db->escape($_POST['m-name']));
  $L_name = remove_junk($db->escape($_POST['l-name']));
  $sex = remove_junk($db->escape($_POST['sex']));
  $civil_status = remove_junk($db->escape($_POST['civil-status']));
  $home_address = remove_junk($db->escape($_POST['home-address']));
  $perma_address = remove_junk($db->escape($_POST['perma-address']));
  $d_birth = remove_junk($db->escape($_POST['date-birth']));
  $p_birth = remove_junk($db->escape($_POST['place-birth']));
  $m_number = remove_junk($db->escape($_POST['mobile-number']));
  $e_address = remove_junk($db->escape($_POST['email-address']));
  $tin_sss_gsis_no = remove_junk($db->escape($_POST['tin-sss-gsis-no']));
  $source_income = remove_junk($db->escape($_POST['source-income']));
  $monthly_income = remove_junk($db->escape($_POST['monthly-income']));
  $employeer_name = remove_junk($db->escape($_POST['employeer-name']));
  $position = remove_junk($db->escape($_POST['position']));
	
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO visitor_registration (visit_id , legal_id, last_name, first_name, middle_name, address, email, contact, person_concern, visitor_type, visitor_purpose)";


      
	 $sql .= " VALUES ('{$vis_visit_id}','{$vis_legal_id}','{$vis_last_name}','{$vis_first_name}','{$vis_middle_name}','{$vis_address}',' {$vis_email}','{$vis_contact}','{$vis_person_concern}','{$vis_visitor_type}','{$vis_visitor_purpose}')";
      
	 
      if($db->query($sql)){
        $session->msg("s", "Successfully Added New Visitor");
        redirect('visitor-information.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('visitor-information.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('visitor-information.php',false);
   }
 }
?>







 <div class="col-md-7">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New visitor</span>
         </strong>
        </div>
		
		
        <div class="panel-body">
          <form method="post" action="add_visitor.php">
            <div class="form-group">
                <input type="number" class="form-control" name="L-amount" placeholder="Loan Amount"><br>
        <input type="text" class="form-control" name="L-term" placeholder="Loan Term"><br>
        <input type="text" class="form-control" name="Property-address" placeholder="Property Address"><br>
        <input type="text" class="form-control" name="Property-type" placeholder="Property Type"><br>
        <input type="text" class="form-control" name="f-name" placeholder="First Name"><br>
        <input type="text" class="form-control" name="m-name" placeholder="Middle Name"><br>
        <input type="text" class="form-control" name="l-name" placeholder="Last Name"><br>
        <input type="text" class="form-control" name="sex" placeholder="Sex"><br>
        <input type="text" class="form-control" name="civil-status" placeholder="Civil Status"><br>
        <input type="text" class="form-control" name="home-address" placeholder="Home Address"><br>
        <input type="text" class="form-control" name="perma-address" placeholder="Permanent Address"><br>
        <input type="date" class="form-control" name="date-birth" placeholder="Date of Birth"><br>
        <input type="text" class="form-control" name="place-birth" placeholder="Place of Birth"><br>
        <input type="text" class="form-control" name="mobile-number" placeholder="Mobile Number"><br>
        <input type="text" class="form-control" name="email-address" placeholder="Email Address"><br>
        <input type="text" class="form-control" name="tin-sss-gsis-no" placeholder="Tin/Sss/Gsis no#"><br>
        <input type="text" class="form-control" name="source-income" placeholder="Source of Income"><br>
        <input type="number" class="form-control" name="monthly-income" placeholder="Monthly Income"><br>
        <input type="text" class="form-control" name="employeer-name" placeholder="Employeer Name"><br>
        <input type="text" class="form-control" name="position" placeholder="Position">
				
            </div>
            <button type="submit" name="add_vis" class="btn btn-primary">Add</button>
        </form>
        </div>
      </div>
    </div>