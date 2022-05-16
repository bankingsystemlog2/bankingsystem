<?php
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('../index.php', false);}
?>

<?php
$response="";
$resp="";

if (isset($_POST['userid']) && isset($_POST['tbl'])) { //Checing if the ajax data has been set...

$userid = $_POST['userid']; // variable declaration of the post data...
$Table = $_POST['tbl'];  // variable declaration of the post data ...

$sql = "SELECT * FROM `$Table` where id=".$userid; // simple query using the datas...
$result = $db->query($sql);
if ($result->num_rows > 0) {
while( $row = mysqli_fetch_array($result) ){

if ($Table==="group_list") { // checking if the table data required is group...
  $name = $row['name'];
  $desc = $row['description'];
  $type = $row['type'];
  $status = $row['status'];

 $response .= "<dl>";
 $response .= "<dt class='text-muted'>Group</dt>";

 $response .= "<dd class='pl-4'>".$name."</dd>";
 $response .= "<dt class='text-muted'>Description</dt>";
 $response .= "<dd class='pl-4'>";

 $response .= "<p><small>".$desc."</small></p>";
 $response .= "</dd>";
 $response .= "<dt class='text-muted'>Group Type</dt>";

 $response .= "<dd class='pl-4'>";
 $response .= "<p>".isset($type) ? ($type == 1 ? 'Debit' : 'Credit') : 'N/A'."</p>";
 $response .= "</dd>";

 $response .= "<dt class='text-muted'>Status</dt>";
 if ($status==1) {
 $response .= "<dd class='pl-4'><span class='badge rounded-pill bg-primary bg-gradient'>Active</span></dd>";
  }elseif ($status==0) {
 $response .= "<dd class='pl-4'><span class='badge rounded-pill bg-danger bg-gradient'>Deactive</span></dd>";
  }
  $response .= "</dl>";

}elseif($Table==="account_list") { // checking if the table data required is account...
  $name = $row['name'];
  $desc = $row['description'];
  $status = $row['status'];

  $response.="<dl>";
  $response.="<dt class='text-muted'>account</dt>";
  $response.="<dd class='pl-4'>".$name."</dd>";
  $response.="<dt class='text-muted'>Description</dt>";
  $response.="<dd class='pl-4'>".$desc."</dd>";
  $response.="<dt class='text-muted'>Status</dt>";
  if ($status==1) {
  $response .= "<dd class='pl-4'><span class='badge rounded-pill bg-primary bg-gradient'>Active</span></dd>";
  }elseif ($status==0) {
  $response .= "<dd class='pl-4'><span class='badge rounded-pill bg-danger bg-gradient'>Deactive</span></dd>";
  }
  $response.="</dl>";
}

  }
}
}
// ======================================================================================================================================================================================================================== -->
//isset for Request Confirmation in Disbursment Details...............
if (isset($_POST['Co_Code']) && isset($_POST['table_Dist'])) { //Checing if the ajax data has been set...
  $userid = $_POST['Co_Code']; // variable declaration of the post data...
  $Table = $_POST['table_Dist'];  // variable declaration of the post data ...
// ======================================================================================================================================================================================================================== -->
  if ($Table==="reimbursment") { // checking if the table data required is reimbursment...
    $sql="SELECT p.*, s.Name, SUM(d.PU_Total) as Co_Amount FROM $Table p LEFT JOIN status s ON s.Status_Code = p.Co_Status LEFT JOIN purchases d ON d.Co_Code = p.Co_Code Where  p.Co_Code='$userid'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    while( $row = mysqli_fetch_array($result) ){
  $Code=$row['Co_Code'];
  $Date=$row['Co_Date'];
  $purpose=$row['Co_Purpose'];
  $requestor=$row['Co_Desc'];
  $Total=$row['Co_Amount'];
  $Source=$row['Co_Source'];
  $State=$row['Co_Country'];
  $City=$row['Co_City'];
  $Street=$row['Co_Address'];
  $Supplier=$row['Co_Supplier'];

  $response .= "<div class='container'>";
  $response .= "<h6>Request Details</h6>";
  $response .= " <div class='row'>";


      $response .= "<div>";
        $response .= "<ul type='none'>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Request Code :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$Code."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Date :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$Date."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Source :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$Source."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Total :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$Total."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Requestor :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$requestor."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Purpose :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$purpose."</li>";
          $response .= "</div>";
        $response .= "</ul>";
      $response .= "</div>";

   $response .= "<h6>Supplier Details</h6>";
      $response .= "<div>";
        $response .= "<ul class='right' type='none'>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Supplier:</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$Supplier."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Street :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$Street."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>City :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$City."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>State :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$State."</li>";
        $response .= "</div>";
       $response .= "</ul>";
    $response .= "</div>";

  $response .= "</div>";
  $response .= "</div>";
    }
  }
}

// ======================================================================================================================================================================================================================== -->

