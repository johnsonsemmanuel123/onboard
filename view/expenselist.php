<?php 
$selected_todaysales = $context->select_expensescaptured($oshop_code);
$expense_summary = $context->expensesum($oshop_code);
?>
<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Expenses List</h4>
<h6>Manage your shop expenses </h6>
</div>
<div class="page-btn">
<a href="javascript:void(0);" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Expenses</a>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash1.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>
<span class="counters" data-count="<?php echo $expense_summary['total_today']; ?>">
</span>
</h5>
<h6><u>Total Expenses Today</u></h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash1">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash2.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>GH¢
<span class="counters" data-count="<?php echo $expense_summary['total_thisweek']; ?>">
</span>
</h5>
<h6><a href="index.php?page=expensedetails&ecode=<?php echo 'thisweek'; ?>" style="color: black;"><u>Total Expenses This Week</u></a></h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash2">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash1.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent"> 
<h5>GH¢
<span class="counters" data-count="<?php echo $expense_summary['total_thismonth']; ?>"></span>
</h5>
<h6><a href="index.php?page=expensedetails&ecode=<?php echo 'thismonth'; ?>" style="color: black;">
<u>Total Expenses This Month</u>
</a></h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash3">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash1.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>GH¢
<span class="counters" data-count="<?php echo $expense_summary['total_thisyear']; ?>">
</span></h5>
<h6><a href="index.php?page=expensedetails&ecode=<?php echo 'thisyear'; ?>" style="color: black;">
<u>Total Expenses This Year</u>
</a></h6>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="table-top">
<div class="search-set">
<div class="search-path">
<a class="btn btn-filter" id="filter_search">
<img src="../assets/img/icons/filter.svg" alt="img">
<span><img src="../assets/img/icons/closes.svg" alt="img"></span>
</a>
</div>
<div class="search-input">
<a class="btn btn-searchset"><img src="../assets/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf">
<img src="../assets/img/icons/pdf.svg" alt="img">
</a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="../assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="../assets/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>
<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-12">
<div class="form-group">
<input type="text" class="form-control" value="List of all sales today <?php echo date('d-M-Y'); ?> and pending payment list" readonly style="border-radius: 0px; border: 1px solid #ff9f43;">
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>Date</th>
<th>Expenses Description</th>
<th>Expenses Amount</th>
<th>Captured By</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php 
if (!empty($selected_todaysales)) {
foreach ($selected_todaysales as $data) { $id = $data['id'];
?>
<tr>
<td><?php echo $data['date_time']; ?></td>
<td><?php echo ucwords(strtolower($data['expenses_description'])); ?></td>
<td align="left"><?php echo number_format($data['amount'],2); ?></td>
<td><?php echo ucwords(strtolower($data['captured_by'])); ?></td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<?php if ($update==1) { ?>
<li>
<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo $id ?>"><img src="../assets/img/icons/edit-5.svg" class="me-2" alt="img">Update Expense</a>
</li>
<?php } ?>
<?php if ($delete==1) { ?>
<li>
<a href="#" id="deleteExpenses" data-id=<?php echo $id; ?> class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2">
Delete Expense
</a>
</li>
<?php } ?>
</ul>
</td>
</tr>
<section>
<form method="POST" action="../controller/expensesController.php">
<div class="modal fade" id="editmodal<?php echo $id; ?>" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Update Expenses</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<input type="hidden" name="hiddencode" value="<?php echo $id; ?>">
<div class="form-group">
<label>Select Expense Type</label>
<select class="form-control" name="expensestype_updates">
<option value="<?php echo $data['expenses_id'];?>"><?php echo ucwords(strtolower($data['expenses_description']));?></option>
<?php 
$rowdata_update = $context->select_newexpensestype($oshop_code); 
foreach ($rowdata_update as $data_updates) { ?>
<option value="<?php echo $data_updates['id']; ?>">
<?php echo ucwords(strtolower($data_updates['expenses_description'])); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Enter Amount</label>
<input type="number" min="1" value="<?php echo $data['amount']; ?>" class="form-control" name="expenses_amount_updates" style="text-align: right;">
</div>
</div>
<div class="col-12">
<div class="form-group">
<label>Remarks/Comments</label>
<textarea rows="1" class="form-control" name="expense_comments_updates" placeholder="ENTER IF ANY"><?php echo $data['comments']; ?></textarea>
</div>
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2" type="submit" name="updateSubmitted">Submit</button>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</form>
</section>
<?php 
}
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<section>
<form method="POST" action="../controller/expensesController.php">
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Enter New Expenses</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Select Expense Type</label>
<select class="form-control" name="expensestype">
<option value="">SELECT EXPENSES</option>
<?php 
$rowdata = $context->select_newexpensestype($oshop_code); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['id']; ?>">
<?php echo ucwords(strtolower($data['expenses_description'])); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Enter Amount</label>
<input type="number" min="1" class="form-control" name="expenses_amount" style="text-align: right;">
</div>
</div>
<div class="col-12">
<div class="form-group">
<label>Remarks/Comments</label>
<textarea rows="1" class="form-control" name="expense_comments" placeholder="ENTER IF ANY"></textarea>
</div>
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2" type="submit" name="customerSubmitted">Submit</button>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</form>
</section>