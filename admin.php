<?php
session_start();

if($_SESSION["u_admin"]) {
?>
Welcome <?php echo $_SESSION["u_admin"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}else{
	header("location:multiuser.php");
}
?>
