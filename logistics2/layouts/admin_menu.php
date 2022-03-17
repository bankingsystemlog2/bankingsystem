<?php $user = current_user(); ?>
<ul>
  <li>
    <a href="admin.php">
      <i class="glyphicon glyphicon-home"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-user"></i>
      <span>Fleet Management</span>
    </a>
    <ul class="nav submenu">
      <li><a href="fleet.php">Vehicle Information</a> </li>
      
   </ul>
    <ul class="nav submenu">
      <li><a href="fleet_addvehicle.php">Add Vehicle</a> </li>
      
   </ul>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-list-alt"></i>
      <span>Vendor</span>
    </a>
    <ul class="nav submenu">
    <!-- <?php if($_SESSION['user_id'] == '3'){ ?> -->
    <li><a href="vendor.php">List of Applicant</a></li>
    <?php }?>

    <!-- <li><a href="applicationform.php">Vendor Application</a></li> -->
    <li><a href="vendor_list.php">Vendor List</a></li>
   </ul>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-list-alt"></i>
       <span>Vehicles</span>
      </a>
      <ul class="nav submenu">
      <li><a href="vehicles.php">Reservation List</a></li>
      </ul>
      <ul class="nav submenu">
  
      <li><a href="vehicle_reservation_form.php">Reservation Form</a></li>
      </ul>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-list-alt"></i>
       <span>Document Tracking</span>
      </a>
      <ul class="nav submenu">
      <li><a href="document.php">Tracking</a></li>
      </ul>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-list-alt"></i>
       <span>Audit</span>
      </a>
      <ul class="nav submenu">
      <li><a href="audit_form.php">Audit</a></li>
      </ul>
  </li>