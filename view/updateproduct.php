<?php 
if (isset($_GET['idcode'])) {
$code = $_GET['idcode'];
$rowchex = $context->select_stockupdatelist($code); 
if (empty($rowchex)) {
echo "<script>location='../view/index.php?page=productlist'</script>";
}else{ 
foreach ($rowchex as $dataz) {
$id = $dataz['id'];
$batch_code = $dataz['batch_code'];
$batch_quantity = $dataz['batch_quantity'];
$quantity = $dataz['quantity'];
$batch_price = $dataz['batch_price'];
$product_icon = $dataz['product_icon'];
$product_category = $dataz['product_category'];
$category_name = $dataz['category_name'];
$basic_price = $dataz['basic_price'];
$product_name = $dataz['product_name'];
$brand_code = $dataz['brand_code'];
}
?>
<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Updates</h4>
<h6>Update Stock product</h6>
</div>
</div>
<div class="card">
<div class="card-body">
<form enctype="multipart/form-data" method="POST" action="../controller/updatecentralController.php">
<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Batch Code/Number</label>
<input type="hidden" name="product_hiddencode" value="<?php echo $code; ?>">
<input type="text" name="product_batchcode" value="<?php echo $batch_code; ?>" readonly>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Category</label>
<select class="form-control" name="selected_categorydataxx" id="selected_categorydataxx" required> 
<option value="<?php echo $product_category; ?>"><?php echo $category_name; ?></option>
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
<label>Product List</label>
<select class="form-control" name="selected_brandataxx" id="selected_brandataxx" required>
<option value="<?php echo $brand_code; ?>"><?php echo $product_name; ?></option>
</select>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Product Quantity</label>
<input type="text" name="pquantities" value="<?php echo $quantity; ?>" required>
</div>
</div>
<div class="col-lg-8 col-sm-6 col-12">
<div class="form-group">
<label>Basic Price</label>
<input type="text" name="pbasic_price" value="<?php echo $basic_price; ?>" required>
</div>
</div>
<div class="col-lg-12">
<input type="submit" class="btn btn-submit me-2" id="submitStockEntry" name="submitStockEntry" value="Update">
<a href="index.php?page=productlist" class="btn btn-cancel">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php }
}else{
echo "<script>location='../view/index.php?page=productlist'</script>";
}
?>