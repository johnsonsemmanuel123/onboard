<?php 
if (isset($_SESSION['bought_code'])) {
unset($_SESSION['bought_code']);
}
$creditors=0;
$paida=0;
$paidamount=0;
$creditamount=0;
$balanceamount=0;
$selected_todaysales = $context->central_saleslist_today();
if (!empty($selected_todaysales)) {
$creditors = count($selected_todaysales);
} 
if (!empty($selected_todaysales)) {
foreach ($selected_todaysales as $countval) { $id = $countval['transaction_code'];

$creditamount += $countval['total_monies'] ;
$balanceamount += ($countval['total_monies']) ;
}
$paida = $context->cred_payments_new();
$paidamount += $paida;
$balanceamount = ($balanceamount-$paida) ;
}
?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Layaway Sales</h4>
<h6>Manage your layaway sales </h6>
</div>
<div class="page-btn">
<a href="javascript:void(0);" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>New Layaway Sales</a>
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
<span class="counters" data-count="<?php echo number_format($creditors); ?>">
</span>
</h5>
<h6>Layaway Customers Count</h6>
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
<span class="counters" data-count="<?php echo number_format($creditamount,2); ?>">
</span>
</h5>
<h6>Total Amount</h6>
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
<span class="counters" data-count="<?php echo number_format($paida,2); ?>"></span>
</h5>
<h6>Total Paid</h6>
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
<span class="counters" data-count="<?php echo number_format($balanceamount,2); ?>">
</span></h5>
<h6>Total Balance</h6>
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
<th>Customer Name</th>
<th>Status</th>
<th>Qty</th>
<th>Total Amount</th>
<th>Amount Paid</th>
<th>Balance</th>
<th>Biller</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php 
if (!empty($selected_todaysales)) {
foreach ($selected_todaysales as $data) { $id = $data['transaction_code'];
$amount_paid_already = $context->cred_payments($id)
?>
<tr>
<td><?php echo $data['date_time']; ?></td>
<td><?php echo ucwords(strtolower($data['customer_name'])); ?></td>
<td><?php 
if ($data['payment_category']=='Credit_Pay') {
echo '<span class="badges bg-lightred brad">Credit</span>';
}else{
echo '<span class="badges bg-lightgreen brad">Paid</span>';
}
?></td>
<td align="right"><?php echo number_format($data['qty']); ?></td>
<td align="right" style="font-weight: bold"><?php echo number_format($data['total_monies']); ?></td>
<td align="right" style="color: green; font-weight: bold"><?php 
if ($data['payment_category']=='Credit_Pay') {
echo number_format($amount_paid_already,2);
}else{
echo number_format($data['total_monies'],2);
}
?></td>
<td align="right" style="color: red; font-weight: bold"><?php echo $data['payment_category']=='Credit_Pay' ? number_format(($data['total_monies']-$amount_paid_already),2) : '-'; ?></td>
<td><?php echo ucwords(strtolower($data['user_name'])); ?></td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<form method="POST" action="../controller/reprintsController.php" id="myFormreprints<?php echo $id; ?>">
<input type="hidden" name="reprints_code" value="<?php echo $id; ?>">
<a href="#" class="dropdown-item" onclick="document.getElementById('myFormreprints<?php echo $id; ?>').submit(); return false;">
<img src="../assets/img/icons/printer.svg" class="me-2" alt="img">Print Receipt</a>
</form>
</li>
<?php if ($data['payment_category']=='Credit_Pay') { ?>
<li>
<a href="index.php?page=creditpaymenthistory&idcode=<?php echo $id; ?>" class="dropdown-item">
<img src="../assets/img/icons/dollar-square.svg" class="me-2" alt="img">
Show Payments
</a>
</li>
<li>
<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#quantitymodal<?php echo $id ?>"><img src="../assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
</li>
<?php } ?>




</ul>
</td>
</tr>

<div class="modal fade" id="quantitymodal<?php echo $id ?>" tabindex="-1" aria-labelledby="quantitymodal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-md modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Enter Details For Payment</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form method="POST" action="../controller/cpaymentsController.php">
<input type="hidden" name="trans_code" value="<?php echo $id; ?>">
<input type="hidden" name="amountforgoods" value="<?php echo $data['total_monies']; ?>">
<input type="hidden" name="amountalreadypaid" value="<?php echo $amount_paid_already; ?>">
<div class="row">
<div class="col-md-9 col-xl-9 col-lg-9 col-sm-12 col-xs-12">
<div class="form-group"><label>CUSTOMER</label>
<input type="text" class="col-10" value="<?php echo ucwords(strtolower($data['customer_name'])); ?>" readonly disabled style="font-weight: bold; color: green;">
</div>
</div>
<div class="col-md-3 col-xl-3 col-lg-3 col-sm-12 col-xs-12">
<div class="form-group"><label>AMOUNT</label>
<input type="text" class="col-2" name="enteredQuantities" id="enteredQuantities" required style="font-weight: bold; color: green;text-align: right;" autofocus>
</div>
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2" type="submit" name="masterSalesSubmitted">Submit</button>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</form>
</div>
</div>
</div>
</div>
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
<form method="POST" action="../controller/centralSalesController.php">
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Enter New Layaway Data</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>Select Customer</label>
<select class="form-control" name="customertype">
<option value="">SELECT CUSTOMER</option>
<?php 
$rowdata = $context->select_allcus(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['mname']; ?>">
<?php echo ucwords($data['mname']); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>Select Product/Item</label>
<select class="form-control" name="customertype">
<option value="">SELECT PRODUCT</option>
<?php 
$rowdata_products = $context->central_saleslist(); 
foreach ($rowdata_products as $data) { ?>
<option value="<?php echo $data['id']; ?>">
<?php echo ucwords($data['product_name']); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>Enter Quantity</label>
<input type="number" min="1" class="form-control" name="phone_number" style="text-align: right;">
</div>
</div>
<div class="col-12">
<div class="form-group">
<label>Remarks/Comments</label>
<textarea rows="1" class="form-control" name="product_description" placeholder="ENTER IF ANY"></textarea>
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