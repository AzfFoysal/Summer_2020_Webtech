<?php
session_start();
require_once '../DB/config.php';
require_once '../Controller/userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1)) {
	header('location:../index.php');
	exit();
}


if (isset($_POST['email'])) {
	$emailExists = emailExists($conn, $_POST['email']);
	if ($emailExists==true) {
		echo json_encode(array('success'=>false));
	}else{
		echo json_encode(array('success'=>true));
	}
}
