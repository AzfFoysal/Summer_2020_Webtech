<?php
session_start();
require_once '../DB/config.php';
require_once 'userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='admin')) {
	header('location:../index.php');
	exit();
}


if (isset($_GET['deptId'])) {
	$fetchData = fetchTeacherByDeptId($conn, $_GET['deptId']);
	$teacherList = "";
	if (count($fetchData)==0) {
		echo "<option disabled selected>No data available</option>";
	}else{
		$teacherList .= "<option value='0'>Select All</option>";
		foreach ($fetchData as $value) {
			$teacherList .= "<option value=".$value['userId'].">".$value['name']."</option>";
		}
		echo $teacherList;
	}
	
}