<?php  
//filter.php  
if(isset($_POST["from_date"], $_POST["to_date"]))  
{  
     $connect = mysqli_connect("localhost", "root", "", "bank");  
     $output = '';  
     $avail = "  
     SELECT fleetid FROM v_res WHERE ('".$_POST["from_date"]."'NOT BETWEEN from_date AND to_date) AND ('".$_POST["to_date"]."'NOT BETWEEN from_date AND to_date) AND (from_date NOT BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."') AND (from_date NOT BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."')
     ";  
     $query = "
     SELECT * FROM v_info WHERE ('".$avail."' != fleetid)
     ";
     $result = mysqli_query($connect, $query);  
     $output .= '  
          <table class="table table-bordered">  
               <tr>  
                    <th>Model</th>  
                    <th>Seating Capacity</th>  
                    <th>Type</th>  
                    <th>Category</th>  
                    <th>Registration Number</th>  
               </tr>  
      ';  
     if(mysqli_num_rows($result) > 0)  
     {  
          while($row = mysqli_fetch_array($result))  
          {  
               $output .= '  
                    <tr>  
                         <td>'. $row["v_model"] .'</td>  
                         <td>'. $row["v_capacity"] .'</td>  
                         <td>'. $row["v_enginetype"] .'</td>  
                         <td>'. $row["v_category"] .'</td>  
                         <td>'. $row["v_regnum"] .'</td>  
                    </tr>  
               ';  
           }  
     }  
     else  
     {  
          $output .= '  
               <tr>  
                    <td colspan="5">No Order Found</td>  
               </tr>  
          ';  
     }  
     $output .= '</table>';  
     echo $output;  
}  
?>