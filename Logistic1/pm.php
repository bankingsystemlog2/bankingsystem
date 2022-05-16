<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">
<?php
  $page_title = 'Proposed Project';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
 $all_projects = find_all('ongoing_project_list')
?>
<?php include_once('layouts/header.php'); 
?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Proposed Project</a>
</nav>
<!-- /Breadcrumb -->

<style>

.page-wrapper1{
	margin-top: 110px;
}
#btns{
	background-color: #969696;
	border: none;
	color: white;
	padding: 8px 10px;
	font-size: 15px;
	cursor: pointer;
}
#btnss{
	text-decoration: none;
	color: white;
}
#btns:hover {
  background-color:#c2c2c2;
}

.btn {
  background-color: #2B547E;
  border: none;
  color: white;
  margin: 10px;
  padding: 8px 10px;
  font-size: 15px;
  cursor: pointer;
}

.btn:hover {
  background-color:skyblue;
}


div.scrollmenu {
 
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}
.bareta{
	width: 350px;
}
#wrapper{
	background-color: white;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding-left: 2%;
	padding-right: 2%;
	padding-bottom: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
hr{
	border: solid 2px black;
}
.TAYTOL{
	color: black;
}
</style>

</head>
<body>

<div id="wrapper">
        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <h1 class="TAYTOL">
                           Proposed Project List
                        </h1>
						<a href="pm.php" class="pull-right"><span class="glyphicon glyphicon-refresh" style="height:20px;"></span></a>
						   
                        <form action="" method="POST">
                        <h4 class="col-md-11">Please input the following credentials.</h4>
                        <div class="row" style="padding-left:14px;">
                                <div class="col-md-12">
                                    <div class="input-group mb-3 bareta">
										<span class="input-group-text"  id="basic-addon1">Start Date:</span>
										<input type="text" class="form-control" style="width: 120px;" placeholder="Start Date" name="start_date" required />
									</div>   
										
									<div class="input-group mb-3 bareta">
										<span class="input-group-text" id="basic-addon1">End Date:</span>
										<input type="text" class="form-control" placeholder="End Date" name="end_date" required />
									</div>
                                       <button type="submit" name="search" style="margin-top:10px;" class="btn btn-secondary">Search</button>
									   <button class="btn btn-secondary" id="btns"><a href="pm.php" id="btnss">Refresh</a></button>
                                </div>
                            </div>
						</form>
						<hr>
                            <?php 
                                $conn  = mysqli_connect("localhost", "root", "" , "bank");
                                if(isset($_POST['start_date']) && isset($_POST['end_date'])){
                                
                                    $start_date = $_POST['start_date'];
                                    $end_date = $_POST['end_date'];
                                    $query = "SELECT * FROM ongoing_project_list WHERE start_date= '$start_date' AND end_date= '$end_date' ";
                                    $query_num = mysqli_query($conn, $query);
                                
                                ?>
                          <br>
					  <div style="padding-left:14px;" class='table-responsive'> 
						  <div style="overflow-x:auto;">
                          <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
									<th scope="col">ID</th>
									<th scope="col">Proposed Project</th>
									<th scope="col">Project Name</th>
									<th scope="col">Location</th>
									<th scope="col">Cost</th>
									<th scope="col">Start Date</th>
									<th scope="col">End Date</th>
									<th scope="col">Project Manager</th>
									<th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  if(mysqli_num_rows($query_num) > 0){
                                    while($row = mysqli_fetch_array($query_num)){
                                   
                                ?>
                                <tr class="table-active">
                               
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['prop_proj']?></td>
                                <td><?php echo $row['proj_name']?></td>
                                <td><?php echo $row['loc']?></td>
                                <td><?php echo $row['cost']?></td>
                                <td><?php echo $row['start_date']?></td>
                                <td><?php echo $row['end_date']?></td>
                                <td><?php echo $row['proj_man']?></td>
								<td class="text-center">
								  <div class="btn-group">
									<a href="accept.php?id=<?php echo (int)$row['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Done">Done
									  <span class="glyphicon glyphicon-edit"></span>
									</a>
								  </div>
								</td>

                                </tr>
                                <?php
										}
                                    }else{
                                   ?>
                                   <tr>
                                  <td class="text-center" colspan="23">No record has found..</td>
                                   </tr>
                                   <?php
                                }
                                ?>
                                </tbody>
                            </table>
                   </div>
                   <?php 
                }
			?>
</div>
<nav>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Proposed Project Information</span>
       </strong>
 </div>
		 
    
	   <div class="panel-body">
			<div class="scrollmenu">
				<table class="table table-bordered table-striped table-hover">
					<table id="datatablesSimple" class="table-striped table-bordered table-hover" style="width:100%">
					
						<thead>
							<tr>
								<th class="text-center" style="width: 150px;">ID</th>
								<th class="text-center">Project Manager</th>
								<th class="text-center">Start Date</th>
								<th class="text-center">End Date</th>
							</tr>	
						</thead>
						
						<tbody>			
								
							
						<?php foreach ($all_projects as $project):?>
						<tr>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['id'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['proj_man'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['start_date'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['end_date'])); ?></td>
						</tr>
								<?php endforeach; ?>
									</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>


						
              

																		



 
 
 
 
 
 


<?php include_once('layouts/footer.php'); ?>
</body>
</html>																		
	
