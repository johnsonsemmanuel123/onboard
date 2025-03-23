<?php 
@include('../model/classController.php'); 
$context = new crudOperation();
$email=$_SESSION['username'];
$aduanefie=$_SESSION['name'];
$code=$_SESSION['aduanefie'];
$update=$_SESSION['update'];
$delete=$_SESSION['delete'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ONBOARD | <?php echo 'ADUANEFIE'; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo.jpg">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/animate.css">
<link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="../assets/css/style.css">
<style type="text/css">
.brad{
border-radius: 10px;
}
</style>
</head>
<body <?php 
if (isset($_SESSION['main_response'])) {
if ($_SESSION['main_response']==1) {
echo 'onload="productsetup_success();"';
}else if ($_SESSION['main_response']==2) {
echo 'onload="productbatch_success();"';
}else if ($_SESSION['main_response']==3) {
echo 'onload="cstock_suc();"';
}else if ($_SESSION['main_response']==4) {
echo 'onload="cstock_failed();"';
}else if ($_SESSION['main_response']==5) {
echo 'onload="main_stockupdated();"';
}else if ($_SESSION['main_response']==6) {
echo 'onload="failed_stockupdated();"';
}else if ($_SESSION['main_response']==7) {
echo 'onload="credit_repayments();"';
}else if ($_SESSION['main_response']==8) {
echo 'onload="expenses_success();"';
}else if ($_SESSION['main_response']==9) {
echo 'onload="expenses_updated();"';
}else if ($_SESSION['main_response']==10) {
echo 'onload="customer_regsuccess();"';
}else if ($_SESSION['main_response']==11) {
echo 'onload="customer_updatesuccess();"';
}else if ($_SESSION['main_response']==12) {
echo 'onload="expenses_typesuccess();"';
}else if ($_SESSION['main_response']==13) {
echo 'onload="users_success();"';
}else if ($_SESSION['main_response']==14) {
echo 'onload="users_updated();"';
}



unset($_SESSION['main_response']);
}
?>>
<div id="global-loader">
<div class="whirly-loader">
</div>
</div>
<div class="main-wrapper">
<div class="header">
<div class="header-left active">
<a href="#" class="logo">
<img src="../assets/images/logo.jpg" alt="">
</a>
<a href="#" class="logo-small">
<img src="../assets/img/logo-small.png" alt="">
</a>
<a id="toggle_btn" href="javascript:void(0);">
</a>
</div>
<a id="mobile_btn" class="mobile_btn" href="#sidebar">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<ul class="nav user-menu">
<li class="nav-item">
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa fa-search"></i>
</a>
<form action="#">
<div class="searchinputs">
<input type="text" placeholder="Search Here ...">
<div class="search-addon">
<span><img src="../assets/img/icons/closes.svg" alt="img"></span>
</div>
</div>
<a class="btn" id="searchdiv"><img src="../assets/img/icons/search.svg" alt="img"></a>
</form>
</div>
</li>
<li class="nav-item dropdown has-arrow main-drop">
<a href="#" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
<span class="user-img"><img src="../assets/img/profiles/avator1.jpg" alt="">
<span class="status online"></span></span>
</a>
<div class="dropdown-menu menu-drop-user">
<div class="profilename">
<div class="profileset">
<h5>Admin</h5>
</div>
<hr class="m-0">
<a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> My Profile</a>
<hr class="m-0">
<a class="dropdown-item logout pb-0" href="signin.html"><img src="../assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
</div>
</div>
</li>
</ul>
</div>
<?php 
@include('inc/menu.php');
$page = @$_GET['page']; 
$page_error = 'error';
$file_exist = file_exists($page.'.php');
if ($file_exist==1) {
@include $page.'.php';
}else{
@include $page_error.'.php';
}
?>
</div>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/feather.min.js"></script>
<script src="../assets/js/jquery.slimscroll.min.js"></script>
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="../assets/plugins/apexchart/chart-data.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/plugins/select2/js/select2.min.js"></script>
<script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>
<script src="../assets/plugins/owlcarousel/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$('#enteredQuantities').focus();
setInterval(runningTime, 1000);

// $('#countcreditamount').html('<span class="counters" id="countcreditamount" data-count="210"></span>');


$(document).on('click','#deleteUsers',function(dataz){
var message = 'Users';
var id = $(this).data("id"); 
var databasex = 'tbl_users';
master_deletes(id,databasex,message);
});



$(document).on('click','#deleteCustomers',function(dataz){
var message = 'Customers';
var id = $(this).data("id"); 
var databasex = 'tbl_customers';
master_deletes(id,databasex,message);
});

$(document).on('click','#deleteExpenses',function(dataz){
var message = 'Expenses';
var id = $(this).data("id"); 
var databasex = 'tbl_expensescaptured';
master_deletes(id,databasex,message);
});



$(document).on('click','#deleteStock',function(dataz){
var message = 'Product';
var id = $(this).data("id"); 
var databasex = 'tbl_centralstock';
master_deletes(id,databasex,message);
});

$('#paymenttype').change(function(){
var type_selected = $('#paymenttype').val();
if (type_selected=='Credit_Pay') {
var	totalz = 0;
$('#tenderedAmount, #tenderedAmountx').val(0);
$('#balanceAmount').val(0);
$('#checkOutBtn2').css('background','#7367f0'); 
$('#checkOutBtn').css('background','#7367f0').prop('disabled', false);

}else{
$('#tenderedAmount, #tenderedAmountx').val('');
$('#balanceAmount').val('');
}
});




$(document).on('click', '#cartdeletedx', function (e) {
e.preventDefault();
var iddeleteAttached = $(this).data('id');
$.ajax({
url: "../controller/deleteController.php",
method: "POST",
data:{iddeleteAttached : iddeleteAttached},
success: function (data) {}
});

$(this).closest('tr').css('background','red');
$(this).closest('tr').fadeOut(800,function(){
$(this).remove();}); 
});





$(document).on('click', '#cartdeleted', function (e) {
e.preventDefault();
var iddeleteAttached = $(this).data('id');
$.ajax({
url: "../controller/deleteController.php",
method: "POST",
data:{iddeleteAttached : iddeleteAttached},
success: function (data) {}
});

$(this).closest('tr').css('background','red');
$(this).closest('tr').fadeOut(800,function(){
$(this).remove();}); 
});





$('#tenderedAmountx').keyup(function() {
var awatamt = $('#tenderedAmountx').val();
$.get("../controller/balanceController.php", function(data){
var total =  awatamt - data.get_returnedtotals;

$('#disappered').html('<input type="text" value="' + total + '" name="balanceAmount" id="balanceAmount" style="color: green;font-weight: bolder;text-align: right;">');
if (total<0) { 
$('#checkOutBtn2').css('background','red');
$('#checkOutBtn').css('background','red').prop('disabled', true);
}else{
$('#checkOutBtn2').css('background','#7367f0'); 
$('#checkOutBtn').css('background','#7367f0').prop('disabled', false); 
}
}, 'json');
});






$('#tenderedAmount').keyup(function() {
var awatamt = $('#tenderedAmount').val();
$.get("../controller/balanceController.php", function(data){ 
var total =  awatamt - data.get_returnedtotals;

$('#disappered').html('<input type="text" value="' + total + '" name="balanceAmount" id="balanceAmount" style="color: green;font-weight: bolder;text-align: right;">');
if (total<0) { 
$('#checkOutBtn2').css('background','red');
$('#checkOutBtn').css('background','red').prop('disabled', true);
}else{
$('#checkOutBtn2').css('background','#7367f0'); 
$('#checkOutBtn').css('background','#7367f0').prop('disabled', false); 
}
}, 'json');
});


$('#selected_categorydata').change(function(){
var export_typez =  $('#selected_categorydata').val();

$.ajax({
url:'../controller/ajax.php',
method:'POST',
data:{export_typez},
dataType: "json",
success:function(dataz){
$('#selected_brandata').html(dataz.destination_data);                                
}
});
});



$(document).on('click', '#plusBtnx', function (z) {
z.preventDefault();
var id = $(this).data('idz');
var plusvalue =  $('#valueSpacex'+id+'').val();
$.get("../controller/getshopSalesController.php?mid="+id+"&mvac="+plusvalue+"", function(data){
$('#spxan').html('<span id="spxan">'+data.get_maintotals+'</span>');
$('#spxan_tax').html('<span id="spxan_tax">'+data.get_taxtotals+'</span>');
$('#spxan_total').html('<span id="spxan_total">'+data.get_returnedtotals+'</span>');
}, 'json');	
});

$(document).on('click', '#minusBtnx', function (z) {
z.preventDefault();
var id = $(this).data('idx');
var minusvalue =  $('#valueSpacex'+id+'').val();
$.get("../controller/getshopSalesController.php?mid="+id+"&mvac="+minusvalue+"", function(data){  
$('#spxan').html('<span id="spxan">'+data.get_maintotals+'</span>');
$('#spxan_tax').html('<span id="spxan_tax">'+data.get_taxtotals+'</span>');
$('#spxan_total').html('<span id="spxan_total">'+data.get_returnedtotals+'</span>');
}, 'json');	
});











$(document).on('click', '#plusBtn', function (z) {
z.preventDefault();
var id = $(this).data('idz');
var plusvalue =  $('#valueSpace'+id+'').val();
$.get("../controller/getSalesController.php?mid="+id+"&mvac="+plusvalue+"", function(data){
$('#spxan').html('<span id="spxan">'+data.get_maintotals+'</span>');
$('#spxan_tax').html('<span id="spxan_tax">'+data.get_taxtotals+'</span>');
$('#spxan_total').html('<span id="spxan_total">'+data.get_returnedtotals+'</span>');
}, 'json');	
});


$(document).on('click', '#minusBtn', function (z) {
z.preventDefault();
var id = $(this).data('idx');
var minusvalue =  $('#valueSpace'+id+'').val();
$.get("../controller/getSalesController.php?mid="+id+"&mvac="+minusvalue+"", function(data){  
$('#spxan').html('<span id="spxan">'+data.get_maintotals+'</span>');
$('#spxan_tax').html('<span id="spxan_tax">'+data.get_taxtotals+'</span>');
$('#spxan_total').html('<span id="spxan_total">'+data.get_returnedtotals+'</span>');
}, 'json');	
});



$('#selected_categorydataxx').change(function(){
var export_typez =  $('#selected_categorydataxx').val();
$.ajax({
url:'../controller/ajaxz.php',
method:'POST',
data:{export_typez},
dataType: "json",
success:function(dataz){ 
$('#selected_brandataxx').html(dataz.destination_data);                                
}
});
});










});

