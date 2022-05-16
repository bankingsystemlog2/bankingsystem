<?php
	$page_title = 'Visitor Information';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_com_announcement = find_all('com_announcement')
?>





<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('title','description');
   
   validate_fields($req_field);
	
	$vis_title = remove_junk($db->escape($_POST['visitor-title']));
	$vis_description = remove_junk($db->escape($_POST['visitor-description']));
	
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO com_announcement ( title, description)";
	 $sql .= " VALUES ('{$vis_title}','{$vis_description}')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Announcement";
        $_SESSION['status_code'] =  "success";
        redirect('create-anouncement.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('create-anouncement.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('create-anouncement.php',false);
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
  <a href="create-announcement.php" class="breadcrumbs__item is-active">List of Announcement</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>

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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Announcement Table</span>
		
		<div class="text-end">
          <a  class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Announcement</a>
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
				
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>

                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_com_announcement as $visitor):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitor['id'])); ?></td>
                    
        
					    <td><?php echo remove_junk(ucfirst($visitor['title'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($visitor['description'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($visitor['date'])); ?></td>    
                    <td class="text-center">
                      <div class="btn-group">
                      <a href="edit_announcement.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>
                           
                      <a href="delete_announcement.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  
  
  
  <!-- add visitor-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	
        <h5 class="badge rounded-pill bg-success" class="modal-title" id="exampleModalLabel">Create Announcement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="create-anouncement.php">
          <div class="form-group">
                
				<input type="text" class="form-control" name="visitor-title" placeholder="Name of Announcement" required><br>
				<input type="text" class="form-control" name="visitor-description" placeholder="Description" required><br>
				
				
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
