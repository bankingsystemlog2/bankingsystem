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
    $sql = "SELECT * FROM am WHERE product_id = ?";
    
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
                $item_number = $row["item_number"];
				$item_name = $row["item_name"];
				$status = $row["status"];
				$Quantity = $row["Quantity"];
				$Unit_price = $row["Unit_price"];
				$Total_stock = $row["Total_stock"];
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
					<label>Item Number </label>
					<input id="box" disabled class="form-control <?php echo (!empty($item_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $item_number; ?>">
				</div>
				<div class="form-group">
					<label>Item Name</label>
					<input id="box" disabled class="form-control <?php echo (!empty($item_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $item_name; ?>">
				</div>
				<div class="form-group">
					<label>Status</label>
					<input id="box" disabled class="form-control <?php echo (!empty($status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $status; ?>">
				</div>
				
				<div class="form-group">
					<label>Quantity</label>
					<input id="box" disabled class="form-control <?php echo (!empty($Quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Quantity; ?>">
				</div>
				
				<div class="form-group">
					<label>Unit Price</label>
					<input id="box" disabled class="form-control <?php echo (!empty($Unit_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Unit_price; ?>">
				</div>
				
				<div class="form-group">
					<label>Total Stock</label>
					<input id="box" disabled class="form-control <?php echo (!empty($Total_stock_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Total_stock; ?>">
				</div>
				
				
				<p><br><a href="am.php" class="btn btn-primary">Back</a><br></p>
			</div>
		</div>        
	</div>
</div>

<?php include_once('layouts/footer.php'); ?>