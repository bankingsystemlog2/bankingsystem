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
$item_number = $item_name = $status = $Quantity = $Unit_price = $Total_stock ="";
$item_number_err = $item_name_err = $status_err = $Quantity_err = $Unit_price_err = $Total_stock_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate address
    $input_item_number = trim($_POST["item_number"]);
    if(empty($input_item_number)){
        $item_number_err = "Please enter an item_number.";     
    } else{
        $item_number = $input_item_number;
    }
    
	 // Validate address
    $input_item_name = trim($_POST["item_name"]);
    if(empty($input_item_name)){
        $item_name_err = "Please enter a item_name.";     
    } else{
        $item_name = $input_item_name;
    }
    
	 // Validate address
    $input_status = trim($_POST["status"]);
    if(empty($input_status)){
        $status_err = "Please enter a status.";     
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
    $input_Unit_price = trim($_POST["Unit_price"]);
    if(empty($input_Unit_pricee)){
        $Unit_price_err = "Please enter an Unit_price.";     
    } else{
        $Unit_price = $input_Unit_price;
    }
    
    
	 // Validate address
    $input_Total_stock = trim($_POST["Total_stock"]);
    if(empty($input_Total_stock)){
        $Total_stock_err = "Please enter a Total_stock.";     
    } else{
        $Total_stock = $input_Total_stock;
    }
    
	
    
    // Check input errors before inserting in database
    if(empty($item_number_err) && empty($item_name_err) && empty($status_err) && empty($Quantity_err) && empty($Unit_price_err) && empty($Total_stock_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO am (item_number , item_name, status, Quantity, Unit_price,  Total_stock) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_item_number , $param_item_name, $param_status, $param_Quantity, $param_Unit_price, $param_Total_stock);
            
            // Set parameters
            $param_item_number  = $item_number;
            $param_item_name = $item_name;
            $param_status= $status;
            $param_Quantity = $Quantity;
            $param_Unit_price = $Unit_price;
            $param_Total_stock = $Total_stock;
           
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: am.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
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
  + Add Product List
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<h3> ADD PRODUCT </h3>
      </div>
      <div class="modal-body">
        	

		      	<!-- Modal body -->
		      	<div class="modal-body">
		        	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		        		
				    	<div class="form-group">
						    <label for="item_number ">Product Number</label>
						    <input type="number_format" name="item_number " class="form-control <?php echo (!empty($item_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $item_number ; ?>">
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
						    <label for="Quantity">Quantity</label><br/>
							<input type="number_format" name="Quantity" style="width: 100%" class="form-control <?php echo (!empty($Quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Quantity; ?>">
							<span class="invalid-feedback"><?php echo $Quantity_err;?></span>
						</div>
						
						<div class="form-group">
						    <label for="Unit_price">Unit price</label><br/>
							<input type="number_format" name="end_date" style="width: 100%" class="form-control <?php echo (!empty($Unit_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Unit_price; ?>">
							<span class="invalid-feedback"><?php echo $Unit_price_err;?></span>
						</div>
						
						<div class="form-group">
						    <label for="Total_stock">Total stock</label>
						     <input type="number_format" name="Total_stock" class="form-control <?php echo (!empty($Total_stock_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Total_stock; ?>">
							<span class="invalid-feedback"><?php echo $Total_stock_err;?></span>
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
        
        <h3 class="text-center text-info">Product List Table</h3>
        <?php
                    // Include config file
                    require_once "Database/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM am";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead class='table-primary'>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Item Number</th>";
                                        echo "<th>Item Name</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Quantity</th>";
                                        echo "<th>Unit Price</th>";
                                        echo "<th>Total Stock</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['product_id'] . "</td>";
                                        echo "<td>" . $row['item_number'] . "</td>";
                                        echo "<td>" . $row['item_name'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['Quantity'] . "</td>";
                                        echo "<td>" . $row['Unit_price'] . "</td>";
                                        echo "<td>" . $row['Total_stock'] . "</td>";
                                        echo "<td>";
                                            echo '<button><a href="view_am.php?id='. $row['product_id'] .'" class="mr-3" title="View Record" data-toggle="tooltip">View</a></button>';
                                            echo '<button><a href="edit_am.php?id='. $row['product_id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip">Update</a></button><br>';
                                            echo '<button><a href="delete_am.php?id='. $row['product_id'] .'" title="Delete Record" data-toggle="tooltip">Delete</a></button>';
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