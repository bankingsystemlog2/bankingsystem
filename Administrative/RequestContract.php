<?php
	$page_title = 'Contracts';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_request_contract = find_all('request_contract')
?>
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
 
  
		<a href="#"><button type="button" class="btn btn-primary">BACK</button></a> 
		<a href="hr 1 contract.php"><button type="button" class="btn btn-light">HR 1</button></a> 
		<a href="#.php"><button type="button" class="btn btn-light">HR 2</button></a>
		<a href="#.php"><button type="button" class="btn btn-lights">HR 3</button></a>
		<a href="#.php"><button type="button" class="btn btn-light">H4</button></a>
		<a href="core 1 contract.php"><button type="button" class="btn btn-light">CORE 1</button></a> 
		<a href="#"><button type="button" class="btn btn-light">CORE 2</button></a>
		<a href="logistic1contract.php"><button type="button" class="btn btn-lights">LOGISTIC 1</button></a>
		<a href="#.php"><button type="button" class="btn btn-light">LOGISTIC 2</button></a>
		<a href="#.php"><button type="button" class="btn btn-light">FINANCIAL</button></a>
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
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Name of requestor</th>
				<th>Department</th>
                <th>Type of Contract</th>
                <th>Status</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_request_contract as $contract):?>
          <tr>
					
					
					<td><?php echo remove_junk(ucfirst($contract['fname'].' '.$contract['mname'].' '.$contract['lname'])); ?></td>
					<td><?php echo remove_junk(ucfirst($contract['department'])); ?></td>
					<td><?php echo remove_junk(ucfirst($contract['type_of_contract'])); ?></td>
					<td><?php if($contract['status'] == 'Approve'){ ?>
					<span class="badge rounded-pill bg-success">
					<?php echo remove_junk(ucwords($contract['status']))?></span>
					<?php }else{ ?>
					<span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($contract['status'])); }?></span></td>
							
							  
						    
                    <td class="text-center">
					
					
					<?php	if
					($contract['req_class']=='employee' 
					|| $contract['req_class']=='Employee' 
					|| $contract['req_class']=='EMPLOYEE' 
					
					|| $contract['req_class']=='Project Manager'
					|| $contract['req_class']=='PROJECT MANAGER'
					|| $contract['req_class']=='project manager'

					|| $contract['req_class']=='Client'
					|| $contract['req_class']=='CLIENT'
					|| $contract['req_class']=='client'
					
					
					
					
					){

 					switch($contract['department']){
						
						case 'HR1' : ?>
                      <div class="btn-group">
                      <a href="hr 1 contract.php?id=<?php echo $contract['req_id'];?>&dept=<?php echo $contract['department']?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-send-plus"></i></a> 
                      
                      <a href="delete_contractrequest.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="bi bi-trash"></i></a>
                      <a href="delete_contractrequest.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
					  </div>
					<?php
					break;
					
					
					
					
					
					case 'LOGISTIC1': ?>
                      <div class="btn-group">
                      <a href="logistic1contract.php?id=<?php echo $contract['req_id'];?>&dept=<?php echo $contract['department']?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-send-plus"></i></a> 
                      
                      <a href="delete_contractrequest.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="bi bi-trash"></i></a>
                      <a href="delete_contractrequest.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
					  </div>
					<?php
					break;
					
					
					case 'CORE1': ?>
					 <div class="btn-group">
                      <a href="core 1 contract.php?id=<?php echo $contract['req_id'];?>&dept=<?php echo $contract['department']?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-send-plus"></i></a>      
                      <a href="delete_contractrequest.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="bi bi-trash"></i></a>
                      <a href="delete_contractrequest.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
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
  
  
  
 


<?php include_once('layouts/footer.php'); ?>
