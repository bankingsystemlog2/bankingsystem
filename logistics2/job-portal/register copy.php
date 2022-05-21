<?php

require_once('includes/load.php');
if($session->isUserLoggedIn(true)) { redirect('home.php', false);}

$namePattern = "/^[a-zA-z ]+$/";
$emailPattern = "/^[a-zA-z\d\._]+@[a-zA-z]+\.[a-zA-z]+$/";

$error="";

$fnamef = "";
$lnamef = "";
$mnamef = "";
$emailf ="";
$passf = "";
$contf = "";
$agef = "";
$genderf = "";
$civilf = "";
$addf = "";
$elemf = "";
$hsf = "";
$hsf2 = "";
$colf = "";   
$coursef = "";
$religionf = "";


      if(isset($_POST['submit'])){
          
          if(!empty($_POST['read'])){

        $fnamef = $_POST['first_name'];
        $lnamef = $_POST['last_name'];
        $mnamef = $_POST['middle_name'];
        $emailf = $_POST['email'];
        $passf = $_POST['password'];
        $contf = $_POST['contact'];
        $genderf = $_POST['gender'];
        $civilf = $_POST['civil_status'];
        $addf = $_POST['address'];
        $elemf = $_POST['educ_elem'];
        $hsf = $_POST['educ_hs'];
        $hsf2 = $_POST['educ_hs2'];
        $colf = $_POST['educ_college'];
        $bdayf = $_POST['bday'];
        $coursef = $_POST['course'];
        $religionf = $_POST['religion'];
      




            $fname = trim($_POST['first_name']);
            $lname = trim($_POST['last_name']);
            $mname = trim($_POST['middle_name']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['password']);
            $cont = trim($_POST['contact']);       
            $gender = trim($_POST['gender']);
            $gender = remove_junk($db->escape($gender));
            $civil_status =trim($_POST['civil_status']);
            $civil_status = remove_junk($db->escape($civil_status));
            $add = trim($_POST['address']);
            $elem = trim($_POST['educ_elem']);
            $hs = trim($_POST['educ_hs']);
            $hs2 = trim($_POST['educ_hs2']);
            $col = trim($_POST['educ_college']);
            $course = trim($_POST['course']);
            $bday = trim($_POST['bday']);
            $today = date("Y-m-d");
            $agec = date_diff(date_create($bday),date_create($today));
            $age = $agec->format('%y');
            $rel= $_POST['religion'];
            

       
           



            if(empty($course)){
                $error = "Course can't be empty.";
            }elseif(strlen($course) > 100){
            $error = "Name of course is too long.";
            }else{
                $course = remove_junk($db->escape($course));
            }


            if(empty($col)){
                $error = "Name of school can't be empty.";
            }elseif(strlen($col) > 100){
            $error = "Name of school is too long.";
            }else{
                $college = remove_junk($db->escape($col));
            }

            if(empty($hs2)){
                $error = "Senior high school can't be empty.";
            }elseif(strlen($hs2) > 100){
            $error = "Name of school is too long.";
            }else{
                $senior_high_school = remove_junk($db->escape($hs));
            }

            if(empty($hs)){
                $error = "Junior high school can't be empty.";
            }elseif(strlen($hs) > 100){
            $error = "Name of school is too long.";
            }else{
                $high_school = remove_junk($db->escape($hs));
            }

            if(empty($elem)){
                $error = "Elementary can't be empty.";
            }elseif(strlen($elem) > 100){
            $error = "Name of school is too long.";
            }else{
                $elementary = remove_junk($db->escape($elem));
            }


            if(empty($add)){
                $error = "Address can't be empty.";
            }elseif(strlen($add) > 150){
            $error = "Address is too long.";
            }else{
                $address = remove_junk($db->escape($add));
            }

             if(empty($rel)){
                $error = "Religion can't be empty.";
            }elseif(strlen($rel) > 50){
            $error = "Religion is too long.";
             }elseif(!preg_match($namePattern, $rel)){
                $error = "Invalid religion name.";
            }else{
                $religion = remove_junk($db->escape($rel));
            }


            if((int)$age <= 17){
                $error = "Too young";
            }elseif ((int)$age > 63) {
                $error = "Too old";
            }else{
                $b_day = remove_junk($db->escape($bday));

            }

            if(empty($bday)){
                $error = " Set your birthday.";
            }

        if(empty($pass)){
            $error = "Password can't be empty.";
        }elseif(strlen($pass)<=7){
            $error = "Password must be 8 character and above.";
        }elseif(!preg_match("#[0-9]+#", $pass)){
            $error = "Password must contain numbers";
        }elseif(!preg_match("#[A-Z]+#", $pass)){
            $error = "Password must contain Capital Letters.";
        }elseif(!preg_match("/[\'^£$%&*()}{@#~?><>!.,|=_+¬-]/", $pass)){
            $error = "Password must contain special characters.";
        }else{
            $password = remove_junk($db->escape($pass));
            $password= sha1($password);
        }

       if(empty($cont)){
            $error = "Contact number can't be empty.";
       }elseif (!preg_match("/[0-9]/", $cont)) {
            $error = "Invalid cellphone number";
       }elseif (strlen($cont) != 11) {
            $error = "Invalid cellphone number";
       }else{
            $contact = remove_junk($db->escape($cont));
       }

       if(empty($email)){
            $error = "E-mail can't be empty.";
       }elseif(!preg_match($emailPattern, $email)){
            $error = "Invalid E-mail";
       }else{
            $e_mail = remove_junk($db->escape($email));
            $vkey = md5(time().$e_mail);
       }


       if(empty($lname)){
            $error = "Last name can't be empty.";
        }elseif(strlen($lname) > 50){
            $error = "Last name is too long.";
        }elseif(!preg_match($namePattern,$lname)){
            $error = "Invalid  last tname.";
        }else{
            $l_name = remove_junk($db->escape($lname));
        }

        if(empty($mname)){
            $error = "Middle name can't be empty.";
        }elseif(strlen($mname) > 50){
            $error = "Middle name is too long.";
        }elseif(!preg_match($namePattern,$mname)){
            $error = "Invalid  Middle name.";
        }else{
            $m_name = remove_junk($db->escape($mname));
        }


         if(empty($fname)){
            $error = "First name can't be empty.";
        }elseif(strlen($fname) > 50){
            $error = "First name is too long.";
        }elseif(!preg_match($namePattern,$fname)){
            $error = "Invalid  first tname.";
        }else{
            $f_name = remove_junk($db->escape($fname));
        }


      if(empty($error)){

        $query = "SELECT * FROM applicants WHERE email = '$e_mail';";
        $result = $db->query($query);
            $email = $result->num_rows;

            if($email<1){ 


            

        $query = "INSERT INTO applicants (first_name,middle_name,last_name,email,password,contact_number,";
        $query .= "birth_date,age,gender,civil_status,religion,address) values ('$f_name','$m_name','$l_name','$e_mail','$password'";
        $query .= ",'$contact','$b_day','$age','$gender','$civil_status','$religion','$address');";
        if($db->query($query)){
            $query = "SELECT applicant_id FROM applicants WHERE email = '$e_mail';";
        if($result = $db->query($query)){
            $id = $result->fetch_assoc();
            $app = $id['applicant_id'];
         $query = "INSERT INTO education_background (elementary,junior_high_school,senior_high_school,applicant_id) values ";
         $query .= "('$elementary','$high_school','$senior_high_school','$app');";
        
       
        if($db->query($query)){

            $query = "SELECT applicant_id FROM applicants WHERE email = '$e_mail';";
            $result = $db->query($query);
            $id = $result->fetch_assoc();
            $applicant_id = $id['applicant_id'];

        $query = "INSERT INTO college (applicant_id,name_of_school,course) values ('$applicant_id','$college','$course'); " ;

        if($db->query($query)){

            $query = "INSERT INTO account_verification (applicant_id,vkey,verified) values ('$applicant_id','$vkey','0'); " ;
            if($db->query($query)){
            $to_email = $e_mail;
            $subject = "Email Verification";
            $body = "Click the link to verify your email <br>";
            $body .= '<a href="obms.online/HR1/portal/job-portal/verify.php?vkey='.$vkey.'">Verify Email</a>';
            $headers = "From:  bankingandfinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        }

if (mail($to_email, $subject, $body, $headers)) {
      $session->msg('s',' A verification email was sent please check your inbox');
          redirect('login.php', false);
}else{

     $session->msg('s',' theres something wrong');
          redirect('login.php', false);
}

          


   
    
      }

              }
          }
        } else {
          //failed
         $error = "failed";
        }
    }else{

        $session->msg('d',' Email already used.');
          redirect('register.php', false);
    }
}

      

          }else{
              
               $session->msg('d',' You must agree to the terms and conditions.');
          redirect('register.php', false);
              
              
              
              
          }
  
   




}








?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap icons-->
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
           <nav class="navbar navbar-expand-lg navbar-light bg-primary static-top">
  <div class="container ">
    <a class="navbar-brand text-white" href="index.php">
      Banking and Finance
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="login.php">login</a>
        </li>
      <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li> 
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

        <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                    <div class="text-center mt-5 mb-5"><h2>Register</h2></div>
                    <div class="row">
                    	   

                             <?php echo display_msg($msg);  ?>
                            <?php if(strlen($error) >0){  
                            

                            echo "<div class=\"alert alert-danger text-center col-md-6 mb-3\" style=\"margin:auto\">";
                            echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\"></a>";
                            echo $error; 
                            
                            
                            
                            
                            echo  "</div>";}
                       
                           ?>


                           <form  method="post" action="register.php" id="form" class="form">
                                <div class="form-group row mb-3">
                                    <label for="first_name" class="col-md-3 col-form-label text-md-right">First name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="first_name" class="form-control border border-dark" name="first_name" value="<?php echo $fnamef; ?>">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="middle_name" class="col-md-3 col-form-label text-md-right">Middle </label>
                                    <div class="col-md-6">
                                        <input type="text" id="middle_name"  class="form-control border border-dark" name="middle_name" value="<?php echo $mnamef; ?>">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="last_name" class="col-md-3 col-form-label text-md-right">Last name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="last_name" class="form-control border border-dark" name="last_name" value="<?php echo $lnamef; ?>">
                                        
                                    </div>
                                    
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email" class="form-control border border-dark" name="email" value="<?php echo $emailf; ?>">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="contact" class="col-md-3 col-form-label text-md-right">Cellphone no.</label>
                                    <div class="col-md-6">
                                        <input type="text" min="11" max="11" id="contact" class="form-control border border-dark" name="contact" value="<?php echo $contf; ?>">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" name="password" class="form-control border border-dark" value="<?php echo $passf; ?>">
                                        <input type="checkbox" onclick="show()" class="mt-2" > show password </br>
                                        <span><i>password must contain a-Z,0-9,#!-&^</i></span>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label  class="col-md-3 col-form-label text-md-right">Birth date</label>
                                    <div class="col-md-6">
                                        
                                        <input type="date" value="<?php echo $bdayf; ?>" id="bday" name="bday"class="form-control border border-dark " >

                                    
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="gender" class="col-md-3 col-form-label text-md-right">Gender</label>

                                <div class="col-md-6 mt-2">
                                    <select name="gender">
					     			
                                       <option value="Male" <?php echo ($genderf == "Male")? 'Selected' : '' ?> >Male</option>
                                       <option value="Female" <?php echo ($genderf == "Female")? 'Selected' : '' ?> >Female</option>
					     			
                                    </select>
					   				</div>
					 			</div> 

                                 <div class="form-group row mb-3">
                                    <label for="gender" class="col-md-3 col-form-label text-md-right">Civil status</label>

                                <div class="col-md-6 mt-2">
                                    <select name="civil_status">
                                    
                                       <option value="Single" <?php echo ($civilf == "Single")? 'Selected' : '' ?> >Single</option>
                                       <option value="Married" <?php echo ($civilf == "Married")? 'Selected' : '' ?> >Married</option>
                                         <option value="Seperated" <?php echo ($civilf == "Seperated")? 'Selected' : '' ?> >Seperated</option>
                                        <option value="Widowed" <?php echo ($civilf == "Widowed")? 'Selected' : '' ?> >Widowed</option>
                                    
                                    </select>

                                    </div>
                                </div> 
                                

                                <div class="form-group row mb-3">
                                    <label for="address" class="col-md-3 col-form-label text-md-right">Religion</label>
                                    <div class="col-md-6">
                                        <input type="text"  class="form-control border border-dark" name="religion" value="<?php echo $religionf; ?>">
                                        
                                    </div>
                                </div>
                               
                                <div class="form-group row mb-3">
                                    <label for="address" class="col-md-3 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <textarea type="text" id="address" class="form-control border border-dark" name="address"></textarea>
                                        <input type="hidden" value="<?php echo $addf; ?>" id="add" >
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-md-12 col-form-label text-center">

                                    	<h2>Educational Attainment</h2>
                                    </div>
                                    
                                        
                                </div>

     							<div class="form-group row mb-3">
                                    <label for="educ1" class="col-md-3 col-form-label text-md-right">Elementary</label>
                                    <div class="col-md-6">
                                        <textarea type="text"  id="educ1" class="form-control border border-dark" name="educ_elem"></textarea>
                                        <input type="hidden" value="<?php echo $elemf; ?>" id="elem" >
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="educ2" class="col-md-3 col-form-label text-md-right">Junior school</label>
                                    <div class="col-md-6">
                                        <textarea type="text"  id="educ2" class="form-control border border-dark" name="educ_hs"></textarea>
                                        <input type="hidden" value="<?php echo $hsf; ?>" id="hs" >
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                 <label for="educ2" class="col-md-3 col-form-label text-md-right" >Senior High school</label>
                                    <div class="col-md-6">
                                        <textarea type="text" id="educ" class="form-control border border-dark" name="educ_hs2"></textarea>
                                        <input type="hidden" value="<?php echo $hsf2; ?>" id="hs" >
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="educ3" class="col-md-3 col-form-label text-md-right">College</label>
                                    <div class="col-md-6">
                                        <textarea type="text" id="educ3" class="form-control border border-dark" name="educ_college"></textarea>
                                        <input type="hidden" value="<?php echo $colf; ?>" id="col" >
                                    </div>
                                </div>


                                 <div class="form-group row mb-3">
                                    <label for="educ3" class="col-md-3 col-form-label text-md-right">Course</label>
                                    <div class="col-md-6">
                                        <textarea type="text" id="educ3" class="form-control border border-dark" name="course"></textarea>
                                        <input type="hidden" value="<?php echo $coursef; ?>" id="col" >
                                    </div>
                                </div>

                            <!--       <div class="form-group row mb-3">
                                    <div class="col-md-12 col-form-label text-center">

                                        <h2>Previous Employment</h2>
                                    </div>
                                    
                                        
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="jobexp" class="col-md-3 col-form-label text-md-right">Previous Company</label>
                                    <div class="col-md-6">
                                        <textarea type="text" id="jobexp1" class="form-control border border-dark" name="company"></textarea>
                                        <input type="hidden" value="<?php echo $comf; ?>" id="com" >
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="jobexp" class="col-md-3 col-form-label text-md-right">Postion</label>
                                    <div class="col-md-6">
                                    
                                        <input class="form-control border border-dark" type="text" value="<?php echo $posf; ?>" id="jobexp"  name="position">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                     <label for="jobexp" class="col-md-3 col-form-label text-md-right">Years of service</label>
                                    <div class="col-md-2">

                                        <select class="form-control input-sm border border-dark" name="years" id="jobexp">
                                         <option value="<?php echo $yearf; ?>"><?php echo $yearf; ?></option>
                                             <?php 
                                                 $d = range(1, 40);
                                                 foreach ($d as $day) {
                                                 echo '<option value='.$day.'>'.$day.'</option>';
                                                 }
                    
                                                ?>
                      
                                          </select>
                                    </div>
                                </div>
                               
                               <div class="form-group row mb-3">
                                     <div class="g-recaptcha" style="width:320px;margin: auto;" data-sitekey="6Lfg4RIbAAAAAHsToTBZ2JQsLagKcN_DVC_bvFoS" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                            <div class="help-block with-errors"></div>
                                </div> -->
                              
                                       <div class="tacbox" style="padding-left:15%">
  <input id="checkbox" type="checkbox" name="read" value="read" />
  <label for="checkbox"> I agree to these <a href="terms.php">Privacy policy & Terms and conditions</a>.</label>
  </div>
                                    <div class="col-md-6 offset-md-4 mt-4 mb-5">
                                        <button type="submit" name="submit" class="btn btn-primary">
                                        Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

</body>
	
	
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>

    <script type="text/javascript">

        var elem = document.getElementById('elem').value;
        var hs = document.getElementById('hs').value;
        var col = document.getElementById('col').value;
        var add = document.getElementById('add').value;
        
        var educ1 = document.getElementById('educ1');
        var educ2 = document.getElementById('educ2');
        var educ3 = document.getElementById('educ3');
        var addr = document.getElementById('address');
        

        educ1.value = elem;
        educ2.value = hs;
        educ3.value = col;
        addr.value = add;
        


        function show(){ 
         var x = document.getElementById("password");
        if (x.type === "password") {
         x.type = "text";
  } else {
    x.type = "password";
  }
}




    </script>



</html>