<?php
session_start();
require_once '../DB/config.php';
require_once '../Controller/userFunction.php';
if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='teacher')) {
	header('location:../index.php');
	exit();
}

/*if ((!isset($_GET['teacherId']) || empty($_GET['teacherId']) || !userIdExists($conn, $_GET['teacherId'])) && (!isset($_GET['studentId']) || empty($_GET['studentId']) || !userIdExists($conn, $_GET['studentId']))) {
	header('location: ../index.php');
	exit();
}


if (isset($_GET['teacherId']) && !isset($_GET['type'])) {
	$userData = fetchTeacherById($conn, $_GET['teacherId']);
	if (empty($userData)) {
		header('location:../Views/teachers_list.php');
	}
}
if (isset($_GET['teacherId']) && isset($_GET['type']) && $_GET['type']=="inactive") {
	$userData = fetchOnholdTeacherById($conn, $_GET['teacherId']);
	if (empty($userData)) {
		header('location:../Views/teachers_list.php');
	}
}

if (isset($_GET['studentId']) && !isset($_GET['type'])) {
	$userData = fetchStudentById($conn, $_GET['studentId']);
	if (empty($userData)) {
		header('location:../Views/students_list.php');
	}
}
if (isset($_GET['studentId']) && isset($_GET['type']) && $_GET['type']=="inactive") {
	$userData = fetchOnholdStudentById($conn, $_GET['studentId']);
	if (empty($userData)) {
		header('location:../Views/students_list.php');
	}
}

*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Pofile</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					My Profile
				</h1>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php include_once 'includes/topbar.php'; ?>
			</td>
		</tr>
		<tr height="360px">
			<td width="25%">
				<?php include_once 'includes/sidebar.php'; ?>
			</td>
			<td align="center" bgcolor="cadetblue">
				<table width="90%" border="1" cellpadding="6">
					<tr>
						<td rowspan="6" width="10%">
							<img src="<?='../'.$userData['image']?>" height="200px" width="">
						</td>
						<td>
							User ID
						</td>
						<td>
							<?=$userData['username']?>
						</td>
						<td>
							Name
						</td>
						<td colspan="3">
							<?=$userData['name']?>
						</td>
					</tr>
					<tr>
						<td>
							Department
						</td>
						<td>
							<?=fetchDepartmentById($conn, $userData['departmentId'])['departmentName']?>
						</td>
						<td>
							Date of Birth
						</td>
						<td colspan="3">
							<?=$userData['dob']?>
						</td>
						
					</tr>
					
					<tr>
						<td>
							Email
						</td>
						<td>
							<?=$userData['email']?>
						</td>
						<td>
							Phone
						</td>
						<td  colspan="3">
							<?=$userData['mobile']?>
						</td>
					</tr>
					<tr>
						<td>
							Address
						</td>
						<td>
							<?=$userData['address']?>
						</td>
						<td>
							Gender
						</td>
						<td colspan="3">
							<?=$userData['gender']?>
						</td>
						
					</tr>
				<?php if (isset($_GET['teacherId'])) { ?>
					<tr>
						<td>
							Position
						</td>
						<td>
							<?=$userData['position']?>
						</td>
						<td>
							Join Date
						</td>
						<td>
							<?=$userData['registrationDateTime']?>
						</td>
						<td>
							Salary
						</td>
						<td>
							<?=$userData['salary']?>
						</td>
					</tr>
				<?php }else if (isset($_GET['studentId'])) { ?>
					<tr>
						<td>
							Father
						</td>
						<td>
							<?=$userData['father']?>
						</td>
						<td>
							Mother
						</td>
						<td colspan="3">
							<?=$userData['mother']?>
						</td>
					</tr>
					<tr>
						<td>
							Admission Date
						</td>
						<td>
							<?=$userData['registrationDateTime']?>
						</td>
						<td>
							Credit Complete
						</td>
						<td>
							<?=$userData['creditComplete']?>
						</td>
						<td>
							Current CGPA
						</td>
						<td>
							<?=$userData['cgpa']?>
						</td>
					</tr>
				<?php } ?>
					<tr>
						<td colspan="7" align="right" height="30">
						<?php if(isset($_GET['teacherId'])){ ?>
							<a href="edit_user.php?teacherId=<?=$userData['userId']?>">Edit Teacher</a>
						<?php }elseif (isset($_GET['studentId'])) {
							?>
							<a href="edit_user.php?studentId=<?=$userData['userId']?>">Edit Student</a>
						<?php } ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="65px" bgcolor="dimgray" colspan="3">
				<center>Copyright &copy; Abu Zehad Foysal</center>
			</td>
		</tr>
	</table>

</body>
</html>