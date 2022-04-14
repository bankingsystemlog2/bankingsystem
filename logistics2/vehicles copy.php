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
            if($_SERVER["REQUEST_METHOD"] == "POST") {

              $connect = mysqli_connect("localhost", "root", "", "bank");  
              // $from = remove_junk(@$_POST['from_date']);
              // $to = remove_junk(@$_POST['to_date']);
            $from = date('Y-m-d', strtotime(mysqli_real_escape_string($connect,trim(@$_POST["from_date"]))));
            $to = date('Y-m-d', strtotime(mysqli_real_escape_string($connect,trim(@$_POST["to_date"]))));
            $avail = "  
            SELECT * FROM v_res WHERE 
            ('2022-04-13' BETWEEN from_date AND to_date) OR 
            ('2022-04-15' BETWEEN from_date AND to_date) OR 
            (from_date BETWEEN '2022-04-13' AND '2022-04-15') OR 
            (to_date BETWEEN '2022-04-13' AND '2022-04-15')            
            ";  
            $result =  mysqli_query($connect, $avail);  
            $numrow = mysqli_num_rows($result);
            if($numrow>0){
              $row1 = mysqli_fetch_array($result);
              $query = "SELECT * FROM v_info WHERE `fleetid` NOT LIKE '%".$row1['fleetid']."%'";  
              $result1 = mysqli_query($connect, $query); ?>
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
                  <th>Model <?php echo $from; ?></th>  
                  <th>Seating Capacity</th>  
                  <th>Type</th>  
                  <th>Category</th>  
                  <th>Registration Number</th>  
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = mysqli_fetch_array($result1)){ ?>
                  <tr>
                  <td><?php echo remove_junk(ucwords($row['v_model']));?></td>
                  <td><?php echo remove_junk(ucwords($row['v_capacity']));?></td>
                  <td><?php echo remove_junk(ucwords($row['v_enginetype']));?></td>
                  <td><?php echo remove_junk(ucwords($row['v_category']));?></td>
                  <td><?php echo remove_junk(ucwords($row['v_regnum']));?></td>
                  <td><button $id =<?php echo $row['fleetid'];?> data-bs-toggle = "modal" data-bs-target = "#exampleModal-<?php echo $row['fleetid'];?>" class="btn btn-info btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</a></td>
                <?php 
                $_SESSION['from_date']=$from;
                      $_SESSION['to_date']=$to;
              }
                
                ?>
              </tbody>
            </table>
             
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php
         
            }else{
              $query = "SELECT * FROM v_info";  
              $result1 = mysqli_query($connect, $query); 
              
            }
          }
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
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="col-md-4">
          <label for="from_date"></label>
          <input type="date" name="from_date" id="from_date" class="form-control dateFilter input" placeholder="From Date" />
        </div>
        <div class="col-md-4">
          <label for="to_date"></label>
          <input type="date" name="to_date" id="to_date" class="form-control dateFilter input2" placeholder="To Date" />
        </div>
        <div class="col-md-2">
          <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" value="Search" class="btn btn-primary button1" >Search</button>
        </div>
      </form>
        <div class="row">
    </div>
    
  
</div>
<script> 
                let input = document.querySelector(".input");
                let input2 = document.querySelector(".input2");
                let button1 = document.querySelector(".button1");
                button1.disabled = false;
                input.addEventListener("change", stateHandle);
                input2.addEventListener("change", stateHandle);

                function stateHandle() {
                    if(document.querySelector(".input").value === "" ||document.querySelector(".input2").value === ""  ) {
                        button1.disabled = false;
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
  <?php include_once('../layouts/footer.php'); ?>
  