<?php 
include 'activitylog.inc.php';
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $number = $_POST['number'];

    if($number !=5){
        $log = "User entered incorrect number ($number)";
        logger($log);
        echo "$number is incorrect";
    }
    else{
        $log = "User entered correct number ($number)";
        logger($log);
        echo "$number is correct";
    }
}
?>
<form method="POST">
    <input type="text" name="number">
    <input type="submit" value="enter">
</form>