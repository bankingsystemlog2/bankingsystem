
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

include_once('layouts/header.php');

?>

<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Time and Attendance Viewing Table</span>
         <div class="text-end">
          <a href="time-report.php" class="btn btn-info btn-sm pull-right"><i class="bi bi-file-post"></i> Print report</a>
         </div>
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
           <?php if($row>0){ ?>
          <tr>
            <th class="text-center" style="">Employee ID</th>
            <th class="text-center" >Employee name</th>
            <th class="text-center" style="">Login Time</th>
            <th class="text-center" >Logout time</th>
            <th class="text-center" style="">Hours Worked</th>
            
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
            <td class="text-center"><?php echo remove_junk(ucwords($info['employee_id']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['login_time']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['logout_time']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($work))?></td>
           
         
          </tr>
        <?php }while($info =$result->fetch_assoc()); 

          }
         ?>
       </tbody>
       
     </table>
   </div>
 </div>
</div>
</div>
</div>



<?php include_once('layouts/footer.php'); ?>