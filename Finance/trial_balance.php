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
$from = isset($_GET['from']) ? $_GET['from'] : date("Y-m-d",strtotime(date('Y-m-d')." -1 week"));
$to = isset($_GET['to']) ? $_GET['to'] : date("Y-m-d");
?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Trial Balance</a>
</nav>
<!-- /Breadcrumb -->

<div class="card card-outline card-primary">
	<div class="card-header">
		<h5 class="card-title">General journal Trial Balance</h5>
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
        </div>
        <div class="container-fluid" id="outprint">
        <style>
            th.p-0, td.p-0{
                padding: 0 !important;
            }
        </style>
            <h3 class="text-center"><b><?= "Banking and Finance" ?></b></h3>
            <h5 class="text-center"><b>Trial Balance</b></h5>
            <?php if($from == $to): ?>
            <p class="m-0 text-center"><?= date("M d, Y" , strtotime($from)) ?></p>
            <?php else: ?>
            <p class="m-0 text-center"><?= date("M d, Y" , strtotime($from)). ' - '.date("M d, Y" , strtotime($to)) ?></p>
            <?php endif; ?>
            <hr>
			<table class="table table-hover table-bordered">
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
					$total_debit = 0;
					$total_credit = 0;
					$journals = $db->query("SELECT * FROM `general_journal` where date(journal_date) BETWEEN '{$from}' and '{$to}' order by date(journal_date) asc");
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
							$jitems = $db->query("SELECT j.*,a.name as account, g.type as `type` FROM `journal_items` j inner join account_list a on j.account_id = a.Co_Code inner join group_list g on j.group_id = g.id where j.journal_id = '{$row['id']}' ORDER by type");
							while($rowss = $jitems->fetch_assoc()):
                                if($rowss['type'] == 1)
                                    $total_debit += $rowss['amount'];
                                else
                                    $total_credit += $rowss['amount'];
							?>
							<div class="d-flex w-100">
								<div class="col-6 border"><span class="pl-4"><?= $rowss['account'] ?></span></div>
								<div class="col-3 border text-right"><?= $rowss['type'] == 1 ? format_num($rowss['amount']) : '' ?></div>
								<div class="col-3 border text-right"><?= $rowss['type'] == 2 ? format_num($rowss['amount']) : '' ?></div>
							</div>
							<?php endwhile; ?>
						</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
                <tfoot>
                    <th colspan="2" class="text-center"></th>
                    <th class="text-right p-0">
                        <div class="d-flex w-100">
                            <div class="col-6 border text-center">Total</span></div>
                            <div class="col-3 border text-right"><?= format_num($total_debit) ?></div>
                            <div class="col-3 border text-right"><?= format_num($total_credit) ?></div>
                        </div>
                    </th>
                </tfoot>
			</table>
		</div>
	</div>
</div>

<?php include_once('layouts/footer.php'); ?>
