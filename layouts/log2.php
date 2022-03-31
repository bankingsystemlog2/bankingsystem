<ul class="navbar-nav">
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3">
      LOG 2
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
      <span class="badge1" data-badge="<?php echo $notifCollection['notifCollection']; ?>">Fleet Management</span>
    <?php elseif ($notifCollection['notifCollection']==0): ?>
      <span>Fleet Management</span>
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
          <a href="fleet.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-person-lines-fill"></i></span>

              <!--Notification for Loans -->
                <?php foreach ($notifCollectionLoans as $notifCollectionLoans): ?>
                <?php if ($notifCollectionLoans['LoansNotif']>=1): ?>
                <span class="badge1" data-badge="<?php echo $notifCollectionLoans['LoansNotif']; ?>">Vehicle Information</span>
              <?php elseif ($notifCollectionLoans['LoansNotif']==0): ?>
                <span>Vehicle Information</span>
              <?php endif; ?>
              <?php endforeach; ?>
            <!--EndNotification for Loans -->

          </a>
        </li>           
      </ul>
    </div>
  </li>

<!-- End of Collections -->

<!-- Vehicle Reservation -->
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
       <span class="badge1" data-badge="<?php echo $totalnot; ?>">Vehicle Reservation</span>
     <?php elseif ($notifCollection['notifCollection']==0): ?>
      <span>Vehicle Reservation</span>
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
          <a href="vehicles.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-credit-card-fill"></i
            ></span>
            <span>Vehicle Reservation</span>
          </a>
        </li>          
      </ul>
    </div>
  </li>
  <!-- End of Disbursments -->

  <!-- Budget Management -->
    <li>
      <a
        class="nav-link px-3 sidebar-link"
        data-bs-toggle="collapse"
        href="#Budgets"
      >
        <span class="me-2"><i class="bi bi-wallet-fill"></i></span>
        <span>Vendor</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="Budgets">
        <ul class="navbar-nav ps-3">
          <li>
            <a href="vendor.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-file-earmark-post"></i
              ></span>
              <span>List of Applicants</span>
            </a>
          </li>
          <li>
            <a href="vendor_list.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-cash"></i
              ></span>
              <span>Vendor List</span>
            </a>
          </li>          
        </ul>
      </div>
    </li>
    <!-- End of Budget Management -->

    <!-- Document Tracking  -->
      <li>
        <a
          class="nav-link px-3 sidebar-link"
          data-bs-toggle="collapse"
          href="#Records"
        >
          <span class="me-2"><i class="bi bi-file-earmark-bar-graph"></i></span>
          <span>Document Tracking</span>
          <span class="ms-auto">
            <span class="right-icon">
              <i class="bi bi-chevron-down"></i>
            </span>
          </span>
        </a>
        <div class="collapse" id="Records">
          <ul class="navbar-nav ps-3">
            <li>
              <a href="document.php" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi bi-file-earmark-spreadsheet"></i
                ></span>
                <span>Tracking</span>
              </a>
            </li>            
          </ul>
        </div>
      </li>
      <!-- End of Document Tracking -->

      <!-- General Ledger  -->
        <li>
          <a
            class="nav-link px-3 sidebar-link"
            data-bs-toggle="collapse"
            href="#GeneralLedger"
          >
            <span class="me-2"><i class="bi bi-journal-bookmark-fill"></i></span>
            <span>Audit Management</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="bi bi-chevron-down"></i>
              </span>
            </span>
          </a>
          <div class="collapse" id="GeneralLedger">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="audit_form.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-clipboard-data-fill"></i
                  ></span>
                  <span>Audit</span>
                </a>
              </li>              
            </ul>
          </div>
        </li>
      <!-- End of General Ledger -->

 <!-- All Sub modules Side Nav Bar End -->
  <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
  <li>
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
