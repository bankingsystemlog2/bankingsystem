<?php
  $page_title = 'HR exams';
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
    <a href="hr_exams.php" class="breadcrumbs__item " active>Human resource</a>
   <a href="finance_exams.php" class="breadcrumbs__item">Financials</a>
  <a href="core_exams.php" class="breadcrumbs__item">Core</a>
  <a href="admin_exams.php" class="breadcrumbs__item ">Administrative</a>
  <a href="log_exams.php" class="breadcrumbs__item">Logistics</a>
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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Human resource Exam Questionaires and Answer Keys</span>
        <div class="text-end">
          <a href="add-question.php?page=hr_exams.php" class="btn btn-primary btn-xs-block">
         <i class="bi bi-plus"></i>
          Add Question
         </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                        <th>Question ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Position</th>
                        <th class="text-right" style="width:12%">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
                    $att_list = "SELECT * FROM questionaires WHERE department = 'hr'";
                    $att_list_run = mysqli_query($conn, $att_list);
                    
                    if(mysqli_num_rows($att_list_run) > 0 )
                    {
                    while($row = mysqli_fetch_assoc($att_list_run))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['question']; ?></td>
                        <td><?php echo $row['answer']; ?></td>
                        <td><?php echo $row['position']; ?></td>
                        <td>
                            <a href="edit_question.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success pull-right">Edit</a>
                            <a href="delete-question.php?id=<?php echo $row['id']; ?>&page=hr_exams.php" class="btn btn-sm btn-danger pull-right">Delete</a>
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

