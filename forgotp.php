<?php
ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);
  }
  
  
  
?>
<?php include_once('layouts/header.php'); ?>

<div class="container containerLog">
      <?php echo display_msg($msg); ?>
      <div class="wrapper wrapperLog">
        <div class="title"><h5>Request Change Password Link</h5> </div>
        <form class="clearfix" method="post" action="forgot_pass.php">
          <div class="row">
            <i class="bi bi-people"></i>
            <input type="text" class="form-control" name="employee_id" placeholder="Employee ID" required>
          </div>
          <div class="row">
            <i class="bi bi-building"></i>
            <select name="department" class="text-center" placeholder="Department"  required>
                <option value="HR1">HR1</option>
                <option value="HR2">HR2</option>
                <option value="HR3">HR3</option>
                <option value="HR4">HR4</option>
                <option value="Administrative">Administrative</option>
                <option value="Financials">Financials</option>
                <option value="Core1">Core1</option>
                <option value="Core2">Core2</option>
                <option value="Logistic1">Logistic1</option>
                <option value="Logistic2">Logistic2</option>
                </select>
          </div>
          <div class="row">
            <i class="bi bi-file-post"></i>
            <input type="text" name= "reason" class="form-control" placeholder="Reason" required>
          </div>
         
          <div class="row button">
            <button type="submit" name='fp' style="border-radius:0%">Submit Request</button>
          </div>
          <div class="signup-link"><a href="index.php"><i class="bi bi-arrow-left"></i>Back</a></div>
          <div class="signup-link">All rights reserved. <a href="#">AABank</a></div>
        </form>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
