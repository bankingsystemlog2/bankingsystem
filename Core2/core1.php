<?php
  $page_title = 'Contracts';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_request_contract = find_contract_request();
?>

<!-- add contract function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('req_id ','req_class  ', 'fname ' , 'mname' , 'lname  ' , 'type_of_contract' , 'department');
   
   validate_fields($req_field);
  
  $vis_req_id = remove_junk($db->escape($_POST['visitor-req_id']));
  $vis_req_class = remove_junk($db->escape($_POST['visitor-req_class']));
  $vis_fname = remove_junk($db->escape($_POST['visitor-fname']));
  $vis_mname = remove_junk($db->escape($_POST['visitor-mname']));
  $vis_lname = remove_junk($db->escape($_POST['visitor-lname']));
  $vis_type_of_contract = remove_junk($db->escape($_POST['visitor-type_of_contract']));
  $vis_department = remove_junk($db->escape($_POST['visitor-department']));
  
 
  
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO request_contract ( req_id, req_class, fname, mname, lname, type_of_contract, department)";
   $sql .= " VALUES ('{$vis_req_id}','{$vis_req_class}','{$vis_fname}','{$vis_mname}','{$vis_lname}',' {$vis_type_of_contract}','{$vis_department}')";
      
   
      if($db->query($sql)){
       $_SESSION['status'] =  "Request Contract is Added";
            $_SESSION['status_code'] =  "success";
        redirect('core1.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('core1.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('core1.php',false);
   }
 }
?>
<!-- add contract function ---------------------------------------------------------------------------------------------------------------------------------------- -->





<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a class="breadcrumbs__item is-active">List of Request</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>
<br>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
   
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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Department Contract Request </span>
         <div class="text-end">
          <a href="register_visitor.php" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal"> Request Contract</a>
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
          <th>Request Id</th>
        <th>Class</th>
                <th>Name of requestor</th>
        <th>Department</th>
                <th>Type of Contract</th>
                <th>Date of Request</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_request_contract as $visitor):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitor['req_id'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['req_class'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['fname'].' '.$visitor['mname'].' '.$visitor['lname'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['department'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['type_of_contract'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['date_of_request'])); ?></td>
              
                
                
                    <td class="text-center">
          
          
          <?php if($visitor['req_class']=='employee' || $visitor['req_class']=='Employee'){

          switch($visitor['department']){
            case 'HR1' : ?>
          
                      <div class="btn-group">
                      <a href="delete_contractrequest.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
            </div>
          
          
          <?php
          break;
          case 'CORE1': ?>
           <div class="btn-group">
                     
                      

                      <a href="delete_contractrequest.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
            </div>
          
          <?php
          break;
          }
          }else{?>  

          

          <?php } ?>          
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
  
        <h5 class="badge rounded-pill bg-success" class="modal-title" id="exampleModalLabel">Request Contract</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="core1.php">
          <div class="form-group">
                
        
        <input type="text" class="form-control" name="visitor-req_class" placeholder="req class" required><br>
        <input type="text" class="form-control" name="visitor-fname" placeholder="Firstname" required><br>
        <input type="text" class="form-control" name="visitor-mname" placeholder="Middlename" required><br>
        <input type="text" class="form-control" name="visitor-lname" placeholder="Lastname" required><br>
        <input type="email" class="form-control" name="visitor-email" placeholder="Email" required><br>
        <input type="number" class="form-control" name="visitor-type_of_contract" placeholder="Type of Contract" required><br>
        <input type="text" class="form-control" name="visitor-department" placeholder="Department" required><br>
       
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
