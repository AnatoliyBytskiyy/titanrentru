<?php
session_start();
unset($_SESSION['pass']);
header('location: index.php');
exit();
?>