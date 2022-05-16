<?php
  $page_title = 'List of Hr 1 Contract';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   
    $all_logistic1files = find_all('logistic1files');

?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
 $groups = find_all('logistic1files');
 $users_id = current_user()['id'];
// $result = find_vendor_by_id('audit',$users_id);
 $is_show = 1;
 
 $all_request = find_all('logistic1files');
 
?>

<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="core 2 contract.php" class="breadcrumbs__item is-active">Employee Contract</a>
</nav>
<!-- /Breadcrumb -->
<br>
 <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Sending Contract</span>


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
		<!-- /Breadcrumb 
            <button class="tablinks" onclick="Tab(event, 'ApplicationForm')" id="defaultOpen">Add Contracts </button>-->
            <button class="tablinks" onclick="Tab(event, 'ViewData')">View Contracts</button>
        </div>

        <div id="ApplicationForm" class="tabcontent">
            <form method="post" action="logistic1contract.php" autocomplete="off" enctype="multipart/form-data"> 
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $emp['type_of_contract']?>">
					<input type="hidden" class="form-control" name="req_id" value="<?php echo $emp['req_id']?>">
                </div>
                <div class="form-group">
                    <label for="sectiondep">Section/Department</label>
                    <input type="text" class="form-control" name="section/department" placeholder="section/department" value="<?php echo $emp['department']?>">
                </div>
                <div class="form-group" hidden>
                    <label for="date_created">Date Created</label>
                    <input type="date" class="form-control" name ="date_created"  placeholder="date created">
                </div>
                <div class="form-group">
                    <label for="date_from">Date from</label>
                    <input type="date" class="form-control" name ="date_from"  placeholder="date from">
                </div>
                <div class="form-group">
                    <label for="date_to">Date to</label>
                    <input type="date" class="form-control" name ="date_to"  placeholder="date to">
                </div>
                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea type="body" class="form-control" name="body" rows="3" cols="60"></textarea>
                </div>
                <div class="form-group">
                    <label for="upload_file">Upload File</label>
                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="form-group">
            <label for="preparedby">Prepared by</label>
            <?php
                $people = array(
                        'Admin',
                        'Staff',
                        
                    );
                
              ?>	
              <select name="prepared_by" class="form-control" placeholder="prepared by" >
              <option value=""  >-----------------</option>
              <?php
              foreach($people as $key => $value):
              echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
              endforeach;
              ?>
              </select>

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
                <th class="text-center" style="width: 50px;">#</th>
                <th>Title</th>
                <th>Section/Department</th>
                <th class="text-center" style="width: 15%;">Date Created</th>
                <th class="text-center" style="width: 15%;">Status</th>
                <th class="text-center" style="width: 15%;">Prepared by</th>
                <th class="text-center" style="width: 15%;">Files</th>

                <th class="text-center" style="width: 15%;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($all_request as $a_contract): ?>
            <tr>
            <td class="text-center"><?php echo count_id();?></td>
            <td><?php echo remove_junk(ucwords($a_contract['title']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['sec_dep']))?></td>
            <td><?php echo remove_junk(ucwords($a_contract['date_created']))?></td>
            <td><?php if($a_contract['status'] == 'Downloaded'){ ?>
            <span class="badge rounded-pill bg-success">
            <?php echo remove_junk(ucwords($a_contract['status']))?></span>
            <?php }else{ ?>
            <span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($a_contract['status'])); }?></span></td>
            <td><?php echo remove_junk(ucwords($a_contract['preparedby']))?></td>
            <td> 
            <?php if($a_contract['status'] == 'Downloaded'){ ?>
                <a href="download.php?id=<?php echo $a_contract['id']; ?>&urlpath=<?php echo $a_contract['urlpath']; ?>" class="btn btn-small btn-success" data-toggle="tooltip" title="Download file">
                <?php echo basename($a_contract['urlpath'])?><i class="glyphicon glyphicon-download"></i>
                </a>
                <?php }else{ ?>
                <a href=#" class="btn btn-small btn-secondary" data-toggle="tooltip" title="Download file">
                <?php echo basename($a_contract['urlpath'])?><i class="glyphicon glyphicon-download"></i>
                </a>
                
                <?php } ?>
				<td class="text-center">
                      <div class="btn-group">
                      <a href="edit_visitor.php?id=<?php echo $visitor['visitor_id'];?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
                           
                      <a href="delete_visitor.php?id=<?php echo $visitor['visitor_id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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




<?php include_once('layouts/footer.php'); ?>
