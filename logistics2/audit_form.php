<?php
  $page_title = 'Audit Management Form';
  require_once('includes/log2load.php');
?>
<link rel="stylesheet" href="datatables.css">
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
 $groups = find_all('audit');
 $users_id = current_user()['id'];
// $result = find_vendor_by_id('audit',$users_id);
 $is_show = 1;
 $all_vendors = find_all_audit();
?>
<?php
  if(isset($_POST['applicationform'])){
    header('Content-Type: text/plain; charset=utf-8');

   $req_fields = array('asset','stated_amount','actual_amount');
   validate_fields($req_fields);
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


   if(empty($errors)){
       $asset   = remove_junk($db->escape($_POST['asset']));
       $stated_amount   = remove_junk($db->escape($_POST['stated_amount']));
       $actual_amount   = remove_junk($db->escape($_POST['actual_amount']));
       $datecreated   =  date('Y-m-d');
       // remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_created']))));
       $preparedby   = remove_junk($db->escape($_POST['auditor']));
        $query = "INSERT INTO audit (";
        $query .="asset,stated_amount,actual_amount,date_created,preparedby,urlpath";
        $query .=") VALUES (";
        $query .="'{$asset}', '{$stated_amount}','{$actual_amount}', '{$datecreated}', '{$preparedby}','{$target_file}'";
        $query .=")";


    
        if($db->query($query)){
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          $session->msg('s',"Data has been save! ");
          redirect('audit_form.php', false);
        } else {
         
          $session->msg('d',' Sorry Data not saved!');
          redirect('audit_form.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('audit_form.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
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
          <span>Audit Management</span>
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
        <div class="tab">
            <button class="tablinks"  onclick="Tab(event, 'ApplicationForm')" id="defaultOpen">Fill-up Audit</button>
            <button class="tablinks" onclick="Tab(event, 'ViewData')">View Audit</button>
        </div>

        <div id="ApplicationForm" class="tabcontent">
            <form method="post" action="audit_form.php" autocomplete="off" enctype="multipart/form-data"> 
                <div class="form-group">
                    <label for="title">Asset</label>
                    <input type="text" class="form-control" name="asset" placeholder="Item Name">
                </div>
                <div class="form-group">
                    <label for="stated_amount">Stated Amount</label>
                    <input type="number" class="form-control" name="stated_amount" placeholder="Amount stated in finance">
                </div>
                <div class="form-group">
                    <label for="actual_amount">Actual Amount</label>
                    <input type="number" class="form-control" name="actual_amount" placeholder="Total amount checked">
                </div>
                <div class="form-group" hidden>
                    <label for="date_created">Date Created</label>
                    <input type="date" class="form-control" name ="date_created"  placeholder="date created">
                </div>                
                <div class="form-group">
                    <input type="hidden" class="form-control" name="auditor" value ="<?php echo $users_id; ?>">
                </div>
                <div class="form-group">
                    <label for="upload_file">Upload File</label>
                    <input type="file" accept="application/pdf" class="form-control" name="fileToUpload" id="fileToUpload">
                </div>                
                    <div class="form-group clearfix">
            <?php?> 
                <button type="submit" name="applicationform" style="float: right;" class="btn btn-success">Submit</button>
                <?php?>
                </div>
                
            </form>
        </div>
                
            </form>
        </div>

        <div id="ViewData" class="tabcontent">
            <table class="table table-bordered table-striped" id="myTable">
            <thead>
            <tr>
                <th>Item Name</th>
                <th>Stated Amount</th>
                <th>Actual Amount</th>
                <th class="text-center" style="width: 15%;">Date Created</th>
                <th class="text-center" style="width: 15%;">Auditor</th>
                <th class="text-center" style="width: 15%;">File Uploaded</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($all_vendors as $a_vendor): ?>
            <tr>
            <td><?php echo remove_junk(ucwords($a_vendor['asset']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['stated_amount']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['actual_amount']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['date_created']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['name']))?></td>
            <td> 
                <a href="download.php?id=<?php echo $a_vendor['id']; ?>&urlpath=<?php echo $a_vendor['urlpath']; ?>" class="btn btn-small btn-success" data-toggle="tooltip" title="Download file">
                <?php echo basename($a_vendor['urlpath'])?><i class="glyphicon glyphicon-download"></i>
                </a>
            </td>
            
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        </div>


        <script>
        document.getElementById("defaultOpen").click();
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
        </script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="datatables.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script>
  $("#myTable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    }
  );
</script>
        </body>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
