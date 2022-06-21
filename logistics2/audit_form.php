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
 $all_auditor = find_all_auditor();
 $all_assets = find_all('assets');
 $all_done = find_audit_done();
?>
<?php
  if(isset($_POST['applicationform'])){
    header('Content-Type: text/plain; charset=utf-8');

   if(empty($errors)){
        $asset   = remove_junk($db->escape($_POST['asset']));
        $datecreated = remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_planned']))));
        $preparedby   = remove_junk($db->escape($_POST['auditor']));
        $query = "INSERT INTO audit (";
        $query .="asset,date_created,preparedby,status";
        $query .=") VALUES (";
        $query .="'{$asset}', '{$datecreated}', '{$preparedby}','1'";
        $query .=")";


    
        if($db->query($query)){
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
        <div class="tab" id="tabs1">
            <button class="tablinks" onclick="Tab(event, 'ApplicationForm')" >Fill-up Audit</button>
            <button class="tablinks" onclick="Tab(event, 'ViewData')">View Audit</button>
            <button class="tablinks" onclick="Tab(event, 'processaudit')"id="defaultOpen">Audit on process</button>

        </div>

        <div id="ApplicationForm" class="tabcontent">
            <form method="post" action="audit_form.php" autocomplete="off" enctype="multipart/form-data"> 
            <div class="form-group">
              <label for="asset">Task</label>
                <select class="form-control" name="asset">
                  <option disable selected value> -- select task -- </option>         
                  <option value="Purchases">Purchases</option>
                  <option value="Reimbursment">Reimbursement</option>
                  <option value="Payroll">Payroll</option>
                  <option value="Income">Income</option>
                  <option value="Expenses">Expenses</option>
                  <option value="Facility">Facility</option>
                </select>
            </div>
            <div class="form-group">
              <label for="asset">Auditor</label>
                <select class="form-control" name="auditor">
                  <option disable selected value> -- select auditor -- </option>         
                  <?php foreach($all_auditor as $audit):?>
                  <option value="<?php echo $audit['employee_id'];?>"><?php echo $audit['first_name']," ",$audit['last_name'];?></option>
                  <?php endforeach;?>
                </select>
            </div>
                <div class="form-group">
                    <label for="date_created">Planned audit date</label>
                    <input type="date" class="form-control" name ="date_planned"  placeholder="date created"><br>
                </div>
                    <div class="form-group clearfix">
                <button type="submit" name="applicationform" style="float: right;" class="btn btn-success">Submit</button>
                <?php?>
                </div>
                
            </form>
        </div>


        <div id="processaudit" class="tabcontent">
        <table class="table table-bordered table-striped" id="myTable"><thead>
              <tr>
                <th>Task</th>
                <th>Date expected</th>
                <th>Auditor</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($all_vendors as $a_vendor): ?>
            <tr>
            <td><?php echo remove_junk(ucwords($a_vendor['asset']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['date_created']))?></td>
            <td><?php echo $a_vendor['first_name']," ",$a_vendor['last_name'];?></td>
            
            
            </tr>
            <?php endforeach;?>
             </tbody>
        </table>
        </div>
                
            </form>
        </div>

        <div id="ViewData" class="tabcontent">
            <table class="table table-bordered table-striped" id="myTable">
            <style>
@media print{
	#button{
		display: none; !important;
	}
  #example_length{
		display: none; !important;
	}
  #example_filter{
		display: none; !important;
	}
  .topNavBar{
    display: none; !important;
  }
  #example_info{
    display: none; !important;
  }
  #example_previous{
    display: none; !important;
  }
  #example_next{
    display: none; !important;
  }
  .page-link{
    display: none; !important;
  }
	.breadcrumbs{
		display: none; !important;
	}
}
@page {
       /* auto is the initial value */
    size: auto%;
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
  <div class="text-end">
    <div class="text-end">
    <button onclick="print()" id="button" class="btn btn-info md-2"><i class="bi bi-file-post"></i> Print report</button>
  </div>
            <thead>
            <tr>
              <th class="text-center" style="width: 15%;">Auditor</th>
              <th>Audit task</th>
              <th class="text-center">Date Created</th>
              <th class="text-center">Remarks</th>
              <th class="text-center">File Uploaded</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($all_done as $a_vendor): ?>
            <tr>
            <td><?php echo remove_junk(ucwords($a_vendor['name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['task_audited']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['date_created']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['remarks']))?></td>
            <td> 
                <a href="download.php?id=<?php echo $a_vendor['id']; ?>&urlpath=<?php echo $a_vendor['filepath']; ?>" class="btn btn-small btn-success" data-toggle="tooltip" title="Download file">
                <?php echo basename($a_vendor['filepath'])?><i class="glyphicon glyphicon-download"></i>
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
        </body>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
