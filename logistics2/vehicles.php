<?php
  $page_title = 'Fleet Management';
  require_once('../includes/log2load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(4);
//pull out all user form database
 $all_users = find_all_user();
// ?>
// <?php  
//   if($_SERVER["REQUEST_METHOD"] == "POST") {

//     $connect = mysqli_connect("localhost", "root", "", "bank");  
//     // $from = remove_junk(@$_POST['from_date']);
//   //   // $to = remove_junk(@$_POST['to_date']);
//   // $from = date('Y-m-d', strtotime(mysqli_real_escape_string($connect,trim($_POST["from_date"]))));
//   // $to = date('Y-m-d', strtotime(mysqli_real_escape_string($connect,trim($_POST["to_date"]))));
//   $avail = "  
//   SELECT * FROM v_res WHERE 
//   ('2022-04-13' BETWEEN from_date AND to_date) OR 
//   ('2022-04-15' BETWEEN from_date AND to_date) OR 
//   (from_date BETWEEN '2022-04-13' AND '2022-04-15') OR 
//   (to_date BETWEEN '2022-04-13' AND '2022-04-15')            
//   ";  
//   $result =  mysqli_query($connect, $avail);  
//   $numrow = mysqli_num_rows($result);
//   if($numrow>0){
//     $row1 = mysqli_fetch_array($result);
//     $query = "SELECT * FROM v_info WHERE `fleetid` NOT LIKE '%".$row1['fleetid']."%'";  
//     $result1 = mysqli_query($connect, $query); ?>
//   <?php
         
//             }else{
//               $query = "SELECT * FROM v_info";  
//               $result1 = mysqli_query($connect, $query); 
              
//             }
//           }
//             ?> 

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
      <form action="vehicle_table.php" method="post">
        <div class="col-md-4">
          <label for="from_date"></label>
          <input type="date" name="from_date" id="from_date" class="form-control datepicker input" placeholder="From Date" />
        </div>
        <div class="col-md-4">
          <label for="to_date"></label>
          <input type="date" name="to_date" id="to_date" class="form-control datepicker input2" placeholder="To Date" />
        </div>
        <div class="col-md-2">
          <button data-bs-toggle="modal" name= "button" id= "button" data-bs-target="#exampleModal" type="submit" value="Search" class="btn btn-primary button1" >Search</button>
        </div>
        <div class="activity">
                                         
        </div>
      </form>
        <div class="row">
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
<?php include_once('../layouts/footer.php'); ?>
  