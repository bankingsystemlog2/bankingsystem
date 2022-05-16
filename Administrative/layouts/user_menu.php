<ul class="navbar-nav">
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3">
    ADMINISTRATIVE
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

<!-- legal management -->
  <li>
    <a
      class="nav-link px-3 sidebar-link"
      data-bs-toggle="collapse"
      href="#Collections">
	
	
    <span class="me-2"><i class="bi bi-folder-minus"></i></span> 
      <span>Legal Management</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="Collections">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="contract-admin staff.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-person-lines-fill"></i></span>             
                <span>Contracts</span>
				</a>
				</li>
		
		
        <li>
          <a href="regulation-admin staff.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-wallet2"></i
            ></span>      
              <span>Rules and Regulation</span>           
          </a>
        </li>
		
		<li>
          <a href="Customer_loan.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>Customer Loans</span>
          </a>
		  
		  <li>
          <a href="complains.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-collection"></i
            ></span>
            <span>Complains</span>
          </a>
		  
		  <li>
         
	
		
		<box-icon name='user-detail' type='solid' ></box-icon>
     
      </ul>
    </div>
  </li>

<!-- End of legal management -->

<!-- document management -->
  <li>
    <a
      class="nav-link px-3 sidebar-link"
      data-bs-toggle="collapse"
      href="#Disbursments"
    >
      <span class="me-2"><i class="bi-folder"></i></span>
      <span>Document Management</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
	
	
	
    <div class="collapse" id="Disbursments">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="filestoring.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi-archive"></i></span>
            <span>File Storing</span>
          </a>
        </li>
		
		
        <li>
          <a href="procurement.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi-file-text"></i></span>
            <span>Document Request</span>
          </a>
        </li>
		
		
		
        <li>
          <a href="admin.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi-journal-check"></i></span>
            <span>Document Approval</span>
          </a>
        </li>
		
        <li>
          <a href="contract.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi-arrow-repeat"></i></span>
            <span>In & Out Going Documents</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <!-- End of Document Management -->
  
  
  
  <!-- visitor management -->
      <li>
        <a
          class="nav-link px-3 sidebar-link"
          data-bs-toggle="collapse"
          href="#Records"
        >
          <span class="me-2"><i class="bi-person-circle"></i></span>
          <span>Visitor Mangement</span>
          <span class="ms-auto">
            <span class="right-icon">
              <i class="bi bi-chevron-down"></i>
            </span>
          </span>
        </a>
        <div class="collapse" id="Records">
          <ul class="navbar-nav ps-3">
            <li>
              <a href="visitorinformation.php" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi-person-lines-fill"></i></span>
                <span>Visitor Information</span>
              </a>
            </li>
			
            <li>
              <a href="VisitorBlacklisted.php" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi-person-x-fill"></i></span>
                <span>Blacklist Person</span>
              </a>
            </li>
			
			
			<li>
              <a href="monitoring visitor.php" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi-person-bounding-box"></i></span>
                <span>Monitoring Visitor</span>
              </a>
            </li>
			
			<li>
              <a href="policyvisitor.php" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi-clipboard"></i></span>
                <span>Visitor Policy</span>
              </a>
            </li>
			
			<li>
			
			
             <!-- <a href="AccountsRecievable.php" class="nav-link px-3">-->
                <span class="me-2"
                  ><i class="bi bi-file-earmark-spreadsheet"></i
                ></span>
                <span>Total of Visitor</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <!-- End of visitor management-->

  <!-- Facility Management -->
    <li>
      <a
        class="nav-link px-3 sidebar-link"
        data-bs-toggle="collapse"
        href="#Budgets"
      >
        <span class="me-2"><i class="bi-building"></i></span>
        <span>Facility Management</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>   
          </span>
        </span>
      </a>
      <div class="collapse" id="Budgets">
        <ul class="navbar-nav ps-3">
          <li>
            <a href="facilities.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-file-earmark-post"></i
              ></span>
              <span>Facilities</span>
            </a>
          </li>
		  
		  
		  
          <li>
            <a href="equipment.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-cash"></i
              ></span>
              <span>Equipment</span>
            </a>
          </li>
		  
		  
          <li>
            <a href="admin.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-calendar-check-fill"></i
              ></span>
              <span>Report</span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <!-- End of facility Management -->
  
  
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
