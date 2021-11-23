<?php
session_start();
$_SESSION = array();
session_destroy();
session_abort();
header('Location: ../index.php');
?>