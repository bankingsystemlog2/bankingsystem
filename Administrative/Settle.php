<?php include_once('includes/load.php'); ?>
<?php
$id=$_GET['id'];
$Tablename=$_GET['Tablename'];

if(isset($_POST['Settle'])){
  if(empty($errors)){

  $sql  = "UPDATE budgetreleasing INNER JOIN $Tablename  ON $Tablename.Co_Code = budgetreleasing.P_Code SET budgetreleasing.P_Status = 101,$Tablename.Co_Status = 101 WHERE budgetreleasing.P_Code = $id;";
        if($db->query($sql)){

          $session->msg("s","Approved!");
          redirect('FinanceApproval.php',false);
        }

      }else {
          $session->msg("d", $errors);
          redirect('FinanceApproval.php',false);
        }
      }
?>
