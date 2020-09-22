<?php
@session_start();
//require_once '../DB/config.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='teacher')) {
	header('location:../index.php');
	exit();
}

function getSalaryByPosition($position)
{
	switch ($position) {
		case 'Lecturer':
			return 800;
			break;
		case 'Assistant Professor':
			return 1000;
			break;
		case 'Associate Professor':
			return 1200;
			break;
		
		default:
			# code...
			break;
	}
}

function fetchTeachers($conn)
{
	$q1 = "SELECT * FROM user_data INNER JOIN users ON user_data.userId=users.id WHERE users.userType='teacher' AND users.active=1";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function fetchStudents($conn)
{
	$q1 = "SELECT * FROM user_data INNER JOIN users ON user_data.userId=users.id WHERE users.userType='student' AND users.active=1";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function emailExists($conn, $email)
{
	$q1 = "SELECT email FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $q1);
	if (mysqli_num_rows($result)>0) {
		return true;
	}
	return false;
}

function userIdExists($conn, $userId)
{
	$q1 = "SELECT id FROM users WHERE id='$userId'";
	$result = mysqli_query($conn, $q1);
	if (mysqli_num_rows($result)>0) {
		return true;
	}
	return false;
}


function fetchTeacherById($conn, $teacherId)
{
	$teacherId = trim($teacherId);
	$q1 = "SELECT * FROM user_data INNER JOIN users ON user_data.userId=users.id WHERE users.userType='teacher' AND users.active=1 AND users.id='$teacherId'";
	$result = mysqli_query($conn, $q1);

	$datas = mysqli_fetch_assoc($result);
	return $datas;
}

function fetchTeacherByUsername($conn, $username)
{
	$username = trim($username);
	$q1 = "SELECT * FROM user_data INNER JOIN users ON user_data.userId=users.id WHERE users.userType='teacher' AND users.active=1 AND users.username LIKE '%$username%'";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function fetchTeacherByDeptId($conn, $deptId)
{
	$deptId = trim($deptId);
	$q1 = "SELECT * FROM user_data WHERE departmentId='$deptId'";
	$result = mysqli_query($conn, $q1);
	$datas = array();

	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function fetchOnholdTeacherById($conn, $teacherId)
{
	$teacherId = trim($teacherId);
	$q1 = "SELECT * FROM user_data INNER JOIN users ON user_data.userId=users.id WHERE users.userType='teacher' AND users.id='$teacherId'";
	$result = mysqli_query($conn, $q1);

	$datas = mysqli_fetch_assoc($result);
	return $datas;
}

function fetchStudentById($conn, $studentId)
{
	$studentId = trim($studentId);
	$q1 = "SELECT * FROM user_data INNER JOIN users ON user_data.userId=users.id WHERE users.userType='student' AND users.active=1 AND users.id='$studentId'";
	$result = mysqli_query($conn, $q1);

	$datas = mysqli_fetch_assoc($result);
	return $datas;
}

function fetchOnholdStudentById($conn, $studentId)
{
	$studentId = trim($studentId);
	$q1 = "SELECT * FROM user_data INNER JOIN users ON user_data.userId=users.id WHERE users.userType='student' AND users.id='$studentId'";
	$result = mysqli_query($conn, $q1);

	$datas = mysqli_fetch_assoc($result);
	return $datas;
}

function studentUsernameExists($conn, $username)
{
	$q1 = "SELECT id FROM users WHERE userType='student' AND username='$username'";
	$result = mysqli_query($conn, $q1);
	if (mysqli_num_rows($result)>0) {
		return true;
	}
	return false;
}

function getUsername($conn, $userId)
{
	$q1 = "SELECT username FROM users WHERE id='$userId'";
	$result = mysqli_query($conn, $q1);

	$datas = mysqli_fetch_assoc($result);
	return $datas['username'];
}

function getStudentDepartmentNameByID($conn, $userId)
{
	$departmentId = fetchStudentById($conn, $userId)['departmentId'];
	$departmentName = fetchDepartmentById($conn, $departmentId)['departmentName'];
	//print_r($departmentName);
	return $departmentName;
}
function fetchUserImageById($conn, $userId)
{
	$userId = trim($userId);
	$q1 = "SELECT image FROM user_data WHERE userId='$userId'";
	$result = mysqli_query($conn, $q1);

	$datas = mysqli_fetch_assoc($result);
	return $datas['image'];
}

function fetchNameById($conn, $userId)
{
	$userId = trim($userId);
	$q1 = "SELECT name FROM user_data WHERE userId='$userId'";
	$result = mysqli_query($conn, $q1);

	$datas = mysqli_fetch_assoc($result);
	return $datas['name'];
}

function fetchIdByUsername($conn, $userName)
{
	$userId = trim($userId);
	$q1 = "SELECT id FROM users WHERE username='$userName'";
	$result = mysqli_query($conn, $q1);

	$datas = mysqli_fetch_assoc($result);
	return $datas['id'];
}


function fetchDepartments($conn)
{
	$q1 = "SELECT * FROM department";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function fetchDepartmentById($conn, $deptId)
{
	$q1 = "SELECT * FROM department WHERE id='$deptId'";
	$result = mysqli_query($conn, $q1);

	return mysqli_fetch_assoc($result);
}

function fetchCourses($conn)
{
	$q1 = "SELECT * FROM course";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function fetchCourseById($conn, $courseId)
{
	$q1 = "SELECT * FROM course WHERE id='$courseId'";
	$result = mysqli_query($conn, $q1);

	return mysqli_fetch_assoc($result);
}

function fetchNotices($conn)
{
	$q1 = "SELECT * FROM notice";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function fetchNoticeById($conn, $noticeId)
{
	$q1 = "SELECT * FROM notice WHERE id='$noticeId'";
	$result = mysqli_query($conn, $q1);

	return mysqli_fetch_assoc($result);
}

function fetchMails($conn)
{
	$q1 = "SELECT * FROM mailbox";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function fetchMailById($conn, $mailId)
{
	$q1 = "SELECT * FROM mailbox WHERE id='$mailId'";
	$result = mysqli_query($conn, $q1);

	return mysqli_fetch_assoc($result);
}

function fetchOnHoldAccounts($conn)
{
	$q1 = "SELECT * FROM user_data INNER JOIN users ON user_data.userId=users.id WHERE users.userType!='admin' AND users.active=0";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function fetchSalary($conn)
{
	$q1 = "SELECT * FROM salary";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}

function fetchStudentPayment($conn)
{
	$q1 = "SELECT * FROM student_payment";
	$result = mysqli_query($conn, $q1);
	$datas = array();
	while ($rows = mysqli_fetch_assoc($result)) {
		$datas[] = $rows;
	}
	return $datas;
}