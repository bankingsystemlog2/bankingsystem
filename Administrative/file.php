
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
 </head>
    
    <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
	
	<?php
  $page_title = 'Document management';
  require_once('includes/load.php');
  $users_id = current_user()['id'];
?>
<link rel="stylesheet" href="datatables.css">
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
 $groups = find_all('documents');
 $users_id = current_user()['id'];
// $result = find_vendor_by_id('audit',$users_id);
 $is_show = 1;
 $all_vendors = find_all('documents');
?>
<?php
  if(isset($_POST['applicationform'])){
    header('Content-Type: text/plain; charset=utf-8');

   $req_fields = array('title','section/department','prepared_by','date_from','date_to','body');
   validate_fields($req_fields);
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


   if(empty($errors)){
       $title   = remove_junk($db->escape($_POST['title']));
       $sectiondep   = remove_junk($db->escape($_POST['section/department']));
       $datecreated   =  date('Y-m-d');
       // remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_created']))));
       $prepared_by   = remove_junk($db->escape($_POST['prepared_by']));
       $datefrom   = remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_from']))));
       $dateto = remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_to']))));
       $body   = remove_junk($db->escape($_POST['body']));
        $query = "INSERT INTO documents (";
        $query .="title,sec_dep,date_created,preparedby,date_from,date_to,body,urlpath,status";
        $query .=") VALUES (";
        $query .="'{$title}', '{$sectiondep}', '{$datecreated}', '{$prepared_by}', '{$datefrom}', '{$dateto}', '{$body}','{$target_file}', '1'";
        $query .=")";


    
        if($db->query($query)){
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          $session->msg('s',"Data has been save! ");
          redirect('addDocument.php', false);
        } else {
         
          $session->msg('d',' Sorry Data not saved!');
          redirect('addDocument.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('addDocument.php',false);
   }
 }
?>

<?php include_once('layouts/header.php'); ?>


<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="housingloan.php" class="breadcrumbs__item is-active">Document Report</a>
   
</nav>
<!-- /Breadcrumb -->




    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>Employee Documents</h4>
                              
                                <div class="main-border-button">
                                    <a href="employeedocuments.php">open</a>
                                </div>
                            </div>
                            <img src="assets/images/employee.png" alt="">
                        </div>
                    </div>
                </div>
				
				
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>ClIENT INFORMATION</h4>
											<div class="main-border-button">
                                    <a href="#">open</a>
                                </div>
                                        </div>
                                        
                                        <img src="assets/images/client.jpg">
                                    </div>
                                </div>
                            </div>
							

                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>General Ledger</h4>
                                            <div class="main-border-button">
                                    <a href="Ledger.php">open</a>
                                </div>
                                        </div>
                                        
                                        <img src="assets/images/ledger.png">
                                    </div>
                                </div>
                            </div>
							
							
							
							
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Payroll Receipt</h4>
                                           <div class="main-border-button">
                                    <a href="#">open</a>
                                </div>
                                        </div>
                                        
                                        <img src="assets/images/payroll.png">
                                    </div>
                                </div>
                            </div>
							
							
							
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Assets Report</h4>
                                            <div class="main-border-button">
                                    <a href="#">open</a>
                                </div>
                                        </div>
                                        
                                        <img src="assets/images/assets.png">
                                    </div>
                                </div>
                            </div>
							
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

     
  
	
	
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>
 <?php include_once('layouts/footer.php'); ?>
