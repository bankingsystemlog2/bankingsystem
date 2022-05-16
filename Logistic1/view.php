<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "Database/config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM pm WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
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
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<style>
	.wrapper{
		width: 600px;
		margin: 0 auto;
		border: solid black 2px;
	}
	#box{
		border: solid black 2px;
		text-align: center;
	}
</style>

<?php include_once('layouts/header.php'); ?>

<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="mt-5 mb-3">View Project Record</h1>
				<div class="form-group">
					<label>Proposed Project</label>
					<input id="box" disabled class="form-control <?php echo (!empty($prop_proj_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prop_proj; ?>">
				</div>
				<div class="form-group">
					<label>Project Name</label>
					<input id="box" disabled class="form-control <?php echo (!empty($proj_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $proj_name; ?>">
				</div>
				<div class="form-group">
					<label>Location</label>
					<input id="box" disabled class="form-control <?php echo (!empty($loc_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $loc; ?>">
				</div>
				
				<div class="form-group">
					<label>Cost</label>
					<input id="box" disabled class="form-control <?php echo (!empty($cost_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cost; ?>">
				</div>
				
				<div class="form-group">
					<label>Start Date</label>
					<input id="box" disabled class="form-control <?php echo (!empty($start_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $start_date; ?>">
				</div>
				
				<div class="form-group">
					<label>End Date</label>
					<input id="box" disabled class="form-control <?php echo (!empty($end_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $end_date; ?>">
				</div>
				
				<div class="form-group">
					<label>Project Manager</label>
					<input id="box" disabled class="form-control <?php echo (!empty($proj_man_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $proj_man; ?>">
				</div>
				
				
				<p><br><a href="pm.php" class="btn btn-primary">Back</a><br></p>
			</div>
		</div>        
	</div>
</div>

<?php include_once('layouts/footer.php'); ?>