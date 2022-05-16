<?php
  $page_title = 'Applicant Management';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
	page_require_level(1);
}

$sql = "SELECT qualified_applicants.*, applicants.* FROM qualified_applicants JOIN applicants ON";
$sql .= " qualified_applicants.applicant_id = applicants.applicant_id";
$result = $db->query($sql);
$a_jobs = $result->fetch_assoc();
$row = $result->num_rows;

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
        	@media print{
        		#button{
        			display: none; !important;
        		}
        		#a{
        			display: none; !important;
        		}
        	}
        </style>
</head>
<body>

		
	<div class="row overflow-auto mh-10" style="margin-bottom:10%; max-height: 500px;">
  <div class="col-md-12">
    <div class="">
      <div class="panel-heading clearfix">
        <div class="col-md-6">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Applicant Report</span>
       </strong>
     </div>
     <div class="col-md-6">
       

  </div>
        
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="">Applicant ID</th>
            <th class="text-center" style="">First Name</th>
            <th class="text-center" style="">Middle Name</th>
            <th class="text-center" style="">Last Name</th>
            <th class="text-center" style="">Gender</th>
            <th class="text-center" style="">Age</th>
            <th class="text-center" style="">Email</th>
            <th class="text-center" style="">Cellphone No.</th>
            <th class="text-center" style="">Address</th>
          </tr>
        </thead>
        <tbody>
        <?php if($row>0){ do{ 
          ?>
          <tr>
           <td class="text-center"><?php echo $a_jobs['applicant_id']?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['first_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['middle_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['gender']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['age']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['email']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['contact_number']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['address']))?></td>


          
          </tr>
        <?php }while($a_jobs = $result->fetch_assoc()); } ?>
       </tbody>
     </table>
          <button onclick="print()" id="button" class="btn btn-info">PRINT</button>
     <a href="qualified-applicants.php" id="a" class="btn btn-danger">BACK</a>
  
     </div>
    </div>
  </div>




     

</body>
</html>