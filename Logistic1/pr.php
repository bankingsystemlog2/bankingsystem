<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   
  include("functions.php");
?>

<style>
	div.gfg {
		margin-top: 5%;
		padding:5px;
		background-color: 	#6495ed;
		width: 100%;
		height: 35%;
		overflow: auto;
		text-align:justify;
		border: black 2px solid;
	}
</style>

<?php include_once('layouts/header.php'); ?>

<div class="gfg">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<strong>
					  <span class="glyphicon glyphicon-th"></span>
					  <span><h3>On Going Project</h3></span>
					</strong>
				</div>
			<div class="panel-body">
				<div class="scrollmenu">
					<table class="table table-bordered table-striped table-hover">
						<thead class="table-primary">
						  <tr>
							<th>ID</th>
							<th>PROPOSED PROJECT</th>
							<th>PROJECT NAME</th>
							<th>LOCATION</th>
							<th>COST</th>
							<th>START DATE</th>
							<th>END DATE</th>
							<th>PROJECT MANAGER</th>
							<th class="text-center" style="width: 100px;">ACTIONS</th>
						  </tr>
						</thead>
						<tbody>
						<?php
							$query = "select * from `pm`;";
							if(count(fetchAll($query))>0){
							foreach(fetchAll($query) as $row){
							?>
						  <tr class="table-dark">
							<td>	<p class="text-center"><?php echo $row['id'] ?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['prop_proj']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['proj_name']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['loc']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['cost']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['start_date']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['end_date']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['proj_man']?></p>	</td>
							<td>	
								<p>
									<a href="accept_facility.php?id=<?php echo $row['id'] ?>" class="btn btn-info my-2">Accept</a><br>
									<a href="delete-facility-request.php?id=<?php echo $row['id'] ?>" class="btn btn-primary my-2">Reject</a>
								</p>	
							</td>
						  </tr></tbody>
						  <?php
									}
								}else{
									echo "No Pending Requests.";
								}
							?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="gfg">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<strong>
					  <span class="glyphicon glyphicon-th"></span>
					  <span><h3>Finished Project</h3></span>
					</strong>
				</div>
			<div class="panel-body">
				<div class="scrollmenu">
					<table class="table table-bordered table-striped table-hover">
						<thead class="table-primary">
						  <tr>
							<th>PRODUCT ID</th>
							<th>ITEM NUMBER</th>
							<th>ITEM NAME</th>
							<th>STATUS</th>
							<th>QUANTITY</th>
							<th>UNIT PRICE</th>
							<th>TOTAL STOCK</th>
							<th class="text-center" style="width: 100px;">ACTIONS</th>
						  </tr>
						</thead>
						<tbody>
						<?php
							$query = "select * from `am`;";
							if(count(fetchAll($query))>0){
							foreach(fetchAll($query) as $row){
							?>
						  <tr class="table-dark">
							<td>	<p class="text-center"><?php echo $row['product_id'] ?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['item_number']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['item_name']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['status']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['Quantity']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['Unit_price']?></p>	</td>
							<td>	<p class="jumbotron-heading text-center"><?php echo $row['Total_stock']?></p>	</td>
							<td>	
								<p>
									<a href="accept_facility.php?id=<?php echo $row['product_id'] ?>" class="btn btn-info my-2">Accept</a><br>
									<a href="delete-facility-request.php?id=<?php echo $row['product_id'] ?>" class="btn btn-primary my-2">Reject</a>
								</p>	
							</td>
						  </tr></tbody>
						  <?php
									}
								}else{
									echo "No Pending Requests.";
								}
							?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include_once('layouts/footer.php'); ?>