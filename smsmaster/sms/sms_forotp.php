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
$smsReq->setAuthApiKey('92cbda5b5e85a953bc9ca1fbf705e1986f6d22d63401d7424912556dc5b6fa9a');
$smsReq->setMessageType(TextMessageType::TEXT);
$smsReq->setSender($senderID);
$smsReq->setMessage($message);
$smsReq->adddestination($phone);
$msgResp = $smsReq->submit();
}catch (Exception $ex) {
// echo "<script>location='../index.php?page=print-list'</script>";
}