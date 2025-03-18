<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>UPDATE PROFILE</h4>
<h6>Fill Out All To Update Grower Information</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<form enctype="multipart/form-data" method="POST" action="../controller/addcentralController.php">
<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>First Name</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Othernames</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Surname</label>
<input type="text" name="product_batchcode">
</div>
</div>

<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Ghana Card Number</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Phone Number</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Email Address</label>
<input type="text" name="product_batchcode">
</div>
</div>


<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Farm Location (Region)</label>
<select class="form-control" name="customertype">
<option value="">Select Region</option>
<?php 
$rowdata = $context->select_allregion(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['id']; ?>">
<?php echo ucwords($data['region_name']); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Farm Location (District)</label>
<select class="form-control" name="customertype">
<option value="">Select Region</option>
<?php 
$rowdata = $context->select_alldistricts(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['id']; ?>">
<?php echo ucwords($data['district_name']); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Crops Currently Growing / Planning to Grow</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Crop you are growing for Aduanefie Marketplace</label>
</div>
<div class="form-group">
<label class="checkboxs">Vegetables (Tomatoes, Peppers, Cucumbers, etc.)
<input type="checkbox">
<span class="checkmarks"></span>
</label>
<label class="checkboxs">Grains (Maize, Rice, Millet, etc.)
<input type="checkbox">
<span class="checkmarks"></span>
</label>
<label class="checkboxs">Fruits (Pineapple, Mango, Watermelon, etc.)
<input type="checkbox">
<span class="checkmarks"></span>
</label>
<label class="checkboxs">Tubers (Yam, Cassava, Potatoes, etc.)
<input type="checkbox">
<span class="checkmarks"></span>
</label>

<label class="checkboxs">Legumes (Beans, Groundnuts, etc.)
<input type="checkbox">
<span class="checkmarks"></span>
</label>
<label class="checkboxs">Herbs & Spices (Ginger, Turmeric, etc.)
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</div>
<div class="form-group">
<label>Others (Please specify)</label>
<input type="text" name="product_batchcode">
</div>
</div>

<div class="col-lg-8 col-sm-8 col-12">
<div class="form-group">
<label>Do you need assistance with tools, fertilizers, seeds, or other inputs?</label>
</div>
<div class="form-check">
<input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
<label class="form-check-label" for="validationFormCheck2">YES</label>
</div>
<div class="form-check mb-3">
<input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
<label class="form-check-label" for="validationFormCheck2">NO</label>
</div>
<div class="form-group col-12">
<label>If Yes, specify the type of assistance needed</label>
<input type="text" class="col-12" name="product_batchcode">
</div>
<div class="form-group">
<label>Preferred Payment Method for Earnings:</label>
<div class="form-check">
<input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
<label class="form-check-label" for="validationFormCheck2">MOBILE MONEY</label>
</div>
<div class="form-check mb-3">
<input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
<label class="form-check-label" for="validationFormCheck2">BANK TRANSFER</label>
</div>
</div>
</div>
<div class="col-lg-12">
<input type="submit" class="btn btn-submit me-2" id="submitStockEntry" name="submitStockEntry" value="Submit">
<a href="index.php?page=productbatch" class="btn btn-cancel">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>