if ($Table==="procurment") { // checking if the table data required is procurement...
  $sql="SELECT p.*, s.Name, SUM(d.PU_Total) as Co_Amount FROM $Table p LEFT JOIN status s ON s.Status_Code = p.Co_Status LEFT JOIN purchases d ON d.Co_Code = p.Co_Code Where  p.Co_Code='$userid'";
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
  while( $row = mysqli_fetch_array($result) ){
$Code=$row['Co_Code'];
$Date=$row['PRO_Date'];
$purpose=$row['PRO_Desc'];
$requestor=$row['PRO_Requestor'];
$Total=$row['Co_Amount'];
$Source=$row['PRO_Department'];
$State=$row['PRO_Country'];
$City=$row['PRO_City'];
$Street=$row['PRO_Address'];
$Supplier=$row['PRO_Supplier'];

$response .= "<div class='container'>";
$response .= "<h6>Request Details</h6>";
$response .= " <div class='row'>";


    $response .= "<div>";
      $response .= "<ul type='none'>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Request Code :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$Code."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Date :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$Date."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Source :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$Source."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Total :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$Total."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Requestor :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$requestor."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Purpose :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$purpose."</li>";
        $response .= "</div>";
      $response .= "</ul>";
    $response .= "</div>";

 $response .= "<h6>Supplier Details</h6>";
    $response .= "<div>";
      $response .= "<ul class='right' type='none'>";
      $response .= "<div style='display: flex;''>";
      $response .= "<li style='flex-basis: 30.5%;'>Supplier:</li>";
      $response .= "<li style='flex-basis: 40.5%;'>".$Supplier."</li>";
      $response .= "</div>";
      $response .= "<div style='display: flex;''>";
      $response .= "<li style='flex-basis: 30.5%;'>Street :</li>";
      $response .= "<li style='flex-basis: 40.5%;'>".$Street."</li>";
      $response .= "</div>";
      $response .= "<div style='display: flex;''>";
      $response .= "<li style='flex-basis: 30.5%;'>City :</li>";
      $response .= "<li style='flex-basis: 40.5%;'>".$City."</li>";
      $response .= "</div>";
      $response .= "<div style='display: flex;''>";
      $response .= "<li style='flex-basis: 30.5%;'>State :</li>";
      $response .= "<li style='flex-basis: 40.5%;'>".$State."</li>";
      $response .= "</div>";
     $response .= "</ul>";
  $response .= "</div>";


$response .= "</div>";
$response .= "</div>";
        }
     }
  }
// ======================================================================================================================================================================================================================== -->

  if ($Table==="uexpenses") { // checking if the table data required is procurement...
    $sql="SELECT p.*, s.Name, SUM(d.PU_Total) as Co_Amount FROM $Table p LEFT JOIN status s ON s.Status_Code = p.Co_Status LEFT JOIN purchases d ON d.Co_Code = p.Co_Code Where  p.Co_Code='$userid'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    while( $row = mysqli_fetch_array($result) ){
  $Code=$row['Co_Code'];
  $Date=$row['UE_date'];
  $purpose=$row['UE_Desc'];
  $requestor=$row['UE_Requestor'];
  $Total=$row['Co_Amount'];
  $Source=$row['UE_Department'];
  $State=$row['UE_Country'];
  $City=$row['UE_City'];
  $Street=$row['UE_Address'];
  $Supplier=$row['UE_Supplier'];

  $response .= "<div class='container'>";
  $response .= "<h6>Request Details</h6>";
  $response .= " <div class='row'>";


      $response .= "<div>";
        $response .= "<ul type='none'>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Request Code :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$Code."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Date :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$Date."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Source :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$Source."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Total :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$Total."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Requestor :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$requestor."</li>";
          $response .= "</div>";
          $response .= "<div style='display: flex;''>";
          $response .= "<li style='flex-basis: 30.5%;'>Purpose :</li>";
          $response .= "<li style='flex-basis: 40.5%;'>".$purpose."</li>";
          $response .= "</div>";
        $response .= "</ul>";
      $response .= "</div>";

   $response .= "<h6>Supplier Details</h6>";
      $response .= "<div>";
        $response .= "<ul class='right' type='none'>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Supplier:</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$Supplier."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>Street :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$Street."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>City :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$City."</li>";
        $response .= "</div>";
        $response .= "<div style='display: flex;''>";
        $response .= "<li style='flex-basis: 30.5%;'>State :</li>";
        $response .= "<li style='flex-basis: 40.5%;'>".$State."</li>";
        $response .= "</div>";
       $response .= "</ul>";
    $response .= "</div>";


  $response .= "</div>";
  $response .= "</div>";
          }
       }
    }
  // ======================================================================================================================================================================================================================== -->
}

if (isset($_POST['Release_id']) && isset($_POST['Release_tbl'])) {
  $Release_Code = $_POST['Release_id'];
  $Table = $_POST['Release_tbl'];
  $sql="SELECT b.*, r.Name AS `Status` FROM budgetreleasing b LEFT JOIN `status` r ON r.Status_Code = b.P_Status WHERE P_Code='$Release_Code';";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    while( $row = mysqli_fetch_array($result) ){

  $response .= "<form action='' id='account-form'>";
  $response .= "<input type='hidden' name='id' value=''>";
  $response .= "<div class='form-group'>";
  $response .= "<label for='name' class='control-label'>Requestor Name :</label>";
  $response .= "<input type='text' name='name' id='name' class='form-control form-control-border' value ='".$row['P_Requestor']."' disabled>";
  $response .= "<label for='name' class='control-label'>Purpose :</label>";
  $response .= "<input type='text' name='name' id='name' class='form-control form-control-border' value ='".$row['P_Purpose']."' disabled>";
  $response .= "<label for='name' class='control-label'>Date :</label>";
  $response .= "<p>".$row['P_Date']."</p>";
  $response .= "</div>";
  $response .= "</form>";
  }
 }
}

echo $response; //echo of the requested response into the modal...
exit;


 ?>
