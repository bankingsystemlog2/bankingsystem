<?php
  $page_title = 'Fleet Management';
  require_once('../includes/log2load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(4);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php  
            $connect = mysqli_connect("localhost", "root", "", "bank");  
            $from = remove_junk(@$_POST['from_date']);
            $to = remove_junk(@$_POST['to_date']);
            $avail = "  
            SELECT fleetid FROM v_res WHERE ('".$from."'NOT BETWEEN from_date AND to_date) AND ('".$to."'NOT BETWEEN from_date AND to_date) AND (from_date NOT BETWEEN '".$from."' AND '".$to."') AND (from_date NOT BETWEEN '".$from."' AND '".$to."')
            ";  
            $query = "SELECT * FROM v_info WHERE ('".$avail."' != fleetid)";  
            $result = mysqli_query($connect, $query);  
            ?> 

<?php include_once('../layouts/log2header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Vehicle Reservation</span>
       </strong>
      </div>
      <div class="col-md-4">
        <label for="from_date"></label>
        <input type="date" name="from_date" id="from_date" class="form-control dateFilter input" placeholder="From Date" />
      </div>
      <div class="col-md-4">
        <label for="to_date"></label>
        <input type="date" name="to_date" id="to_date" class="form-control dateFilter input2" placeholder="To Date" />
      </div>
      <div class="col-md-2">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" value="Search" class="btn btn-primary button1" >Search</button>
      </div>
      <div class="row">
      
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <h5 class="modal-title" id="exampleModalLabel" style="Color:white">Select vehicle to reserve</h5>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
            <div class= "modal-body">     
               
            <table class="table-responsive">
              <thead>
                <tr>
                  <th>Model</th>  
                  <th>Seating Capacity</th>  
                  <th>Type</th>  
                  <th>Category</th>  
                  <th>Registration Number</th>  
                  <th></th>
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
                  <td>
                <?php }?>
              </tbody>
            </table>
              <script> 
                let input = document.querySelector(".input");
                let input2 = document.querySelector(".input2");
                let button1 = document.querySelector(".button1");
                button1.disabled = true;
                input.addEventListener("change", stateHandle);
                input2.addEventListener("change", stateHandle);

                function stateHandle() {
                    if(document.querySelector(".input").value === "" ||document.querySelector(".input2").value === ""  ) {
                        button1.disabled = true;
                    } else {
                        button1.disabled = false;
                    }
                } 
                $(document).ready(function(){  
                  $.datepicker.setDefaults({  
                    dateFormat: 'yy-mm-dd'   
                  });  
                });  
              </script> 
            </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

  <?php include_once('../layouts/footer.php'); ?>
  