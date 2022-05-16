<?php
  $page_title = 'List of Hr 1 Contract';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_hr1files = find_all('hr1files')
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
 $groups = find_all('hr1files');
 $users_id = current_user()['id'];
// $result = find_vendor_by_id('audit',$users_id);
 $is_show = 1;
 
 $all_request = find_all('emp_contract_req');
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
        $query = "INSERT INTO hr1files (";
        $query .="title,sec_dep,date_created,preparedby,date_from,date_to,body,urlpath,status";
        $query .=") VALUES (";
        $query .="'{$title}', '{$sectiondep}', '{$datecreated}', '{$prepared_by}', '{$datefrom}', '{$dateto}', '{$body}','{$target_file}', '1'";
        $query .=")";


    
        if($db->query($query)){
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          
           $_SESSION['status'] = "Data has been saved!";
            $_SESSION['status_code'] = "error";
          redirect('hr 1 contract.php', false);
        } else {
         
         
          $_SESSION['status'] = "Data not saved!";
            $_SESSION['status_code'] = "error";
          redirect('hr 1 contract.php', false);
        }
   } else {
     
      $_SESSION['status'] = $errors;
            $_SESSION['status_code'] = "error";
      redirect('hr 1 contract.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
 
   <a href="contract_signing.php" class="breadcrumbs__item">Home</a>

  <a href="hr1contract.php" class="breadcrumbs__item is-active">Contracts</a>
</nav>


<div class="panel-body">
	  <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Add Contract</span>
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
         
            </form>
        </div>

        <div id="ViewData" class="tabcontent">
            <table class="table table-bordered table-striped" id="myTable">
            <thead>
            <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th class="text-center" style="width: 15%;">Position</th>
                <th class="text-center" style="width: 15%;">Department</th>
                <th class="text-center" style="width: 15%;">Date of start</th>
                
                <th class="text-center" style="width: 15%;">Date of end</th>
                <th>Salary</th>
               

                <th class="text-center" style="width: 15%;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($all_request as $a_contract): ?>
            <tr>
            <td class="text-center"><?php echo count_id();?></td>
            <td><?php echo remove_junk(ucwords($a_contract['emp_name']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['emp_last_name']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['position']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['dept_of_emp']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['start_of_job']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['end_of_job']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['salary']))?></td>
            <td> 
                <center><a href="download.php?id=<?php echo $a_contract['id']; ?>" class="btn btn-small btn-success" data-toggle="tooltip" title="Download file">
                <i class="bi bi-file-post"></i>
                </a>
				</center>
            </td>
            
            <td class="text-center">
                <div class="btn-group">
                  <?php if($a_contract['status'] === '2'): ?>
                    <span>
                    <a href="edit_categorie.php?id=<?php echo (int)$complainant['id'];?>" class="btn btn-info">View</a> </span>     
                    <span>  
                   <a href="edit_categorie.php?id=<?php echo (int)$complainant['id'];?>" class="btn btn-success">Edit</a>
                    </span>
                    <span>
                   <a href="edit_categorie.php?id=<?php echo (int)$complainant['id'];?>" class="btn btn-danger">Delete</a>
                   </span>
                     
                 
                   <?php endif; ?>
                  
                   
                     
                       
					 
					 
					 
                </div>
            </td>
            
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        </div>


        <script>
       
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

