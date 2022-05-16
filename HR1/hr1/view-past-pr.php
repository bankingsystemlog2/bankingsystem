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
$id = $_GET['id'];
  
  if(isset($_POST['submit'])){


  if(empty($_POST['ps'])){
     
     $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $ps = remove_junk($db->escape($_POST['ps']));
  }

  if(empty($_POST['dm'])){
      $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $dm = remove_junk($db->escape($_POST['dm']));
  }

  if(empty($_POST['punc'])){
      $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $punc = remove_junk($db->escape($_POST['punc']));
  }

  if(empty($_POST['att'])){
      $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $att = remove_junk($db->escape($_POST['att']));
  }
   if(empty($_POST['rel'])){
      $_SESSION['status'] ="Set the grade for each criteria";
            $_SESSION['status_code'] = "warning";
    redirect('create-evaluation.php?id='.$id,false);
  }else{
    $rel = remove_junk($db->escape($_POST['rel']));
  }

  $total = $com_skill + $work_exp + $back_ed + $att + $rel;
  $average = $total/5;
  $date = date('Y-m-d');

  $sql = "UPDATE performance_review SET rel_with_colleagues = '$rel',problem_solving = '$ps',decision_making = '$dm',";
  $SQL .= "punctuality = '$punc',attitude = '$att',average = '$average' WHERE employee_id = '$id'";
  
  if($db->query($sql)){
     
      $_SESSION['status'] ="Performance Review Updated";
            $_SESSION['status_code'] = "success";
    redirect('performance-management.php',false);
  }

  }

  $sql = "SELECT employees.*,performance_review.* FROM performance_review JOIN employees ON ";
$sql .= "performance_review.employee_id = employees.employee_id WHERE performance_review.employee_id = '$id'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
?>

<?php include_once('layouts/header.php'); ?>

<nav class="breadcrumbs">
    <a href="evaluation-history.php" class="breadcrumbs__item">Back</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Performance Review Form</a>
</nav>

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
  <div class="card">
          <div class="card-header">
          <div class="col">
          <p>Rate 1-5 | 1-Very Good | 2-Good | 3-Average | 4-Needs Improvement | 5-Poor </p>
        </div>
          </div>
        </div>
      </div>	

    <div class="card-body">
     <div class="col-md-12">
      <div class="row">
        

       <form method="post" action="create-evaluation.php?id=<?php echo $id; ?>">

          <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Problem solving</label>
          </div>
          <input disabled type="number" min="1" max="5" name="ps" value="<?php echo $info['problem_solving'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Decision making</label>
          </div>
          <input disabled type="number" min="1" max="5" name="dm" value="<?php echo $info['decision_making'] ?>">
        </div>
          <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Punctuality</label>
          </div>
          <input disabled type="number" min="1" max="5" name="punc" value="<?php echo $info['punctuality'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Attitude</label>
          </div>
          <input disabled type="number" min="1" max="5" name="att" value="<?php echo $info['attitude'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Leadership</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['leadership'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Communication</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['communication'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Accuracy</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['accuracy'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Collaboration and teamwork</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['collaboration_and_teamwork'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Time management</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['time_management'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Work Ethics</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['work_ethics'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Productivity</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['productivity'] ?>">
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Relationship with co-workers</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['rel_with_colleagues'] ?>">
        </div>










      </div>


      </div>
    </div>
    
     </div>
    </div>
  </div>


 
</div>







 <?php include_once('layouts/footer.php'); ?>