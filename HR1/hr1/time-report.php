<?php
 $page_title = "Performance Management";
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
  page_require_level(1);
}

function get_working_hours($from,$to)
{
    // timestamps
    $from_timestamp = strtotime($from);
    $to_timestamp = strtotime($to);

    // work day seconds
    $workday_start_hour = 9;
    $workday_end_hour = 17;
    $workday_seconds = ($workday_end_hour - $workday_start_hour)*3600;

    // work days beetwen dates, minus 1 day
    $from_date = date('Y-m-d',$from_timestamp);
    $to_date = date('Y-m-d',$to_timestamp);
    $workdays_number = count(get_workdays($from_date,$to_date))-1;
    $workdays_number = $workdays_number<0 ? 0 : $workdays_number;

    // start and end time
    $start_time_in_seconds = date("H",$from_timestamp)*3600+date("i",$from_timestamp)*60;
    $end_time_in_seconds = date("H",$to_timestamp)*3600+date("i",$to_timestamp)*60;

    // final calculations
    $working_hours = ($workdays_number * $workday_seconds + $end_time_in_seconds - $start_time_in_seconds) / 86400 * 24;

    return $working_hours;
}

function get_workdays($from,$to) 
{
    // arrays
    $days_array = array();
    $skipdays = array("Saturday", "Sunday");
    $skipdates = get_holidays();

    // other variables
    $i = 0;
    $current = $from;

    if($current == $to) // same dates
    {
        $timestamp = strtotime($from);
        if (!in_array(date("l", $timestamp), $skipdays)&&!in_array(date("Y-m-d", $timestamp), $skipdates)) {
            $days_array[] = date("Y-m-d",$timestamp);
        }
    }
    elseif($current < $to) // different dates
    {
        while ($current < $to) {
            $timestamp = strtotime($from." +".$i." day");
            if (!in_array(date("l", $timestamp), $skipdays)&&!in_array(date("Y-m-d", $timestamp), $skipdates)) {
                $days_array[] = date("Y-m-d",$timestamp);
            }
            $current = date("Y-m-d",$timestamp);
            $i++;
        }
    }

    return $days_array;
}
function get_holidays() 
{
    // arrays
    $days_array = array();

    // You have to put there your source of holidays and make them as array...
    // For example, database in Codeigniter:
    // $days_array = $this->my_model->get_holidays_array();

    return $days_array;
}

$sql = "SELECT employees.*,time_and_attendance.* FROM employees JOIN time_and_attendance ON";
$sql .= " employees.employee_id = time_and_attendance.user_id";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
$work = get_working_hours($info['login_time'],$info['logout_time']);

?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css?v=<?php echo time(); ?>">



    
    <!--from startbootstrap.com this is for Datatables...
    <link href="dist/css/styles.css" rel="stylesheet" />
    -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
        	@media print{
        		#button{
        			display: none; !important;
        		}
        		#a{
        			display: none; !important;
        		}
        	}
        </style>
</head>
<body>

		<div class="row overflow-auto mh-10" style="margin-bottom:10%; max-height: 500px;">
  <div class="col-md-12">
    <div class="">
      <div class="panel-heading clearfix">
        <div class="col-md-6">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Time and Attendance Report</span>
       </strong>
     </div>
     <div class="col-md-6">
       

  </div>
        
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
           <tr>
          	<th class="text-center" style="">Employee ID</th>
            <th class="text-center" >Employee name</th>
            <th class="text-center" style="">Login Time</th>
            <th class="text-center" >Logout time</th>
            <th class="text-center" style="">Hours Worked</th>
            
          </tr>
        </thead>
        <tbody>
        <?php if($row>0){ do{ 
          ?>
           <tr>
          	<td class="text-center"><?php echo remove_junk(ucwords($info['employee_id']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['login_time']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['logout_time']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($work))?></td>
           
         
          </tr>
        <?php }while($a_jobs = $result->fetch_assoc()); } ?>
       </tbody>
     </table>
         <button onclick="print()" id="button" class="btn btn-info">PRINT</button>
     <a href="time-and-attendance.php" id="a" class="btn btn-danger">BACK</a>
  
     </div>
    </div>





     

</body>
</html>


     

</body>
</html>