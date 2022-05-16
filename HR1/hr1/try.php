<?php
  require_once('includes/load.php');
  
  if(isset($_POST['upload'])){
      if(!empty($_FILES['file'])){
     
$sss = $_FILES['file'];
$sssName = $_FILES['file']['name'];
$sssTmpName = $_FILES['file']['tmp_name'];
$sssfileSize = $_FILES['file']['size'];
$sssError = $_FILES['file']['error'];
$sssType = $_FILES['file']['type'];
$sssExt = explode('.',$sssName);
$sssActualExt = strtolower(end($sssExt));

$allowed = array('jpg','jpeg','pdf','docx');

if(in_array($sssActualExt,$allowed)){
    if($sssError === 0){
        if($sssfileSize < 10000000 ){
            
            $sssNew = uniqid('',true).".".$sssActualExt;
			$sssDest = 'uploads/'.$sssNew;
			
			if(move_uploaded_file($sssTmpName, $sssDest)){
			    echo "uploaded";
			}
        }else{
            echo "file oversized";
        }
    }else{
        echo "file error";
    }
    }else{
        
        echo "file not allowed";
    }
    
    
    
}else{
    echo "file empty";
}
}


  
 ?>
 
 
 
 <?php include('includes/header.php'); ?>
 
 <form action="try.php" method='post'  enctype="multipart/form-data">
     <input type="file" name="file">
     <button type="submit" name="upload">upload</button>
 </form>
 
 
 
 <?php include('includes/footer.php'); ?>