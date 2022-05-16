<?php
  $page_title = 'Equipment';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   
?>



<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Equipment</a>
</nav>
<!-- /Breadcrumb -->
<br>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="equipment-available.php"><button type="button" class="btn btn-light" id="defaultOpen">Equipment Available</button></a> 
<a href="equipment-approve.php"><button type="button" class="btn btn-info">Request Approve</button></a>
<a href="equipment-pending-request.php"><button type="button" class="btn btn-success">Equipment Pending Request</button></a>
<a href="equipment-complain.php"><button type="button" class="btn btn-danger">Equipment Complaints</button></a>
</nav>

<!-- /Breadcrumb -->



<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<?php include_once('layouts/footer.php'); ?>
