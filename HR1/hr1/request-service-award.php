<?php
 
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

$id = $_GET['id'];
$date = date('Y-m-d');

$sql = "SELECT * FROM appreciation_awards WHERE employee_id = '$id' AND award_title = 'Long Service Award'";
$result = $db->query($sql);
$row = $result->num_rows;

if($row<1){
$sql = "INSERT INTO appreciation_awards (employee_id, date, award_title, status) VALUES ('$id', '$date','Long Service Award','pending')";
if($db->query($sql)){

   $_SESSION['status'] = "Request Created";
            $_SESSION['status_code'] = "success";
      redirect('view-past-evaluation.php?id='.$id,false);

}
}else{

   $_SESSION['status'] = "Request already created";
            $_SESSION['status_code'] = "warning";
      redirect('view-past-evaluation.php?id='.$id,false);
}