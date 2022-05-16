<?php
  $page_title = 'General Journal';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);

?>
<?php include_once('layouts/header.php'); ?>

<?php
function format_num($number){
	$decimals = 0;
	$num_ex = explode('.',$number);
	$decimals = isset($num_ex[1]) ? strlen($num_ex[1]) : 0 ;
	return number_format($number,$decimals);
}
?>
<style>
	th.p-0, td.p-0{
		padding: 0 !important;
	}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Journal Entries</a>
</nav>
<!-- /Breadcrumb -->

<div class="card card-outline card-primary">
	<div class="card-header">
		<h5 class="card-title">Journal Entries</h5>
    <ul class="nav navbar-nav" style="float:right">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#JournalsModal">
      <i class="bi bi-plus-circle-fill"></i>
        Add new Record
      </button>
    </ul>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered">
				<colgroup>
					<col width="15%">
					<col width="15%">
					<col width="45%">
					<col width="15%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>Date</th>
						<th>Journal Code</th>
						<th class="p-0">
							<div class="d-flex w-100">
								<div class="col-6 border">Description</div>
								<div class="col-3 border">Debit</div>
								<div class="col-3 border">Credit</div>
							</div>
						</th>
						<th>Encoded By</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$journals = $db->query("SELECT * FROM `general_journal` order by date(journal_date) asc");
					while($row = $journals->fetch_assoc()):
					?>
					<tr>
						<td class="text-center"><?= date("M d, Y", strtotime($row['journal_date'])) ?></td>
						<td class=""><?= $row['code'] ?></td>
						<td class="p-0">
							<div class="d-flex w-100">
								<div class="col-6 border"><?= $row['description'] ?></div>
								<div class="col-3 border"></div>
								<div class="col-3 border"></div>
							</div>
							<?php
							$jitems = $db->query("SELECT j.*,a.name AS ACCOUNT, g.type AS `type` FROM `journal_items` j INNER JOIN account_list a ON j.account_id = a.Co_Code INNER JOIN group_list g ON j.group_id = g.id WHERE j.journal_id = '{$row['id']}' ORDER BY type");
							while($rowss = $jitems->fetch_assoc()):
							?>
							<div class="d-flex w-100">
								<div class="col-6 border"><span class="pl-4"><?= $rowss['ACCOUNT'] ?></span></div>
								<div class="col-3 border text-right"><?= $rowss['type'] == 1 ? format_num($rowss['amount']) : '' ?></div>
								<div class="col-3 border text-right"><?= $rowss['type'] == 2 ? format_num($rowss['amount']) : '' ?></div>
							</div>
							<?php endwhile; ?>
						</td>
						<td><?= $row['user_name']; ?></td>
						<td class="text-center">
							<button type="button" class="btn btn-success bg-gradient dropdown-toggle btn-sm" data-toggle="dropdown">
									Action
							</button>
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item edit_data" href="javascript:void(0)" data-id ="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"  data-code="<?php echo $row['code'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
							</div>
						</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>

      <!-- Modal -->
      <div class="modal fade bd-example-modal-xl" id="JournalsModal">
        <div class="modal-dialog-centered modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header bg-dark bg-gradient text-white">
              <h5 class="modal-title" id="exampleModalLongTitle">Add new Entry</h5>
              <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                        <div class="row g-3">
                         <div class="col">
                           <div class="card card-outline-info">
                               <div class="card-header bg-success bg-gradient">
                                   <h4 class="m-b-0 text-white">Trial Balance</h4>
                               </div>
                               <div class="card-body">
                           <table id="MainDatatbl" class="table table-striped data-table" style="width: 100%">
                             <thead>
                                 <tr class="bg-primary bg-gradient text-white">
                                     <th class="text-center"></th>
                                     <th class="text-center">Account</th>
                                     <th class="text-center">Group</th>
                                     <th class="text-center">Debit</th>
                                     <th class="text-center">Credit</th>
                                 </tr>
                             </thead>
                             <tbody id="Body_JEntryTrialBlanace">
                               <tr>
                                 <td class="text-center">
                                     <button class="btn btn-sm btn-outline btn-danger btn-flat" type="button" hidden><i class="bi bi-x-octagon-fill"></i></button>
                                 </td>
                                 <td class="">
                                     <input type="hidden" name="account_id[]" value="">
                                     <input type="hidden" name="group_id[]" value="">
                                     <input type="hidden" name="amount[]" value="">
                                     <span class="account"></span>
                                 </td>
                                 <td class="group"></td>
                                 <td class="debit_amount text-right"></td>
                                 <td class="credit_amount text-right"></td>
                               </tr>
                           </tbody>
                           <tfoot>
                               <tr class="bg-gradient-secondary">
                                   <tr>
                                       <th colspan="3" class="text-center">Total</th>
                                       <th class="text-right total_debit">0.00</th>
                                       <th class="text-right total_credit">0.00</th>
                                   </tr>
                                   <tr>
                                       <th colspan="3" class="text-center"></th>
                                       <th colspan="3" class="text-center total-balance">0</th>
                                   </tr>
                               </tr>
                           </tfoot>
                           </table>
                           <div class="form-actions">
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="row">
                                           <div class="col-md-offset-3 col-md-9">
                                               <button type="submit" id="add_to_list" class="btn btn-primary bg-gradient"> <i class="bi bi-download"></i> Save</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                            </div>
                           </div>
                         </div>
                         <div class="col">
                           <!-- Start of Form -->
                           <div class="card card-outline-info">
                               <div class="card-header bg-success bg-gradient">
                                   <h4 class="m-b-0 text-white">Journal Entry</h4>
                               </div>
                               <div class="card-body">
                                       <div class="form-body">
                                           <h5 class="box-title m-t-15">Account Info</h5>
                                           <hr class="m-t-0 m-b-40">
                                           <form id="form_addEntry">
                                           <label class="control-label text-right col-md-5" style="font-weight:bold;">Select Account Name:</label>
                                           <div class="col-md-7">
                                               <div class="form-group row">
                                           <div class="input-group mb-3">
                                             <select id="account_id" class="from-control form-select" onchange="getData(this.value, 'displaydata')">
                                              <option value="" disabled selected>Select Account</option>
                                              <?php
                                              $accounts = $db->query("SELECT * FROM `account_list` where delete_flag = 0 and `status` = 1 and `definedStat` = 104 order by `name` asc ");
                                              while($row = $accounts->fetch_assoc()):
                                              unset($row['description']);
                                              $account_arr[$row['id']] = $row;
                                                ?>
                                              <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                              <?php endwhile; ?>
                                            </select>
                                            <div class="input-group-append">
                                              <button class="btn btn-primary bg-gradient" disabled><i class="bi bi-search"></i> Find</button>
                                            </div>
                                            </div>
                                          </div>
                                          </div>
                                           <div class="row">
                                             <div class="col-md-7">
                                                 <div class="form-group row">
                                                     <label class="control-label text-right col-md-5" style="font-weight:bold;">Entry Date:</label>
                                                     <div class="col-md-12">
                                                        <input type="date" id="journal_date" name="journal_date" class="form-control form-control-sm form-control-border rounded-0" value="<?= isset($journal_date) ? $journal_date : date("Y-m-d") ?>" required>
                                                     </div>
                                                 </div>
                                             </div>
                                           </div>
                                           <!--/row-->
                                           <br>

                                           <div id="displaydata">
                                             <!-- Ajax Display -->

                                             <!-- Start of Row -->
                                             <div class="row">
                                               <div class="col-md-7">
                                                   <div class="form-group row">
                                                       <label class="control-label text-right col-md-11" style="font-weight:bold;">Entry Description:</label>
                                                       <div class="col-md-12">
                                                           <p class="form-control-static fs-7" style="font-size:15px;"> N/A </p>
                                                       </div>
                                                   </div>
                                               </div>
                                             </div>
                                             <!--/row-->
                                             <div class="row">
                                               <div class="col-md-7">
                                                   <div class="form-group row">
                                                       <label class="control-label text-right col-md-5" style="font-weight:bold;">Amount:</label>
                                                       <div class="col-md-12">
                                                           <p class="form-control-static" style="font-size:15px;"> N/A </p>
                                                       </div>
                                                   </div>
                                               </div>
                                             </div>
                                             <!--/row-->

                                             <!-- End of Ajax Display -->
                                           </div>

                                           <h5 class="box-title">Manage Entry</h5>
                                           <hr class="m-t-0 m-b-40">

                                           <div class="row">
                                               <div class="col-md-7">
                                                   <div class="form-group row">
                                                       <label class="control-label text-right col-md-9">Account Group:</label>
                                                       <div class="col-md-12">
                                                         <select class="from-control form-select" id="Group_id">
                                                             <option value="" disabled selected></option>
                                                             <?php
                                                             $groups = $db->query("SELECT * FROM `group_list` where delete_flag = 0 and `status` = 1 order by `name` asc ");
                                                             while($row = $groups->fetch_assoc()):
                                                                 unset($row['description']);
                                                                 $group_arr[$row['id']] = $row;
                                                             ?>
                                                             <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                             <?php endwhile; ?>
                                                         </select>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <br>
                                           <!--/row-->
                                       <div class="form-actions">
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <div class="row">
                                                       <div class="col-md-offset-3 col-md-9">
                                                           <button type="submit" id="add_to_list" class="btn btn-success bg-gradient"><i class="bi bi-node-plus-fill"></i> Add</button>
                                                       </div>
                                                   </div>
                                               </div>

                                           </div>
                                       </div>
                                   </form>
                               </div>
                           </div>
                           <!-- End of Form -->
                         </div>
                        </div>


                    </div>
                    <br>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->
		</div>
	</div>
</div>

<script>
      function getData(empid, divid){
          $.ajax({
              url: 'Ajax_loadAccountData.php?empid='+empid,
              success: function(html) {
                  var ajaxDisplay = document.getElementById(divid);
                  ajaxDisplay.innerHTML = html;
              }
          });
      }

        const formEl = document.getElementById("form_addEntry");
        const tbodyEl = document.getElementById("Body_JEntryTrialBlanace");
        const tableEl = document.getElementById("MainDatatbl");
        function onAddWebsite(e) {
          e.preventDefault();
          const Account_id = document.getElementById("account_id").value;
          const Group_id = document.getElementById("Group_id").value;
          var account_id = Account_id;
          var group_id = Group_id;
          $.ajax({
              url: 'Ajax_loadAccountData.php',
              type: 'post',
              data: {account_id: account_id, group_id: group_id},
              success: function(response){

               $('#Body_JEntryTrialBlanace').html(response);

              }
          });
        }

        function onDeleteRow(e) {
        if (!e.target.classList.contains("delete-row")) {
          return;
        }

        const btn = e.target;
        btn.closest("tr").remove();
      }

        formEl.addEventListener("submit", onAddWebsite);
        tableEl.addEventListener("click", onDeleteRow);

</script>


<?php include_once('layouts/footer.php'); ?>
