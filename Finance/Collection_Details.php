<?php
  $page_title = 'Collection Details';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$PageName=$_GET['PageName'];
$Recieved=0;
$Charges=0;
$total=0;
$id=$_GET['id'];
$tablename=$_GET['Tablename'];
$row=collection($tablename, $id);
$AcoountNumber=$row['A_Number'];
$TR=find_collection_transactions($tablename, $AcoountNumber);
$Type="";
$Penalty=0;
$Date;
 ?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

<!-- for Determining what page the user ame from-->
   <?php if ($PageName=='ListofLoans.php'): ?>
     <a href="Listofloans.php" class="breadcrumbs__item">List Of Loans</a>
   <?php elseif ($PageName=='ListOfDeposits.php'): ?>
     <a href="Listofloans.php" class="breadcrumbs__item">List Of Deposits</a>
   <?php elseif ($PageName=='Collections.php'): ?>
     <a href="Collections.php" class="breadcrumbs__item">All Collections</a>
 <?php elseif ($PageName=='AccountsRecievable.php'): ?>
   <a href="AccountsRecievable.php" class="breadcrumbs__item">List of Recievables</a>
 <?php endif; ?>
<!-- for Determining what page the user ame from-->

  <a href="#checkout" class="breadcrumbs__item is-active">Collection Details</a>
</nav>
<!-- /Breadcrumb -->

<?php if ($PageName === 'ListofLoans.php'): ?>
<div class="Content">
<div class="container allCont">
<div class="col-md-13">
  <div class="row1">
  <div class="headSection">
    <div class="TitleViewChead">
      <div class="Exit">
          <a href="<?php echo $PageName;?>" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></a>
      </div>
      <h2 class="titleViewC">INVOICE ORDER</h2>
      <h2 class="CompanyViewC">AA BANK</h2>
    </div>
  </div>
  <div class="AABank">
    <h3>Address:  Quirino Highway, Novaliches</h3>
    <h3>City: Quezon City</h3>
    <h3>T-Phone: 7799-6617</h3>
  </div>
  <div class="PurchaseOrder">
    <h3>Date: <?php echo $row['LS_Date']; ?></h3>
    <h3>INV Code: <?php echo $row['Co_Code']; ?></h3>
    <?php if (remove_junk($row['Name']) === 'Pending'): ?>
    <h3>Status : <span class="badge rounded-pill bg-danger"><?php echo remove_junk($row['Name']); ?></span></h3>
  <?php elseif (remove_junk($row['Name']) === 'Debit'):  ?>
   <h3>Status : <span class="badge rounded-pill bg-info"><?php echo "Approved"; ?></span></h3>
    <?php endif; ?>

  </div>
  <div class="SecondHeader">
   <div class="RightTitleCdet">
    <h2>Customer Details</h2>
   </div>
  </div>
  <div class="Address">
    <div class="leftTitleContent">
      <h3>Customer Name : <?php echo $row['LS_Account_name']; ?></h3>
      <h3>Address : <?php echo $row['LS_Address']; ?></h3>
      <h3>City : <?php echo $row['LS_City']; ?></h3>
      <h3>Country : <?php echo $row['LS_Country']; ?></h3>
    </div>
    <div class="RightTitleContent">
      <h3>Bank account number : <?php echo $row['A_Number']; ?></h3>
      <h3>Remaining Balance : </h3>
    </div>
  </div>
  <div class="ThirdHeadSection">
   <h2>Cutomer Transactions</h2>
  </div>
  <br><br>
  <div class="TableContent">
        <table class="CollectionTbl">
         <thead class="CheaderColumn">
           <tr>
             <th>Type</th>
             <th>Partial Payment</th>
              <th>Penalty</th>
             <th>Amortization</th>
           </tr>
         </thead>
         <tbody>
           <?php foreach ($TR as $TR): ?>
             <?php
             $Type=$TR['P_Type'];
             $Penalty=$TR['P_Penalty'];
             $Date=$TR['P_Date'];
             ?>
             <tr>
               <td><?php  echo $TR['P_Type']; ?></td>
               <td>₱<?php  echo $TR['P_Amount'];?></td>
               <td>₱<?php echo  $TR['P_Penalty']; ?></td>
               <td><?php  echo  $TR['P_Date']; ?></td>
             </tr>
             <?php
             $Recieved = $Recieved+$TR['P_Amount'];
             $Charges =  $Charges+$TR['P_Penalty'];
             $total=$Recieved+$Charges
              ?>
            <?php endforeach; ?>
         </tbody>
 </table>
 <br>
 <h4 class="label_for_desc">Description :</h2>
 <textarea class="TextAreCDesc">
