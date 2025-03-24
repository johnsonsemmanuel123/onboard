<?php 
$selected_todaysales = $context->select_customerspershop($oshop_code);
if (!empty($selected_todaysales)) {
$customers_count = count($selected_todaysales);
}
?>
<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Customers List</h4>
<h6>Manage your customers  </h6>
</div>
<div class="page-btn">
<a href="javascript:void(0);" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
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
<span class="counters" data-count="<?php echo $customers_count ?? 0; ?>">
</span>
</h5>
<h6>Total Customers</h6>
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
<input type="text" class="form-control" value="List of all Customers" readonly style="border-radius: 0px; border: 1px solid #ff9f43;">
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>Customer Name</th>
<th>Customer Phone</th>
<th>Customer Registration Date</th>
<th>Shop Registered</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php 
if (!empty($selected_todaysales)) {
foreach ($selected_todaysales as $data) { $id = $data['id'];$cox = $data['branch_code'];
?>
<tr>

<td><?php echo ucwords(strtolower($data['firstname'].' '.$data['othernames'])); ?></td>
<td align="left"><?php echo $data['phone_number']; ?></td>
<td><?php echo $data['date_time']; ?></td>
<td><?php echo ucwords(strtolower($context->customer_shop($cox))); ?></td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<?php if ($update==1) { ?>
<li>
<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo $id ?>"><img src="../assets/img/icons/edit-5.svg" class="me-2" alt="img">
Update Customer
</a>
</li>
<?php } ?>

<?php if ($delete==1) { ?>
<li>
<a href="#" id="deleteCustomers" data-id=<?php echo $id; ?> class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2">
Delete Customer
</a>
</li>
<?php } ?>
</ul>
</td>
</tr>
<section>
<form method="POST" action="../controller/customerController.php">
<div class="modal fade" id="editmodal<?php echo $id; ?>" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Update Customer Details</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<input type="hidden" name="hiddencode" value="<?php echo $id; ?>">
<label>Customer First Name</label>
<input type="text" name="fname" required value="<?php echo $data['firstname']; ?>">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Customer Othernames</label>
<input type="text" name="onames" value="<?php echo $data['othernames']; ?>">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" name="phone_number" value="<?php echo $data['phone_number']; ?>">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Country</label>
<input type="text" name="cust_country" value="<?php echo $data['country']; ?>">
</div>
</div>
<div class="col-12">
<div class="form-group">
<label>Address</label>
<input type="text" name="cust_address" value="<?php echo $data['address']; ?>">
</div>
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2" type="submit" name="customerUpdated">Submit</button>
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
<form method="POST" action="../controller/customerController.php">
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Register New Customer</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Customer First Name</label>
<input type="text" name="fname" required>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Customer Othernames</label>
<input type="text" name="onames">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" name="phone_number" value="0248">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Country</label>
<input type="text" name="cust_country" value="GHANA">
</div>
</div>
<div class="col-12">
<div class="form-group">
<label>Address</label>
<input type="text" name="cust_address" value="Address">
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