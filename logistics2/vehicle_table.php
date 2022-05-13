<?php
//fetch.php
require_once('../includes/log2load.php');
$output = '';
$error = '';
if(isset($_POST['fromdate'],$_POST['todate']))
{
$conn = mysqli_connect("localhost", "root", "", "bank"); 
$from_date = $_POST['fromdate'];
$to_date = $_POST['todate'];
$_SESSION['from_date'] = $_POST['fromdate'];
$_SESSION['to_date'] = $_POST['todate'];
 $avail = "  
 SELECT * FROM v_res WHERE 
  ('".$from_date."' BETWEEN from_date AND to_date) OR 
  ('".$to_date."' BETWEEN from_date AND to_date) OR 
  (from_date BETWEEN '".$from_date."' AND '".$to_date."') OR 
  (to_date BETWEEN '".$from_date."' AND '".$to_date."')
 ";
 $result = mysqli_query($conn, $avail);
 $output .= '
 <form method="post" action="vehicle_reservation_form.php" >
    <div class="table-responsive">
    <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
    <thead>

    <tr>
        <th>'.$to_date.'Model</th>  
        <th>'.$from_date.'Seating Capacity</th>  
        <th>Type</th>  
        <th>Category</th>  
        <th>Registration Number</th>  
        <th>Click to reserve</th>
    </tr>
    </thead>
 ';
 

    
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
        $query2 = "SELECT * FROM v_info WHERE `fleetid` NOT LIKE '%".$row['fleetid']."%'";  
        $result2 = mysqli_query($conn, $query2);
        if(mysqli_num_rows($result2)>0){
            while($row1 = mysqli_fetch_array($result2)){
                $output .= "
                <tbody>
                <tr> 
                <td>".remove_junk(ucwords($row1['v_model']))."</td>
                <td>".remove_junk(ucwords($row1['v_capacity']))."</td>
                <td>".remove_junk(ucwords($row1['v_enginetype']))."</td>
                <td>".remove_junk(ucwords($row1['v_category']))."</td>
                <td>".remove_junk(ucwords($row1['v_regnum']))."</td>
                <td><a href = 'vehicle_reservation_form.php?fleetid=".remove_junk(ucwords($row1['fleetid']))."' name = 'fleetid' value ='".remove_junk(ucwords($row1['fleetid']))."'  class='btn btn-info btn-viewReciept'><i class='bi bi-file-earmark-post-fill'></i> Reserve</a></td>
                </tbody>
                ";
            }
        }else{ $error .= '<div class="alert alert-danger border-light alert-dismissible fade show" role="alert">
            11111111111No document to track in our database or you input incomplete code
        </div>';
        echo $error;
        }
        }
    }
    else
    {
        $query = "SELECT * FROM v_info";  
        $result1 = mysqli_query($conn, $query);
        if(mysqli_num_rows($result1)>0){
            while($row1 = mysqli_fetch_array($result1)){
                $output .= "
                <tbody>
                <tr>
                <td>".remove_junk(ucwords($row1['v_model']))."</td>
                <td>".remove_junk(ucwords($row1['v_capacity']))."</td>
                <td>".remove_junk(ucwords($row1['v_enginetype']))."</td>
                <td>".remove_junk(ucwords($row1['v_category']))."</td>
                <td>".remove_junk(ucwords($row1['v_regnum']))."</td>                
                <td><a href = 'vehicle_reservation_form.php?fleetid=".$row1['fleetid']."' name = 'fleetid' value = '".remove_junk(ucwords($row1['fleetid']))."' class='btn btn-info btn-viewReciept'><i class='bi bi-file-earmark-post-fill'></i> Reserve</a></td>
                </tbody>
                ";
                
            }
        }else{ $error .= '<div class="alert alert-danger border-light alert-dismissible fade show" role="alert">
            11111111111No document to track in our database or you input incomplete code
        </div>';
        echo $error;
        }
    
    
    }
}
else
{
    $error .='
    <div class="alert alert-danger border-light alert-dismissible fade show" role="alert">
      22222222222No document to track in our database or you input incomplete code
    </div>
  ';
 echo $error;
}
$output .= '
    </table>
    </div>
    </form>
    ';
 echo $output;

?>