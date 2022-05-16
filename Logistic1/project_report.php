<?php
  $page_title = 'Project Report';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_ended_projects = find_all('ended_project_list')
?>
<?php include_once('layouts/header.php'); ?>
<style>
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
#ulo{
	font-size: 20px;
	background-color: #d6d6d6;
}
td{
	height: 50px;
}
@media print{
	#button{
		display: none; !important;
	}
	.breadcrumbs{
		display: none; !important;
	}
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Project Report</a>
</nav>
  <br>
<!-- /Breadcrumb -->
<button onclick="print()" id="button" class="btn btn-info md-2"><i class="bi bi-file-post"></i> Print report</button>
<div id="wrapper">
<div class="panel-body">
			<div class="scrollmenu">
				<table class="table table-bordered table-striped table-hover">
					<table id="datatablesSimple" class="table-striped table-bordered table-hover" style="width:100%">
					
						<thead id="ulo">
							<tr class="cells">
								<th class="text-center" style="width: 150px;">ID</th>
								<th class="text-center">Proposed Project</th>
								<th class="text-center">Project Name</th>
								<th class="text-center">Location</th>
								<th class="text-center">Cost</th>
								<th class="text-center">Start Date</th>
								<th class="text-center">End Date</th>
								<th class="text-center">Project Manager</th>
							</tr>	
						</thead>
						
					<tbody>	
						<?php foreach ($all_ended_projects as $project):?>
						<tr>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['id'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['prop_proj'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['proj_name'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['loc'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['cost'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['start_date'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['end_date'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['proj_man'])); ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


<?php include_once('layouts/footer.php'); ?>