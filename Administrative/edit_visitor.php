<?php
  $page_title = 'Edit Visitor Information';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>

<style>
#wrapper{
	background-color: white;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding-left: 2%;
	padding-right: 2%;
	padding-bottom: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
#ulo{
	font-size: 20px;
	background-color: #d6d6d6;
}
td{
	height: 50px;
}
@media print{
	#button{
		display: none; !important;
	}
	.breadcrumbs{
		display: none; !important;
	}
	.card-header{
		display: none; !important;
	}
	
	.card-header{
		display: none; !important;
	}
	a.nav-link, a.navbar-brand{
		display: none; !important;
	}
}table-responsive
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

 
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Information</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <?php
  require_once('includes/config1.php');
  $resignid = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT * FROM visitor_registration WHERE id = {$resignid}");
  $row = mysqli_fetch_array($query);
  ?>



<?php include_once('layouts/footer.php'); ?>



      <div class="card-body">




     
  
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px; border: black solid 1px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Edit Visitor Information</h2>
             <form action="edit-visitor.php" method="POST">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="" value="<?php echo $row['id']; ?>" class="form-control" disabled>
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control">
                        <label class="form-label" for="form6Example1">Visitor Id</label>
                      </div>
                    </div>
					
					<div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                         <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" class="form-control ">
                        <label class="form-label" for="form6Example2">Last name</label>
                      </div>
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                       <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control">
                        <label class="form-label" for="form6Example1">First name</label>
                      </div>
                    </div>
					
					<div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                       <input type="text" name="middle_name" value="<?php echo $row['middle_name']; ?>" class="form-control">
                        <label class="form-label" for="form6Example2">Middle name</label>
                      </div>
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                                        <input type="text" name="department" value="<?php echo $row['department']; ?>" class="form-control">
                        <label class="form-label" for="form6Example1">Department</label>
                      </div>
                    </div>
					
					<div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                          <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control">
                        <label class="form-label" for="form6Example2">Address</label>
                      </div>
                    </div>
                  </div>
				  
				   <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
                        <label class="form-label" for="form6Example1">Email</label>
                      </div>
                    </div>
					
					<div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                         <input type="number" name="contact" value="<?php echo $row['contact']; ?>" class="form-control">
                        <label class="form-label" for="form6Example2">Contact</label>
                      </div>
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                       <input type="text" name="gender" value="<?php echo $row['gender']; ?>" class="form-control">
                        <label class="form-label" for="form6Example1">Gender</label>
                      </div>
                    </div>
					
					<div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
						<input type="text" name="visitor_type" value="<?php echo $row['visitor_type']; ?>" class="form-control">
                        <label class="form-label" for="form6Example2">Visitor Type</label>
                      </div>
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                         <input type="text" name="visitor_type" value="<?php echo $row['visitor_type']; ?>" class="form-control">
                        <label class="form-label" for="form6Example1">Visitor Purpose</label>
                      </div>
                    </div>
					
                <div class="d-flex justify-content-center">
                  <button type="submit" name="updtplanbtn" style="margin-right: 5px;" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Save</button>
                  <button onclick="print()" id="button" class="btn btn-warning btn-xs-block">Print</button>
                </div>
				</center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
</section>