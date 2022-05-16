<?php
  $page_title = 'Recruitment|Job posting';
  require_once('includes/load.php');
  
  $user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
  page_require_level(1);
}


  $job = find_by_job_id('job_vacancy',(int)$_GET['id']);
  $groups  = find_all('job_id');
  if(!$job){
    
    $_SESSION['status'] ="Missing job id";
            $_SESSION['status_code'] = "error";
    redirect('job-posting.php');
  }



?>

<?php include_once('layouts/header.php'); ?>

<nav class="breadcrumbs">
  
    <a href="job-posting.php" class="breadcrumbs__item">Back</a>
 
   

  <a href="#" class="breadcrumbs__item is-active">Review post</a>
</nav>


 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Job to be Posted
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="request-jobpost.php?id=<?php echo $job['job_id']?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Job Title</label>
                  <input type="text" disabled class="form-control"  value="<?php echo remove_junk(ucwords($job['job_title'])); ?>" style="width:50%;">
                  <input type="hidden" value="<?php echo $job['job_title'] ; ?>" name="job_title">
            </div>
            <div class="form-group">
                  <label for="username" class="control-label">No. of Vacancy</label>
                  <input type="text" disabled class="form-control"  value="<?php echo remove_junk(ucwords($job['no_of_vacancy'])); ?>" style="width:10%;">
                  <input type="hidden" value="<?php echo $job['no_of_vacancy'] ; ?>" name="no_of_vacancy">
            </div>
            <div class="form-group">
                  <h5>Job Description</h5>
                  <input type="hidden" value="<?php echo $job['job_description'] ; ?>" name="job_description">
                  <textarea style="width :70vw; height: 30vh;"><?php echo remove_junk(ucwords($job['job_description'])); ?></textarea>
            </div>
            <div class="form-group">
                  <h3>Qualification</h3>
                  <textarea style="width :70vw; height: 30vh;"><?php echo remove_junk(ucwords($job['job_qualification'])); ?></textarea>
                   <input type="hidden" value="<?php echo $job['job_id'] ; ?>" name="job_id">
                    <input type="hidden" value="<?php echo $job['job_qualification'] ; ?>" name="job_qualification">
                  <input type="hidden" value="<?php echo $id ; ?>" name="id">
            </div>
           
           
            <div class="form-group clearfix">
                    <button type="submit" name="submit" class="btn btn-success"><i class="bi bi-file-post"></i>Request Approval</button>
            </div>
        </form>
       </div>
     </div>
  </div>
  
  

 </div>
<?php include_once('layouts/footer.php'); ?>
