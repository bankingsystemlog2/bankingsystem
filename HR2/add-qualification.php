<?php
  $page_title = 'Add Qualification';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   
   if(isset($_POST['addsubjbtnsw']))
{
    $que = $_POST['que'];
     $ans = $_POST['ans'];
      $dept = $_POST['dept'];
      $page = $_POST['page'];
      $pos = $_POST['pos'];

    
        $query = "INSERT INTO questionaires (question,answer,department,position) VALUES ('$que','$ans','$dept','$pos')";
       
    
        if($db->query($query))
        {
           $session->msg('s','Question added');
            redirect($page,false);
        }
      }
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
 
   <a href="hr_exams.php" class="breadcrumbs__item">Back</a>
 
  <a href="#checkout" class="breadcrumbs__item is-active">Add Qualification</a>
</nav>
<!-- /Breadcrumb -->

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
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Qualification</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job title</label>
                      <div class="col-md-8">
                        <input type="hidden" name="page" value="<?php echo $_GET['page'] ?>">
                        <input type="text" name="jt" class="form-control" required>
                    </div>
                  </div> <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Description</label>
                      <div class="col-md-8">
                        <input type="text" name="jd" class="form-control" required>
                    </div>
                  </div> <br>
                  <div class="form-group row">
                    
                    <label class="col-form-label col-md-4">Job qualification</label>
                    <div class="col-md-8">
                      <input type="text" name="jq" class="form-control" requireds>
                    </div>
                  </div> <br>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary</label>
                      <div class="col-md-8">
                        <input type="text" name="sal" class="form-control" required>
                    </div>
                  </div><br>
                     <div class="form-group row">
                    <label class="col-form-label col-md-4">Department</label>
                      <div class="col-md-8">
                        <select class="form-control" name="dept">
                          <option value="hr">Human resource</option>
                          <option value="financials">Financials</option>
                          <option value="admin">Administrative</option>
                          <option value="core"> Core</option>
                          <option value="log">Logistics</option>
                        </select>
                    </div>
                  </div>
                  <br> <br> <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addquali" class="btn btn-primary text-white">Submit</button>
                      <a href="<?php echo $_GET['page']?>" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
