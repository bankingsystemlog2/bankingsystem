<?php
  $page_title = 'Audit Management Form';
  require_once('includes/log2load.php');
?>
<link rel="stylesheet" href="datatables.css">
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
 $groups = find_all('audit');
 $users_id = current_user()['id'];
 $conn = mysqli_connect("localhost", "root", "", "bank");
 $employees = "SELECT * FROM employees INNER JOIN users ON employees.employee_id = users.employee_id WHERE users.id = ".$users_id;
 $employees1 = mysqli_query($conn, $employees);
 $employee = mysqli_fetch_array($employees1);
 $is_show = 1;
 $all_vendors = specific_auditor($employee['employee_id']);
 $all_auditor = find_all_auditor();
 $all_assets = find_all('assets');
 $purchases = find_all('purchases');
 $reimbursement = find_all('reimbursment');
 $facility = find_all('facility');
 $payroll = find_payroll();
 $income = find_income();
 $expenses = find_expenses();
?>
<?php
  if(isset($_POST['applicationform'])){
    header('Content-Type: text/plain; charset=utf-8');

   if(empty($errors)){
        $asset   = remove_junk($db->escape($_POST['asset']));
        $datecreated = remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_planned']))));
        $preparedby   = remove_junk($db->escape($_POST['auditor']));
        $query = "INSERT INTO audit (";
        $query .="asset,date_created,preparedby,status";
        $query .=") VALUES (";
        $query .="'{$asset}', '{$datecreated}', '{$preparedby}','1'";
        $query .=")";


    
        if($db->query($query)){
          redirect('audit_form.php', false);
        } else {
         
          $session->msg('d',' Sorry Data not saved!');
          redirect('audit_form.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('audit_form.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Audit Tasks</span>
        <div class="text-end">
        <div class="text-end">
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Task</th>
                <th>Auditor</th>
                <th>Date expected</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($all_vendors as $a_vendor): ?>
            <tr>
            <td><?php echo remove_junk(ucwords($a_vendor['asset']))?></td>
            <td><?php echo $a_vendor['first_name']," ",$a_vendor['last_name'];?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['date_created']))?></td>
            <td>
            <input type="hidden" name = "task" value ="<?php echo $a_vendor['asset'];?>">
            <button data-bs-toggle = "modal" data-bs-target = "#exampleModal-<?php echo $a_vendor['id'];?>" class="btn btn-info btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal-<?php echo $a_vendor['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-keyboard="true">
              <form action="audit_form_add.php" method="post">
                <div class=" modal-dialog modal-xl modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary">
                      <h5 class="modal-title" id="exampleModalLabel" style="Color:white">Audit table</h5>
                      <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close">
                      </button>
                    </div>
                    <style>
                    @media print{
                      #button{
                        display: none; !important;
                      }
                      body * {
                        visibility:hidden;
                      }
                      .modal-dialog {
                        visibility: visible !important;
                        /**Remove scrollbar for printing.**/
                        overflow: visible !important;
                      }
                      #printSection *{
                        visibility:visible;
                        position:top;
                        width:auto;
                        height:auto;
                        overflow: visible !important;
                      }
                      li {
                        page-break-after: auto;
                      }
                    }
                    @page {
                        size: A4;  /* this affects the margin in the printer settings */
                    }
                    </style>
                    <button onclick="print()" id="button" class="btn btn-info md-2"><i class="bi bi-file-post"></i> Print report</button>
                    <div id="printSection" class="modal-body table-responsive">
                            <?php if($a_vendor['asset'] === "Purchases"):?>
                                <table
                                class="table table-striped data-table"
                                style="width: 100%" >
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($purchases as $pur): ?>
                                    <tr>
                                    <td><?php echo remove_junk(ucwords($pur['Pu_Item']));?></td>
                                    <td><?php echo $pur['Pu_Quantity'];?></td>
                                    <td><?php echo remove_junk(ucwords($pur['Pu_Price']));?></td>
                                    <td><?php echo remove_junk(ucwords($pur['Pu_Date']));?></td>
                                    <td><?php echo remove_junk(ucwords($pur['Pu_Total']));?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            <?php elseif($a_vendor['asset'] === "Reimbursment"):?>
                                <table
                                class="table table-striped data-table"
                                style="width: 100%" >
                                    <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Purpose</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($reimbursement as $reim): ?>
                                    <tr>
                                    <td><?php echo remove_junk(ucwords($reim['Co_Source']));?></td>
                                    <td><?php echo $reim['Co_Desc'];?></td>
                                    <td><?php echo remove_junk(ucwords($reim['Co_Date']));?></td>
                                    <td><?php echo remove_junk(ucwords($reim['Co_Status']));?></td>
                                    <td><?php echo remove_junk(ucwords($reim['Co_Purpose']));?></td>
                                    <td><?php echo remove_junk(ucwords($reim['Co_Amount']));?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php elseif($a_vendor['asset'] === "Payroll"):?>
                                <table
                                class="table table-striped data-table"
                                style="width: 100%" >
                                    <thead>
                                    <tr>
                                        <th>Basic Salary</th>
                                        <th>Overtime</th>
                                        <th>House and Rent Allowance</th>
                                        <th>Conveyance</th>
                                        <th>Other Allowance</th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>Salary</th>
                                        <th>Salary Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($payroll as $pay): 
                                    $bs = $pay['p_bs'] * $pay['jp_hrate'];
                                    $ot = $pay['p_ot'] * $pay['jp_otrate'];

                                    $ph = $pay['jp_ph'];
                                    $sss = $pay['jp_sss'];
                                    $pi = $pay['jp_pi'];
                                    $tax = $pay['jp_tax'];

                                    $totalearnings = $bs + $ot;
                                    $deduction = $ph + $sss + $pi + $tax;

                                    $totalsalary = $totalearnings - $deduction;
                                    ?>
                                    <tr>
                                    <td><?php echo remove_junk(ucwords($pay['p_bs']));?></td>
                                    <td><?php echo $pay['p_ot'];?></td>
                                    <td><?php echo remove_junk(ucwords($pay['p_hra']));?></td>
                                    <td><?php echo remove_junk(ucwords($pay['p_con']));?></td>
                                    <td><?php echo remove_junk(ucwords($pay['p_oa']));?></td>
                                    <td><?php echo remove_junk(ucwords($pay['p_eid']));?></td>
                                    <td><?php echo remove_junk(ucwords($pay['name']));?></td>
                                    <td><?php echo $totalsalary;?></td>
                                    <td><?php echo remove_junk(ucwords($pay['p_date']));?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php elseif($a_vendor['asset'] === "Income"):?>
                                <table
                                class="table table-striped data-table"
                                style="width: 100%" >
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($income as $reim): ?>
                                    <tr>
                                    <td><?php echo remove_junk(ucwords($reim['Name']));?></td>
                                    <td><?php echo $reim['Amount'];?></td>
                                    <td><?php echo remove_junk(ucwords($reim['tp_id']));?></td>
                                    <td><?php echo remove_junk(ucwords($reim['date']));?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php elseif($a_vendor['asset'] === "Facility"):?>
                                <table
                                class="table table-striped data-table"
                                style="width: 100%" >
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($facility as $reim): ?>
                                    <tr>
                                    <td><?php echo remove_junk(ucwords($reim['name_of_room']));?></td>
                                    <td><?php echo $reim['description'];?></td>
                                    <td><?php echo remove_junk(ucwords($reim['status']));?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php elseif($a_vendor['asset'] === "Expenses"):?>
                                <table
                                class="table table-striped data-table"
                                style="width: 100%" >
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Department</th>
                                        <th>Requestor</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($expenses as $reim): ?>
                                    <tr>
                                    <td><?php echo remove_junk(ucwords($reim['Expenses']));?></td>
                                    <td><?php echo $reim['Total'];?></td>
                                    <td><?php echo remove_junk(ucwords($reim['Comments']));?></td>
                                    <td><?php echo remove_junk(ucwords($reim['PR_Department']));?></td>
                                    <td><?php echo remove_junk(ucwords($reim['PR_Requestor']));?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            <?php endif;?>
                                    </div>
                    <div class="modal-footer bg-secondary">
                      <input type="hidden" name="asset" value="<?php echo $a_vendor['asset'];?>">
                      <button type="submit" name="edit_fleet" class="btn btn-success"><i class="fas fa-check"></i> Edit</button>
                      <button type="button" name="delete_fleet" data-bs-toggle = "modal" data-bs-dismiss="modal" class="btn btn-danger" data-bs-target = "#deleteModal-<?php echo $row['fleetid'];?>">Delete</button>
                    </div>
                  </div>
                </div>
                </form>
              </div>
             </td>
            </tr>
            <?php endforeach;?>
             </tbody>
        </table>
        </div>
      </div>
    </div>
</div>
        <?php include_once('layouts/footer.php'); ?>