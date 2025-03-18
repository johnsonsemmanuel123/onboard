<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>UPDATE PROFILE</h4>
<h6>Fill Out All To Update Buyer Information</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<form enctype="multipart/form-data" method="POST" action="../controller/addcentralController.php">
<div class="row">
<div class="col-lg-8 col-sm-8 col-12">
<div class="form-group">
<label>Business / Company Name</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Contact Number</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" name="product_batchcode">
</div>
</div>

<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>TIN</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Business Registration Number</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Delivery Address</label>
<input type="text" name="product_batchcode">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Business Type</label>
<div class="form-check">
<input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
<label class="form-check-label" for="validationFormCheck2">INDIVIDUAL</label>
</div>
<div class="form-check mb-3">
<input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
<label class="form-check-label" for="validationFormCheck3">COMPANY</label>
</div>
</div>
</div>

<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Preffered Payment Method</label>
<div class="form-check">
<input type="radio" class="form-check-input" id="validationFormCheck4" name="radio-stacked2" required>
<label class="form-check-label" for="validationFormCheck4">MOBILE MONEY</label>
</div>
<div class="form-check mb-3">
<input type="radio" class="form-check-input" id="validationFormCheck6" name="radio-stacked2" required>
<label class="form-check-label" for="validationFormCheck6">BANK TRASFER</label>
</div>
</div>
</div>




<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Product Of Interest (Please Select)</label>
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
</div>
<div class="col-12">
<div class="form-group">
<label>Others (Please specify)</label>
<input type="text" name="product_batchcode">
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