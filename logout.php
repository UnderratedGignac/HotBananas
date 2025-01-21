<?php
session_start();
$_SESSION = []; 
session_destroy();
echo "<script>localStorage.removeItem('cart'); window.location.href = 'index.php';</script>";
exit;
?>

