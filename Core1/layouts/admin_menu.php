<ul class="navbar-nav">
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3">
      CORE 1
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
      
      <span class="badge1">Client Information</span>
  
      
    
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
          <a href="Collections.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>Client Information</span>
          </a>
        </li>

        <li>
          <a href="housingloan.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-person-lines-fill"></i></span>
                <span>LOAN</span>
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

       <span class="badge1" >Loan Processing</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="Disbursments">
      <ul class="navbar-nav ps-3">
        
        <li>
          <a href="procurement.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-bag"></i
            ></span>
            <span>Loan Processing</span>
          </a>
        </li>

                <li>
          <a href="approvedclient.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-bag"></i
            ></span>
            <span>Approved Client</span>
          </a>
        </li>
       
       <li>
          <a href="core1.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>Client Request</span>
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
        <span>Loan Payment Monitoring</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="Budgets">
        <ul class="navbar-nav ps-3">
          
          <li>
            <a href="loanpayment.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-cash"></i
              ></span>
              <span>Loan Payment Monitoring</span>
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
          <span>Loan Restructuring</span>
          <span class="ms-auto">
            <span class="right-icon">
              <i class="bi bi-chevron-down"></i>
            </span>
          </span>
        </a>
        <div class="collapse" id="Records">
          <ul class="navbar-nav ps-3">
            <li>
              <a href="loanrestructuring.php" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi bi-file-earmark-spreadsheet"></i
                ></span>
                <span>Loan Restructuring</span>
              </a>
            </li>
           
          </ul>
        </div>
      </li>
      <!-- End of AP & AR Records -->

     

 <!-- All Sub modules Side Nav Bar End -->
  <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
      Addons
    </div>
  </li>
  
  <li>
    
    <a href="users.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-people-fill"></i></span>
      <span>Manage Users</span>
    </a>
    <a class="nav-link px-3">
      <span class="me-2"><i class="bi bi-clock-fill"></i></span>
      <span>: <span class="badge rounded bg-secondary"><?php echo date("F j, Y, g:i a");?></span></span>
    </a>
    <a href="#" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-back"></i></span>
      <span><button class="btn-toggle btn-secondary background"><i class="bi bi-moon-fill"></i></button></span>
    </a>
  </li>
  </ul>
