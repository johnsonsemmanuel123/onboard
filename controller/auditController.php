<?php 		
$audit_fields = [
'activity' => trim($audit_activity),
'details' => trim($audit_details),
'user' => trim($_SESSION['name'])
];
$audit_db = 'tbl_audittrail';
$audit_lastid = $content->insert($audit_db,$audit_fields);
?>