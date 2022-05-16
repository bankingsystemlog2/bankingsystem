<ul class="navbar-nav">
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3">
      CORE
    </div>
  </li>
  <li>
    <a href="user_dashboard.php" class="nav-link px-3 active">
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

<!-- Collections -->
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
      <span class="badge1" data-badge="<?php echo $notifCollection['notifCollection']; ?>">Collection</span>
    <?php elseif ($notifCollection['notifCollection']==0): ?>
      <span>Collection</span>
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
                <span class="badge1" data-badge="<?php echo $notifCollectionLoans['LoansNotif']; ?>">List of Loans</span>
              <?php elseif ($notifCollectionLoans['LoansNotif']==0): ?>
                <span>List of Loans</span>
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
              <span class="badge1" data-badge="<?php echo $notifCollectionDeposits['DepositsNotif']; ?>"> List of Deposits</span>
            <?php elseif ($notifCollectionDeposits['DepositsNotif']==0): ?>
              <span>List of Deposits</span>
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
            <span>All Collections</span>
          </a>
        </li>
      </ul>
    </div>
  </li>

<!-- End of Collections -->

<!-- Disbursments -->
  <li>
    <a
      class="nav-link px-3 sidebar-link"
      data-bs-toggle="collapse"
      href="#Disbursments"
    >
      <span class="me-2"><i class="bi bi-receipt"></i></span>

      <?php $totalnot=0; foreach ($notifDisburs as $notifDisburs): ?>
      <?php
      $totalnot=$notifDisburs['roCount']+$notifDisburs['poCount']+$notifDisburs['uCount'];
       if ($totalnot>=1): ?>
       <span class="badge1" data-badge="<?php echo $totalnot; ?>">Disbursment</span>
     <?php elseif ($notifCollection['notifCollection']==0): ?>
      <span>Disbursment</span>
      <?php endif; ?>
      <?php endforeach; ?>

      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="Disbursments">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="admin.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-credit-card-fill"></i
            ></span>
            <span>Claims & Reimbursment</span>
          </a>
        </li>
        <li>
          <a href="admin.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-bag"></i
            ></span>
            <span>Procurment</span>
          </a>
        </li>
        <li>
          <a href="admin.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-cone-striped"></i
            ></span>
            <span>Utilities & Expenses</span>
          </a>
        </li>
        <li>
          <a href="admin.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-cash"></i
            ></span>
            <span>Payroll</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <!-- End of Disbursments -->
    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
      Addons
    </div>
  </li>
  <li>
    <a href="#" class="nav-link px-3">
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
