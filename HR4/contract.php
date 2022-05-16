<?php
  $page_title = 'Contract';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Contract</a>
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

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
       
      </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT hr1files.*, employees.* FROM hr1files JOIN employees ON hr1files.req_id =";
			$query .= " employees.employee_id ";
            $res = $db->query($query);
			$row = $res->fetch_assoc();
			$num = $res->num_rows;
            ?>
            <thead>
              <tr>
                
                <th>Employee ID</th>
				<th>Name</th>
                <th>Contract Title</th>
				<th>Description</th>
                <th>Prepare By</th>
                <th>Date Created</th>
                
                
     
                
             </tr>
            </thead>
           <tbody>
            <?php
            if($num > 0 )
            {
           do{
            
            ?>
             <tr>
            
            <td><?php echo $row['employee_id']; ?></td>
            <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['Body']; ?></td>
            <td><?php echo $row['preparedby']; ?></td>
            <td><?php echo $row['date_created']; ?></td>
           
  
             </tr>
              <?php
              
              }while($row = $res->fetch_assoc());
			}else {
              echo "";
              }
              ?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

