<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ONBOARD | ADUANEFIE</title>
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo.jpg">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/animate.css">
<style type="text/css">
.btncustomised{
padding-bottom: 40px; 
background: #8ba068;
}
</style>
</head>
<?php 
$page = @$_GET['page']; 
$page_error = 'error';
$file_exist = file_exists($page.'.php');
if ($file_exist==1) { ?>
<body class="account-page" <?php 
if (isset($_SESSION['log_response'])) {
if ($_SESSION['log_response']==1) {
echo 'onload="sms_success();"';
}else if ($_SESSION['log_response']==2) {
echo 'onload="sms_nophone();"';
}else if ($_SESSION['log_response']==3) {
echo 'onload="sms_noexistence();"';
}else if ($_SESSION['log_response']==4) {
echo 'onload="sms_wrongcode();"';
}else if ($_SESSION['log_response']==8) {
echo 'onload="error_nomatch();"';
}else if ($_SESSION['log_response']==9) {
echo 'onload="success_regalready();"';
}else if ($_SESSION['log_response']==10) {
echo 'onload="success_reg();"';
}
unset($_SESSION['log_response']);
}
?>>
<?php @include $page.'.php';
}else{
echo '<body class="error-page">';
@include $page_error.'.php';
}
?>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/feather.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
function sms_success() {
Swal.fire({
title: "Password Changed Successfully",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}


function success_reg() {
Swal.fire({
title: "Successfully Registered As A Grower",
icon: "success",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}


function error_nomatch() {
Swal.fire({
title: "Entered Passwords Don't Match",
icon: "error",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}


function success_regalready() {
Swal.fire({
title: "Account Already Registered",
icon: "error",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}


function sms_wrongcode() {
Swal.fire({
title: "Wrong Code Entry..",
icon: "error",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}

function sms_nophone() {
Swal.fire({
title: "Failed to Login.",
icon: "error",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}

function sms_noexistence() {
Swal.fire({
title: "Entered User Doesn't Exist..",
icon: "error",
iconHtml: "",
confirmButtonText: "Close",
showCloseButton: true
});
}

</script>