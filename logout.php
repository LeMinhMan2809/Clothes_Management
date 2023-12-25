<?php 
require_once "connect-select-db.php";

session_start();
session_unset();
session_destroy();

header("Location:login.php");
?>