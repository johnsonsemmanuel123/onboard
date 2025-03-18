<?php
@session_start();
@session_unset();
header('Cache-Control: no-cache, must-revalidate');
echo "<script>location='/fccruise/backend/index.php?page=login'</script>";
?>