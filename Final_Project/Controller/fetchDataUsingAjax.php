<?php
session_start();
require_once '../DB/config.php';
require_once '../Controller/userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1)) {
	header('location:../index.php');
	exit();
}
$response = array('success'=>false);
if (isset($_POST['teacherId'])) {
	$teacherId = trim($_POST['teacherId']);
	$teacherData = fetchTeacherByUsername($conn, $teacherId);
	if (count($teacherData)==0) {
		$response['Data'] = 'No data found..';
		$response['have'] = false; 
		$response['success'] = true; 
		echo json_encode($response);
	}else{
		$response['Data']=$teacherData;
		$response['success']=true;
		$response['have'] = true; 
		echo json_encode($response);
	}
}