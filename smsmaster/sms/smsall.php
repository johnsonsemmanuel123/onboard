<?php
include_once ('Zenoph/Notify/AutoLoader.php');
use Zenoph\Notify\Enums\AuthModel;
use Zenoph\Notify\Request\NotifyRequest;
use Zenoph\Notify\Request\SMSRequest;
use Zenoph\Notify\Enums\TextMessageType;
$senderID='FC-CRUIS';
try {
NotifyRequest::setHost('api.smsonlinegh.com');
NotifyRequest::useSecureConnection(true);
$smsReq = new SMSRequest();
$smsReq->setAuthModel(AuthModel::API_KEY);
$smsReq->setAuthApiKey('e9dfd51914a2af7b25503c997e70992a204ad89923444e37401579e29604f1cf');
$smsReq->setMessageType(TextMessageType::TEXT);
$smsReq->setSender($senderID);
if (!empty($rdetail)) {
foreach ($rdetail as $data) {
$name = $data['firstname'].' '.$data['othername'].' '.$data['surname'];
$id = $data['staff_id'];
$phone = $context->sel_number($id);
$balance = $context->sel_curbalance($id);

//Message
$mdate = date('d-M-Y');
// $dmasterdate = new DateTime($mdate);
// $dmasterdate->format('jS F, Y');


$message = 'Dear '.$name.', be informed of your Forestry Commission Credit Union Balance As At '.$mdate.'. Current Balance GHS'.number_format($balance,2).'.<br> Thank you';
$smsReq->setMessage($message);
$smsReq->adddestination($phone);
}
}
$msgResp = $smsReq->submit();
}catch (Exception $ex) {}