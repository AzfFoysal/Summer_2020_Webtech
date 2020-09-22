<?php
session_start();
require_once '../DB/config.php';
require_once 'userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='teacher')) {
	header('location:../index.php');
	exit();
}

if (isset($_POST['createNotice'])) {
	$departmentId = $_POST['department'];
	$facultyMember = $_POST['facultyMember'];
	$noticeSubject = $_POST['noticeSubject'];
	$noticeDetails = $_POST['noticeDetails'];
	if (empty($departmentId) || empty($noticeSubject) || empty($noticeDetails) || $departmentId<1 || strlen($facultyMember)<1) {
		$_SESSION['message'] = "<div class='brownAlert'>Field can not be blank!</div><br>";
		header('location:../Views/create_notice.php');
	}else{
		$q1 = "INSERT INTO notice (departmentId, facultyMember, subject, details) VALUES ('$departmentId', '$facultyMember', '$noticeSubject', '$noticeDetails')";
		if (mysqli_query($conn, $q1)) {
			$_SESSION['message'] = "<div class='greenAlert'>Notice successfully sent!</div><br>";
		}else{
			$_SESSION['message'] = "<div class='brownAlert'>Failed to sent notice!</div><br>";
		}
		header('location:../Views/create_notice.php');
	}
}else if (isset($_POST['editNotice'])) {
	$departmentId = $_POST['department'];
	$facultyMember = $_POST['facultyMember'];
	$noticeSubject = $_POST['noticeSubject'];
	$noticeDetails = $_POST['noticeDetails'];
	$noticeId = $_POST['noticeId'];
	if (empty($departmentId) || empty($noticeSubject) || empty($noticeDetails) || $departmentId<1 || strlen($facultyMember)<1) {
		$_SESSION['message'] = "<div class='brownAlert'>Field can not be blank!</div><br>";
		header('location:../Views/edit_notice.php?noticeId='.$noticeId);
	}else{
		$q1 = "UPDATE notice SET departmentId='$departmentId', facultyMember='$facultyMember', subject='$noticeSubject', details='$noticeDetails' WHERE id='$noticeId'";
		if (mysqli_query($conn, $q1)) {
			$_SESSION['message'] = "<div class='greenAlert'>Notice successfully updated!</div><br>";
		}else{
			$_SESSION['message'] = "<div class='brownAlert'>Failed to update notice!</div><br>";
		}
		header('location:../Views/edit_notice.php?noticeId='.$noticeId);
	}
}else if (isset($_GET['noticeId'])) {
	$noticeId = trim($_GET['noticeId']);
	if (mysqli_query($conn, "DELETE FROM notice WHERE id='$noticeId'")) {
		$_SESSION['message'] = "<div class='greenAlert'>Notice deleted!</div><br>";
	}else{
		$_SESSION['message'] = "<div class='brownAlert'>Failed to delete notice!</div><br>";
	}
	header('location:../Views/notice_list.php');
}else{
	header('location:../Views/notice_list.php');
}