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
$item_number = $item_name = $status = $Quantity = $Unit_price = $Total_stock = "";
$item_number_err = $item_name_err = $status_err = $Quantity_err = $Unit_price_err = $Total_stock_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
   // Validate address
    $input_item_number = trim($_POST["item_number"]);
    if(empty($input_item_number)){
        $item_number_err = "Please enter an Item Number.";     
    } else{
        $item_number = $input_item_number;
    }
    
	 // Validate address
    $input_item_name = trim($_POST["item_name"]);
    if(empty($input_item_name)){
        $item_name_err = "Please enter a Item Name.";     
    } else{
        $item_name = $input_item_name;
    }
    
	 // Validate address
    $input_status = trim($_POST["status"]);
    if(empty($input_status)){
        $status_err = "Please enter a Status.";     
    } else{
        $status = $input_status;
    }
    
	 // Validate address
    $input_Quantity = trim($_POST["Quantity"]);
    if(empty($input_Quantity)){
        $Quantity_err = "Please enter a Quantity.";     
    } else{
        $Quantity = $input_Quantity;
    }
    
	 // Validate address
    $input_Total_stock = trim($_POST["Total_stock"]);
    if(empty($input_Total_stock)){
        $Total_stock_err = "Please enter an Total Stock.";     
    } else{
        $Total_stock = $input_Total_stock;
    }
    
	
    
    // Check input errors before inserting in database
     if(empty($item_number_err) && empty($item_name_err) && empty($status_err) && empty($Quantity_err) && empty($Total_stock_err)){
        // Prepare an update statement
        $sql = "UPDATE am SET item_number=?, item_name=?, status=?, Quantity=?, Unit_price=?,  Total_stock=? WHERE product_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_item_number , $param_item_name, $param_status, $param_Quantity, $param_Unit_price, $param_Total_stock, $param_product_id); 
            
            // Set parameters
			$param_item_number  = $item_number;
            $param_item_name = $item_name;
            $param_status = $status;
            $param_Quantity = $Quantity;
            $param_Unit_price = $Unit_price;
            $param_Total_stock = $Total_stock;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: am.php");
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
        $sql = "SELECT * FROM am WHERE product_id = ?";
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
                   
					$item_number = $row["item_number"];
					$item_name = $row["item_name"];
					$status = $row["status"];
					$Quantity = $row["Quantity"];
					$Unit_price = $row["Unit_price"];
					$Total_stock = $row["Total_stock"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        
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
						    <label for="item_number">Item Number </label>
						    <input type="number_format" name="item_number" class="form-control <?php echo (!empty($item_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $item_number; ?>">
                            <span class="invalid-feedback"><?php echo $item_number_err;?></span>
					  	</div>
						
					  	<div class="form-group">
						    <label for="item_name">Item Name</label>
						    <input type="text" name="item_name" class="form-control <?php echo (!empty($item_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $item_name; ?>">
							<span class="invalid-feedback"><?php echo $item_name_err;?></span>
					  	</div>
					  	
					  	<div class="form-group">
						    <label for="status">Status</label>
						    <input type="text" name="status" class="form-control <?php echo (!empty($status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $status; ?>">
							<span class="invalid-feedback"><?php echo $status_err;?></span>
					  	</div>
						<div class="form-group">
						    <label for="Quantity">Quantity</label>
						    <input type="number_format" name="Quantity" class="form-control <?php echo (!empty($Quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Quantity; ?>">
							<span class="invalid-feedback"><?php echo $Quantity_err;?></span>
					  	</div>
					
						
						<div class="form-group">
						    <label for="Unit_price">Unit price</label><br/>
							<input type="number_format" name="Unit_price" style="width: 100%" class="form-control <?php echo (!empty($Unit_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Unit_price; ?>">
							<span class="invalid-feedback"><?php echo $Unit_price_err;?></span>
						</div>
						
						<div class="form-group">
						    <label for="Total_stock">Total stock</label>
						     <input type="number_format" name=" Total_stock" class="form-control <?php echo (!empty($Total_stock_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Total_stock; ?>">
							<span class="invalid-feedback"><?php echo $Total_stock_err;?></span>
					  	</div>
						<br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="am.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form><br>
                </div>
            </div>        
        </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
