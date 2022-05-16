<?php
	$page_title = 'Visitor Policy';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_visitorpolicy = find_all('visitorpolicy')
?>





<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('policy','description');
   
   validate_fields($req_field);
	
	$vis_policy = remove_junk($db->escape($_POST['visitor-policy']));
	$vis_description = remove_junk($db->escape($_POST['visitor-description']));
	
	
   if(empty($errors)){
      $sql  = "INSERT INTO visitorpolicy ( policy, description)";
	 $sql .= " VALUES ('{$vis_policy}','{$vis_description}')";
      
	 
      if($db->query($sql)){
        $session->msg("s", "Successfully Added New Policy");
        redirect('visitorpolicy.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('visitorpolicy.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('visitorpolicy.php',false);
   }
 }
?>
<!-- add visitor function ---------------------------------------------------------------------------------------------------------------------------------------- -->

<?php include_once('layouts/header.php'); ?>



<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="visitorpolicy-admin staff.php" class="breadcrumbs__item is-active">Visitor Policy</a>
</nav>
<!-- /Breadcrumb -->

 
 <br>   
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
  
  <?php endif; ?>
  
		<a href="regulation-admin staff.php"><button type="button" class="btn btn-primary">Rules and Regulation</button></a> 
		<a href="visitorpolicy.php"><button type="button" class="btn btn-light">Visitor Policy</button></a> 
		<a href="#"><button type="button" class="btn btn-light">Facility Policy</button></a>

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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Rules and Regulation</span>
		
		<div class="text-end">
        <!--  <a href="register_visitor.php" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Create regulations</a>-->
		  

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
				
                <th>Policy</th>
                <th>Description</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_visitorpolicy as $policy):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($policy['id'])); ?></td>
                    
          
					    <td><?php echo remove_junk(ucfirst($policy['policy'])); ?></td>
						
						  <td><?php echo remove_junk(ucfirst($policy['description'])); ?></td>   
                    <td class="text-center">
                      <div class="btn-group">
                      
                      <a href="delete_contractrequest.php?id=<?php echo $policy['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  

  
  <!-- add policy-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
	
         <h5 class="modal-title" id="exampleModalLabel">Add Visitor Policy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="visitorpolicy.php">
          <div class="form-group">
                
				<div class="form-group">
                    <label for="ra_no">Title of Policy</label>
				<input type="number_format" class="form-control" name="visitor-policy" placeholder="Policy." required>
				</div>
				
				<div class="form-group">
                    <label for="Description">Description</label>
				<input type="text" class="form-control" name="visitor-description" placeholder="Description" required>
				</div>
				

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
