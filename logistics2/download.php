<?php
 require_once('includes/log2load.php');
if(isset($_REQUEST["urlpath"])){
    // Get parameters
   
        $filepath = $_REQUEST["urlpath"];
        $id  = $_REQUEST["id"];

        // Process download
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

            //SQL query update status
            $query = "update audit set status = '2' where id = '{$id}'";
            if($db->query($query)){
                echo "Update";
            }

            die();
        } else {
            http_response_code(404);
	        die();
        }
   
}
?>