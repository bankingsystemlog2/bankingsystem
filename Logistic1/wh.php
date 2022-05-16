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
$product_ID = $item_number = $item_name = $discount = $stock = $unit_price = $status = $description = "";
$product_ID_err = $item_number_err = $item_name_err = $discount_err = $stock_err = $unit_price_err = $status_err = $description_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate address
    $input_product_ID = trim($_POST["product_ID"]);
    if(empty($input_product_ID)){
        $product_ID_err = "Please enter an ID.";     
    } else{
        $product_ID = $input_product_ID;
    }
	// Validate address
    $input_item_number = trim($_POST["item_number"]);
    if(empty($input_item_number)){
        $item_number_err = "Please enter an item number.";     
    } else{
        $item_number = $input_item_number;
    }
    
	 // Validate address
    $input_item_name = trim($_POST["item_name"]);
    if(empty($input_item_name)){
        $item_name_err = "Please enter a item name.";     
    } else{
        $item_name = $input_item_name;
    }
    
	 // Validate address
    $input_discount = trim($_POST["discount"]);
    if(empty($input_discount)){
        $discount_err = "Please enter a discount.";     
    } else{
        $discount = $input_discount;
    }
    
	 // Validate address
    $input_stock = trim($_POST["stock"]);
    if(empty($input_stock)){
        $stock_err = "Please enter a Stocks.";     
    } else{
        $stock = $input_stock;
    }
    
	 // Validate address
    $input_unit_price = trim($_POST["unit_price"]);
    if(empty($input_unit_pricee)){
        $unit_price_err = "Please enter an Unit price.";     
    } else{
        $unit_price = $input_unit_price;
    }
    // Validate address
    $input_status = trim($_POST["status"]);
    if(empty($input_status)){
        $status_err = "Please enter a status.";     
    } else{
        $status = $input_status;
    }
    
	 // Validate address
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter a description.";     
    } else{
        $description = $input_description;
    }
    
	
    
    // Check input errors before inserting in database
    if(empty($product_ID_err) && empty($item_number_err) && empty($item_name_err) && empty($discount_err) && empty($stock_err) && empty($unit_price_err) && empty($status_err) && empty($description_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO wh (product_ID , item_number , item_name, discount , stock , unit_price , status, description ,  Total_stock) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss",$param_product_ID , $param_item_number , $param_item_name , $param_discount , $param_stock , $param_unit_price , $param_status , $param_description);
            
            // Set parameters
			$param_product_ID = $product_ID;
            $param_item_number  = $item_number;
            $param_item_name = $item_name;
			$param_discount = $discount;
			$param_stock = $stock;
			$param_unit_price = $unit_price;
            $param_status= $status;
            $param_description = $description;
            
           
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: wh.php");
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
  + Add Stock
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<h3> ADD ITEM </h3>
      </div>
      <div class="modal-body">
        	

		      	<!-- Modal body -->
		      	<div class="modal-body">
		        	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					
					<div class="form-group">
						    <label for="product_ID">#</label>
						    <input type="number_format" name="product_ID " class="form-control <?php echo (!empty($product_ID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_ID ; ?>">
							<span class="invalid-feedback"><?php echo $product_ID_err;?></span>
					  	</div>
		        		
				    	<div class="form-group">
						    <label for="item_number ">Item Number</label>
						    <input type="number_format" name="item_number " class="form-control <?php echo (!empty($item_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $item_number ; ?>">
							<span class="invalid-feedback"><?php echo $item_number_err;?></span>
					  	</div>
						
					  	<div class="form-group">
						    <label for="item_name">Item Name</label>
						    <input type="text" name="item_name" class="form-control <?php echo (!empty($item_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $item_name; ?>">
							<span class="invalid-feedback"><?php echo $item_name_err;?></span>
					  	</div>
					  	
			<div class="form-group">
						    <label for="discount">Discount</label><br/>
							<input type="number_format" name="discount" style="width: 100%" class="form-control <?php echo (!empty($discount_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $discount; ?>">
							<span class="invalid-feedback"><?php echo $discount_err;?></span>
						</div>
						
						<div class="form-group">
						    <label for="stock">Stock</label>
						     <input type="number_format" name="stock" class="form-control <?php echo (!empty($stock_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stock; ?>">
							<span class="invalid-feedback"><?php echo $stock_err;?></span>
					  	</div>
						
						<div class="form-group">
						    <label for="unit_price">Unit price</label><br/>
							<input type="number_format" name="unit_price" style="width: 100%" class="form-control <?php echo (!empty($unit_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $unit_price; ?>">
							<span class="invalid-feedback"><?php echo $unit_price_err;?></span>
						</div>
						
						<div class="form-group">
						    <label for="status">Status</label>
						    <input type="text" name="status" class="form-control <?php echo (!empty($status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $status; ?>">
							<span class="invalid-feedback"><?php echo $status_err;?></span>
					  	</div>
						
						<div class="form-group">
						    <label for="description">Description</label><br/>
							<input type="number_format" name="description" style="width: 100%" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $description; ?>">
							<span class="invalid-feedback"><?php echo $description_err;?></span>
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
                    $sql = "SELECT * FROM wh";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead class='table-primary'>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>item_number</th>";
                                        echo "<th>item_name</th>";
										echo "<th>discount</th>";
										echo "<th>stock</th>";
										echo "<th>unit_price</th>";
                                        echo "<th>status</th>";
										echo "<th>description</th>";
                                        
                                        
                                        
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['product_id'] . "</td>";
                                        echo "<td>" . $row['item_number'] . "</td>";
                                        echo "<td>" . $row['item_name'] . "</td>";
										echo "<td>" . $row['discount'] . "</td>";
										echo "<td>" . $row['stock'] . "</td>";
										echo "<td>" . $row['unit_price'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        
                                        echo "<td>";
                                            echo '<button><a href="view_wh.php?id='. $row['product_id'] .'" class="mr-3" title="View Record" data-toggle="tooltip">View</a></button>';
                                            echo '<button><a href="edit_wh.php?id='. $row['product_id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip">Update</a></button><br>';
                                            echo '<button><a href="delete_wh.php?id='. $row['product_id'] .'" title="Delete Record" data-toggle="tooltip">Delete</a></button>';
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