<?php 
$xcod = $_GET['idcode'];
$selected_todaysales = $context->central_paymentlist($xcod,$oshop_code); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Credit Payment</h4>
<h6>Manage your credit sale payments</h6>
</div>
<div class="page-btn">
<a href="index.php?page=saleslist" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-1">Sales Ledger</a>
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
<th>
<label class="checkboxs">
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th>
<th>Date</th>
<th>Customer Name</th>
<th>Amount</th>
<th>Amount Received By</th>
</tr>
</thead>
<tbody>
<?php 
if (!empty($selected_todaysales)) {
foreach ($selected_todaysales as $data) { $id = $data['transaction_code'];?>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td><?php echo $data['date_time']; ?></td>
<td><?php echo ucwords(strtolower($context->fetch_customer($id))); ?></td>
<td align="right"><?php echo number_format($data['amount_paid'],2); ?></td>
<td><?php echo ucwords(strtolower($data['username'])); ?></td>
</tr>
<?php 
$total += $data['amount_paid'];
}
}
?>
<tfoot>
<tr>
<td colspan="2"></td>
<td style="background: #f5f5f5; border: 2px solid green; color: green; font-weight: bold;">
<b>TOTAL</b>
</td>
<td align="right" style="background: #f5f5f5; border: 2px solid green; color: green; font-weight: bold;">
GH¢ <?php echo number_format($total,2); ?></td>
</tr>
</tfoot>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>