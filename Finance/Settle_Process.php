<?php include_once('includes/load.php'); ?>
<?php
$iteratorForCode=0; // varaible for journalCode
$Co_id=$_POST['DataID'];
$Co_tbl=$_POST['TableName'];
$MOFP=$_POST['MOFP'];
$Description=$_POST['descriptionReleasing'];
$user_name=$_POST['user_name'];
$Amount=$_POST['Amount'];
$budget=0;
$total=0;
$max_id= $_POST['max_id'];
//For Journal Code Genaration------------
$prefix = date("Ym-");
$code = sprintf("%'.05d",$max_id);
$journalCode = "".$prefix."".$code;
//-----------------------------------------

$accode="SELECT p.Co_Code FROM account_list p INNER JOIN budgetreleasing g ON g.P_Code = p.Co_Code WHERE g.P_Code ='{$Co_id}'";
$result = $db->query($accode);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 $AccID=$row['Co_Code'];
 }
}


if(isset($_POST['Settle'])){
  if(empty($errors)){
//Getting the Budget-----------------------------------------
  $sql="SELECT Budget FROM obudget WHERE Id=1;";
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  $budget=$row['Budget'];
  }
 }
//----------------------------------------------------------


if($budget<=$Amount) {
  $total=0;
  $session->msg("d","Budget to low!");
  redirect('Budgetreleasing.php',false);
 }else{
   $sql  = "UPDATE budgetreleasing g INNER JOIN $Co_tbl r ON r.Co_Code = g.P_Code LEFT JOIN account_list a ON r.Co_Status = a.definedStat SET a.definedStat='103', a.description ='$Description', g.P_Description='$Description', g.P_PaymentMode='$MOFP', g.P_Status = '103', r.Co_Status = 103 WHERE r.Co_Status = a.definedStat AND g.P_Code=$Co_id;";
    if($db->query($sql)){
      //-----------------------------------------------------------
      //insert into database expenses-----------------------------
      $iteratorForCode++;

      $date = date('Y-m-d H:i:s');
      $sql3  = "INSERT INTO `general_journal` (`code`,`journal_date`,`description`,`user_name`) VALUES ('$journalCode','$date','$Description','$user_name');";
      $db->query($sql3);

      switch ($Co_tbl) {
        case 'procurment':
          $sql4  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','$AccID','1','$Amount');";
          $db->query($sql4);
          break;

          case 'reimbursment':
            $sql4  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','$AccID','3','$Amount');";
            $db->query($sql4);
            break;

      }

      $date = date('Y-m-d H:i:s');
      $sql2  = "INSERT INTO `expenses` (`Date`,`Expenses`) VALUES ('$date','$Amount');";
      $db->query($sql2);

    //---------------------------------------------------------
          $total=$budget-$Amount;
        //Updating budget----------------------------------------------
          $sql1="UPDATE obudget SET Budget='$total' WHERE Id=1;";
          if($db->query($sql1)){

            switch ($MOFP) {
              case 'Cash':
                $sql5  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','1','8','$Amount');";
                $db->query($sql5);

                $session->msg("s","Budget Released!");
                redirect('Budgetreleasing.php',false);
                break;

                case 'Partial':

                $sql5  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','1','4','$Amount');";
                $db->query($sql5);
                $session->msg("s","Budget Released!");
                redirect('Budgetreleasing.php',false);
                  break;

              default:

                break;
            }

          }else{
            $session->msg("d", $errors);
            redirect('Budgetreleasing.php',false);
          }
        }
      }
    }else {
        $session->msg("d", $errors);
        redirect('Budgetreleasing.php',false);
      }
    }
?>
