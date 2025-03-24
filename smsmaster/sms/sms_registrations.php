<?php
include_once ('../../../Zenoph/Notify/AutoLoader.php');
use Zenoph\Notify\Enums\AuthModel;
use Zenoph\Notify\Request\NotifyRequest;
use Zenoph\Notify\Request\SMSRequest;
use Zenoph\Notify\Enums\TextMessageType;
try {
NotifyRequest::setHost('api.smsonlinegh.com');
NotifyRequest::useSecureConnection(true);
$smsReq = new SMSRequest();
$smsReq->setAuthModel(AuthModel::API_KEY);
$smsReq->setAuthApiKey('e9dfd51914a2af7b25503c997e70992a204ad89923444e37401579e29604f1cf');
$smsReq->setMessageType(TextMessageType::TEXT);
$smsReq->setSender($senderID);
$smsReq->setMessage($message);
$smsReq->adddestination($phone);
$msgResp = $smsReq->submit();
}catch (Exception $ex) {
// echo "<script>location='../index.php?page=print-list'</script>";
}