<?php echo $row['LS_Desc']; ?>
</textarea>
<div class="TotalArea">
  <h2>Total : ₱ <?php echo $total; ?></h2>
</div>
<?php if ($PageName!="Collections.php" && $PageName!="AccountsRecievable.php"): ?>
<div class="buttons_Area">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Confirm
</button>
</div>
<?php endif; ?>
  </div>
  </div>
</div>
</div>
<!-- Determining what To enter Brake -->
<?php elseif($PageName ==='ListOfDeposits.php'): ?>
  <div class="Content">
  <div class="container allCont">
  <div class="col-md-13">
    <div class="row1">
    <div class="headSection">
      <div class="TitleViewChead">
        <div class="Exit">
            <a href="<?php echo $PageName;?>" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></a>
        </div>
        <h2 class="titleViewC">INVOICE ORDER</h2>
        <h2 class="CompanyViewC">AA BANK</h2>
      </div>
    </div>
    <div class="AABank">
      <h3>Address:  Quirino Highway, Novaliches</h3>
      <h3>City: Quezon City</h3>
      <h3>T-Phone: 7799-6617</h3>
    </div>
    <div class="PurchaseOrder">
      <h3>Date: <?php echo $row['LS_Date']; ?></h3>
      <h3>INV Code: <?php echo $row['Co_Code']; ?></h3>
      <?php if (remove_junk($row['Name']) === 'Pending'): ?>
      <h3>Status : <span class="badge rounded-pill bg-danger"><?php echo remove_junk($row['Name']); ?></span></h3>
    <?php elseif (remove_junk($row['Name']) === 'Debit'):  ?>
     <h3>Status : <span class="badge rounded-pill bg-info"><?php echo "Approved"; ?></span></h3>
      <?php endif; ?>

    </div>
    <div class="SecondHeader">
     <div class="RightTitleCdet">
      <h2>Customer Details</h2>
     </div>
    </div>
    <div class="Address">
      <div class="leftTitleContent">
        <h3>Customer Name : <?php echo $row['LS_Account_name']; ?></h3>
        <h3>Address : <?php echo $row['LS_Address']; ?></h3>
        <h3>City : <?php echo $row['LS_City']; ?></h3>
        <h3>Country : <?php echo $row['LS_Country']; ?></h3>
      </div>
      <div class="RightTitleContent">
        <h3>Bank account number : <?php echo $row['A_Number']; ?></h3>
        <h3>Remaining Balance : </h3>
      </div>
    </div>
    <div class="ThirdHeadSection">
     <h2>Cutomer Transactions</h2>
    </div>
    <br><br>
    <div class="TableContent">
          <table class="CollectionTbl">
           <thead class="CheaderColumn">
             <tr>
               <th>Type</th>
               <th>Partial Payment</th>
               <th>Charges</th>
                <th>Penalty</th>
               <th>Amortization</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($TR as $TR): ?>
               <tr>
                 <td><?php  echo $TR['LT_Type']; ?></td>
                 <td>₱<?php  echo $TR['LT_Recieved'];?></td>
                 <td>₱<?php  echo  $TR['LT_Charges']; ?></td>
                 <td>N/A</td>
                 <td><?php  echo  $TR['LT_date'] ?></td>
               </tr>
               <?php
               $Recieved = $Recieved+$TR['LT_Recieved'];
               $Charges =  $Charges+$TR['LT_Charges'];
               $total=$Recieved+$Charges
                ?>
              <?php endforeach; ?>
           </tbody>
   </table>
   <br>
   <h4 class="label_for_desc">Description :</h2>
   <textarea class="TextAreCDesc">
  <?php echo $row['LS_Desc']; ?>
  </textarea>
  <div class="TotalArea">
    <h2>Total : ₱ <?php echo $total; ?></h2>
    <h2>Tax : </h2>
  </div>
  <?php if ($PageName!="Collections.php" && $PageName!="AccountsRecievable.php"): ?>
  <div class="buttons_Area">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Confirm
  </button>
  </div>
  <?php endif; ?>
    </div>
    </div>
  </div>
  </div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please check thoroughly action irreversible!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        Confirm invoice? this information will be sent to AR and any changes there on would be update by the AR managers.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <form action="Process.php?id=<?php echo $id. "&Tablename=". urlencode($tablename). "&Pagename=". urlencode($PageName). "&Total=". urlencode($total)."&Type=".urlencode($Type)."&Date=".urlencode($Date)."&Penalty=".urlencode($Penalty);?>" method="POST">
         <button type="Submit" name="Confirm" class="btn btn-success"><i class="fas fa-check"></i> Confirm</button>
         </form>
      </div>
    </div>
  </div>
</div>
</div>


<?php include_once('layouts/footer.php'); ?>
