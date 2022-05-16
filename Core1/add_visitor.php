<?php
  $page_title = 'Housing Loan';
// Include config file
require_once('includes/load.php');
function generatekey(){
  $keyLenght=8;
  $str="1234567890";
  $randStr=substr(str_shuffle($str),0,$keyLenght);
  return $randStr;
}
$i=generatekey();
?>

<?php
 if(isset($_POST['add_vis'])){

  $house_id =$i;
  $L_amount = remove_junk($db->escape($_POST['L-amount']));
  $L_term = remove_junk($db->escape($_POST['L-term']));
  $F_name = remove_junk($db->escape($_POST['f-name']));
  $M_name = remove_junk($db->escape($_POST['m-name']));
  $L_name = remove_junk($db->escape($_POST['l-name']));
  $sex = remove_junk($db->escape($_POST['sex']));
  $civil_status = remove_junk($db->escape($_POST['civil-status']));
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
      $sql  = "INSERT INTO `mortgages`( `ref_no`, `loan_amount`, `loan_terms`,`fname`, `mname`, `lname`, `sex`, `civil_status`,`perma_address`, `date_0f_birth`, `place_of_birth`, `mobile_no`, `email_address`, `tin_sss_gsis_no`, `source_of_income`, `monthly_income`, `employeer_name`, `position`) VALUES ('$house_id','$L_amount','$L_term','$F_name','$M_name','$L_name','$sex','$civil_status','$perma_address','$d_birth','$p_birth','$m_number','$e_address','$tin_sss_gsis_no','$source_income','$monthly_income','$employeer_name','$position')";
      
	 
      if($db->query($sql)){
        $session->msg("s", "Thankyou! Your submission has been sent.");
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
            <span class="glyphicon glyphicon-th"></span> <center>
            <span>Housing Loan</span></center>
         </strong>
        </div>
		
		
        <div class="panel-body">
          <form method="post" action="add_visitor.php">
            <div class="form-group">
              <br>

        
          <input type="number" class="form-control" name="L-amount" placeholder="Loan Amount" required ><br>


        <h6>Loan Term: &nbsp;<br><br>
        <select type="button" class="btn btn-sm" style="width:100%; border-color:grey;" name="L-term" required>
           <option></option> 
          <option value="Long Term"> LONG TERM </option>         
          <option value="Short Term"> SHORT TERM </option>
          <option value="Intermediate Term"> INTERMEDIATE TERM </option>
        </select> <br> <br>


        <input type="text" class="form-control" name="f-name" placeholder="First Name" required ><br>
        <input type="text" class="form-control" name="m-name" placeholder="Middle Name" required ><br>
        <input type="text" class="form-control" name="l-name" placeholder="Last Name" required ><br>
       

   
          <label class="form-control" name="Gender"><h6>Gender: &nbsp;

                <label><input  id="optionsRadios1" name="sex"  name="optionsRadios" type="radio" value="Female"> Female </label> &nbsp; &nbsp; &nbsp;

              <label><input id="optionsRadios2"   name="sex" type="radio" value="Male"> Male </label></label></h6><br>


       
           <h6>Civil Status: &nbsp;<br><br>
        <select type="button" class="btn btn-sm" style="width:100%; border-color:grey;" name="civil-status" required>
           <option></option> 
          <option value="Maried"> MARIED </option>         
          <option value="Single"> SINGLE </option>
          <option value="Seperated"> SEPERATED </option>
          <option value="Widow/er"> WIDOW/ER</option>
        </select> <br> <br>


        <input type="text" class="form-control" name="perma-address" placeholder="Permanent Address" required ><br>
        <input type="date" class="form-control" name="date-birth" placeholder="Date of Birth" required ><br>
        <input type="text" class="form-control" name="place-birth" placeholder="Place of Birth" required ><br>
        <input type="text" class="form-control" name="mobile-number" placeholder="Mobile Number" required ><br>
        <input type="text" class="form-control" name="email-address" placeholder="Email Address" required ><br>
        <input type="text" class="form-control" name="tin-sss-gsis-no" placeholder="Tin/Sss/Gsis no#" required ><br>
        

        <label class="form-control" name="source-income"><h6> Primary Source of Income: &nbsp;

        <label><input  id="optionsRadios1" name="source-income"  name="optionsRadios" type="radio" value="employment"> Employment </label> &nbsp; &nbsp; &nbsp;

        <label><input id="optionsRadios2"   name="source-income" type="radio" value="Business"> Business </label></label></h6><br>

        <input type="number" class="form-control" name="monthly-income" placeholder="Monthly Income" required ><br>
        <input type="text" class="form-control" name="employeer-name" placeholder="Employeer Name" required ><br>
        <input type="text" class="form-control" name="position" placeholder="Position" required ><br>
				
            </div>
            <button type="submit" name="add_vis" class="btn btn-primary">Apply Now</button> <br> <br> <br> <br>
        </form>
        </div>
      </div>
    </div>
	
	</body>
</html>

<?php include_once('layouts/footer.php'); ?>
