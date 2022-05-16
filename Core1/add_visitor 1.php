<?php
  $page_title = 'Housing Loan';
// Include config file
require_once('includes/load.php');
?>

<?php
 if(isset($_POST['add_vis'])){

  $house_id = remove_junk($db->escape($_POST['house-id']));
  $L_amount = remove_junk($db->escape($_POST['f-name']));

  $F_name = remove_junk($db->escape($_POST['h-address']));
  $M_name = remove_junk($db->escape($_POST['rm-flr-unit']));
  $L_name = remove_junk($db->escape($_POST['street-name']));
  $sex = remove_junk($db->escape($_POST['subdivision']));
  $civil_status = remove_junk($db->escape($_POST['brgy-district-local']));
  $home_address = remove_junk($db->escape($_POST['city-municipality']));
  $perma_address = remove_junk($db->escape($_POST['province']));
  $d_birth = remove_junk($db->escape($_POST['country']));
  $p_birth = remove_junk($db->escape($_POST['p-code']));
  $e_address = remove_junk($db->escape($_POST['mobile/cp-number']));
  $tin_sss_gsis_no = remove_junk($db->escape($_POST['email-address']));
  $source_income = remove_junk($db->escape($_POST['payment-term']));
	
   if(empty($errors)){
      $sql  = "INSERT INTO house_loan (visit_id , legal_id, last_name, first_name, middle_name, address, email, contact, person_concern, visitor_type, visitor_purpose, visit_id , legal_id, last_name, first_name, middle_name, address, email, contact, person_concern, visitor_type, visitor_purpose)";

	 $sql .= " VALUES ('{$house_id}','{$L_amount}','{$L_term}','{$Property_add}','{$Property_type}','{$F_name}','{$M_name}',' {$L_name}','{$sex}','{$civil_status}','{$home_address}','{$perma_address}{$d_birth}','{$p_birth}','{$m_number}','{$e_address}','{$tin_sss_gsis_no}','{$source_income}',' {$monthly_income}','{$employeer_name}','{$position}')";
      
	 
      if($db->query($sql)){
        $session->msg("s", "Successfully Added New Visitor");
        redirect('add_visitor.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('add_visitor.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('add_visitor.php',false);
   }
 }
?>

<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
    <div class="col-md-7">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Housing Loan</span>
         </strong>
        </div>
		
		
        <div class="panel-body">
          <form method="post" action="add_visitor.php">
            <div class="form-group">


         <input type="text" class="form-control" name="f-name" placeholder="FULL NAME"><br>
        <input type="text" class="form-control" name="h-address" placeholder="Home Address"><br>
        <input type="text" class="form-control" name="rm-flr-unit" placeholder="RM/FLR/UNIT NO. & BLDG NAME or HOUSE/LOT & BLK NO."><br>
        <input type="text" class="form-control" name="street-name" placeholder="STREET NAME"><br>
        <input type="text" class="form-control" name="subdivision" placeholder="SUBDIVISION"><br>
        <input type="text" class="form-control" name="brgy-district-local" placeholder="BARANGAY/ DISTRICT/LOCALITY"><br>
        <input type="text" class="form-control" name="city-municipality" placeholder="CITY/MUNICIPALITY"><br>
        <input type="text" class="form-control" name="province" placeholder="PROVINCE"><br>
        <input type="text" class="form-control" name="country" placeholder="COUNTRY"><br>
        <input type="text" class="form-control" name="p-code" placeholder="POSTAL CODE"><br>
        <input type="text" class="form-control" name="mobile/cp-number" placeholder="TELEPHONE/CELLPHONE NO."><br>
        <input type="text" class="form-control" name="email-address" placeholder="EMAIL ADDRESS"><br>
        <input type="text" class="form-control" name="payment-term" placeholder="PAYMENT TERM"><br>
        
        
            </div>
            <button type="submit" name="add_vis" class="btn btn-primary">Apply Now</button>
        </form>
        </div>
      </div>
    </div>
	
	</body>
</html>

<?php include_once('layouts/footer.php'); ?>
