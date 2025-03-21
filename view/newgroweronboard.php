<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>ONBOARD A GROWER</h4>
<h6>Fill Out All To Onboard A New Grower Onto Aduanefie Platform</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<form enctype="multipart/form-data" method="POST" action="../controller/addcentralController.php">
<div class="col-lg-12">
<div class="form-group">
<label> Grower Photograph/Image </label>
<div class="image-upload">
<input type="file" id="file" name="file">
<div class="image-uploads">
<img src="../assets/img/icons/upload.svg" alt="img" name="file">
<h4>Drag and drop a grower picture to upload</h4>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>First Name</label>
<input type="text" name="first_name">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Othernames</label>
<input type="text" name="other_names">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Surname</label>
<input type="text" name="surname">
</div>
</div>

<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Ghana Card Number</label>
<input type="text" name="ghcard">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Phone Number</label>
<input type="text" name="phone_number">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Email Address</label>
<input type="email" name="email_address">
</div>
</div>


<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Farm Location (Region)</label>
<select class="form-control" name="region">
<option value="">Select Region</option>
<?php 
$rowdata = $context->select_allregion(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['region_name']; ?>">
<?php echo ucwords($data['region_name']); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Farm Location (District)</label>
<select class="form-control" name="district">
<option value="">Select Region</option>
<?php 
$rowdata = $context->select_alldistricts(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['district_name']; ?>">
<?php echo ucwords($data['district_name']); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Crop you are growing for Aduanefie Marketplace</label>
<select class="form-control" name="crop">
<option value="">Select Crop</option>
<?php 
$rowdata = $context->select_allcrops(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['crop_name']; ?>">
<?php echo ucwords($data['crop_name']); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Preferred Payment Method for Earnings:</label>
<div class="form-check">
<input type="radio" class="form-check-input" id="validationFormCheck2" name="radio_stacked" required value="MOMO_GH">
<label class="form-check-label" for="validationFormCheck2">MOBILE MONEY</label>
</div>
<div class="form-check mb-3">
<input type="radio" class="form-check-input" id="validationFormCheck3" name="radio_stacked" required value="BT_GH">
<label class="form-check-label" for="validationFormCheck2">BANK TRANSFER</label>
</div>
</div>
</div>

<div class="col-lg-8 col-sm-8 col-12">
<div class="form-group">
<label>Do you need assistance with tools, fertilizers, seeds, or other inputs?</label>
</div>
<div class="form-check">
<input type="radio" class="form-check-input" id="validationFormCheck2" name="radio_yesnostacked" required value="YES">
<label class="form-check-label" for="validationFormCheck2">YES</label>
</div>
<div class="form-check mb-3">
<input type="radio" class="form-check-input" id="validationFormCheck3" name="radio_yesnostacked" required value="NO">
<label class="form-check-label" for="validationFormCheck2">NO</label>
</div>
<div class="form-group col-12">
<label>If Yes, specify the type of assistance needed</label>
<input type="text" class="col-12" name="yes_specified">
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