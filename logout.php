<?php
session_start();

unset($_SESSION["u_name"]);
unset($_SESSION["u_admin"]);
header("Location:multiuser.php");
?>