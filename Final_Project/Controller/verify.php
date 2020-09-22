<?php
session_start();
require_once '../DB/config.php';
require_once '../Controller/userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='teacher')) {
	header('location:../index.php');
	exit();
}

if (isset($_GET['userId']) && !empty($_GET['userId'])) {
	$userId = trim($_GET['userId']);
	$sql = "UPDATE users SET active=1 WHERE id='$userId'";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "<div class='greenAlert'>Account verification complete! Now he/she can get access to portal..</div><br>";
	}else{
		$_SESSION['message'] = "<div class='brownAlert'>Verification failed!</div><br>";
	}
	header('location:../Views/accounts_onhold.php');
}