</script>
<script type="text/javascript">
function master_deletes(idz,databasez,message){
const swalWithBootstrapButtons = Swal.mixin({
customClass: {
confirmButton: "btn btn-success",
cancelButton: "btn btn-danger"
},
buttonsStyling: false
})
swalWithBootstrapButtons.fire({
title: "Are you sure?",
text: "You won't be able to revert this!",
icon: "warning",
showCancelButton: true,
confirmButtonText: "Confirm Delete",
cancelButtonText: "Cancel",
reverseButtons: true
}).then((result) => {
if (result.isConfirmed) { 
$.ajax({
url:'/mysuitz/controller/deleteController.php',
method:'POST',
data:{idz,databasez,message},
success:function(rdata){ 
if (rdata=='deleted') {
swalWithBootstrapButtons.fire(
'Selected Item Successfully Deleted',
'',
'success'
)
setTimeout(function(){
location.reload(); 
},1000);  
} 
}
});
} else if (
result.dismiss === Swal.DismissReason.cancel
) {
swalWithBootstrapButtons.fire(
'Delete Process Cancelled',
'',
'error'
)
}
})
}




function users_success() {
Swal.fire({
title: "User Setup Completed Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}

function expenses_typesuccess() {
Swal.fire({
title: "Expenses Setup Entered Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}


function productsetup_success() {
Swal.fire({
title: "Product Setup Entered Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}



function customer_updatesuccess() {
Swal.fire({
title: "Customer Data Updated Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}



function customer_regsuccess() {
Swal.fire({
title: "Customer Data Captured Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}



function users_updated() {
Swal.fire({
title: "User Data Updated Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}


function expenses_updated() {
Swal.fire({
title: "Expenses Updated Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}


function credit_repayments() {
Swal.fire({
title: "Credit Repayment Entered Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}



function productbatch_success() {
Swal.fire({
title: "Product Batch Entered Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}



function expenses_success() {
Swal.fire({
title: "Expenses Successfully Captured",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}

function cstock_failed() {
Swal.fire({
title: "Product Stocking Failed To Save",
icon: "error",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}



function main_stockupdated() {
Swal.fire({
title: "Product Stocking Updated Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}

function failed_stockupdated() {
Swal.fire({
title: "Product Stocking Updates Failed",
icon: "error",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}


function cstock_suc() {
Swal.fire({
title: "Grower Detail This Year Entered Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}


function restrict_inputs(input) {
var max = parseInt(input.max);
var min = parseInt(input.min);

if (input.value > max) {
input.value = max;
}
if (input.value < min) {
input.value = min;
}
}









function runningTime() {
$.get("../controller/refreshController.php", function(data){
$('#spxan').html('<span id="spxan">'+data.get_maintotals+'</span>');
$('#spxan_total').html('<span id="spxan_total">'+data.get_returnedtotals+'</span>');
}, 'json');
}
</script>