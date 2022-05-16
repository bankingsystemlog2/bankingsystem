<?php
require_once('includes/load.php');


if(isset($_POST['submit'])){


if(!empty($_FILES['sss']) AND !empty($_FILES['resume']) AND !empty($_FILES['phil']) AND !empty($_FILES['pag-ibig']) AND !empty($_FILES['nbi']) AND !empty($_FILES['valids'])){


$id = $_SESSION['applicant_id'];
$sss = $_FILES['sss'];
$resume = $_FILES['resume'];
$phil =  $_FILES['phil'];
$nbi = $_FILES['nbi'];
$pagibig = $_FILES['pag-ibig'];
$valid = $_FILES['valids'];

$sssName = $_FILES['sss']['name'];
$sssTmpName = $_FILES['sss']['tmp_name'];
$sssfileSize = $_FILES['sss']['size'];
$sssError = $_FILES['sss']['error'];
$sssType = $_FILES['sss']['type'];
$sssExt = explode('.',$sssName);
$sssActualExt = strtolower(end($sssExt));

$resumeName = $_FILES['resume']['name'];
$resumeTmpName = $_FILES['resume']['tmp_name'];
$resumefileSize = $_FILES['resume']['size'];
$resumeError = $_FILES['resume']['error'];
$resumeType = $_FILES['resume']['type'];
$resumeExt = explode('.',$resumeName);
$resumeActualExt = strtolower(end($resumeExt));

$philName = $_FILES['phil']['name'];
$philTmpName = $_FILES['phil']['tmp_name'];
$philfileSize = $_FILES['phil']['size'];
$philError = $_FILES['phil']['error'];
$philType = $_FILES['phil']['type'];
$philExt = explode('.',$philName);
$philActualExt = strtolower(end($philExt));

$pagIbigName = $_FILES['pag-ibig']['name'];
$pagIbigTmpName = $_FILES['pag-ibig']['tmp_name'];
$pagIbigfileSize = $_FILES['pag-ibig']['size'];
$pagIbigError = $_FILES['pag-ibig']['error'];
$pagIbigType = $_FILES['pag-ibig']['type'];
$pagIbigExt = explode('.',$pagIbigName);
$pagIbigActualExt = strtolower(end($pagIbigExt));

$nbiName = $_FILES['nbi']['name'];
$nbiTmpName = $_FILES['nbi']['tmp_name'];
$nbifileSize = $_FILES['nbi']['size'];
$nbiError = $_FILES['nbi']['error'];
$nbiType = $_FILES['nbi']['type'];
$nbiExt = explode('.',$nbiName);
$nbiActualExt = strtolower(end($nbiExt));

$validsName = $_FILES['valids']['name'];
$validsTmpName = $_FILES['valids']['tmp_name'];
$validsfileSize = $_FILES['valids']['size'];
$validsError = $_FILES['valids']['error'];
$validsType = $_FILES['valids']['type'];
$validsExt = explode('.',$validsName);
$validsActualExt = strtolower(end($validsExt));

$allowed = array('jpg','jpeg','pdf','docx');

if(in_array($sssActualExt, $allowed) AND in_array($resumeActualExt, $allowed) AND in_array($philActualExt, $allowed) AND in_array($pagIbigActualExt, $allowed) AND in_array($nbiActualExt, $allowed) AND in_array($validsActualExt, $allowed)){


	if($sssError === 0 AND $resumeError === 0 AND $philError === 0 AND $pagIbigError === 0 AND $nbiError === 0 AND $validsError === 0){


		if($sssfileSize < 1000000 AND $resumefileSize < 1000000 AND $philfileSize < 1000000 AND $pagIbigfileSize < 1000000 AND $nbifileSize < 1000000 AND $validsfileSize < 1000000){


			$sssNew = uniqid('',true).".".$sssActualExt;
			$sssDest = 'docu_uploads/'.$sssNew;

			$resumeNew = uniqid('',true).".".$resumeActualExt;
			$resumeDest = 'docu_uploads/'.$resumeNew;

			$philNew = uniqid('',true).".".$philActualExt;
			$philDest = 'docu_uploads/'.$philNew;

			$pagIbigNew = uniqid('',true).".".$pagIbigActualExt;
			$pagIbigDest = 'docu_uploads/'.$pagIbigNew;

			$nbiNew = uniqid('',true).".".$nbiActualExt;
			$nbiDest = 'docu_uploads/'.$nbiNew;

			$validsNew = uniqid('',true).".".$validsActualExt;
			$validsDest = 'docu_uploads/'.$validsNew;



if(move_uploaded_file($sssTmpName, $sssDest) AND move_uploaded_file($resumeTmpName, $resumeDest) AND move_uploaded_file($philTmpName, $philDest) AND move_uploaded_file($pagIbigTmpName, $pagIbigDest) AND move_uploaded_file($nbiTmpName, $nbiDest) AND move_uploaded_file($validsTmpName, $validsDest)){

				$sql = "INSERT INTO applicant_documents (applicant_id,resume,sss,philhealth,pag_ibig,nbi,others_id)";
				$sql .= " VALUES ('$id','$resumeDest','$sssDest','$philDest','$pagIbigDest','$nbiDest','$validsDest')";
				if($db->query($sql)){
					$session->msg('s','files uploaded');
      redirect('home.php',false);
				}
			}
		}else{
			$session->msg('d','One of your files is too big');
      redirect('home.php',false);
		}
 
}else{
$session->msg('d','One of your files has an error');
      redirect('home.php',false);

}
}else{
$session->msg('d','File extension not allowed');
      redirect('home.php',false);
}



}else{
	$session->msg('d','Choose a file');
      redirect('home.php',false);
}
}




?>