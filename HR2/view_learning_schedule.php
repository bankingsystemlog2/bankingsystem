<?php
  $page_title = 'Learning Schedules';
  require_once('includes/load.php');
 page_require_level(2);
$id = $_GET['id'];
$sql = "SELECT * FROM seminar_sched WHERE seminar_id = '$id'";
$res = $db->query($sql);
$sched = $res->fetch_assoc();


?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  
   <a href="learning_schedules.php" class="breadcrumbs__item">Back</a>
 
  <a href="#checkout" class="breadcrumbs__item is-active">Schedule Info</a>
</nav>





<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Schedule Information</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Seminar Title</label>
                      <div class="col-md-8">
                       
                        <input type="text" class="form-control" value="<?php echo $sched['title']?>" disabled>
                    </div>
                  </div> <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Date</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" value="<?php echo $sched['date']?>" disabled>
                    </div>
                  </div> <br>
                  <div class="form-group row">
                    
                    <label class="col-form-label col-md-4">Room/Location</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="<?php echo $sched['location']?>" disabled>
                    </div>
                  </div> <br>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Participants</label>
                      <div class="col-md-8">
                      	<ul>
                      	<?php 
                      	$id = $sched['seminar_id'];
                      	$sql = "SELECT employees.*,seminar_participants.* FROM employees JOIN";
                      	$sql .= " seminar_participants ON employees.employee_id = seminar_participants.employee_id";
                      	$sql .= " WHERE seminar_participants.seminar_id = '$id'";
                      	$res = $db->query($sql);
                      	$part = $res->fetch_assoc();
                      	$row = $res->num_rows;

                      	if($row>0){
                      	?>
                        
                        	<?php do{ ?> 
                        	<li><?php echo $part['employee_id'].' - '.$part['first_name'].' '.$part['last_name']?></li>
                        <?php }while($part = $res->fetch_assoc()); } ?>
                        
                        </ul>
                    </div>
                  </div><br>
                     
                  
                  
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>






  <?php include_once('layouts/footer.php'); ?>
