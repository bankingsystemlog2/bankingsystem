<?php
  ob_start();
  require_once('includes/log2load.php');
  $users_id = current_user()['id'];
  //if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>


<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Banking System";?>
    </title>
    <!-- <link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css?v=<?php echo time(); ?>">



    
    <!--from startbootstrap.com this is for Datatables...
    <link href="dist/css/styles.css" rel="stylesheet" />
    -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>


        
  </head>
  <body>
  <?php
   $product_id = $_GET['product_id'];
  if(isset($_POST['applicationform'])){
   
   $req_fields = array('name','address','company','email','item_description','offer','phone','category');
   validate_fields($req_fields);
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   if(empty($errors)){
      
       $name   = remove_junk($db->escape($_POST['name']));
       $address   = remove_junk($db->escape($_POST['address']));
       $company   = remove_junk($db->escape($_POST['company']));
       $email   = remove_junk($db->escape($_POST['email']));
       $item_description   = remove_junk($db->escape($_POST['item_description']));
       $offer   = remove_junk($db->escape($_POST['offer']));
       $phone   = remove_junk($db->escape($_POST['phone']));
       $category   = remove_junk($db->escape($_POST['category']));
        $query = "INSERT INTO vendors (";
        $query .="product_id,Name,Address,Company,Email,item_description,Offer,Phone,category,path_url,users_id";
        $query .=") VALUES (";
        $query .="'{$product_id}','{$name}', '{$address}', '{$company}', '{$email}', '{$item_description}', '{$offer}', '{$phone}', '{$category}', '{$target_file}', '{$users_id}'";
        $query .=")";


        
        if($db->query($query)){
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          $date = date('Y-m-d H:i:s');
          $queryy = "INSERT INTO docu_tracking (";
          $queryy .="Document_Sender,Action,Document_Subject,Location,Date_Created";
          $queryy .=") VALUES (";
          $queryy .="'{$users_id}','Add new Applicant $name', '{$target_file}', 'Vendor', '{$date}'";
          $queryy .=")";
          if($db->query($queryy)){
            $session->msg('s',"Application form sent! ");

              //end AuditLog Insert
            // redirect('landing_page.php', false);
            $message = "Application Sent!";
          }
        echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
         
          $session->msg('d',' Sorry Application form failed to send!');
          redirect('landing_page.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('landing_page.php',false);
   }
 }
?>
  <div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Vendor Application</span>
       </strong>
         
      </div>
     <div class="panel-body">
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                body {font-family: Arial;}

                /* Style the tab */
                .tab {
                    overflow: hidden;
                    border: 1px solid #ccc;
                    background-color: #f1f1f1;
                }

                /* Style the buttons inside the tab */
                .tab button {
                    background-color: inherit;
                    float: left;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 14px 16px;
                    transition: 0.3s;
                    font-size: 17px;
                }

                /* Change background color of buttons on hover */
                .tab button:hover {
                    background-color: #ddd;
                }

                /* Create an active/current tablink class */
                .tab button.active {
                    background-color: #ccc;
                }

                /* Style the tab content */
                .tabcontent {
                    display: none;
                    padding: 6px 12px;
                    border: 1px solid #ccc;
                    border-top: none;
                }
                /* Table Scroll */
                #ViewData{
                    overflow-x: auto;

                 }
            </style>
        </head>
        <body>
       <div id="ApplicationForm" class="panel-body">

            <form method="post" action="vendor_form_portal.php?product_id=1" enctype="multipart/form-data" autocomplete="off" > 
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="address" required>
                </div>
                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" class="form-control" name ="company"  placeholder="company" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name ="email"  placeholder="email" required>
                </div>
                <div class="form-group">
                    <label for="item_description">Item Description</label>
                    <textarea type="text" class="form-control" name ="item_description"  placeholder="item description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="offer">Bidding Price</label>
                    <input type="number"  class="form-control" name ="offer" min="1" max="99999999999" placeholder="Bidding Price" required>
                </div>
                <div class="form-group">
                <label for="phone">Phone number:</label>
                 <input type="tel" id="phone" name="phone" placeholder="09*********" maxlength = "11" required>
                </div>
                <div class="form-group">
                    <label for="upload_file">Upload Any of These:(Business Permit,DIT and etc.)</label>
                    <input type="file" accept="application/pdf" class="form-control" name="fileToUpload" id="fileToUpload" required>
                </div>
            <div class="form-group">
            <label for="category">Type of Application</label>
                    <select name="category" class="form-control" placeholder="category">
                    <option <?php if('category')  echo 'selected="selected"';?>value="1">Supplier</option>
                    <option <?php if('category')  echo 'selected="selected"';?>value="0">Contractor</option>
                    </select>
                </div>
                <div class="form-group clearfix">
            <?php //f($result == null): ?> 
                <button type="submit" name="applicationform" style="float: right;" class="btn btn-success">Submit</button>
                <?php //endif?>
                </div>
                
            </form>
        </div>

       


        <!-- <script>
        function Tab(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
        </script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="libs/js/functions.js"></script>
</body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>
<?php include_once('layouts/footer.php'); ?>