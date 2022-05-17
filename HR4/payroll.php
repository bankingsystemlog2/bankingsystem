<?php
  $page_title = 'Payroll';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Payroll</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <div class="text-end">
          <a href="add_salary.php" class="btn btn-primary btn-xs-block" type="button">
         <i class="bi bi-plus"></i>
          Add Salary
         </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT * FROM payroll p, users u, jobplan jp WHERE p.p_eid=u.employee_id AND jp.jp_position=u.position AND jp.jp_type=u.type";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
                <th style="display: none">#</th>
                <th style="display: none">Basic Salary</th>
                <th style="display: none">Overtime</th>
                <th style="display: none">House And Rent Allowance (H.R.A)</th>
                <th style="display: none">Conveyance</th>
                <th style="display: none">Other Allowance</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Salary Date</th>
                <th>Payslip</th>
                <th class="text-end">Action</th>
             </tr>
            </thead>
           <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0 )
            {
            while($row = mysqli_fetch_assoc($query_run))
            {
            $bs = $row['p_bs'] * $row['jp_hrate'];
            $ot = $row['p_ot'] * $row['jp_otrate'];

            $ph = $row['jp_ph'];
            $sss = $row['jp_sss'];
            $pi = $row['jp_pi'];
            $tax = $row['jp_tax'];

            $totalearnings = $bs + $ot;
            $deduction = $ph + $sss + $pi + $tax;

            $totalsalary = $totalearnings - $deduction;
            ?>
             <tr>
            <td style="display: none"><?php echo $row['p_id']; ?></td>
            <td style="display: none"><?php echo $row['p_bs']; ?></td>
            <td style="display: none"><?php echo $row['p_ot']; ?></td>
            <td style="display: none"><?php echo $row['p_hra']; ?></td>
            <td style="display: none"><?php echo $row['p_con']; ?></td>
            <td style="display: none"><?php echo $row['p_oa']; ?></td>
            <td><?php echo $row['p_eid']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['position']; ?></td>
            <td>₱<?php echo $totalsalary;?></td>
            <td><?php echo $row['p_date']; ?></td>
            <td><a href="salary_view.php?id=<?php echo $row['p_id'];?>" class="btn btn-sm btn-primary">Generate</a></td>
            <td class="text-end">
              <a href="edit_salary.php?id=<?php echo $row['p_id'];?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
              <a href="delete_salary.php?id=<?php echo $row['p_id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
            </td>
             </tr>
              <?php
              }
              }
              else {
              echo "";
              }
              ?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
