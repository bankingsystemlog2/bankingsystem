<?php
  $page_title = 'General Ledger';
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
$from = isset($_GET['from']) ? $_GET['from'] : date("Y-m-d",strtotime(date('Y-m-d')." -1 week"));
$to = isset($_GET['to']) ? $_GET['to'] : date("Y-m-d");
?>
<style>
	th.p-0, td.p-0{
		padding: 0 !important;
	}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="file.php" class="breadcrumbs__item">Back</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
	
  <a href="#checkout" class="breadcrumbs__item is-active">Reports</a>
</nav>
<!-- /Breadcrumb -->

<div class="card card-outline card-primary">
	<div class="card-header">
		<h5 class="card-title">General Ledger</h5>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body">
        <div class="callout border-primary shadow rounded-0">
            <h4 class="text-muted">Filter Date</h4>
            <form action="" id="filter">
            <div class="row align-items-end">
                <div class="col-md-4 form-group">
                    <label for="from" class="control-label">Date From</label>
                    <input type="date" id="from" name="from" value="<?= $from ?>" class="form-control form-control-sm rounded-0">
                </div>
                <div class="col-md-4 form-group">
                    <label for="to" class="control-label">Date To</label>
                    <input type="date" id="to" name="to" value="<?= $to ?>" class="form-control form-control-sm rounded-0">
                </div>
                <div class="col-md-4 form-group">
                  <button class="btn btn-default bg-primary bg-gradient text-white btn-flat btn-sm"><i class="fa fa-filter"></i> Filter</button>
                  <button class="btn btn-default bg-secondary bg-gradient text-white border btn-flat btn-sm" id="print" type="button"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            </form>
            <br>
            <div class="row">
              <div class="col-md-4 form-group">
                  <label for="select_Group" class="control-label">Group Selection</label>
                <select class="form-select form-select-sm select_Group" aria-label=".form-select-sm example">
                  <option selected>Open this select menu</option>
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
        <div class="container-fluid" id="outprint">
            <h3 class="text-center"><b><?= "Banking and Finance" ?></b></h3>
            <h5 class="text-center"><b>Ledger</b></h5>
            <?php if($from == $to): ?>
            <p class="m-0 text-center"><?= date("M d, Y" , strtotime($from)) ?></p>
            <?php else: ?>
            <p class="m-0 text-center"><?= date("M d, Y" , strtotime($from)). ' - '.date("M d, Y" , strtotime($to)) ?></p>
            <?php endif; ?>
            <hr>
            <table class="table table-hover table-striped table-bordered">
              <colgroup>
    					<col width="20%">
    					<col width="20%">
    					<col width="60%">
    				</colgroup>
    				<thead>
    					<tr>
    						<th>Date</th>
    						<th>Journal Code</th>
    						<td class="p-0">
    							<div class="d-flex w-100">
    								<div class="col-6 border">Description</div>
    								<div class="col-3 border">Debit</div>
    								<div class="col-3 border">Credit</div>
    							</div>
    						</td>
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
      					</tr>
      					<?php endwhile; ?>
      				</tbody>
      			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
          $('#filter').submit(function(e){
              e.preventDefault()
              location.href="Ledger.php?page=reports/trial_balance&"+$(this).serialize();
          })
	});
    $(document).ready(function(){
          $('#print').click(function(){
              start_loader()
              var _h = $('head').clone();
              var _p = $('#outprint').clone();
              var el = $('<div>')
              _h.find('title').text('Working Trial Balance - Print View')
              _h.append('<style>html,body{ min-height: unset !important;}</style>')
              el.append(_h)
              el.append(_p)
               var nw = window.open("","_blank","width=900,height=700,top=50,left=250")
               nw.document.write(el.html())
               nw.document.close()
               setTimeout(() => {
                   nw.print()
                   setTimeout(() => {
                       nw.close()
                       end_loader()
                   }, 200);
               }, 500);
          })
      $('.table td,.table th').addClass('py-1 px-2 align-middle')

    });
</script>




<?php include_once('layouts/footer.php'); ?>
