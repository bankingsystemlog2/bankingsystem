<?php
  $page_title = 'Recruitment | Job posting';
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

$sql = "SELECT posted_jobs.*,job_vacancy.* FROM posted_jobs JOIN job_vacancy ON posted_jobs.job_id = job_vacancy.job_id";
$result = $db->query($sql);
$a_jobs = $result->fetch_assoc();
$row = $result->num_rows;
?>


<!DOCTYPE html>
  <html lang="en">
<head>
	<title>Posted Job</title>
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

		
	<div class="row overflow-auto mh-10" style="margin-bottom:10%; ">
  <div class="col-md-12">
    <div class="">
      <div class="panel-heading clearfix">
        <div class="col-md-6">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Job Requests Report</span>
       </strong>
     </div>
     <div class="col-md-6">
       

  </div>
        
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 10%;">Job ID</th>
            <th class="text-center" style="">Job Title </th>
            <th class="text-center" style="width: 10%;">No. of Vacancy</th>
            <th class="text-center" style="">Job Description</th>
            <th class="text-center" style=";">Qualification</th>
            
          </tr>
        </thead>
        <tbody>
        <?php if($row>0){ do{ 
          ?>
          <tr>
           <td class="text-center"><?php echo $a_jobs['job_id']?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['job_title']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['no_of_vacancy']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['job_description']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['job_qualification']))?></td>
          
          </tr>
        <?php }while($a_jobs = $result->fetch_assoc()); } ?>
       </tbody>
     </table>
      <button onclick="print()" id="button" class="btn btn-info">PRINT</button>
     <a href="job-posting.php" id="a" class="btn btn-danger">BACK</a>
     </div>
    
    </div>
  </div>
</div>

     

</body>
</html>