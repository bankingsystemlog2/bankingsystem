<?php
  $page_title = 'List of personal loan';
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
  <a href="#checkout" class="breadcrumbs__item is-active">List of personal loan</a>
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

  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Facility Available Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
								<th scope="col">Student Loan Id</th>
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

            <?php foreach ($all_personal_loan as $personal_loan):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                  <td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['fullname']));?></td>
                  <td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['birthdate']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['phone_no']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['email']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['type_of_id']));?></td>			
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['id_no']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['home_address']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['property_owned_ship']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['marital_status']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['place_of_work']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['job_title']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['years_of_employeed']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['monthly_income']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['bank_name']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['branch']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['account_number']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['purpose_of_loan']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['terms']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['guarantor_name']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['relation']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['guarantor_place_of_work']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['work_address']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['guarantor_income']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['guarantor_id_type']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['guarantor_id_number']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['guarantor_phone_number']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($personal_loan['date_of_loan']));?></td>
					
					
					
			
                               


					  
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_categorie.php?id=<?php echo (int)$complainant['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a>
                         <a href="delete_legal_complain.php?id=<?php echo (int)$complainant['id'];?>"   class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                      </div>
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
<!-- End of Data table  -->


<?php include_once('layouts/footer.php'); ?>
