<?php
  $page_title = 'Contracts';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_request_contract = find_contract_request();
	 $all_core1files = find_all('core1files');
?>

<!-- add contract function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('req_id ','req_class  ', 'fname ' , 'mname' , 'lname  ' , 'type_of_contract' , 'department', 'status');
   
   validate_fields($req_field);
  
  $vis_req_id = remove_junk($db->escape($_POST['visitor-req_id']));
  $vis_req_class = remove_junk($db->escape($_POST['visitor-req_class']));
  $vis_fname = remove_junk($db->escape($_POST['visitor-fname']));
  $vis_mname = remove_junk($db->escape($_POST['visitor-mname']));
  $vis_lname = remove_junk($db->escape($_POST['visitor-lname']));
  $vis_type_of_contract = remove_junk($db->escape($_POST['visitor-type_of_contract']));
  $vis_department = remove_junk($db->escape($_POST['visitor-department']));
  $vis_status = remove_junk($db->escape($_POST['visitor-status']));
  
 
  
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO request_contract ( req_id, req_class, fname, mname, lname, type_of_contract, department, status)";
 $sql .= " VALUES ('{$vis_req_id}','{$vis_req_class}','{$vis_fname}','{$vis_mname}','{$vis_lname}',' {$vis_type_of_contract}','{$vis_department}','pending')";
      
   
      if($db->query($sql)){
       $_SESSION['status'] =  "Request Contract is Added";
            $_SESSION['status_code'] =  "success";
        redirect('core1.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('core1.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('core1.php',false);
   }
 }
?>
<!-- add contract function ---------------------------------------------------------------------------------------------------------------------------------------- -->





<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a class="breadcrumbs__item is-active">List of Request</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>
<br>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
   
</nav>



<!-- Data table start -->
<div class="row">

  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Department Contract Request </span>
         <div class="text-end">
          <a href="register_visitor.php" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal"> Request Contract</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
          <th>Request Id</th>
        <th>Class</th>
                <th>Name of requestor</th>
        <th>Department</th>
                <th>Type of Contract</th>
                <th>Date of Request</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_request_contract as $visitor):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitor['req_id'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['req_class'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['fname'].' '.$visitor['mname'].' '.$visitor['lname'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['department'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['type_of_contract'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['date_of_request'])); ?></td>
              
                
                
                    <td class="text-center">
          
          
          <?php if($visitor['req_class']=='employee' || $visitor['req_class']=='Employee'){

          switch($visitor['department']){
            case 'HR1' : ?>
          
                      <div class="btn-group">
                      <a href="delete_contractrequest.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
            </div>
          
          
          <?php
          break;
          case 'CORE1': ?>
           <div class="btn-group">
                     
                      

                      <a href="delete_contractrequest.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
            </div>
          
          <?php
          break;
          }
          }else{?>  

          

          <?php } ?>          
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
	
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
            <?php foreach($all_core1files  as $a_contract): ?>
            <tr>
            <td class="text-center"><?php echo count_id();?></td>
            <td><?php echo remove_junk(ucwords($a_contract['title']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['sec_dep']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['date_created']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['date_from']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['date_to']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['Body']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['preparedby']))?></td>
            <td> 
                <a href="download.php?id=<?php echo $a_contract['id']; ?>&urlpath=<?php echo $a_contract['urlpath']; ?>" class="btn btn-small btn-success" data-toggle="tooltip" title="Download file">
                <?php echo basename($a_contract['urlpath'])?><i class="glyphicon glyphicon-download"></i>
                </a>
				
				<td class="text-center">
                      <div class="btn-group">
                      <a href="#.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
                           
                      <a href="#.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                      </div>
                    </td>
				
            </td>
            
            <td class="text-center">
                <div class="btn-group">
                  <?php if($a_contract['status'] === '2'): ?>
                   
                     
                    </a>
                   <?php endif; ?>
					
                   
                   
                     
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
  
  
  
  <!-- add visitor-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
  
        <h5 class="badge rounded-pill bg-success" class="modal-title" id="exampleModalLabel">Request Contract</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="core1.php">
          <div class="form-group">
                
                
        <input type="text" class="form-control" name="visitor-req_id" placeholder="Personel Id" required><br>
        
        
         <select  class="form-control" name="visitor-req_class" required><br>
				<option>Type of Personnel</option>
				
				<option value="Client">Client</option>
				
			
				
				</select><br>
        <input type="text" class="form-control" name="visitor-fname" placeholder="Firstname" required><br>
        <input type="text" class="form-control" name="visitor-mname" placeholder="Middlename" required><br>
        <input type="text" class="form-control" name="visitor-lname" placeholder="Lastname" required><br>
        <input type="email" class="form-control" name="visitor-email" placeholder="Email" required><br>
        
        <select  class="form-control" name="visitor-type_of_contract"><br>
				<option value="">select contract</option>
				<option value="Memorandum Aggrement">Memorandum Aggrement</option>
				</select><br>
				
				<select  class="form-control" name="visitor-department"><br>
				<option value="">select department</option>
				<option value="CORE1">CORE1</option>
				</select><br>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add_vis" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      </div>
     
    </div>
  </div>
</div>
<!-- End of Data table  -->




<?php include_once('layouts/footer.php'); ?>
