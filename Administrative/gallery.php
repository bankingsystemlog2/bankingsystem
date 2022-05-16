<!DOCTYPE html>
<html lang="en">
<head>
<style>
	.container{
		display: flex;
		width:calc(100%);
		flex-wrap: wrap;
	}
	.container img{
	    width: calc(25%);
	    height: 25vw;
	    object-fit: contain;
	    background: gray;
	    border: 1px solid black;
	    margin: 2px;
	}
</style>
</head>

<?php
  $page_title = 'Facility Available';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_facility = find_all('facility')

?>



<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List of avaible facility</a>
  
</nav>
<!-- /Breadcrumb -->
<br>

<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
  

  <a href="facilityavailable.php"><button type="button" class="btn btn-light">Facility Available</button></a> 
<a href="facilityapprove.php"><button type="button" class="btn btn-info">Request Approve</button></a>
<a href="facility-pending-request.php"><button type="button" class="btn btn-success">Facility Pending Request</button></a>
<a href="facility-complain.php"><button type="button" class="btn btn-danger">Facility Complaints</button></a>

</nav>
<br>
<nav class="breadcrumbs">
<a href="facility-pending-request.php"><button type="button" class="btn btn-success">Gallery</button></a>
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
	  
	  <body>
	
	<h2><strong>Uploaded Images:</strong></h2>
	<div class="container">
	<br>
	<?php
		include('conn.php');
		$query=mysqli_query($con,"select * from image_tb");
		if(mysqli_num_rows($query) > 0){
			while($row=mysqli_fetch_array($query)){
				?>
					<img src="<?php echo $row['img_location']; ?>">
				<?php
			}
		}else{
			echo "<p><strong>No Images uploaded yet.</strong></p>";
		}
		
		
	?>
	</div>
	
	
	
	<div>
	<form method="POST" action="upload.php" enctype="multipart/form-data">
	<label>Image:</label><input type="file" name="image" accept="image/*">
	<button type="submit">Upload</button>
	</form>
	</div>
</body>
        
  </div>
<!-- End of Data table  -->


<?php include_once('layouts/footer.php'); ?>
