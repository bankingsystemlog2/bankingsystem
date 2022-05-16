<?php
  $page_title = 'Facility Available';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_facility = find_all('facility')
?>

<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('image', 'name_of_room', 'description','status');
	
   
   validate_fields($req_field);
	
	$vis_image = remove_junk($db->escape($_POST['visitor-image']));
	$vis_name_of_room = remove_junk($db->escape($_POST['visitor-name_of_room']));
	$vis_description = remove_junk($db->escape($_POST['visitor-description']));
	
	$vis_status = remove_junk($db->escape($_POST['visitor-status']));
	
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO facility ( image, name_of_room, description, status)";
	 $sql .= " VALUES ('{$vis_image}','{$vis_name_of_room}','{$vis_description}','{$vis_status}')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Facility";
        $_SESSION['status_code'] =  "success";
        redirect('facilityavailable.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('facilityavailable.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('facilityavailable.php',false);
   }
 }
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
<a href="facility-pending-request.php"><button type="button" class="btn btn-success">Facility Pending Request</button></a>
<a href="facility-complain.php"><button type="button" class="btn btn-danger">Facility Complaints</button></a>

</nav>
<br>
<nav class="breadcrumbs">
<a href="gallery.php"><button type="button" class="btn btn-success">Gallery</button></a>
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
		<div class="text-end">
          <a  class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add New Facility</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                 <th class="text-center" style="width: 50px;">Id</th>
					<th class="text-center">Room Image</th>
                    <th class="text-center">Name of Room</th>
                    <th class="text-center">Description</th>
                  
                    <th class="text-center">Status</th>
					<th class="text-center" style="width: 100px;">Actions</th>
                    
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_facility as $available):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
					<td class="text-center"  width="250px"><img src='<?php echo  $available['image'] ?>' class="img-responsive img-thumbnail" /></td>
                  <td class="text-center"><?php echo remove_junk(ucfirst($available['name_of_room']));?></td>
                  <td class="text-center"><?php echo remove_junk(ucfirst($available['description']));?></td>
                
					 <td><?php if($available['status'] == 'Available'){ ?>
            <span class="badge rounded-pill bg-success">
            <?php echo remove_junk(ucwords($available['status']))?></span>
            <?php }else{ ?>
            <span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($available['status'])); }?></span></td>
					
					

					
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_facility.php?id=<?php echo $available['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>      
                      <a href="delete_facilityavailable.php?id=<?php echo $available['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="bi bi-trash"></i></a>
                      <a href="view-facility.php?id=<?php echo $available['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
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

<!-- add visitor-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	
        <h5  class="modal-title" id="exampleModalLabel">Adding Facility</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="facilityavailable.php">
          <div class="form-group">
                
				
				<div>
				<h6>Select Facility</h6>
				<select  class="form-select"  aria-label="Default select example" name="visitor-image" required>
				<option value="">Select Image</option>
				</div>
				
				<?php
				$sql = "SELECT * FROM image_tb";
				$result = $db->query($sql);
				$image = $result->fetch_assoc();
				$row = $result->num_rows;
				if($row>0){ do{?>
				<option value="<?php echo $image['img_location']?>"><?php echo $image['img_location']?></option>
					
				<?php
				
				}while($image = $result->fetch_assoc());
					
				}
				
				
				?>
				
				</select><br>
				
				
				<div>
				<h6>Select Room</h6>
				<input type="text" class="form-control" name="visitor-name_of_room" placeholder="Input Facility Name" required><br>
				</div>
				
				<div>
				<h6>Name of Room</h6>
				<input type="text" class="form-control" name="visitor-description" placeholder="Input Description" required><br>
				</div>
				<div>
				
				<div>
				<h6>Select Status</h6>
				<select  class="form-select"  aria-label="Default select example"  name="visitor-status"><br>
				</div>
				
				<option value="">Select Status</option>
				<?php
				$sql = "SELECT * FROM facility_status";
				$result = $db->query($sql);
				$status = $result->fetch_assoc();
				$row = $result->num_rows;
				if($row>0){ do{?>
				<option value="<?php echo $status['title']?>"><?php echo $status['title']?></option>
					
				<?php
				
				}while($status = $result->fetch_assoc());
					
				}
				
				
				?>
				
				</select><br>
				
				
        </div>
		    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add_vis" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      </div>
     
    </div>
  </div>
</div>
<!-- End of Data table  -->


<?php include_once('layouts/footer.php'); ?>
