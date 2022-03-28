<?php
  $page_title = 'Fleet Management';
  require_once('../includes/log2load.php');
?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "bank");  
 $query = "SELECT * FROM v_info ORDER BY fleetid desc";  
 $result = mysqli_query($connect, $query);  
 ?> 
<?php
// Checkin What level user has permission to view this page
 page_require_level(4);
//pull out all user form database
 $all_users = find_all_user();
?>

<?php include_once('../layouts/header.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Vehicle Reservation</span>
       </strong>
      </div>
      <div class="col-md-2">
        <input type="date" name="from_date" id="from_date" class="form-control dateFilter input" placeholder="From Date" />
      </div>
      <div class="col-md-3">
        <input type="date" name="to_date" id="to_date" class="form-control dateFilter input2" placeholder="To Date" />
      </div>
      <div class="col-md-2">
        <input type="button" name="search" id="btn_search" value="Search" class="btn btn-primary" />
      </div>
      <div class="row">
      
    </div>
      <div class= "card-body">        
      <table class="table-responsive">
        <thead>
          <tr>
            <th>Model</th>  
            <th>Seating Capacity</th>  
            <th>Type</th>  
            <th>Category</th>  
            <th>Order Date</th>  
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($result)){ ?>
            <tr>
            <td><?php echo remove_junk(ucwords($row['v_model']));?></td>
            <td><?php echo remove_junk(ucwords($row['v_capacity']));?></td>
            <td><?php echo remove_junk(ucwords($row['v_enginetype']));?></td>
            <td><?php echo remove_junk(ucwords($row['v_category']));?></td>
            <td><?php echo remove_junk(ucwords($row['v_regnum']));?></td>
          <?php }?>
        </tbody>
      </table>
        <script> 
          let input = document.querySelector(".input");
          let input2 = document.querySelector(".input2");
          input2.disabled = true;
          input.addEventListener("change", stateHandle);

          function stateHandle() {
              if(document.querySelector(".input").value === "") {
                  input2.disabled = true;
              } else {
                  input2.disabled = false;
              }
          } 
          $(document).ready(function(){  
          $.datepicker.setDefaults({  
            dateFormat: 'yy-mm-dd'   
          });  
          $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
          });  
          $('#to_date').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                  $.ajax({  
                    url:"filter.php",  
                      method:"POST",  
                      data:{from_date:from_date, to_date:to_date},  
                      success:function(data)  
                      {  
                          $('#order_table').html(data);  
                      }  
                  });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
      </div>
    </div>
  </div>
  
</div>

  <?php include_once('../layouts/footer.php'); ?>
  