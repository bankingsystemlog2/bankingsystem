<?php
  $page_title = 'Admin Home Page';
  require_once('../includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(4);
?>
<?php
 $c_user = count_by_id('users');

?>
<?php include_once('../layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    <a href="users.php" style="color:black;">
		<div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-secondary1">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">Users</p>
        </div>
       </div>
    </div>
	</a>


<?php include_once('../layouts/footer.php'); ?>
