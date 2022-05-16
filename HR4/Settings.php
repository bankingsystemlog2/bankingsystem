<?php
  $page_title = 'My profile';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
<label for="btn-toggle background"><p>Change background:</p></label>
<button class="btn-toggle background">Dark-Mode</button>

<?php include_once('layouts/footer.php'); ?>
