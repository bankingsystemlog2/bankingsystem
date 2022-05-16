<?php
  $page_title = 'List of Complains';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_complain = find_all('complain')
?>



<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="housingloan.php" class="breadcrumbs__item is-active">Loans</a>
  
</nav>
<!-- /Breadcrumb -->


<br>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="housingloan.php"><button type="button" class="btn btn-light" id="defaultOpen">Housing Loan</button></a> 
<a href="carloan.php"><button type="button" class="btn btn-info">Car Loan</button></a>
<a href="facility-pending-request.php"><button type="button" class="btn btn-success">Business Loan</button></a>
<a href="personal-loan.php"><button type="button" class="btn btn-danger">Personal Loan</button></a>
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

  

  <script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<?php include_once('layouts/footer.php'); ?>
