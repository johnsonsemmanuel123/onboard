<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php');

@session_start();
$content = new crudOperation();
$update = new crudOperation();
extract($_POST);
$_SESSION['last_time'] = time();
$ip = $_SERVER["REMOTE_ADDR"];
$username = $_SESSION['name'];
$usercode = $_SESSION['username'];
$branch = $_SESSION['shopcode'];

if (isset($submittedShopStock)){
$toShopStock = mysqli_real_escape_string($conn, $toShopStock);
$shopttyps = mysqli_real_escape_string($conn, $shopttyps);
$remarks_comments = mysqli_real_escape_string($conn, $remarks);
$entryChex = $content->fnc_select4shopstock($hiddenProduct);
foreach ($entryChex as $datax) {
$idx = $datax['id'];
$batch_code = $datax['batch_code'];
$batch_quantity = $datax['batch_quantity'];
$batch_price = $datax['batch_price'];
$product_icon = $datax['product_icon'];
$product_category = $datax['product_category'];
$product_brand = $datax['product_brand'];
$product_name = $datax['product_name'];
$min_quantity = $datax['min_quantity'];
$quantity = $datax['quantity'];
$basic_price = $datax['basic_price'];
$selling_price = $datax['selling_price'];
$status = $datax['status'];
}
$newquantity = $quantity-$toShopStock;

$fields = [
'batch_code' => trim($batch_code),
'batch_quantity' => trim($batch_quantity),
'batch_price' => trim($batch_price),
'product_icon' => trim($product_icon),
'product_category' => trim($product_category),
'product_brand' => trim($product_brand),
'product_name' => trim($product_name),
'min_quantity' => trim($min_quantity),
'quantity' => trim($toShopStock),
'basic_price' => trim($basic_price),
'selling_price' => trim($selling_price),
'added_by' => trim($username),
'shop_code' => trim($shopttyps),
'entry_comments' => trim($remarks)
];
$db = 'tbl_shopstock';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
if ($content->update_intransit($hiddenProduct,$newquantity)) {
$audit_activity='Shop Restocking';
$audit_details='User Performed A Restocking';
@include('auditController.php');
echo "<script>location='../view/index.php?page=productlist'</script>";
}
}
}

?>