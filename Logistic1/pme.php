<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php include_once('layouts/header.php'); ?>


<?php
// Include config file
	require_once "Database/config.php";
 
// Define variables and initialize with empty values
$id = $req_id = $req_class = $fname = $mname = $lname = $type_of_contract = $department = $status = $date_of_request = "";
$id_err = $req_id_err = $req_class_err = $fname_err = $mname_err = $lname_err = $type_of_contract_err= $department_err = $status_err = $date_of_request_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate address
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $id_err = "Please enter an id.";     
    } else{
        $id = $input_id;
    }
    
	 // Validate address
    $input_req_id = trim($_POST["req_id"]);
    if(empty($input_req_id)){
        $req_id_err = "Please enter a req_id.";     
    } else{
        $req_id = $input_req_id;
    }
    
	 // Validate address
    $input_req_class = trim($_POST["req_class"]);
    if(empty($input_req_class)){
        $req_class_err = "Please enter a class.";     
    } else{
        $req_class = $input_req_class;
    }
    
	 // Validate address
    $input_fname = trim($_POST["fname"]);
    if(empty($input_fname)){
        $fname_err = "Please enter a fname.";     
    } else{
        $fname = $input_fname;
    }
    
	 // Validate address
    $input_mname = trim($_POST["mname"]);
    if(empty($input_mname)){
        $mname_err = "Please enter an middle name.";     
    } else{
        $mname = $input_mname;
    }
    
	 // Validate address
    $input_lname = trim($_POST["lname"]);
    if(empty($input_lname)){
        $lname_err = "Please enter an last name.";     
    } else{
        $lname = $input_lname;
    }
    
	 // Validate address
    $input_type_of_contract = trim($_POST["type_of_contract"]);
    if(empty($input_type_of_contract)){
        $type_of_contract_err = "Please enter a type_of_contract.";     
    } else{
        $type_of_contract = $input_type_of_contract;
    }
	
	 // Validate address
    $input_department = trim($_POST["department"]);
    if(empty($input_department)){
        $department_err = "Please enter a department.";     
    } else{
        $department = $input_department;
    }
	
	// Validate address
    $input_status = trim($_POST["status"]);
    if(empty($input_status)){
        $status_err = "Please enter a status.";     
    } else{
        $status = $input_status;
    }
	
	// Validate address
    $input_date_of_request = trim($_POST["date_of_request"]);
    if(empty($input_date_of_request)){
        $date_of_request_err = "Please enter a date_of_request.";     
    } else{
        $date_of_request = $input_date_of_request;
    }
    
	
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($req_id_err) && empty($req_class_err) && empty($fname_err) && empty($mname_err) && empty($lname_err) && empty($type_of_contract_err) && empty($department_err) && empty($status_err) && empty($date_of_request_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO pm (id, req_id, req_class, fname, mname, lname, type_of_contract, department, status, date_of_request) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_id, $param_req_id, $param_req_class, $param_fname, $param_mname, $param_lname, $param_type_of_contract, $param_department, $param_status, $param_date_of_request);
            
            // Set parameters
            $param_id = $id;
            $param_req_id = $req_id;
            $param_req_class = $req_class;
            $param_fname = $fname;
            $param_mname = $mname;
            $param_lname = $lname;
            $param_type_of_contract = $type_of_contract;
			$param_department = $department;
			$param_status = $status;
			$param_date_of_request = $date_of_request;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: pme.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
       
    }
}
?>
<style>
#lamesa{
	text-align: center;
	width: 100%;
}
</style>
<?php include_once('layouts/header.php'); ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  ADD PROJECT PROPOSAL
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<h3> PROJECT PROPOSAL </h3>
      </div>
      <div class="modal-body">
        	

		      	<!-- Modal body -->
		      	<div class="modal-body">
		        	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		        		
				    	<div class="form-group">
						    <label for="id">ID</label>
						    <input type="text" name="id" class="form-control <?php echo (!empty($id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $id; ?>">
							<span class="invalid-feedback"><?php echo $id_err;?></span>
					  	</div>
						
					  	<div class="form-group">
						    <label for="req_id">Request ID</label>
						    <input type="text" name="req_id" class="form-control <?php echo (!empty($req_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $req_id; ?>">
							<span class="invalid-feedback"><?php echo $req_id_err;?></span>
					  	</div>
					  	
					  	<div class="form-group">
						    <label for="req_class">Class</label>
						    <textarea name="req_class" rows="3" class="form-control" <?php echo (!empty($req_class_err)) ? 'is-invalid' : ''; ?>"><?php echo $req_class; ?></textarea>
                            <span class="invalid-feedback"><?php echo $req_class_err;?></span>
					  	</div>
						
						<div class="form-group">
						    <label for="fname">First Name</label>
						    <input type="text" name="fname" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
							<span class="invalid-feedback"><?php echo $fname_err;?></span>
					  	</div>
						
					  	<div class="form-group">
						    <label for="mname">Middle Name</label><br/>
							<input type="text" name="mname" style="width: 100%" class="form-control <?php echo (!empty($mname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mname; ?>">
							<span class="invalid-feedback"><?php echo $mname_err;?></span>
						</div>
						
						<div class="form-group">
						    <label for="lname">Last Name</label><br/>
							<input type="text" name="lname" style="width: 100%" class="form-control <?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lname; ?>">
							<span class="invalid-feedback"><?php echo $lname_err;?></span>
						</div>
						
						<div class="form-group">
						    <label for="type_of_contract">Type of Contract</label>
						     <input type="text" name="type_of_contract" class="form-control <?php echo (!empty($type_of_contract_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $type_of_contract; ?>">
							<span class="invalid-feedback"><?php echo $type_of_contract_err;?></span>
					  	</div>
						
						<div class="form-group">
						    <label for="department">Department</label>
						     <input type="text" name="department" class="form-control <?php echo (!empty($department_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $department; ?>">
							<span class="invalid-feedback"><?php echo $department_err;?></span>
					  	</div>
						
						<div class="form-group">
						    <label for="status">Status</label>
						     <input type="text" name="status" class="form-control <?php echo (!empty($status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $status; ?>">
							<span class="invalid-feedback"><?php echo $status_err;?></span>
					  	</div>
						
						<div class="form-group">
						    <label for="date_of_request">Date of Request</label>
						     <input type="date" name="date_of_request" class="form-control <?php echo (!empty($date_of_request_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date_of_request; ?>">
							<span class="invalid-feedback"><?php echo $date_of_request_err;?></span>
					  	</div>
						
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" value="Submit">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					</form>


		      	</div>
      </div>
	  
      
    </div>
  </div>
  </div>
 <div class="col-md-8" id="lamesa">
        
        <h3 class="text-center text-info">Records of Project Management</h3>
        <?php
                    // Include config file
                    require_once "Database/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM request_contract";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead class='table-primary'>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Request ID</th>";
                                        echo "<th>Class</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Middle Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Type of Contract</th>";
                                        echo "<th>Department</th>";
										echo "<th>Status</th>";
										echo "<th>Date of Request</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['req_id'] . "</td>";
                                        echo "<td>" . $row['req_class'] . "</td>";
                                        echo "<td>" . $row['fname'] . "</td>";
                                        echo "<td>" . $row['mname'] . "</td>";
                                        echo "<td>" . $row['lname'] . "</td>";
                                        echo "<td>" . $row['type_of_contract'] . "</td>";
                                        echo "<td>" . $row['department'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['date_of_request'] . "</td>";
                                        echo "<td>";
                                            echo '<button><a href="view.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip">View</a></button>';
                                            echo '<button><a href="edit.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip">Update</a></button><br>';
                                            echo '<button><a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip">Delete</a></button>';
                                        echo "</td>";
										
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
      </div>



<?php include_once('layouts/footer.php'); ?>