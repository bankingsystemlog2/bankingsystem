<?php
  $page_title = 'Edit Announcement';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
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

  $query = mysqli_query($conn, "SELECT * FROM blacklist_person WHERE id = {$resignid}");
  $row = mysqli_fetch_array($query);
  ?>

      <div class="card-body">
	  <section class="vh-100 bg-image"
  
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
			
              <h2 class="text-uppercase text-center mb-5">Edit Visitor Information</h2>

             <form action="edit-blacklisted.php" method="POST">
			
                <div class="form-outline mb-4">
				
				
                  <input type="text" name="" value="<?php echo $row['id']; ?>" class="form-control" disabled>
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control">
                  <label class="form-label" for="form3Example1cg">Blacklisted Id</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="form-control ">
                  <label class="form-label" for="form3Example3cg">FIRSTNAME</label>
                </div>

                <div class="form-outline mb-4">
               <input type="text" name="mname" value="<?php echo $row['mname']; ?>" class="form-control">
                  <label class="form-label" for="form3Example4cg">FIRSTNAME</label>
                </div>

                <div class="form-outline mb-4">
                 <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="form-control">
                  <label class="form-label" for="form3Example4cdg">LASTNAME</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="text" name="contact_no" value="<?php echo $row['contact_no']; ?>" class="form-control">
                  <label class="form-label" for="form3Example4cdg">CONTACT NUMBER</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="text" name="company_department" value="<?php echo $row['company_department']; ?>" class="form-control">
                  <label class="form-label" for="form3Example4cdg">DEPARTMENT</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="text" name="reason" value="<?php echo $row['reason']; ?>" class="form-control">
                  <label class="form-label" for="form3Example4cdg">REASON</label>
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
	  
	  
	  
	  
	  
	  
	  
	  
        <div class="row">
          <div class="col-lg-7">
            <div class="card-box">
              <form action="edit-blacklisted.php" method="POST">
			  
			  <div class="form-group row">
                  <label class="col-form-label col-md-4">Id</label>
                    <div class="col-md-8">
                <input type="text" name="" value="<?php echo $row['id']; ?>" class="form-control" disabled>
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control">
				 </div>
                  </div>
				<br>
				
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Firstname</label>
                    <div class="col-md-8">
                      <input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="form-control ">
                    </div>
                  </div>
				  
				  <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Middlename</label>
                    <div class="col-md-8">
                      <input type="text" name="mname" value="<?php echo $row['mname']; ?>" class="form-control">
                    </div>
                  </div>
				  
				  <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Lastname</label>
                    <div class="col-md-8">
                      <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="form-control">
                    </div>
                  </div>
				  
				  <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Contact Number</label>
                    <div class="col-md-8">
                      <input type="text" name="contact_no" value="<?php echo $row['contact_no']; ?>" class="form-control">
                    </div>
                  </div>
				  
				  <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Company Department</label>
                    <div class="col-md-8">
                      <input type="text" name="company_department" value="<?php echo $row['company_department']; ?>" class="form-control">
                    </div>
                  </div>
				  
				  <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Reason</label>
                    <div class="col-md-8">
                      <input type="text" name="reason" value="<?php echo $row['reason']; ?>" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="updtplanbtn" class="btn btn-primary text-white">Save</button>
                      <a href="visitor-blacklisted.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
