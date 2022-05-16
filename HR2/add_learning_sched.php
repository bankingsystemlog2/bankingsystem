<?php
require_once('includes/load.php');

page_require_level(2);



if(isset($_POST['add_sched'])){

  $title = $_POST['title'];
  $date = $_POST['date'];
  $date = date('Y-m-d');
  $time = $_POST['time'];
  $location = $_POST['loc'];
  

  $sql = "INSERT INTO seminar_sched (title,date,time,location) VALUES ('$title','$date','$time','$location')";
  if($db->query($sql)){

     $sql = "SELECT seminar_id FROM seminar_sched WHERE title = '$title'";
      $res = $db->query($sql);
      $id = $res->fetch_assoc();
      $id = $id['seminar_id'];
      if($db->query($sql)){

    foreach($_POST['emp'] as $em){
     
      $sql = "INSERT INTO seminar_participants (employee_id,seminar_id) VALUES";
      $sql .= " ('$em','$id')";
      $res = $db->query($sql);
    }

    $sql = "INSERT INTO learning_schedule_approval (seminar_id,status) VALUES ('$id','pending')";
    if($db->query($sql)){

  $_SESSION['status'] =  "Schedule Added";
  $_SESSION['status_code'] =  "success";
   redirect('learning_schedules.php',false);
 }
 }
   
    }



  
    
  }
  


 include_once('layouts/header.php'); 

 ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  
  <a href="learning_schedules.php" class="breadcrumbs__item">Back</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add new Schedule</a>
</nav>
<!-- /Breadcrumb -->

  <div class="row">
    <?php echo display_msg($msg); ?>
  <div class="col-sm-6 mx-auto">
    <div class="card-header bg-dark">
    <span style="color:White"><i class="bi bi-calendar"></i> Add new schedule</span>
  </div>
    <div class="card">
      <div class="card-body">
        <form method="post" action="add_learning_sched.php">
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" placeholder="  Schedule title">
          </div>
          <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" name="date" placeholder="  Date">
          </div>
          <div class="form-group">
              <label for="time">Time</label>
              <input type="time" class="form-control" name ="time"  placeholder="  Time">
          </div>
          <div class="form-group">
            <label for="level">Location/Room</label>
              <input type="text" name="loc" class="form-control" placeholder="location/room">
          </div> 
 <div class="form-group clearfix">
  <label for="emp">Participants</label>
            <select name="emp[]" multiple class="form-control" >
              <?php 
              $sql = "SELECT * FROM employees ";
              $res = $db->query($sql);
              $emp = $res->fetch_assoc();
              do{ ?>
  <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>

             <?php }
              while($emp = $res->fetch_assoc());

              ?>
            </select>
          </div>


          <br>

          <div class="form-group clearfix">
            <button type="submit" name="add_sched" class="btn btn-primary">Add Schedule</button>
          </div>
         
      </form>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>