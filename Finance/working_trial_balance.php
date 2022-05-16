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

  <a href="#checkout" class="breadcrumbs__item is-active">Reports</a>
</nav>
<!-- /Breadcrumb -->

<div class="card card-outline card-primary">
	<div class="card-header">
		<h5 class="card-title">General Journal</h5>
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
        </div>
        <div class="container-fluid" id="outprint">
            <h3 class="text-center"><b><?= "Banking and Finance" ?></b></h3>
            <h5 class="text-center"><b>Reports</b></h5>
            <?php if($from == $to): ?>
            <p class="m-0 text-center"><?= date("M d, Y" , strtotime($from)) ?></p>
            <?php else: ?>
            <p class="m-0 text-center"><?= date("M d, Y" , strtotime($from)). ' - '.date("M d, Y" , strtotime($to)) ?></p>
            <?php endif; ?>
            <hr>
			<table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Ref. Code.</th>
                        <th class="text-center">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $balance = 0;
                    $journal = $db->query("SELECT * FROM `general_journal` where date(journal_date) BETWEEN '{$from}' and '{$to}'");
                    $journal_arr = [];
                    while($row = $journal->fetch_assoc()){
                        $journal_arr[$row['id']] = $row;
                    }
                    $accounts = $db->query("SELECT * FROM `account_list`  where id in (SELECT account_id FROM `journal_items` where journal_id in (SELECT id FROM `general_journal` where date(journal_date) BETWEEN '{$from}' and '{$to}' ))");
                    while($arow = $accounts->fetch_assoc()):
                        $items = $db->query("SELECT j.*,g.type FROM `journal_items` j inner join group_list g on j.group_id = g.id where j.account_id = '{$arow['id']}' and j.journal_id in (SELECT id FROM `general_journal` where date(journal_date) BETWEEN '{$from}' and '{$to}' )");
                    ?>
                    <tr>
                        <th colspan="4"><?= $arow['name'] ?></th>
                    </tr>
                    <?php
                    while($irow = $items->fetch_assoc()):
                        if($irow['type'] == 1)
                            $balance += $irow['amount'];
                        else
                            $balance -= $irow['amount'];
                    ?>
                        <tr>
                            <td><?= isset($journal_arr[$irow['journal_id']]) ? date("M d, Y",strtotime($journal_arr[$irow['journal_id']]['journal_date'])) : "" ?></td>
                            <td><?= isset($journal_arr[$irow['journal_id']]) ? $journal_arr[$irow['journal_id']]['description'] : "" ?></td>
                            <td><?= isset($journal_arr[$irow['journal_id']]) ? $journal_arr[$irow['journal_id']]['code'] : "" ?></td>
                            <td class="text-right"><?= $irow['type'] == 1 ? format_num($irow['amount']) : '-'.(format_num($irow['amount']))  ?></td>
                        </tr>
                    <?php endwhile; ?>
				<?php endwhile; ?>
                </tbody>
                <tfoot>
                    <th colspan="3" class="text-center">Total</th>
                    <th class="text-right"><?= format_num($balance) ?></th>
                </tfoot>
			</table>
		</div>
	</div>
</div>
<script>
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
	})
</script>




<?php include_once('layouts/footer.php'); ?>
