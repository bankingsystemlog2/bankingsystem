<?php
 
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
  $id = $_GET['id'];
  
  if(isset($_POST['submit'])){


  if(empty($_POST['ps'])){
     
           $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $ps = remove_junk($db->escape($_POST['ps']));
  }

  if(empty($_POST['dm'])){
           $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $dm = remove_junk($db->escape($_POST['dm']));
  }

  if(empty($_POST['punc'])){
            $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $punc = remove_junk($db->escape($_POST['punc']));
  }

  if(empty($_POST['att'])){
             $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $att = remove_junk($db->escape($_POST['att']));
  }
   if(empty($_POST['rel'])){
           $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $rel = remove_junk($db->escape($_POST['rel']));
  }

  if(empty($_POST['led'])){
            $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $led = remove_junk($db->escape($_POST['led']));
  }

  if(empty($_POST['comm'])){
           $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $comm = remove_junk($db->escape($_POST['comm']));
  }

  if(empty($_POST['acc'])){
     $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $acc = remove_junk($db->escape($_POST['acc']));
  }

  if(empty($_POST['colt'])){
            $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $colt = remove_junk($db->escape($_POST['colt']));
  }

  if(empty($_POST['time'])){
             $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $time = remove_junk($db->escape($_POST['time']));
  }

  if(empty($_POST['eth'])){
             $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $eth = remove_junk($db->escape($_POST['eth']));
  }

  if(empty($_POST['prod'])){
            $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $prod= remove_junk($db->escape($_POST['prod']));
  }

  if(empty($_POST['remark'])){
      $_SESSION['status'] = "Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $remark= remove_junk($db->escape($_POST['remark']));
  }


  $total = $ps + $dm + $punc + $att + $rel + $led + $comm + $acc +  $colt + $time + $eth + $prod;
  $average = $total/12;
  $date = date('Y-m-d');

$sql = "SELECT date FROM performance_review WHERE date = '$date' AND employee_id = '$id'";
$result = $db->query($sql);
$same = $result->num_rows;
if($same>0){
 $session->msg("d", "you can't have more than one evaluation request for an employee with the same date");
    redirect('performance-management.php',false);
}else{
  $sql = "INSERT INTO performance_review (employee_id,date,rel_with_colleagues,problem_solving,decision_making,punctuality";
  $sql .= ",attitude,leadership,communication,accuracy,work_ethics,productivity,time_management,collaboration_and_teamwork,";
  $sql .= "average,status,remark) VALUES ('$id','$date','$rel','$ps','$dm','$punc','$att','$led','$comm','$acc','$eth','$prod'";
  $sql .= ",'$time','$colt','$average','for approval','$remark')";




 
  if($db->query($sql)){
    
     $_SESSION['status'] = "Performance Review created and waiting for approval";
      $_SESSION['status_code'] = "success";
    redirect('performance-management.php',false);
  }
}

  }

 



include_once('layouts/header.php');

?>

<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '5'): ?>
   <a href="performance-management.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Employee Evaluation Form</a>
</nav>

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
  <div class="col-md-12 mb-3">
        <div class="card">
          <div class="card-header">
          <div class="col">
          <p>Rate from 0-100 </p>
        </div>
          </div>
        </div>
      </div>	

      </div>
     <div class="card-body">
     <div class="col-md-12">
      <div class="row">
        

       <form method="post" action="create-evaluation.php?id=<?php echo $id; ?>">

         <div class="container">
      <div class="row">
          <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Problem solving</label>
          </div>
          <input type="number" min="1" max="100" name="ps" >
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Decision making</label>
          </div>
          <input type="number" min="1" max="100" name="dm" >
        </div>
          <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Punctuality</label>
          </div>
          <input type="number" min="1" max="100" name="punc" >
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Attitude</label>
          </div>
          <input type="number" min="1" max="100" name="att" >
        </div>
         <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Leadership</label>
          </div>
          <input type="number" min="1" max="100" name="led" >
        </div>
         <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Communication</label>
          </div>
          <input type="number" min="1" max="100" name="comm" >
        </div>
         <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Accuracy</label>
          </div>
          <input type="number" min="1" max="100" name="acc" >
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Collaboration and teamwork</label>
          </div>
          <input type="number" min="1" max="100" name="colt" >
        </div>
         <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Time management</label>
          </div>
          <input type="number" min="1" max="100" name="time" >
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Work ethics</label>
          </div>
          <input type="number" min="1" max="100" name="eth" >
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Productivity</label>
          </div>
          <input type="number" min="1" max="100" name="prod" >
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-7">
            <label>Relationship with co-workers</label>
          </div>
          <input type="number" min="1" max="100" name="rel" >
        </div>
        <div class="col-md-8" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Remarks</label>
          </div>
          <input type="text"  name="remark" style="width: 40vw;" >
        </div>

        <div class="col-md-7">
          <button type="submit" name="submit" class="btn btn-sm btn-success">Submit </button>
        </div>


</div>
</div>


</form>



      </div>


      </div>
    </div>
    
     </div>
    </div>
  </div>


 
</div>




<?php include_once('layouts/footer.php'); ?>