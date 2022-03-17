<?php
require_once('includes/load.php');

function activitylog($logactivity){

    if(!file_exists('log.txt')){
        file_put_contents('log.txt', '');
    }
    $ip = $_SERVER['REMOTE_ADDR']; //client IP
    date_default_timezone_set('Asia/Manila');
    $time = date('m/d/y h:iA', time());
    //$uid = intval($user_id);
    //$log = "$logactivity\t$time";

    $contents = file_get_contents('log.txt');
    $contents .= "$ip\t$logactivity\t$time\r";

    file_put_contents('log.txt',$contents);


    }

/*function logger($log){
    if(!file_exists('log.txt')){
        file_put_contents('log.txt', '');
    }

    $ip = $_SERVER['REMOTE_ADDR']; //client IP
    date_default_timezone_set('Asia/Manila');
    $time = date('m/d/y h:iA', time());

    $contents = file_get_contents('log.txt');
    $contents .= "$ip\t$time\t$log\r";

    file_put_contents('log.txt',$contents);
}

function logActivity($data) {
    file_put_contents("/home/logs/" . date("m-d-Y"), date("h:i a") . ": " . $data . "\n", FILE_APPEND | LOCK_EX);
}*/
?>
