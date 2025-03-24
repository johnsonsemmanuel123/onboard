<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Add</h4>
<h6>Create new product</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<form enctype="multipart/form-data" method="POST" action="../controller/addcentralController.php">
<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Product Name</label>
<input type="text" name="product_name" placeholder="Enter name of product" required>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Category</label>
<select class="form-control" name="selected_categorydata" id="selected_categorydata" required>
<option>Choose Product Category</option>
<?php 
$rowdata = $context->select_allproducttype(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['id'] ?>"><?php echo ucwords($data['type_description']); ?></option>
<?php } ?>
</select>
</div>
</div>

<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Brand</label>
<select class="form-control" name="selected_brandata" id="selected_brandata" required>
<option>Choose Product Brand</option>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Product Unit</label>
<select class="form-control" name="product_units" id="product_units" required>
<option>Pieces</option>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Minimum Qty</label>
<input type="text" name="min_quantities" id="min_quantities" placeholder="Enter item minimum quantities" required>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Quantity</label>
<input type="text" name="main_quantities" placeholder="Enter item quantities" required>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="product_description" placeholder="Enter product description"></textarea>
</div>
</div>

<div class="col-lg-6 col-sm-9 col-12">
<!-- <div class="form-group">
<label>Discount Type</label>
<select class="form-control">
<option>Percentage</option>
<option>10%</option>
<option>20%</option>
</select>
</div> -->
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Price</label>
<input type="text" name="product_prices" required>
</div>
</div>
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label> Status</label>
<select class="form-control" name="product_status">
<option>Closed</option>
</select>
</div>
</div> -->
<div class="col-lg-12">
<div class="form-group">
<label> Product Image</label>
<div class="image-upload">
<input type="file" id="file" name="file">
<div class="image-uploads">
<img src="../assets/img/icons/upload.svg" alt="img" name="file">
<h4>Drag and drop a file to upload</h4>
</div>
</div>
</div>
</div>
<div class="col-lg-12">
<input type="submit" class="btn btn-submit me-2" id="submitcentralStocks" name="submitcentralStocks" value="Submit">
<a href="productlist.html" class="btn btn-cancel">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>