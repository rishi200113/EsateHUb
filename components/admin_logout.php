<?php

session_start();

$_SESSION = [];


session_destroy();

header('location:../admin/login.php');

?>