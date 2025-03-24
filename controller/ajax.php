<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php'); ?>
<?php 
extract($_POST);
if (isset($export_typez)) {
$output["destination_data"]='<select class="form-control" name="selected_brandata" id="selected_brandata">
<option>Choose Product Brand</option>';
$sql1 = "SELECT * FROM `tbl_brand` WHERE `ptype`='".$export_typez."' ORDER BY `brand_description` ASC";
$result1 = mysqli_query($conn, $sql1);
while ($row1 = mysqli_fetch_assoc($result1)) { 
$output["destination_data"].='<option value="'.$row1['id'].'">'.$row1['brand_description'].'</option>';
}
$output["destination_data"].='</select>';

}
echo json_encode($output);
?>