<?php
 require_once('includes/load.php');
if(isset($_REQUEST["urlpath"])){
    // Get parameters
   
        $filepath = $_REQUEST["urlpath"];
        $id  = $_REQUEST["id"];

        // Process download
         //SQL query update status
            $query = "UPDATE core1files SET status = 'downloaded' WHERE req_id = '{$id}'";
            if($db->query($query)){
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);

           
               
            }

            die();
        } else {
            http_response_code(404);
	        die();
        }
   
}
?>