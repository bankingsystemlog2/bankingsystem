<ul class="navbar-nav">
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3">
      CORE
    </div>
  </li>
  <li>
    <a href="admin.php" class="nav-link px-3 active">
      <span class="me-2"><i class="bi bi-speedometer2"></i></span>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
      Interface
    </div>
  </li>
<!-- All Sub modules Side Nav Bar -->

<!-- Finance -->
  <li>
    <a
      class="nav-link px-3 sidebar-link"
      data-bs-toggle="collapse"
      href="#Collections"
    >
    <span class="me-2"><i class="bi bi-book-half"></i></span>

    <!-- Notification Codes For Collection -->
      <?php foreach ($notifCollection as $notifCollection): ?>
      <?php if ($notifCollection['notifCollection']>=1): ?>
      <span class="badge1" data-badge="<?php echo $notifCollection['notifCollection']; ?>">Finance</span>
    <?php elseif ($notifCollection['notifCollection']==0): ?>
      <span>Finance</span>
    <?php endif; ?>
    <?php endforeach; ?>
    <!-- End of Notifcation Codes -->


      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="Collections">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="ListofLoans.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-person-lines-fill"></i></span>

              <!--Notification for Loans -->
                <?php foreach ($notifCollectionLoans as $notifCollectionLoans): ?>
                <?php if ($notifCollectionLoans['LoansNotif']>=1): ?>
                <span class="badge1" data-badge="<?php echo $notifCollectionLoans['LoansNotif']; ?>">Collection</span>
              <?php elseif ($notifCollectionLoans['LoansNotif']==0): ?>
                <span>Collection</span>
              <?php endif; ?>
              <?php endforeach; ?>
            <!--EndNotification for Loans -->

          </a>
        </li>
        <li>
          <a href="ListOfDeposits.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-wallet2"></i
            ></span>

            <!--Notification for Deposits -->
              <?php foreach ($notifCollectionDeposits as $notifCollectionDeposits): ?>
              <?php if ($notifCollectionDeposits['DepositsNotif']>=1): ?>
              <span class="badge1" data-badge="<?php echo $notifCollectionDeposits['DepositsNotif']; ?>">Disbursment</span>
            <?php elseif ($notifCollectionDeposits['DepositsNotif']==0): ?>
              <span>Disbursment</span>
            <?php endif; ?>
            <?php endforeach; ?>
          <!--EndNotification for Deposits -->

          </a>
        </li>
        <li>
          <a href="Collections.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>Budget Management</span>
          </a>
        </li>
        <li>
          <a href="Collections.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>AP & AR</span>
          </a>
        </li>
        <li>
          <a href="Collections.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>General-Ledger</span>
          </a>
        </li>
      </ul>
    </div>
  </li>

<!-- End of Finance -->

<!-- HR1 -->
<li>
    <a
      class="nav-link px-3 sidebar-link"
      data-bs-toggle="collapse"
      href="#HR1"
    >
    <span class="me-2"><i class="bi bi-book-half"></i></span>
      <span>HR1</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="HR1">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="HR1/hr1/job-posting.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-person-lines-fill"></i></span>
                <span>Recruitment</span>
          </a>
        </li>
        <li>
          <a href="HR1/hr1/qualified-applicants.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-file-post"></i></span>
              <span>Applicant Management</span>
          </a>
        </li>
        <li>
          <a href="HR1/hr1/newhire-onboard.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-file-post-fill"></i
            ></span>
            <span>New Hire Onboard</span>
          </a>
        </li>
        <li>
          <a href="HR1/hr1/performance-management.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>Performance Management</span>
          </a>
        </li>
        <li>
          <a href="HR1/hr1/social-recognition.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-award"></i
            ></span>
            <span>Social Recognition</span>
          </a>
        </li>
      </ul>
    </div>
     <li>091df6475acce1cfbd4c0d0d6635868cdc6f57b8
    <a
      class="nav-link px-3 sidebar-link"
      data-bs-toggle="collapse"
      href="#HR2"
    >
    <span class="me-2"><i class="bi bi-book-half"></i></span>
      <span>HR2</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="HR2">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="#" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-person-lines-fill"></i></span>
                <span>Competency Management</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-wallet2"></i></span>
              <span>Succession Planning</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>Learning Management</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>Training Management</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  </li>

<!-- HR1 -->


 <!-- All Sub modules Side Nav Bar End -->
  <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
      Addons
    </div>
  </li>
  <li>
    <a href="Charts.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-graph-up"></i></span>
      <span>Charts</span>
    </a>
  </li>
  <li>
    <a href="#" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-table"></i></span>
      <span>Tables</span>
    </a>
    <a href="users.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-people-fill"></i></span>
      <span>Manage Users</span>
    </a>
    <a href="" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-clock-fill"></i></span>
      <span>: <span class="badge rounded bg-secondary"><?php echo date("F j, Y, g:i a");?></span></span>
    </a>
    <a href="#" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-back"></i></span>
      <span><button class="btn-toggle btn-secondary background"><i class="bi bi-moon-fill"></i></button></span>
    </a>
  </li>
  </ul>
