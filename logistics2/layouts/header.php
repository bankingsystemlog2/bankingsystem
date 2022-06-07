<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
  <!-- All Bootstrap Links -->
      <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
      <link rel="stylesheet" href="libs/css/dataTables.bootstrap5.min.css" />
      <link rel="stylesheet" href="libs/css/style.css" />
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
       <script src="libs/js/jquery-3.5.1.min.js"></script>
      <script src="libs/js/SweetAlert/sweetalert.min.js"></script>

  <!-- End of Links -->


    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Administrative System";?>
    </title>
  </head>
  
  <body>
  <?php  if ($session->isUserLoggedIn(true)): ?>

<!-- Notifcation Codes -->
    <?php $notifDisburs=notification_Disbursment(); ?>
    <?php $notifReleasing=notification_Budget(); ?>
    <?php $notifCollection=notification_Collection() ?>
    <?php $notifCollectionLoans=notification_Loans(); ?>
    <?php $notifCollectionDeposits= notification_deposits(); ?>
<!-- Notification Code End -->

<!-- top navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top topNavBar">
  <div class="container-fluid">
      <?php if($user['user_level'] === '1'): ?>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#sidebar"
      aria-controls="offcanvasExample"
    >
      <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
    </button>
    <?php elseif($user['user_level'] === '2'): ?>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#sidebar"
      aria-controls="offcanvasExample"
    >
      <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
    </button>
      <?php endif;?>
    <a
      class="navbar-brand me-auto ms-lg-0 ms-2 text-uppercase fw-bold"
      href="#"
      >Banking and Finance</a>
    
     
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle ms-2"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
          <img src="uploads/users/<?php echo $user['image'];?>" width="30" height="30" class="rounded-circle"> <span class="badge rounded-pill bg-success"><?php echo remove_junk(ucfirst($user['name'])); ?></span>
     </a>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="profile.php?id=<?php echo (int)$user['id'];?>"><i class="bi bi-person-badge-fill"></i> Profile</a></li>
            <li><a class="dropdown-item" href="Settings.php"><i class="bi bi-gear-fill"></i> Settings</a></li>
            <li>
              <a class="dropdown-item" href="../logout.php"><i class="bi bi-door-open-fill"></i> Log-out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
   <!-- End of top navigation bar -->

      <?php if($user['user_level'] === '1'): ?>
        <!-- admin menu -->
<div class="offcanvas offcanvas-start bg-dark sidebar-nav" tabindex="-1" id="sidebar">
<div class="offcanvas-body p-0">
<nav class="navbar-dark">
      <?php include_once('admin_menu.php');?>
    </nav>
  </div>
 </div>
  <main class="mt-5 pt-3">
  <div class="container-fluid">
  <div class="page">
    <?php elseif($user['user_level'] === '2'): ?>
        <!-- Special user -->
<div class="offcanvas offcanvas-start bg-dark sidebar-nav" tabindex="-1" id="sidebar">
<div class="offcanvas-body p-0">
<nav class="navbar-dark">
      <?php include_once('user_menu.php');?>
    </nav>
  </div>
 </div>
  <main class="mt-5 pt-3">
  <div class="container-fluid">
  <div class="page">
    <?php elseif($user['user_level'] === '3'): ?>
  <div class="container-fluid">
  <div class="page">
      <?php endif;?>

<?php endif;?>
