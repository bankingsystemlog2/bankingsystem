<?php
  
  require_once('includes/load.php');
  require_once('includes/activitylog.inc.php');


  $id = $_GET['id'];


  $sql = "SELECT applicants.*,applications.* FROM applicants JOIN applications ON applicants.applicant_id = applications.applicant_id WHERE applicants 
  .applicant_id = '$id'";
  $result = $db->query($sql);
  $applicant = $result->fetch_assoc();


  $fname = $applicant['first_name'];
  $mname = $applicant['middle_name'];
  $lname = $applicant['last_name'];
  $email = $applicant['email'];
  $contact = $applicant['contact_number'];
  $bday = $applicant['birth_date'];
  $age = $applicant['age'];
  $gender = $applicant['gender'];
  $civil_status = $applicant['civil_status'];
  $religion = $applicant['religion'];
  $address = $applicant['address'];
  $position = $applicant['job_title'];
  $today = date('Y-m-d');

  $query = "SELECT department FROM job_vacancy WHERE job_title = '$position';";
  $res = $db->query($query);
  $depa = $res->fetch_assoc();
  $dept = $depa['department'];

 
  $sql ="INSERT INTO employees (first_name,middle_name,last_name,email,contact_number,birth_date,age,gender,civil_status,religion,address,designation,date_hired,department)";
  $sql .= " VALUES ('$fname','$mname','$lname','$email','$contact','$bday','$age','$gender','$civil_status','$religion','$address','$position','$today','$dept')";
  if($db->query($sql)){

    
  	$sql = "UPDATE applications set status = 'hired' WHERE applicant_id = '$id'";
  	if($db->query($sql)){

  		$sql = "SELECT * FROM employees WHERE email = '$email'";
	  		if($result = $db->query($sql)){


          $applicant = $result->fetch_assoc();
          $emp_id = $applicant['employee_id'];

          $sql = "UPDATE employee_documents SET employee_id = '$emp_id' WHERE applicant_id = '$id';";
    if($db->query($sql)){


	  			$sql = "INSERT INTO new_hires (employee_id,status) VALUES ('$emp_id','for contract signing')";
	  			if($db->query($sql)){

        

                $q = "UPDATE posted_jobs SET no_of_vacancy = '$vacant' WHERE job_id = '$jid'";
                if($db->query($q)){

              $sql = "DELETE FROM applications WHERE applicant_id = '$id'";
              if($db->query($sql)){

              $sql = "DELETE FROM qualified_applicants WHERE applicant_id = '$id'";
              if($db->query($sql)){

                $sql = "DELETE FROM initial_interview WHERE applicant_id = '$id'";
              if($db->query($sql)){

                 $sql = "DELETE FROM final_interview WHERE applicant_id = '$id'";
              if($db->query($sql)){

                 $sql = "DELETE FROM passed_applicant WHERE applicant_id = '$id'";
              if($db->query($sql)){
                   
$to_email = $email;
            $subject = "Welcome to the Company";
            $body = "<p>Good day we are glad to congratulate you that you are hired <br>";
            $body .= 'Please wait for the schedule of your contract signing that will be sent on this email. <br>';
            $body .= "be condsidered failure of your application <br>";
            $body .= "We are pleasured having on our team.</p> <br>";
           
           

            $headers = "From:  Banking And finance Applicant management \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


           
if (mail($to_email, $subject, $body, $headers)){          
      
      $_SESSION['status'] ="Applicant has been hired";
            $_SESSION['status_code'] = "success";
       redirect('hiring-approval.php',false);
                }
              }
              }
              }
              }
              }
              }
              

            }
              }

            }

		}	
   	 }
	
  
  	
  	
  
  


 








































?>