<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php'); ?>
<?php 
@session_start();
$content = new crudOperation();
$update = new crudOperation();
extract($_POST);
$_SESSION['last_time'] = time();
$ip = $_SERVER["REMOTE_ADDR"];
$user_code=$_SESSION['username'];
$user_name=$_SESSION['name'];

if (isset($submitcentralStocks)){
$product_name = mysqli_real_escape_string($conn, $product_name);
$selected_categorydata = mysqli_real_escape_string($conn, $selected_categorydata);
// $main_quantities = mysqli_real_escape_string($conn, $main_quantities);
$selected_brandata = mysqli_real_escape_string($conn, $selected_brandata);
$product_units = mysqli_real_escape_string($conn, $product_units);
$min_quantities = mysqli_real_escape_string($conn, $min_quantities);
$product_description = mysqli_real_escape_string($conn, $product_description);
// $product_prices = mysqli_real_escape_string($conn, $product_prices);

@$file_name_image = $_FILES['file']['name'];
@$image_temp_name = $_FILES['file']['tmp_name'];
@$image_type = $_FILES['file']['type'];
@$image_extention = strtolower(substr($file_name_image, strpos($file_name_image, '.')+1));
@$location = "product_image/".basename($_FILES['file']['name']);
@move_uploaded_file($_FILES['file']['tmp_name'], $location);

$fields = [ 
'product_icon' => trim($file_name_image),
'product_category' => trim($selected_categorydata),
'product_brand' => trim($selected_brandata),
'product_name' => trim($product_name),
'min_quantity' => trim($min_quantities),
'added_by' => trim($user_name)
];
$db = 'tbl_productsetup';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$_SESSION['main_response']=1;
echo "<script>location='../view/index.php?page=productsettings'</script>";
}
}









if (isset($submitStockEntry)){
$batch_basicprice = mysqli_real_escape_string($conn, $pbasic_price);
$batch_qty = mysqli_real_escape_string($conn, $pquantities);
$product_batchcode = mysqli_real_escape_string($conn, $product_batchcode);
$selected_categorydata = mysqli_real_escape_string($conn, $selected_categorydataxx);
$selected_brandataxx = mysqli_real_escape_string($conn, $selected_brandataxx);
$selectedDataEntry = $content->select_dataparts($selected_brandataxx);
if (!empty($selectedDataEntry)) {
foreach ($selectedDataEntry as $cdata) {
$icon = $cdata['product_icon'];
$minqty = $cdata['min_quantity'];
}
}else{
$icon='';
$minqty='';	
}
if (!empty($selected_categorydata)) {
$fields = [ 
'batch_code' => trim($product_batchcode),
'batch_quantity' => trim($batch_qty),
'batch_price' => trim($batch_basicprice),
'product_icon' => trim($icon),
'product_category' => trim($selected_categorydata),
'product_brand' => trim($content->unique_brand2($selected_brandataxx)),
'product_name' => trim($selected_brandataxx),
'min_quantity' => trim($minqty),
'quantity' => trim($batch_qty),
'basic_price' => trim($batch_basicprice),
'selling_price' => trim($batch_basicprice),
'added_by' => trim($user_name)
];
$db = 'tbl_centralstock';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$_SESSION['main_response']=3;
echo "<script>location='../view/index.php?page=addproduct&idcode=".$product_hiddencode."'</script>";
}
}else{
$_SESSION['main_response']=4;
echo "<script>location='../view/index.php?page=addproduct&idcode=".$product_hiddencode."'</script>";
}
}




if (isset($submitBatchEntry)){
$batch_description = mysqli_real_escape_string($conn, $batch_description);
$batch_source = mysqli_real_escape_string($conn, $batch_source);
$batch_code = mysqli_real_escape_string($conn, $batch_code);

$fields = [ 
'batch_code' => trim($batch_code),
'batch_source' => trim($batch_source),
'description' => trim($batch_description),
'added_by' => trim($user_name)
];
$db = 'tbl_productbatch';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$_SESSION['main_response']=2;
echo "<script>location='../view/index.php?page=productbatch'</script>";
}
}
?>