<?php include_once('includes/load.php'); ?>
<?php
$id=$_GET['id'];
$Tablename=$_GET['Tablename'];
$total=$_GET['Total'];
$PageName=$_GET['Pagename'];
if(isset($_POST['approve'])){
  if(empty($errors)){

  switch ($Tablename) {

// ======================================================================================================================================================================================================================== -->

    case 'procurment':
    //-------------------------------------------------------------------------
    $sql  = "UPDATE $Tablename set Co_Status = '101' where Co_Code ='$id'";
    if($db->query($sql)){
          $categorie = find_table($Tablename, $id);

          $Cod1 =$categorie['Co_Code'];
          $Cod2 =$categorie['PRO_Department'];
          $Cod3 =$categorie['PRO_Requestor'];
          $Cod4 =$categorie['PRO_Amount'];
          $Cod5 =$categorie['PRO_Date'];
          $Cod6 =$categorie['Co_Status'];
          $Cod7 =$categorie['PRO_Desc'];

      $cod1 = remove_junk($db->escape($Cod1));
      $cod2 = remove_junk($db->escape($Cod2));
      $cod3 = remove_junk($db->escape($Cod3));
      $cod4 = remove_junk($db->escape($Cod4));
      $cod5 = remove_junk($db->escape($Cod5));
      $cod6 = remove_junk($db->escape($Cod6));
      $cod7 = remove_junk($db->escape($Cod7));
      $cod8 = remove_junk($db->escape($Tablename));
       $sql  = "INSERT INTO budgetreleasing (P_Code, P_Department, P_Requestor, P_Purpose, P_Amount, P_Date, P_Status, P_Tablename)";
       $sql .= " VALUES ('$cod1','$cod2','$cod3','$cod7','$cod4','$cod5','$cod6','$cod8')";
     if($db->query($sql)){

     //insertion in account_list by data...
       $date = date('Y-m-d H:i:s');
       $Accountssql  = "INSERT INTO account_list (name, description, status, delete_flag, date_created ,definedStat, Amount, Co_Code)";
       $Accountssql  .= " VALUES ('$cod7','$cod7','1','0','$date','$cod6','$Cod4','$Cod1')";
       if ($db->query($Accountssql )) {
         $session->msg("s","request Awaiting approval!");
          redirect('procurement.php',false);

       }else {
         $session->msg("d", $errors);
         redirect('Procurement.php',false);
       }
   //insertion in account_list by data...

      }else {
        $session->msg("d", "Sorry Failed to send.");
        redirect('Procurement.php',false);
      }
     } else {
      $session->msg("d", "Sorry Failed to Approve.");
      redirect('Procurement.php',false);
   }
   //---------------------------------------------------------------------------
      break;

// ======================================================================================================================================================================================================================== -->
    case 'reimbursment':
  //---------------------------------------------------------------------------
  $sql  = "UPDATE $Tablename set Co_Status = '101' where Co_Code ='$id'";
  if($db->query($sql)){

   $remcat = find_table($Tablename, $id);

   $Cod1 =$remcat['Co_Code'];
   $Cod2 =$remcat['Co_Source'];
   $Cod3 =$remcat['Co_Desc'];
   $Cod4 =$remcat['Co_Amount'];
   $Cod5 =$remcat['Co_Date'];
   $Cod6 =$remcat['Co_Status'];
   $Cod7 =$remcat['Co_Purpose'];

   $cod1 = remove_junk($db->escape($Cod1));
   $cod2 = remove_junk($db->escape($Cod2));
   $cod3 = remove_junk($db->escape($Cod3));
   $cod4 = remove_junk($db->escape($Cod4));
   $cod5 = remove_junk($db->escape($Cod5));
   $cod6 = remove_junk($db->escape($Cod6));
   $cod7 = remove_junk($db->escape($Cod7));
   $cod8 = remove_junk($db->escape($Tablename));
   $sql  = "INSERT INTO budgetreleasing(P_Code, P_Department, P_Requestor, P_Purpose, P_Amount, P_Date, P_Status, P_Tablename)";
   $sql .= " VALUES ('$cod1','$cod2','$cod3','$cod7','$cod4','$cod5','$cod6','$cod8')";

   if($db->query($sql)){

     //insertion in account_list by data...
       $date = date('Y-m-d H:i:s');
       $Accountssql  = "INSERT INTO account_list (name, description, status, delete_flag, date_created, definedStat, Amount, Co_Code)";
       $Accountssql  .= " VALUES ('$cod7','$cod7','1','0','$date','$cod6','$Cod4','$Cod1')";
       if ($db->query($Accountssql )) {
           $session->msg("s","request Awaiting approval!");
           redirect('Claims_reimbursment.php',false);
         }else {
           $session->msg("d", $errors);
           redirect('Claims_reimbursment.php',false);
         }
     //insertion in account_list by data...


}else {
      $session->msg("d", "Sorry Failed to send.");
      redirect('Claims_reimbursment.php',false);
    }
   } else {
    $session->msg("d", "Sorry Failed to Approve.");
    redirect('Claims_reimbursment.php',false);
 }
 //---------------------------------------------------------------------------
    break;

// ======================================================================================================================================================================================================================== -->

    case 'uexpenses':
    //---------------------------------------------------------------------------
    $sql  = "UPDATE $Tablename set Co_Status = '101' where Co_Code ='$id'";
    if($db->query($sql)){

     $remcat = find_table($Tablename, $id);

     $Cod1 =$remcat['Co_Code'];
     $Cod2 =$remcat['UE_Department'];
     $Cod3 =$remcat['UE_Requestor'];
     $Cod4 =$remcat['UE_Desc'];
     $Cod5 =$remcat['Co_Amount'];
     $Cod6 =$remcat['UE_date'];
     $Cod7 =$remcat['Co_Status'];

     $cod1 = remove_junk($db->escape($Cod1));
     $cod2 = remove_junk($db->escape($Cod2));
     $cod3 = remove_junk($db->escape($Cod3));
     $cod4 = remove_junk($db->escape($Cod4));
     $cod5 = remove_junk($db->escape($Cod5));
     $cod6 = remove_junk($db->escape($Cod6));
     $cod7 = remove_junk($db->escape($Cod7));
     $cod8 = remove_junk($db->escape($Tablename));
     $sql  = "INSERT INTO budgetreleasing(P_Code, P_Department, P_Requestor, P_Purpose, P_Amount, P_Date, P_Status, P_Tablename)";
     $sql .= "VALUES('$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8')";

     if($db->query($sql)){

       //insertion in account_list by data...
         $date = date('Y-m-d H:i:s');
         $Accountssql  = "INSERT INTO account_list (name, description, status, delete_flag, date_created, definedStat,Amount)";
         $Accountssql  .= " VALUES ('$cod4','$cod4','1','0','$date','$cod7','$Cod5')";
         if ($db->query($Accountssql )) {
             $session->msg("s","request Awaiting approval!");
             redirect('Utilitie&Expenses.php',false);
           }else {
             $session->msg("d", $errors);
             redirect('Utilitie&Expenses.php',false);
           }
       //insertion in account_list by data...


  }else {
        $session->msg("d", "Sorry Failed to send.");
        redirect('Utilitie&Expenses.php',false);
      }
     } else {
      $session->msg("d", "Sorry Failed to Approve.");
      redirect('Utilitie&Expenses.php',false);
   }
   //---------------------------------------------------------------------------
    break;

    default:

      break;
      }

   }else {
    $session->msg("d", $errors);
    redirect('Reimbursment.php',false);
  }
}

