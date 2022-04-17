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
          <input type="date" name="from_date" id="from_date" class="form-control datepicker input" placeholder="From Date" />
        </div>
        <div class="col-md-4">
          <label for="to_date"></label>
          <input type="date" name="to_date" id="to_date" class="form-control datepicker input2" placeholder="To Date" onChange="fetchTracking(this.value);"/>
        </div>
        <div class="col-md-2">
          <button data-bs-toggle="modal" data-bs-target="#exampleModal" onChange="fetchTracking(this.value);" type="submit" value="Search" class="btn btn-primary button1" >Search</button>
        </div>
        <div class="activity">
                                         
        </div>
      </form>
        <div class="row">
    </div>
    
  
</div>
<script> 
  let input = document.querySelector(".input");
  let input2 = document.querySelector(".input2");
  let button1 = document.querySelector(".button1");
  button1.disabled = true;
  input.addEventListener("change", stateHandle);
  input2.addEventListener("change", stateHandle); 
  $(document).ready(function(){  
    $.datepicker.setDefaults({  
      dateFormat: 'yyyy-mm-dd'   
    });  
  });  
</script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){

      // load_data(); 
      $(function(){  
          $("#from_date").datepicker();  
          $("#to_date").datepicker();  
      });

      function load_data(query, query1)
      {
        $.ajax({
        url:"vehicle_table.php",
        method:"POST",
        data:{query:query, query1:query1},
        success:function(data)
        {
          $('.activity').html(data);
        }
        });
      }
      let to_date = document.querySelector(".input2");
      let from_date = document.querySelector(".input");
      var search1 = $('#from_date').val();
      var search = $(this).val();
      to_date.addEventListener("change", stateHandle);
      from_date.addEventListener("change", stateHandle);
      to_date.disabled = true;
      function stateHandle() {
      if(document.querySelector(".input").value === "") {
          to_date.disabled = true;
          $('.activity').html('');          
        }
        else {     
          if(document.querySelector(".input2").value === ""){
            to_date.disabled = false;
            $('.activity').html('');
          } 
          else{          
            to_date.disabled = false;
            load_data(search, search1);

          }     
          to_date.disabled = false;
          $('.activity').html('');
        } 
      } 
      $(document).ready(function(){  
        $.datepicker.setDefaults({  
          dateFormat: 'yy-mm-dd'   
        });  
      });
      });
  </script>
<?php include_once('../layouts/footer.php'); ?>
  