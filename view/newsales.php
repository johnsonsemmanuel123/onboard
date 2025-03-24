<?php 
if (isset($_SESSION['bought_code'])) {
unset($_SESSION['bought_code']);
}
$selected_activelist = $context->central_saleslist(); 
$user = $_SESSION['username'];
$allsum = $context->select_sum($user);
$alltax = $context->fnc_tax();
$alltotal = $allsum+$alltax;
$hiddencode = $context->select_transcode(5);
?>
<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Sales</h4>
<h6>Manage your shop sales</h6>
</div>
<div class="page-btn"></div>
</div>
<div class="row">
<div class="col-lg-7 col-sm-12">
<div class="card" style="padding-bottom: 30px; padding-top: 30px;">
<div class="card-body pb-0">
<div class="row">
<div class="col-12">
<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>Product</th>
<th>Quantity</th>
<th>Basic Price</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php 
if (!empty($selected_activelist)) {
foreach ($selected_activelist as $data) { $id = $data['id']; $idcate = $data['brand_code'];?>
<tr>
<td><?php echo $data['product_name']; ?></td>
<td><?php echo $data['quantity']; ?></td>
<td><?php echo $data['basic_price']; ?></td>
<td class="text-center">
<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#quantitymodal<?php echo $id ?>"><i class="fa fa-plus me-2"></i>Add</a>
</td>
</tr>

<div class="modal fade" id="quantitymodal<?php echo $id ?>" tabindex="-1" aria-labelledby="quantitymodal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Enter Quantity Here</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form method="POST" action="../controller/centralSalesController.php">
<div class="row">
<div class="col-12">
<div class="form-group">
<input type="hidden" name="item_code" value="<?php echo $id; ?>">
<input type="hidden" name="basic_pricex" value="<?php echo $data['selling_price']; ?>">
<center><label>SELECTED ITEM</label></center>
<input type="hidden" name="hiddenactualquantity" value="<?php echo $data['quantity']; ?>">
<center><input type="text" value="<?php echo $data['product_name']; ?>" readonly disabled style="font-weight: bold; color: green;text-align: center;"></center><hr>
<center><label>QUANTITY</label></center>
<center>
<input type="text" name="enteredQuantities" id="enteredQuantities" required style="font-weight: bold; color: green;text-align: center;" autofocus>
</center>
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
</div>
<div class="col-lg-5 col-sm-12 ">
<form method="POST" action="../controller/mainsalesController.php">
<div class="card" style="padding-top: 20px;">
<div class="card-body">
<div class="row">
<div class="col-12">
<a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
</div>
<div class="col-lg-12">
<div class="select-split ">
<div class="select-group w-100">
<label>Select Customer</label>
<select class="form-control" name="customertype">
<option value="Walked_in_customer|0244000004">Walk-in Customer</option>
<?php 
$rowdata = $context->select_allcus(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['mname'].'|'.$data['phone_number']; ?>">
<?php echo ucwords($data['mname'].' ('.$data['phone_number'].')'); ?>
</option>
<?php } ?>
</select>
<input type="hidden" name="hiddencode" value="<?php echo $hiddencode; ?>">
</div>
</div>
</div>
<!-- <div class="col-lg-12">
<div class="select-split">
<div class="select-group w-100">
<label>Select Payment Type</label>
<select class="form-control" name="paymenttype">
<option value="Credit_Pay">Credit Sales</option>
<option value="Cash_Pay">Cash Payment</option>
<option value="Mobile_Money">Mobile Money Payment</option>
</select>
</div>
</div>
</div> -->
<div class="col-12">
<div class="text-end">
<a class="btn btn-scanner-set"><img src="../assets/img/icons/scanner1.svg" alt="img" class="me-2">Scan bardcode</a>
</div>
</div>
</div>
</div>
<div class="card-body pt-0">
<div class="totalitem">
<h4>Total items : <?php echo $context->sales_counts($user); ?></h4>
<a href="../controller/mainsalesController.php?clearcode=123">Clear all</a>
</div>

<div class="row">
<div class="col-12">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Product</th>
<th>Quantity</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php 
$selected_itemlistx = $context->sales_itemsz($user); 
if (!empty($selected_itemlistx)) {
foreach ($selected_itemlistx as $dataz) { $id = $dataz['tbl_id'];$subqty = $dataz['quantity'];?>
<tr>
<td><?php echo $dataz['product_name']; ?></td>
<td>
<center>
<div class="increment-decrement">
<div class="input-groups"> 
<input type="hidden" name="hiddenvalue" id="hiddenvalue">
<input type="button" value="-" id="minusBtn" class="button-minus dec button" data-idx="<?= $id; ?>">
<input type="text" name="child" id="valueSpace<?php echo $id; ?>" value="<?php echo $subqty; ?>" class="quantity-field">
<input type="button" value="+" id="plusBtn" class="button-plus inc button" data-idz="<?= $id; ?>">
</div>
</div>
</center>
</td>
<td class="text-center">
<a id="cartdeleted" href="#" data-id="<?= $id; ?>"><img src="../assets/img/icons/delete-2.svg" alt="img"></a>
</td>
</tr>
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
<div class="card-body pt-0 pb-2">
<div class="setvalue">
<ul>
<li>
<h5>Subtotal </h5>
<h6>GHS <span id="spxan"><?php echo number_format($allsum,2); ?></span></h6>
</li>
<li>
<h5>Tax </h5>
<h6>GHS <span id="spxan_tax"><?php echo number_format($alltax,2); ?></span></h6>
</li>
<li class="total-value">
<h5>Total </h5>
<h6>GHS <span id="spxan_total"><?php echo number_format($alltotal,2) ?? 0; ?></span></h6>
</li>
</ul>
</div>
<div class="col-lg-12">
<div class="select-split">
<div class="select-group w-100">
<!-- <label>Select Payment Type</label> -->
<select class="form-control" name="paymenttype" id="paymenttype" required>
<option value=""><button>SELECT PAYMENT CATEGORY</button></option>
<option value="Credit_Pay">Credit Sales</option>
<option value="Cash_Pay">Cash Payment</option>
<option value="Mobile_Money">Mobile Money Payment</option>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-sm-12 col-12">
<div class="form-group">
<label>Amount Tendered</label>
<input type="text" name="tenderedAmount" id="tenderedAmount" required style='color: green;font-weight: bolder;text-align: right;'>
</div>
</div>
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>Balance</label>
<div id="disappered"><input type="text" name="balanceAmount" id="balanceAmount" style='color: green;font-weight: bolder;text-align: right;'></div>
</div>
</div>
</div>

<div class="btn-totallabel" id="checkOutBtn2">
<button type="submit" class="btn col-12" name="checkOutBtn" id="checkOutBtn">Check Out Sales</button>
</div>
</div>
</div>
</form>
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
<h5 class="modal-title">Enter New Customer</h5>
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
<input type="text" name="phone_number" value="0248000001">
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