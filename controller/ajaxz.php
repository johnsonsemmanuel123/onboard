<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php'); ?>
<?php 
extract($_POST);
if (isset($export_typez)) {
$output["destination_data"]='<select class="form-control" name="selected_brandataxx" id="selected_brandataxx" required>
<option>Choose Product</option>';
$sql1 = "SELECT * FROM `tbl_productsetup` WHERE `product_category`='".$export_typez."' ORDER BY `product_name` ASC";
$result1 = mysqli_query($conn, $sql1);
while ($row1 = mysqli_fetch_assoc($result1)) { 
$output["destination_data"].='<option value="'.$row1['product_name'].'">'.$row1['product_name'].'</option>';
}
$output["destination_data"].='</select>';
}
echo json_encode($output);
?>