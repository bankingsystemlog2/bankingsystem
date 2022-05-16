<?php
require_once('includes/load.php');
$iteratorForCode=0;
if (isset($_POST['account_id'])) {
++$iteratorForCode;
$account=$_POST['account_id'];
$group=$_POST['group_id'];
$account_name="";
$group_name="";
$prefix = date("Ym-");
$code = sprintf("%'.05d",$iteratorForCode);
$journalCode = "".$prefix."".$code;
$sql = "SELECT name FROM `account_list` where id=".$account; // simple query using the datas...
$result = $db->query($sql);
if ($result->num_rows > 0) {
while( $row = mysqli_fetch_array($result) ){
 $account_name=$row['name'];
}
}
$sql2 = "SELECT name FROM `group_list` where id=".$group; // simple query using the datas...
$result = $db->query($sql2);
if ($result->num_rows > 0) {
while( $row = mysqli_fetch_array($result) ){
 $group_name=$row['name'];
}
}
  echo '<tr>
              <td class="text-center">
                  <button class="delete-row btn btn-sm btn-outline btn-danger btn-flat" type="button">X</button>
              </td>
              <td class="">
                  <input type="hidden" name="account_id[]" value="">
                  <input type="hidden" name="group_id[]" value="">
                  <input type="hidden" name="amount[]" value="">
                  <span class="account">'.$account_name.'</span>
              </td>
              <td class="group">'.$group_name.'</td>
              <td class="debit_amount text-right">'.$journalCode.'</td>
              <td class="credit_amount text-right"></td>
            </tr>';
}

if (isset($_GET['empid'])) {
    $empid = $_GET['empid'];
    $select  = " SELECT * FROM `account_list` where id={$empid}";
    $result = $db->query($select);
    while($row = $result->fetch_object()){
    echo '<div class="row">
      <div class="col-md-7">
          <div class="form-group row">
              <label class="control-label text-right col-md-11" style="font-weight:bold;">Entry Description:</label>
              <div class="col-md-12">
                  <p class="form-control-static fs-7" style="font-size:15px;">'.$row->description.'</p>
              </div>
          </div>
      </div>
    </div>';

    echo '<div class="row">
       <div class="col-md-7">
           <div class="form-group row">
               <label class="control-label text-right col-md-5" style="font-weight:bold;">Amount:</label>
               <div class="col-md-12">
                   <p class="form-control-static" style="font-size:15px;">'.$row->Amount.'</p>
               </div>
           </div>
       </div>
     </div>';
      }
 }
?>
