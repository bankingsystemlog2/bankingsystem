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

  <!-- Human Resource Management 4 -->
    <li>
      <a class="nav-link px-3 sidebar-link"
        data-bs-toggle="collapse"
        href="#HR4">
        <span class="me-2"><i class="bi bi-list"></i></span>
        <span>Human Resource 4</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="HR4">
        <ul class="navbar-nav ps-3">
          <li>
            <a class="nav-link px-3 sidebar-link"
              data-bs-toggle="collapse"
              href="#HR4c1">
              <span class="me-2"><i class="bi bi-clipboard-data-fill"></i></span>
              <span>Core Human Capital</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="HR4c1">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="post-employment.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi-file-post"></i></span>
                    <span>Post Employment</span>
                  </a>
                </li>
				 <li>
                  <a href="emp_leave.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi-file-post"></i></span>
                    <span>Employee Leave</span>
                  </a>
                </li>
                <li>
                  <a href="applicant-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi-view-list"></i></i></span>
                    <span>Employee List</span>
                  </a>
                </li>
                <li>
                  <a href="contract.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi-arrows-angle-contract"></i></i></span>
                    <span>Contract</span>
                  </a>
                </li>
                <li>
                  <a href="manpower_request.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-list"></i></span>
                    <span>Manpower Request</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link"
              data-bs-toggle="collapse"
              href="#HR4a">
              <span class="me-2"><i class="bi bi-graph-up"></i></span>
              <span>HR Analytics</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="HR4a">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="hr-analytics-employees.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi-view-list"></i></span>
                    <span>Employees</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link"
              data-bs-toggle="collapse"
              href="#HR4c">
              <span class="me-2"><i class="bi bi-wallet2"></i></span>
              <span>Compensation Planning</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="HR4c">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="job-planning.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-list"></i></span>
                    <span>Job Planning</span>
                  </a>
                </li>
                <li>
                  <a href="promoted-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi-person-lines-fill"></i></i></span>
                    <span>List Of Promoted</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="payroll.php" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-wallet-fill"></i></span>
              <span>Payroll</span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <!-- End of Human Resource Management 4  -->


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
