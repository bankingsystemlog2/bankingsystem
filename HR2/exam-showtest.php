<?php
  $page_title = 'Exam Show Test';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Examination</a>
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

        <?php
        extract($_GET);
        $rs1=mysqli_query($conn,"select * from mst_subject where sub_id=$subid");
        $row1=mysqli_fetch_array($rs1);
                  echo"<span class='badge rounded-pill bg-success'><i class='bi bi-pencil'></i> $row1[1]</span>
      </div>
      <div class='card-body'>";
        $rs=mysqli_query($conn,"select * from mst_test where sub_id=$subid");
        if(mysqli_num_rows($rs)<1)
        {
          echo "<center><h3><font color=green> No Exam for this Subject</font></h3></center>";
          exit;
        }
        echo "<center><h3><font color=green> Select Exam Name To Give Exam</font></h3></center>";
        echo "<table align=center>";

        while($row=mysqli_fetch_row($rs))
        {
          echo "<tr><td align=center ><a class='btn btn-success btn-sm'href=exam-take.php?testid=$row[0]&subid=$subid><font size=4>$row[2]</font></a>";
        }
        echo "</table>";
        ?>

      </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