//------------------------------------------------------------------------------
if (isset($_POST['ViewPurchaseOrder'])) {
  if(empty($errors)){
  redirect('Disbursment_Details.php',true);
}

}

if (isset($_POST['Confirm'])) {
  $Type=$_GET['Type'];
  $Date=$_GET['Date'];
  $Penalty=$_GET['Penalty'];
 if(empty($errors)){
   $sql  = "UPDATE $Tablename set Co_Status = '105' where Co_Code ='$id'";
   if($db->query($sql)){

        $row = find_table($Tablename, $id);

         $Cod1 =$row['Co_Code'];
         $Cod2 =$row['LS_Department'];
         $Cod3 =$row['LS_Account_name'];
         $Cod4 =$total;
         $Cod5 =$row['LS_Date'];
         $Cod6 =105;
         $Cod7 =$row['LS_Desc'];
         $accountNumber=$row['A_Number'];

     $cod1 = remove_junk($db->escape($Cod1));
     $cod2 = remove_junk($db->escape($Cod2));
     $cod3 = remove_junk($db->escape($Cod3));
     $cod4 = remove_junk($db->escape($Cod4));
     $cod5 = remove_junk($db->escape($Cod5));
     $cod6 = remove_junk($db->escape($Cod6));
     $cod7 = remove_junk($db->escape($Cod7));
     $cod8 = remove_junk($db->escape($Tablename));
      $sql  = "INSERT INTO budgetreleasing(P_Code, P_Department, P_Requestor, P_Purpose, P_Amount, P_Date, P_Status, P_Tablename)";
      $sql .= " VALUES ('$cod1','$cod2','$cod3','$cod7','$cod4','$cod5','$cod6','$cod8')";
      if($db->query($sql)){

        $sql1  = "INSERT INTO `collection_transactions` (`LT_Recieved`,`LT_Penalty`,`LT_date`,`A_Number`,`LT_Type`) VALUES ('$total','$Penalty','$Date','$accountNumber','$Type');";
        $db->query($sql1);

        $date = date('Y-m-d H:i:s');
        $sql2  = "INSERT INTO `expenses` (`Date`,`Expenses`,`Collection`) VALUES ('$date','0','$total');";
        $db->query($sql2);

      $session->msg("s","Data Sent to AR!");
       redirect($PageName,false);
     }else {
         $session->msg("d", $errors);
         redirect('Listofinvestment.php',false);
     }
}

}
}


?>
