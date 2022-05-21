<?php
  require_once('includes/load.php');

 
  









$sql = " SELECT * FROM product";
$result = $db->query($sql);
$sup = $result->fetch_assoc();
$row = $result->num_rows;







  
  ?>

<!DOCTYPE html>
<html lang="en">
  <!-- <style> body{background-image: url('uploads/supback.jpg');
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: cover;
  }</style> -->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Banking and Finance - Job Posting page</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
      
       <nav class="navbar navbar-expand-lg navbar-light bg-primary static-top">
  <div class="container">
    <a class="navbar-brand text-white" href="index.php">
      Banking and Finance
    </a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    


  </div>
</nav>




<div class="container" >
  <div class="row">
    <div class="col-xl-12 mt-3 ">
      
   </div>
 <div class="col-md-5 mt-2 mb-2" style="margin: auto;">
<?php echo display_msg($msg);  ?>
</div>
<?php if($row>0){   
    do{
?>


       <div class="col-xl-11 mx-auto mt-3 mb-5 rounded-3 " style="border-left: 5px solid #0076Be;">

              
            <div class="col-xl-11 mt-2 mx-auto text-primary">
             <h3><?php echo ucfirst($sup['product_name']) ; ?></h3> 
           </div>
           <div class="col-xl-11 mx-auto mt-4">
            <h5>Item Description</h5>
           </div>
           <div class="col-xl-11 mx-auto mt-2">
            <h5><?php echo $sup['product_description'] ; ?></h5>
           </div>
           <div class="col-xl-11 mx-auto mt-4">
           <div class="col-xl-11 mx-auto mt-4 mb-3" >
             <form  method="POST" action="../vendor_form_portal.php">
             <div class="form-group">
              <input type="hidden" class="form-control" name = "product_id" value = <?php echo $sup['product_id']; ?>>
              <input type="hidden" class="form-control" name = "product_name" value = <?php echo $sup['product_name']; ?>>
              <button type="submit" class="col-sm-3 btn btn-success btn-sm " >Apply</button>
            </div>
          </form>
            
           </div>
                 
              

            </div> 


 </div>
          <?php }while($sup = $result->fetch_assoc());  ?>

</div>



       <?php   }else{ ?>



            <div class="col-md-12 mb-5 mt-5 text-center">
      <h4>No jobs found</h4>
    </div>

<?php } ?>


 </body>
        
    </html>
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       
        
    




      

 














           