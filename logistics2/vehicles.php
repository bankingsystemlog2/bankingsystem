<?php
  $page_title = 'Vehicle Reservation';
  require_once('includes/log2load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_all_user();
// ?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
   <?php elseif ($user['user_level'] === '4'): ?>
   <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Vehicle Reservation</a>
</nav>
<!-- /Breadcrumb -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <form method="post" action="vehicle_reservation_form.php" >
        <div class="col-md-4">
          <label for="from_date">Select start Date</label>
          <input required type="date" name="from_date" id="from_date" class="form-control datepicker input" placeholder="From Date" min="<?php echo date('Y-m-d',time() + 86400); ?>" />
        </div>
        <div class="col-md-4">
          <label for="to_date">Select end date</label>
          <input type="date" name="to_date" id="to_date" class="form-control datepicker input2" placeholder="To Date" min="<?php echo date('Y-m-d',time() + 86400); ?>" />
        </div>
        <div class="activity">
          
        </div>
      </form>
    </div>
  </div>  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){

      // load_data(); 
      let to_date = document.querySelector("#to_date");
      let from_date = document.querySelector("#from_date");
      to_date.addEventListener("change", stateHandle);
      from_date.addEventListener("change", stateHandle);
      to_date.disabled = true;
      function stateHandle() {
      if(document.querySelector("#from_date").value === "") {
          to_date.disabled = true;
          $('.activity').html('');          
        }
        else {
          if(document.querySelector("#to_date").value === ""){
            to_date.disabled = false;
            $('.activity').html('');
          } 
          else{          
            to_date.disabled = false;
            var fromdate = $('#from_date').val();
            var todate = $('#to_date').val();
            if (fromdate != '' && todate != '') {
              $.ajax({
                url:"vehicle_table.php",
                method:"POST",
                data:{fromdate:fromdate, todate:todate},
                success:function(data)
                {
                  $('.activity').html(data);
                }
              });
            }
            else {
              $('.activity').html('no data');
            }
          }     
          to_date.disabled = false;
          $('.activity').html('');
        } 
      }
      });
  </script>
<?php include_once('layouts/footer.php'); ?>
  