<?php
//fetch.php
require_once('../includes/log2load.php');
$output = '';
$error = '';
$idenifier='';
$d1;
$d2;
if(isset($_POST["fromdate"],$_POST["todate"]))
{
$conn = mysqli_connect("localhost", "root", "", "bank"); 
$from_date = $_POST["fromdate"];
$to_date = $_POST["todate"];
 $avail = "  
 SELECT * FROM v_res WHERE 
  ('2022-04-13' BETWEEN from_date AND to_date) OR 
  ('2022-04-15' BETWEEN from_date AND to_date) OR 
  (from_date BETWEEN '2022-04-13' AND '2022-04-15') OR 
  (to_date BETWEEN '2022-04-13' AND '2022-04-15')
 ";
 $result = mysqli_query($conn, $avail);
 $output .= '
    <table class="table-responsive">
    <thead>

    <tr>
        <th>'.$to_date.'Model</th>  
        <th>Seating Capacity</th>  
        <th>Type</th>  
        <th>Category</th>  
        <th>Registration Number</th>  
        <th></th>
    </tr>
    </thead>
 ';
 

    if(mysqli_num_rows($result)==0){
        while($row = mysqli_fetch_array($result)){
            $query = "SELECT * FROM v_info";  
            $result1 = mysqli_query($conn, $query);
            if(mysqli_num_rows($result1)>0){
                while($row1 = mysqli_fetch_array($result1)){
                    $output .= "
                    <tbody>
                    <tr>
                    <td>".remove_junk(ucwords($row['v_model']))."</td>
                    <td>".remove_junk(ucwords($row['v_capacity']))."</td>
                    <td>".remove_junk(ucwords($row['v_enginetype']))."</td>
                    <td>".remove_junk(ucwords($row['v_category']))."</td>
                    <td>".remove_junk(ucwords($row['v_regnum']))."</td>
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
    elseif(mysqli_num_rows($result)>0){
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
    $output .='
        <div class="alert alert-danger border-light alert-dismissible fade show" role="alert">
        No 22document to track in our database or you input incomplete code
        </div>
    ';
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
$output .= '</table>';
 echo $output;

?>