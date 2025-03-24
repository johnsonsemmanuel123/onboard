<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Batch</h4>
<h6>Product Batch Entry</h6>
</div>
<div class="page-btn">
<a href="index.php?page=batchlist" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-1">Batch List</a>
</div>
</div>

<div class="card">
<div class="card-body">
<form enctype="multipart/form-data" method="POST" action="../controller/addcentralController.php">
<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Batch Code</label>
<input type="text" name="batch_code" placeholder="Enter name of product" required>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Goods/Product Source</label>
<select class="form-control" name="batch_source" required>
<option>Choose Product Source</option>
<?php 
$rowdata = $context->select_allproductbatch(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['id'] ?>"><?php echo ucwords($data['batch_description']); ?></option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label> Description</label>
<div class="image-upload">
<input type="text" name="batch_description" placeholder="Enter product batch description" required>
</div>
</div>
</div>
<div class="col-lg-12">
<input type="submit" class="btn btn-submit me-2" id="submitBatchEntry" name="submitBatchEntry" value="Submit">
<a href="index.php?page=productbatch" class="btn btn-cancel">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>