<?php
  $page_title = 'Subject';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->

<nav class="breadcrumbs">
  
    <a href="hr_exams.php" class="breadcrumbs__item">HR</a>
   <a href="#" class="breadcrumbs__item">Financials</a>
  <a href="#" class="breadcrumbs__item">Core</a>
  <a href="#" class="breadcrumbs__item">Administrative</a>
  <a href="#" class="breadcrumbs__item">Logistics</a>
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
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                        <th>Subject ID</th>
                        <th>Subject Name</th>
                        <th class="text-right">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
                    $att_list = "SELECT * FROM mst_subject";
                    $att_list_run = mysqli_query($conn, $att_list);
                    
                    if(mysqli_num_rows($att_list_run) > 0 )
                    {
                    while($row = mysqli_fetch_assoc($att_list_run))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['sub_id']; ?></td>
                        <td><?php echo $row['sub_name']; ?></td>
                        <td>
                            <a href="edit-subject.php?id=<?php echo $row['sub_id']; ?>" class="btn btn-sm btn-success pull-right">Edit</a>
                            <a href="delete-subject.php?id=<?php echo $row['sub_id']; ?>" class="btn btn-sm btn-danger pull-right">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    }
                    else {
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

