<?php

require_once('includes/load.php');
if($session->isUserLoggedIn(true)) { redirect('home.php', false);}


    if(isset($_POST['submit'])){
        if(empty($errors)){
            $v_category   = remove_junk($db->escape($_POST['first_name']));
            $v_model   = remove_junk($db->escape($_POST['middle_name']));
            $v_year   = remove_junk($db->escape($_POST['last_name']));
            $v_color   = remove_junk($db->escape($_POST['email']));
            $v_regnum   = remove_junk($db->escape($_POST['contact']));
            $v_serialnum   = remove_junk($db->escape($_POST['password'])); 
            $v_capacity   = remove_junk($db->escape($_POST['bday']));
            $v_datepur   = remove_junk($db->escape($_POST['gender']));
            $v_manu   = remove_junk($db->escape($_POST['civil_status']));
            $v_enginetype   = remove_junk($db->escape($_POST['religion']));
            $v_loc   = remove_junk($db->escape($_POST['address'])); 
              $query = "INSERT INTO supplier_user (`vendor_fname`, `vendor_mi`, `vendor_lname`, `vendor_email`, `vendor_cell`, `vendor_pass`, `vendor_bday`, `vendor_gender`, `vendor_cstatus`, `vendor_religion`, `vendor_address`) VALUES";
              $query .="('{$v_category}', '{$v_model}', '{$v_year}', '{$v_color}', '{$v_regnum}', '{$v_serialnum}', '{$v_capacity}', '{$v_datepur}', '{$v_manu}', '{$v_enginetype}', '{$v_loc}'";
              $query .=")";
              if($db->query($query)){
                //success
                $session->msg('s',"Application form sent! ");
                redirect('search.php', false);
              } 
              else {
                //failed
                $session->msg('d',' Sorry Application form failed to send!');
                redirect('register.php', true);
              }
          }
          else {
            $session->msg("d", $errors);
            redirect('register.php?1',true);
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

                             <?php echo display_msg($msg);
                    	   $error = "";  ?>
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
                                        <input type="text" id="first_name" class="form-control border border-dark" name="first_name">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="middle_name" class="col-md-3 col-form-label text-md-right">Middle </label>
                                    <div class="col-md-6">
                                        <input type="text" id="middle_name"  class="form-control border border-dark" name="middle_name">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="last_name" class="col-md-3 col-form-label text-md-right">Last name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="last_name" class="form-control border border-dark" name="last_name">
                                        
                                    </div>
                                    
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email" class="form-control border border-dark" name="email" >
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="contact" class="col-md-3 col-form-label text-md-right">Cellphone no.</label>
                                    <div class="col-md-6">
                                        <input type="text" min="11" max="11" id="contact" class="form-control border border-dark" name="contact">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" name="password" class="form-control border border-dark">
                                        <input type="checkbox" onclick="show()" class="mt-2" > show password </br>
                                        <span><i>password must contain a-Z,0-9,#!-&^</i></span>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label  class="col-md-3 col-form-label text-md-right">Birth date</label>
                                    <div class="col-md-6">
                                        
                                        <input type="date"  id="bday" name="bday"class="form-control border border-dark " >

                                    
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="gender" class="col-md-3 col-form-label text-md-right">Gender</label>

                                <div class="col-md-6 mt-2">
                                    <select name="gender">
					     			
                                       <option value="Male"  >Male</option>
                                       <option value="Female" >Female</option>
					     			
                                    </select>
					   				</div>
					 			</div> 

                                 <div class="form-group row mb-3">
                                    <label for="gender" class="col-md-3 col-form-label text-md-right">Civil status</label>

                                <div class="col-md-6 mt-2">
                                    <select name="civil_status">
                                    
                                       <option value="Single"  >Single</option>
                                       <option value="Married"  >Married</option>
                                         <option value="Seperated"  >Seperated</option>
                                        <option value="Widowed"  >Widowed</option>
                                    
                                    </select>

                                    </div>
                                </div> 
                                

                                <div class="form-group row mb-3">
                                    <label for="address" class="col-md-3 col-form-label text-md-right">Religion</label>
                                    <div class="col-md-6">
                                        <input type="text"  class="form-control border border-dark" name="religion">
                                        
                                    </div>
                                </div>
                               
                                <div class="form-group row mb-3">
                                    <label for="address" class="col-md-3 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <textarea type="text" id="address" class="form-control border border-dark" name="address"></textarea>
                                        
                                    </div>
                                </div>

                                <!-- <div class="form-group row mb-3">
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
                                </div> -->

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
	
	
	<script src="https://www.google.com/recaptcha/api.js"></script>

    <script type="text/javascript">
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