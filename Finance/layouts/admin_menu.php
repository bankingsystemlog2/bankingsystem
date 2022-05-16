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
              ><i class="bi bi-bank2"></i
            ></span>
            <span>Processing Fees</span>
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
          <a href="Claims_reimbursment.php" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-credit-card-fill"></i></span>

            <!--Notification for Claims_reimbursment -->
            <?php foreach ($notificationClaims as $notificationClaims): ?>
              <?php if ($notificationClaims['Claims_reimbursmentNotif']>=1): ?>
              <span class="badge1" data-badge="<?php echo $notificationClaims['Claims_reimbursmentNotif']; ?>"> Claims & Reimbursment</span>
            <?php elseif ($notificationClaims['Claims_reimbursmentNotif']==0): ?>
              <span>Claims & Reimbursment</span>
            <?php endif; ?>
            <?php endforeach; ?>
          <!--EndNotification for Claims_reimbursment -->

          </a>
        </li>
        <li>
          <a href="procurement.php" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-bag"></i></span>

            <!--Notification for Procurment -->
            <?php foreach ($notificationProcurement as $notificationProcurement): ?>
              <?php if ($notificationProcurement['procurementNotif']>=1): ?>
              <span class="badge1" data-badge="<?php echo $notificationProcurement['procurementNotif']; ?>"> Procurment</span>
            <?php elseif ($notificationProcurement['procurementNotif']==0): ?>
              <span>Procurment</span>
            <?php endif; ?>
            <?php endforeach; ?>
          <!--EndNotification for Procurment -->

          </a>
        </li>
        <li>
          <a href="Utilitie&Expenses.php" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-cone-striped"></i></span>

            <!--Notification for Expenses -->

              <?php if ($notifDisburs['uCount']>=1): ?>
              <span class="badge1" data-badge="<?php echo $notifDisburs['uCount']; ?>"> Utilities & Expenses</span>
            <?php elseif ($notifDisburs['uCount']==0): ?>
              <span>Utilities & Expenses</span>
            <?php endif; ?>

          <!--EndNotification for Expenses -->

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

  <!-- Budget Management -->
    <li>
      <a
        class="nav-link px-3 sidebar-link"
        data-bs-toggle="collapse"
        href="#Budgets"
      >
        <span class="me-2"><i class="bi bi-wallet-fill"></i></span>
        <span>Budget Management</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="Budgets">
        <ul class="navbar-nav ps-3">
          <li>
            <a href="BudgetProposals.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-file-earmark-post"></i
              ></span>
              <span>Budget Proposals</span>
            </a>
          </li>
          <li>
            <a href="Budgetreleasing.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-cash"></i
              ></span>
              <span>Budget Releasing</span>
            </a>
          </li>
          <li>
            <a href="admin.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-calendar-check-fill"></i
              ></span>
              <span>Settled</span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <!-- End of Budget Management -->

    <!-- AP & AR Records  -->
      <li>
        <a
          class="nav-link px-3 sidebar-link"
          data-bs-toggle="collapse"
          href="#Records"
        >
          <span class="me-2"><i class="bi bi-file-earmark-bar-graph"></i></span>
          <span>AP & AR Records</span>
          <span class="ms-auto">
            <span class="right-icon">
              <i class="bi bi-chevron-down"></i>
            </span>
          </span>
        </a>
        <div class="collapse" id="Records">
          <ul class="navbar-nav ps-3">
            <li>
              <a href="AccountsPayables.php" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi bi-file-earmark-spreadsheet"></i
                ></span>
                <span>Accounts Payable Records</span>
              </a>
            </li>
            <li>
              <a href="AccountsRecievable.php" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi bi-file-earmark-spreadsheet"></i
                ></span>
                <span>Accounts Recievable Records</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <!-- End of AP & AR Records -->

      <!-- General Ledger  -->
        <li>
          <a
            class="nav-link px-3 sidebar-link"
            data-bs-toggle="collapse"
            href="#GeneralLedger"
          >
            <span class="me-2"><i class="bi bi-journal-bookmark-fill"></i></span>
            <span>General Ledger</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="bi bi-chevron-down"></i>
              </span>
            </span>
          </a>
          <div class="collapse" id="GeneralLedger">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="Accounts.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-list"></i
                  ></span>
                  <span>Accounts List</span>
                </a>
              </li>
              <li>
                <a href="Groups_List.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-collection"></i
                  ></span>
                  <span>Group List</span>
                </a>
              </li>
              <li>
                <a href="General-Journal.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-journals"></i
                  ></span>
                  <span>Journal Entries</span>
                </a>
              </li>
              <li>
                <a href="trial_balance.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-journal-bookmark-fill"></i
                  ></span>
                  <span>Trial Balance</span>
                </a>
              </li>
              <li>
                <a href="working_trial_balance.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-journal-check"></i
                  ></span>
                    <span>Reports Trial Balance</span>
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
