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

if (isset($submitStockEntry)){
$id = mysqli_real_escape_string($conn, $product_hiddencode);
$product_batchcode = mysqli_real_escape_string($conn, $product_batchcode);
$selected_categorydataxx = mysqli_real_escape_string($conn, $selected_categorydataxx);
$selected_brandataxx = mysqli_real_escape_string($conn, $selected_brandataxx);
$pquantities = mysqli_real_escape_string($conn, $pquantities);
$pbasic_price = mysqli_real_escape_string($conn, $pbasic_price);
if ($content->update_masterstockcentral($id,$selected_categorydataxx,$selected_brandataxx,$pquantities,$pbasic_price)) {
$audit_activity='Product Update';
$audit_details='User Performed An Update On A Product=>'.$id;
@include('auditController.php');
$_SESSION['main_response']=5;
echo "<script>location='../view/index.php?page=updateproduct&idcode=".$id."'</script>";
}else{
$_SESSION['main_response']=6;
echo "<script>location='../view/index.php?page=updateproduct&idcode=".$id."'</script>";
}
}
?>