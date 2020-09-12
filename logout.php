<?php
session_start();
unset($_SESSION["ttcode"]);
unset($_SESSION["password"]);
header("Location:index.php");
?>