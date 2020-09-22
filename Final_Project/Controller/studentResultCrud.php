<?php
session_start();
require_once '../DB/config.php';
require_once 'userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='teacher')) {
	header('location:../index.php');
	exit();
}


if (isset($_POST['createStudentPayment'])) {
	$studentId = $_POST['studentId'];
	$semesterName = $_POST['semesterName'];
	$devFee = $_POST['devFee'];
	$labFee = $_POST['labFee'];
	$dueFee = $_POST['dueFee'];
	$credit = $_POST['credit'];
	$creditFee = CreditFee;
	if (empty($studentId) || empty($semesterName) || empty($credit)) {
		$_SESSION['message'] = "<div class='brownAlert'>Field can not be blank!</div><br>";
		header('location:../Views/students_grade.php');
	}else if (!studentUsernameExists($conn, $studentId)) {
		$_SESSION['message'] = "<div class='brownAlert'>This student doesn't exists!</div><br>";
		header('location:../Views/students_grade.php');
	}else if (!is_numeric($devFee) || !is_numeric($labFee) || !is_numeric($dueFee) || !is_numeric($credit)) {
		$_SESSION['message'] = "<div class='brownAlert'>Money amount should be number!</div><br>";
		header('location:../Views/students_grade.php');
	}else if($devFee<0 || $labFee<0 || $dueFee<0 || $credit<0){
		$_SESSION['message'] = "<div class='brownAlert'>Here all number value should be positive!</div><br>";
		header('location:../Views/students_grade.php');
	} else{
		$studentId = fetchIdByUsername($conn, $studentId);
		$totalPaid = ($credit*$creditFee)+$labFee+$devFee+$dueFee; 
		$q1 = "INSERT INTO student_payment (studentId, semesterName, credit, creditFee, devFee, labFee, dueFee, totalPaid) VALUES ('$studentId', '$semesterName', '$credit', '$creditFee', '$devFee', '$labFee', '$dueFee', '$totalPaid')";
		if (mysqli_query($conn, $q1)) {
			$_SESSION['message'] = "<div class='greenAlert'>Student Payment successfully added!</div><br>";
		}else{
			$_SESSION['message'] = "<div class='brownAlert'>Payment failed!</div><br>";
		}
		header('location:../Views/students_grade.php');
	}
}else if (isset($_GET['studentPayId'])) {
	$paymentId = $_GET['studentPayId'];
	$sql = "DELETE FROM student_payment WHERE id='$paymentId'";
	if (mysqli_query($conn,$sql)) {
		$_SESSION['message'] = "<div class='greenAlert'>Payment deleted!</div><br>";
	}else{
		$_SESSION['message'] = "<div class='brownAlert'>Failed to delete payment!</div><br>";
	}
	header('location:../Views/students_grade.php');
}else{
	header('location:../Views/students_grade.php');
}