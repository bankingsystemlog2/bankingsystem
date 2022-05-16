<?php
  require_once('includes/load.php');
  $page_title = 'Change Pass';
  require_once('includes/activitylog.inc.php');
  
  $pkey = $_GET['key'];
 
  
  $sql = "SELECT employee_id FROM pass_key WHERE pkey ='$pkey'";
  $res = $db->query($sql);
  $num = $res->num_rows;
  
  
?>




<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
  <!-- All Bootstrap Links -->
      <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
      <link rel="stylesheet" href="libs/css/dataTables.bootstrap5.min.css" />
      <link rel="stylesheet" href="libs/css/style.css" />
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

  <!-- End of Links -->

  </head>
  <body>
 



  <main class="mt-5 pt-3">
  <div class="container-fluid">
  <div class="page">
      
      <?php if($num>0){ ?>
      
  </div>
      <div class="container containerLog">
      <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
      <div class="wrapper wrapperLog">
        <div class="title"><h5>Input New Password</h5> </div>
        <form class="clearfix" method="POST" action="updt_pass.php">
          <div class="row">
            <i class="bi bi-people"></i>
            <input type="password" id="password" class="form-control" name="pass" placeholder="New Password" required>
            </div>
           
          </br>
           <div class="row">
            <i class="bi bi-people"></i>
            <input type="hidden" value="<?php echo $pkey ?>" name="key">
            <input type="password" id="password1" class="form-control" name="pass1" placeholder="Confirm Password" required>
          
            
          </div>
           <input type="checkbox" onclick="show()" > show password 
    
          
         
          <div class="row button">
            <button type="submit" name="submit" style="border-radius:0%">Update Password</button>
          </div>
          
           
           
          
          
          <div class="signup-link"><a href="index.php"><i class="bi bi-arrow-left"></i>Back</a></div>
          <div class="signup-link">All rights reserved. <a href="#">OBMS</a></div>
        </form>
      </div>
  </div>
      
      
      <?php }else{ ?>
      
      <center><h3>WRONG KEY</h3></center>
      
      <?php } ?>

</div>
</div>
</main>
    <!-- All Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="./libs/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./libs/js/jquery-3.5.1.js"></script>
    <script src="./libs/js/jquery.dataTables.min.js"></script>
    <script src="./libs/js/dataTables.bootstrap5.min.js"></script>
    <script src="libs/js/script.js"></script>
     <script type="text/javascript">


        function show(){ 
         var x = document.getElementById("password");
         var y = document.getElementById("password1");
        if (x.type === "password" && y.type === "password") {
         x.type = "text";
         y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}



</script>
    
   <!-- End of Script Links -->

  </body>
</html>