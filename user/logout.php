<?php
session_start();
unset($_SESSION['u_email']);
session_destroy();
header("Location: index.php");
?>