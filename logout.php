<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['flag']);
session_destroy();
header('Location:index.php');
?>
