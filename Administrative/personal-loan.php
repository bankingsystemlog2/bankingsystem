<?php
  $page_title = 'List of Housing loan';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $all_personal_loan = find_all('personal_loan')
?>



<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
	
	
	
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
  
  
  <a href="housingloan.php" class="breadcrumbs__item is-active">Housing Loan</a>
   
</nav>
<!-- /Breadcrumb -->

<br>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="housingloan.php"><button type="button" class="btn btn-light">Housing Loan</button></a> 
<a href="carloan.php"><button type="button" class="btn btn-info">Car Loan</button></a>
<a href="#"><button type="button" class="btn btn-success">Business Loan</button></a>
<a href="personal-loan.php"><button type="button" class="btn btn-danger">Personal Loan</button></a>
</nav>



<!-- Data table start -->
<div class="row">


<nav>
        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
			
			 <!-- /.border -->
			<div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
				 <!-- /.-->	
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Housing Loan Details
                        </div>
						 <a href="housing-loan.php" class="pull-right"><span class="glyphicon glyphicon-refresh" style="height:20px;"></span></a>
						   
                        <form action="" method="POST">
                        <h3 class="col-md-11">Please input the following credentials.</h3>
                        <div class="row" style="padding-left:14px;">
                                    <div class="col-md-12">
                                    <div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">Personal Loan id:</span>
										<input type="text" class="form-control" placeholder="Enter Personal Loan id" name="get_carid" required>
										</div>   
										
										
                                       <button type="submit" name="search" style="margin-top:10px;" class="btn btn-primary">Search</button>
									      <a href="personal-loan.php">Refresh</a>
                                    </form>
                                
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
							
                             <?php 
                                $conn  = mysqli_connect("localhost", "root", "" , "bank");
                                if(isset($_POST['get_carid'])){
                                
                                    $carid = $_POST['get_carid'];
                                   
                                    $query = "SELECT * FROM personal_loan WHERE id= '$carid' ";
                                    $query_num = mysqli_query($conn, $query);
                                
                                ?>
                          <br>
						  
							<div style="padding-left:14px;" class='table-responsive'> <div style="overflow-x:auto;">
                          <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                              
                                 <th scope="col">Car Loan Id</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Birthdate</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email</th>
								<th scope="col">Type of Id</th>
								<th scope="col">Id No#</th>
								<th scope="col">Home Address</th>
								<th scope="col">Property Owned Ship</th>
								<th scope="col">Marital Status</th>
								<th scope="col">Place of Work</th>
								<th scope="col">Job Title</th>
								<th scope="col">Years_of Employeed</th>
								<th scope="col">Monthly Income</th>
								<th scope="col">Bank Name</th>
								<th scope="col">Branch</th>
								<th scope="col">Account Number</th>
								<th scope="col">Purpose of Loan</th>
								<th scope="col">Terms</th>
								<th scope="col">Guarantor Name	</th>
								<th scope="col">Relation</th>
								<th scope="col">Guarantor Place of Work	</th>
								<th scope="col">Work Address</th>
								<th scope="col">Guarantor Income	</th>
								<th scope="col">Guarantor id Type		</th>
								<th scope="col">Guarantor id Number	</th>
								<th scope="col">Guarantor Phone Number	</th>
								<th scope="col">Date of Loan	</th>
								 <th class="text-center" style="width: 100px;">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  if(mysqli_num_rows($query_num) > 0){
                                    while($row = mysqli_fetch_array($query_num)){
                                   
                                ?>
                                <tr class="table-active">
                               
                                  <td><?php echo $row['id']?></td>
                                <td><?php echo $row['fullname']?></td>
                                <td><?php echo $row['birthdate']?></td>
                                <td><?php echo $row['phone_no']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['type_of_id']?></td>
                                <td><?php echo $row['id_no']?></td>
                                <td><?php echo $row['home_address']?></td>
                                <td><?php echo $row['property_owned_ship']?></td>
                                <td><?php echo $row['marital_status']?></td>
                                <td><?php echo $row['place_of_work']?></td>
                                <td><?php echo $row['job_title']?></td>
                                <td><?php echo $row['years_of_employeed']?></td>
                                <td><?php echo $row['monthly_income']?></td>
                                <td><?php echo $row['bank_name']?></td>
                                <td><?php echo $row['branch']?></td>
                                <td><?php echo $row['account_number']?></td>
                                <td><?php echo $row['purpose_of_loan']?></td>
                                <td><?php echo $row['terms']?></td>
                                <td><?php echo $row['guarantor_name']?></td>
                                <td><?php echo $row['relation']?></td>
                                <td><?php echo $row['guarantor_place_of_work']?></td>
                                <td><?php echo $row['work_address']?></td>
                                <td><?php echo $row['guarantor_income']?></td>
                                <td><?php echo $row['guarantor_id_type']?></td>
                                <td><?php echo $row['guarantor_id_number']?></td>
                                <td><?php echo $row['guarantor_phone_number']?></td>
                                <td><?php echo $row['date_of_loan']?></td>
                             <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a>
						
						<a href="edit_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="View">
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
						
                        <a href="delete_visitor.php?visitor_id=<?php echo (int)$a_visitor['visitor_id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                      </div>
                    </td>

                                </tr>
                                <?php
                                    }
                                    }
                                else{
                                   ?>
                                   <tr>
                                  <td class="text-center" colspan="23">No record has found..</td>
                                   </tr>
                                   <?php
                                }
                                ?>
                                </tbody>
                            </table>
                   </div>
                   <?php 
                
                
                }?>
				</nav>


<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Personal Details</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Id</th>
                <th>Fullname</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Action</th>
              
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_personal_loan as $loan):?>
                <tr>
                    <td><?php echo remove_junk(ucfirst($loan['id'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($loan['fullname'])); ?></td>
					 <td><?php echo remove_junk(ucfirst($loan['phone_no'])); ?></td>
					  <td><?php echo remove_junk(ucfirst($loan['email'])); ?></td>
					   
                    <td class="text-center">
                      <a href="edit_visitor.php?id=<?php echo $loan['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>
                           
                      <a href="delete_visitor.php?id=<?php echo $loan['id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
<!-- End of Data table  -->


<?php include_once('layouts/footer.php'); ?>
