
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
  $page_title = 'Housing Loan';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
 $all_mortgages = find_all('mortgages')
?>
<?php include_once('layouts/header.php'); 
?>
<style>
body{
	background: url(assets/img/slide/banko.png) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
.page-wrapper1{
	margin-top: 110px;
}
</style>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<style>
.btn {
  background-color: #2B547E;
  border: none;
  color: white;
  padding: 8px 10px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color:skyblue;
}


div.scrollmenu {
 
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}
  






</style>
</head>
<body>

<div id="wrapper">

  <div class="navbar">
<a href="housing-loan.php"><button class="btn"><i class="fa fa-home"></i> Housing Loan</button></a>
<a href="car-loan.php"><button class="btn"><i class="fa fa-car"></i> Car Loan</button></a>
<a href="student-loan.php"><button class="btn"><i class="fa fa-module"></i> Student Loan</button></a>
<a href="credit-card.php"><button class="btn"><i class="fa fa-close"></i> Credit Card</button></a>
<a href="personal-loan.php"><button class="btn"><i class="fa fa-delf"></i> Personal Loan</button></a>
</div>

        <nav>
        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
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
										<span class="input-group-text" id="basic-addon1">Housing Id:</span>
										<input type="text" class="form-control" placeholder="Housing Loan id" name="get_housingid" required>
										</div>   
										
										<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">Firstname:</span>
										<input type="text" class="form-control" placeholder="Enter Firstname" name="get_firstname" required>
										</div>
                                       <button type="submit" name="search" style="margin-top:10px;" class="btn btn-primary">Search</button>
									   <a href="housing-loan.php">Refresh</a>
                                    </form>
                                
                                </div>
                            </div>
                            <?php 
                                $conn  = mysqli_connect("localhost", "root", "" , "bank");
                                if(isset($_POST['get_housingid']) && isset($_POST['get_firstname'])){
                                
                                    $housingid = $_POST['get_housingid'];
                                    $firstname = $_POST['get_firstname'];
                                    $query = "SELECT * FROM mortgages WHERE id= '$housingid' AND fname= '$firstname' ";
                                    $query_num = mysqli_query($conn, $query);
                                
                                ?>
                          <br><div style="padding-left:14px;" class='table-responsive'> <div style="overflow-x:auto;">
                          <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                              
                                <th scope="col">Housing Loan Id</th>
                                <th scope="col">Loan Amount</th>
                                <th scope="col">Loan Term</th>
                                <th scope="col">Property Address</th>
                                <th scope="col">Property Type</th>
								<th scope="col">First Name</th>
								<th scope="col">Middle Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Sex</th>
								<th scope="col">Civil Status</th>
								<th scope="col">Home Address</th>
								<th scope="col">Permanent Address</th>
								<th scope="col">Date of Birth</th>
								<th scope="col">Place of Birth</th>
								<th scope="col">Mobile Number</th>
								<th scope="col">Email Address</th>
								<th scope="col">Tin/Sss/Gsis no#</th>
								<th scope="col">Source of Income</th>
								<th scope="col">Monthly Income</th>
								<th scope="col">Employeer Name</th>
								<th scope="col">Position</th>
								<th scope="col">Date of Loan</th>
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
                                <td><?php echo $row['loan_amount']?></td>
                                <td><?php echo $row['loan_terms']?></td>
                                <td><?php echo $row['property_address']?></td>
                                <td><?php echo $row['property_type']?></td>
                                <td><?php echo $row['fname']?></td>
                                <td><?php echo $row['mname']?></td>
                                <td><?php echo $row['lname']?></td>
                                <td><?php echo $row['sex']?></td>
                                <td><?php echo $row['civil_status']?></td>
                                <td><?php echo $row['home_address']?></td>
                                <td><?php echo $row['perma_address']?></td>
                                <td><?php echo $row['date_0f_birth']?></td>
                                <td><?php echo $row['place_of_birth']?></td>
                                <td><?php echo $row['mobile_no']?></td>
                                <td><?php echo $row['email_address']?></td>
                                <td><?php echo $row['tin_sss_gsis_no']?></td>
                                <td><?php echo $row['source_of_income']?></td>
                                <td><?php echo $row['monthly_income']?></td>
                                <td><?php echo $row['employeer_name']?></td>
                                <td><?php echo $row['position']?></td>
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


 <nav>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>House Loan Information</span>
       </strong>
 </div>
		 
    
	   <div class="panel-body">
			<div class="scrollmenu">
				<table class="table table-bordered table-striped table-hover">
					<table id="datatablesSimple" class="table-striped table-bordered table-hover" style="width:100%">
					
						<thead>
							<tr>
								<th class="text-center" style="width: 50px;">House Loan Id</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
							</tr>	
						</thead>
						
						<tbody>			
								
							
			<?php foreach ($all_mortgages as $loan):?>
						<tr>
						<td><?php echo remove_junk(ucfirst($loan['id'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($loan['fname'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($loan['mname'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($loan['lname'])); ?></td>
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
																</nav>


						
              

																		



 
 
 
 
 
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="dist/js/datatables-simple-demo.js"></script>



<?php include_once('layouts/footer.php'); ?>
</body>
</html>																		
	

	  


		 
						   
                  
					 
					  
							 
							 
            
			

              
																	
							 


                   
                    
					
    










