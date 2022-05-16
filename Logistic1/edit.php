<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php
// Include config file
require_once "Database/config.php";
 
// Define variables and initialize with empty values
$prop_proj = $proj_name = $loc = $cost = $start_date = $end_date = $proj_man ="";
$prop_proj_err = $proj_name_err = $loc_err = $cost_err = $start_date_err = $end_dateerr = $proj_man_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
   // Validate address
    $input_prop_proj = trim($_POST["prop_proj"]);
    if(empty($input_prop_proj)){
        $prop_proj_err = "Please enter an prop_proj.";     
    } else{
        $prop_proj = $input_prop_proj;
    }
    
	 // Validate address
    $input_proj_name = trim($_POST["proj_name"]);
    if(empty($input_proj_name)){
        $proj_name_err = "Please enter a proj_name.";     
    } else{
        $proj_name = $input_proj_name;
    }
    
	 // Validate address
    $input_loc = trim($_POST["loc"]);
    if(empty($input_loc)){
        $loc_err = "Please enter a Location.";     
    } else{
        $loc = $input_loc;
    }
    
	 // Validate address
    $input_cost = trim($_POST["cost"]);
    if(empty($input_cost)){
        $cost_err = "Please enter a cost.";     
    } else{
        $cost = $input_cost;
    }
    
	 // Validate address
    $input_start_date = trim($_POST["start_date"]);
    if(empty($input_start_date)){
        $start_date_err = "Please enter an address.";     
    } else{
        $start_date = $input_start_date;
    }
    
	 // Validate address
    $input_end_date = trim($_POST["end_date"]);
    if(empty($input_end_date)){
        $address_err = "Please enter an address.";     
    } else{
        $end_date = $input_end_date;
    }
    
	 // Validate address
    $input_proj_man = trim($_POST["proj_man"]);
    if(empty($input_proj_man)){
        $proj_man_err = "Please enter a proj_man.";     
    } else{
        $proj_man = $input_proj_man;
    }
    
    // Check input errors before inserting in database
     if(empty($prop_proj_err) && empty($proj_name_err) && empty($loc_err) && empty($cost_err) && empty($start_date_err) && empty($end_date_err) && empty($proj_man_err)){
        // Prepare an update statement
        $sql = "UPDATE pm SET prop_proj=?, proj_name=?, loc=?, cost=?, start_date=?, end_date=?, proj_man=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_prop_proj, $param_proj_name, $param_loc, $param_cost, $param_start_date, $param_end_date, $param_proj_man, $param_id); 
            
            // Set parameters
			$param_prop_proj = $prop_proj;
            $param_proj_name = $proj_name;
            $param_loc = $loc;
            $param_cost = $cost;
            $param_start_date = $start_date;
            $param_end_date = $end_date;
            $param_proj_man = $proj_man;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: pm.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM pm WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
			
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                   
					$prop_proj = $row["prop_proj"];
					$proj_name = $row["proj_name"];
					$loc = $row["loc"];
					$cost = $row["cost"];
					$start_date = $row["start_date"];
					$end_date = $row["end_date"];
					$proj_man =$row["proj_man"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>		

<?php include_once('layouts/header.php'); ?>

<style>
	.wrapper{
		width: 600px;
		margin: 0 auto;
		border: solid black 2px;
	}
</style>

 <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                       <div class="form-group">
						    <label for="prop_proj">Proposed Project</label>
						    <input type="text" name="prop_proj" class="form-control <?php echo (!empty($prop_proj_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prop_proj; ?>">
                            <span class="invalid-feedback"><?php echo $prop_proj_err;?></span>
					  	</div>
						
					  	<div class="form-group">
						    <label for="proj_name">Project Name</label>
						    <input type="text" name="proj_name" class="form-control <?php echo (!empty($proj_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $proj_name; ?>">
							<span class="invalid-feedback"><?php echo $proj_name_err;?></span>
					  	</div>
					  	
					  	<div class="form-group">
						    <label for="loc">Location</label>
						    <textarea name="loc" rows="3" class="form-control" <?php echo (!empty($loc_err)) ? 'is-invalid' : ''; ?>"><?php echo $loc; ?></textarea>
                            <span class="invalid-feedback"><?php echo $loc_err;?></span>
					  	</div>
						
						<div class="form-group">
						    <label for="cost">Cost</label>
						    <input type="text" name="cost" class="form-control <?php echo (!empty($cost_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cost; ?>">
							<span class="invalid-feedback"><?php echo $cost_err;?></span>
					  	</div>
						
					  	<div class="form-group">
						    <label for="start_date">Start Date</label><br/>
							<input type="date" name="start_date" style="width: 100%" class="form-control <?php echo (!empty($start_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $start_date; ?>">
							<span class="invalid-feedback"><?php echo $start_date_err;?></span>
						</div>
						
						<div class="form-group">
						    <label for="end_date">End Date</label><br/>
							<input type="date" name="end_date" style="width: 100%" class="form-control <?php echo (!empty($end_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $end_date; ?>">
							<span class="invalid-feedback"><?php echo $end_date_err;?></span>
						</div>
						
						<div class="form-group">
						    <label for="proj_man">Project Manager</label>
						     <input type="text" name="proj_man" class="form-control <?php echo (!empty($proj_man_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $proj_man; ?>">
							<span class="invalid-feedback"><?php echo $proj_man_err;?></span>
					  	</div>
						<br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="pm.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form><br>
                </div>
            </div>        
        </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
