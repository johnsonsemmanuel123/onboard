<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php'); ?>
<?php 
@session_start();
@include_once ('../smsmaster/Zenoph/Notify/AutoLoader.php');
use Zenoph\Notify\Enums\AuthModel;
use Zenoph\Notify\Request\NotifyRequest;
use Zenoph\Notify\Request\SMSRequest;
use Zenoph\Notify\Enums\TextMessageType;
@session_start();

$content = new crudOperation();
$update = new crudOperation();
extract($_POST);
$_SESSION['last_time'] = time();
$ip = $_SERVER["REMOTE_ADDR"];


$groupType = mysqli_real_escape_string($conn, $category);
if ($groupType==2) {
$pagedirection='grower';
}else{
$pagedirection='buyer';	
}



if (isset($btnSubmitOriginal)){
$enter_staffcode = mysqli_real_escape_string($conn, $emailaddress);
$selectedfromlogins = $content->select_chexaduanefie($emailaddress);
if (!empty($selectedfromlogins)) {
$selectedphone = $content->select_chex_aduanefiephone($emailaddress);
if (!empty($selectedphone)) {
$_SESSION['hiddeStaffCode']=$emailaddress;
$_SESSION['hiddeLogginCode']=$_SESSION['LOGCODE']=$content->select_masterotp_aduanefie(6);
$_SESSION['hiddeLogginCodeHide']=1;
$senderID='AUXANO PCF';
$phone = $selectedphone;
$message = 'Your One Time Reset Code Into Aduanefie Oboarding is : '.$_SESSION['hiddeLogginCode'];

try {
NotifyRequest::setHost('api.smsonlinegh.com');
NotifyRequest::useSecureConnection(true);
$smsReq = new SMSRequest();
$smsReq->setAuthModel(AuthModel::API_KEY);
$smsReq->setAuthApiKey('92cbda5b5e85a953bc9ca1fbf705e1986f6d22d63401d7424912556dc5b6fa9a');
$smsReq->setMessageType(TextMessageType::TEXT);
$smsReq->setSender($senderID);
$smsReq->setMessage($message);
$smsReq->adddestination($phone);
$msgResp = $smsReq->submit();
}catch (Exception $ex) {}
// Success
// $_SESSION['log_response']=1;
echo "<script>location='../".$pagedirection."/index.php?page=otpcode'</script>";
}else{
// No phone
$_SESSION['log_response']=2;
echo "<script>location='../".$pagedirection."/index.php?page=forgotpassword'</script>";
}
}else{
// Staff No exist
$_SESSION['log_response']=3;
echo "<script>location='../".$pagedirection."/index.php?page=forgotpassword'</script>";	
}
}

if (isset($btnSubmitOTP)){
$staffID = mysqli_real_escape_string($conn, $staffID);
$hiddencode = mysqli_real_escape_string($conn, $hiddencode);
$password = mysqli_real_escape_string($conn, $newpassword);
$password_confirm = mysqli_real_escape_string($conn, $confirmnewpassword);
$selectedfromlogins = $content->select_chexaduanefie($staffID);
if (!empty($selectedfromlogins)) {
if ($hiddencode==$_SESSION['LOGCODE']) {
$hasshed = md5($newpassword);	
$update = $content->update_password_aduanefie($hasshed,$staffID);
// Success
$_SESSION['log_response']=1;
echo "<script>location='../".$pagedirection."/index.php?page=login'</script>";
}else{
$_SESSION['log_response']=4;
echo "<script>location='../".$pagedirection."/index.php?page=forgotpassword'</script>";
}
}else{
// No Staff
$_SESSION['log_response']=3;
echo "<script>location='../".$pagedirection."/index.php?page=forgotpassword'</script>";
}
}
?>