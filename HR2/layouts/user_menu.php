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

  <li>
    <a href="personal-infou.php?id=<?php echo $_SESSION['user_id']?>" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-people"></i></span>
      <span>Personal Information</span>
    </a>
  </li>
  <li>
    <a href="schedule.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-calendar"></i></span>
      <span>Schedule</span>
    </a>
    <a href="attendance.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-list"></i></span>
      <span>Attendance</span>
    </a>
    <a href="leave.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-file"></i></span>
      <span>Leave</span>
    </a>
    <a href="salary.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-cash-stack"></i></span>
      <span>Salary</span>
    </a>
    <li>
      <a class="nav-link px-3 sidebar-link"
        data-bs-toggle="collapse"
        href="#USER1">
        <span class="me-2"><i class="bi bi-pencil-square"></i></span>
        <span>Examination</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="USER1">
        <ul class="navbar-nav ps-3">
          <li>
            <a class="nav-link px-3 sidebar-link"
              data-bs-toggle="collapse"
              href="#HR1c1">
              <span class="me-2"><i class="bi bi-list"></i></span>
              <span>All Exam</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="HR1c1">
              <ul class="navbar-nav ps-3">
                <?php
                $att_list = "SELECT * FROM mst_subject";
                $att_list_run = mysqli_query($conn, $att_list);
                
                if(mysqli_num_rows($att_list_run) > 0 )
                {
                while($row = mysqli_fetch_assoc($att_list_run))
                {
                ?>
                <li>
                  <a href="exam-showtest.php?subid=<?php echo $row['sub_id'];?>" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-pencil-square"></i></span>
                    <span><?php echo $row['sub_name'];?></span>
                  </a>
                </li>
                <?php
                }
                }
                else {
                echo "No Available Exam Yet!";
                }
                ?>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </li>
  </li>
  </ul>
