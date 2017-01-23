<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
if (!isset($_SESSION['uid']) || !isset($_SESSION['uname'])){
	$_SESSION['msg']="You have to be logged-in for the requested page. This system tracks illegal access.";
	header("Location: /index.php");
}


?>

<td class="font3" align="right">Hello <?php session_start(); echo $_SESSION['uname']?><br><?php echo "Your IP is ".$_SERVER['REMOTE_ADDR'] ?>	</td>