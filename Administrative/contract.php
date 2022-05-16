<?php
  $page_title = 'List of core 2 Contract';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_core2files = find_all('core2files')
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
 $groups = find_all('core2files');
 $users_id = current_user()['id'];
// $result = find_vendor_by_id('audit',$users_id);
 $is_show = 1;
 $all_vendors = find_all('core2files');
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
        $query = "INSERT INTO core2files (";
        $query .="title,sec_dep,date_created,preparedby,date_from,date_to,body,urlpath,status";
        $query .=") VALUES (";
        $query .="'{$title}', '{$sectiondep}', '{$datecreated}', '{$prepared_by}', '{$datefrom}', '{$dateto}', '{$body}','{$target_file}', '1'";
        $query .=")";


    
        if($db->query($query)){
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          $session->msg('s',"Data has been save! ");
          redirect('core 2 contract.php', false);
        } else {
         
          $session->msg('d',' Sorry Data not saved!');
          redirect('core 2 contract.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('core 2 contract.php',false);
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
  <a href="core 2 contract.php" class="breadcrumbs__item is-active">Core Contract</a>
</nav>
<!-- /Breadcrumb -->
<br>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?> 
</nav>

<div class="panel-body">
	  <div class="card-header">
        
      </div>
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
           
            <button class="tablinks" onclick="Tab(event, 'ViewData') "id="defaultOpen">View Contracts</button>
        </div> 
            </form>
        </div>

        <div id="ViewData" class="tabcontent">
            <table class="table table-bordered table-striped" id="myTable">
            <thead>
            <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>Title</th>
                <th>Section/Department</th>
                <th class="text-center" style="width: 15%;">Date Created</th>
                <th class="text-center" style="width: 15%;">Date from</th>
                <th class="text-center" style="width: 15%;">Date to</th>
                <th>Description</th>
                <th class="text-center" style="width: 15%;">Prepared by</th>
                <th class="text-center" style="width: 15%;">Files</th>

                <th class="text-center" style="width: 15%;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($all_vendors as $a_vendor): ?>
            <tr>
            <td class="text-center"><?php echo count_id();?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['title']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['sec_dep']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['date_created']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['date_from']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['date_to']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Body']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['preparedby']))?></td>
            <td> 
                <a href="download.php?id=<?php echo $a_vendor['id']; ?>&urlpath=<?php echo $a_vendor['urlpath']; ?>" class="btn btn-small btn-success" data-toggle="tooltip" title="Download file">
                <?php echo basename($a_vendor['urlpath'])?><i class="glyphicon glyphicon-download"></i>
                </a>
				
            </td>
            
            <td class="text-center">
                <div class="btn-group">
                  <?php if($a_vendor['status'] === '2'): ?>
                   
                     
                    </a>
                   <?php endif; ?>
					<button a href="edit_categorie.php?id=<?php echo (int)$complainant['id'];?>" class="btn btn-info">View</button>				
                   <button a href="edit_categorie.php?id=<?php echo (int)$complainant['id'];?>" class="btn btn-success">Edit</button>
				   <button a href="edit_categorie.php?id=<?php echo (int)$complainant['id'];?>" class="btn btn-danger">Delete</button>
                   
                   
                     
                        </a>  
                        </a>  
					 
					 
					 
                </div>
            </td>
            
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        </div>


        <script>
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
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
  );
  
  // Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
  
  
</script>
        </body>
     </div>
    </div>
  </div>
</div>




<?php include_once('layouts/footer.php'); ?>
