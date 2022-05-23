<?php
  ob_start();
  require_once('includes/load.php');
  $users_id = current_sup()['id'];
  $groups = find_all('vendors');
  $all_vendors = find_all_inner('vendors');
  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Banking and Finance - Job Posting page</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/sweetalert/sweetalert2.min.js"></script>
    </head>
    <body>
      <?php  if ($session->isUserLoggedIn(true)){ ?>
       <nav class="navbar navbar-expand-lg navbar-light bg-primary static-top">
  <div class="container">
    <a class="navbar-brand text-white" href="index.php">
      Banking and Finance
    </a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
       

        
       <li class="nav-item dropdown">
       <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="search.php">Apply</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="home.php">Home</a>
        </li>
          <!-- <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php?id=<?php echo $id['applicant_id']; ?>">Profile</a></li>
            
              <hr class="dropdown-divider">
            </li>  -->
            <li><a class="nav-link active text-white" aria-current="page" href="logout.php">Logout</a></li> 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
            <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>Product Name</th>
                <th>Name</th>
                <th>Address</th>
                <th class="text-center" style="width: 15%;">Company Name</th>
                <th class="text-center" style="width: 15%;">Email</th>
                <th class="text-center" style="width: 15%;">Item Description</th>
                <th class="text-center" style="width: 15%;">Bidding Price</th>
                <th class="text-center" style="width: 15%;">Contact #</th>
                <th class="text-center" style="width: 15%;">Category</th>
                <th class="text-center" style="width: 10%;">Status</th>
                <th class="text-center" style="width: 100px;">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($all_vendors as $a_vendor): ?>
            <?php if($a_vendor['users_id'] == $users_id){ ?>
            <tr>
            <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['product_name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Address']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Company']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Email']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['item_description']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Offer']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['Phone']))?></td>
            <td>
            <?php if($a_vendor['category'] == 0): ?>
                <span class="label label-success"><?php echo "Contractor"; ?></span>
                <?php elseif($a_vendor['category'] == 1):?>
                <span class="label label-danger"><?php echo "Supplier"; ?></span>
                <?php endif;?>
            </td>
            <td>
            <?php if($a_vendor['statuss'] === '1'): ?>
                <span class="label label-success"><?php echo "Approved"; ?></span>
                <?php elseif($a_vendor['statuss'] === '0'): ?>
                <span class="label label-default"><?php echo "Pending"; ?></span>
                <?php elseif($a_vendor['statuss'] === '2'): ?>
                <span class="label label-danger"><?php echo "Rejected"; ?></span>
            <?php else: ?>
                <span class="label label-danger"><?php echo "Error"; ?></span>
            <?php endif;?>
            </td>
            <td>
                <input type="hidden" name="i_d" value="<?php echo $a_vendor['id'];?>">
              <button data-bs-toggle = "modal" data-bs-target = "#exampleModal-<?php echo $a_vendor['id'];?>" class="btn btn-warning"><i class="bi bi-file-earmark-post-fill"></i> Delete</a></td>
              <div class="modal top fade" id="exampleModal-<?php echo $a_vendor['id'];?>">
                <div class="modal-dialog modal-l modal-dialog-centered">
                  <div class="modal-content"> 
                    <form class="modal-content" action="../vendor_delete copy.php" method="post">
                      <div class="modal-header bg-secondary">
                        <div class="container">
                          <h1 class="modal-title">Are you sure?</h1>
                        </div>
                      </div>
                      <div class="modal-body">                                  
                          <h5>Do You Want To Delete This Application?</h5>
                      </div>
                      <div class="modal-footer bg-secondary">
                        <div>
                          <input type="hidden"name="i_d" value=<?php echo $a_vendor['id'];?>>
                        </div>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-success"><i class="fas fa-check"></i>Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </td>
            </tr>
            <?php }?>
            <?php endforeach;?>
        </tbody>
        </table>
        </div>
  </div>

<!-- <?php 
$user = $id['applicant_id'];
  
  

  





  $query = "SELECT job_vacancy.*,posted_jobs.*,positions.*,departments.*,job_qualifications.* FROM job_vacancy JOIN posted_jobs ON job_vacancy.job_id = posted_jobs.job_id JOIN positions ON job_vacancy.pos_id = positions.pos_id JOIN departments ON job_vacancy.dept_id = departments.dept_id JOIN job_qualifications ON job_vacancy.quali_id = job_qualifications.id WHERE posted_jobs.status = 'posted' AND posted_jobs.no_of_vacancy > 0 AND job_vacancy.status = 'approved'";
  $result = $db->query($query);
  $posii  = $result->fetch_assoc();
  $row = $result->num_rows;





?> -->



<div class="container" >
  <div class="row">
    <div class="col-xl-12 mt-3">
      <form class="col-xl-5 mx-auto " method="get" action="search.php" >
          <div class="input-group">
    <input type="text" class="form-control" placeholder="Search Job" name="search_job">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit" name="search">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
      </button>
  </div>
               </div>
               </form>
      
      </div>
      <div class="col-md-5 mt-2 mb-2" style="margin: auto;">
<?php echo display_msg($msg);  ?>
</div>

</div>


        
    
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       
        
 




        <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
    ?>
    <script>
    swal.fire({
    title: "<?php echo $_SESSION['status']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>",
    button: "OK",
    });
    </script>
    <?php
    unset($_SESSION['status']);
    }
    ?>
        
    </body>
</html>
<?php



 
 }else{  $session->msg('d','Please login...');
            redirect('login.php', false); }?>