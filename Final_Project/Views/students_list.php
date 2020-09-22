<?php
session_start();
require_once '../DB/config.php';
require_once '../Controller/userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='teacher')) {
	header('location:../index.php');
	exit();
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Students List</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Students List
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
				<?php if(isset($_SESSION['message']) && !empty($_SESSION['message'])) echo $_SESSION['message']; unset($_SESSION['message']); ?>
				<table width="100%">
					<tr>
						<td align="right">
							<input type="text" name="search" placeholder="Search Student..">
						</td>
					</tr>
				</table><br>
				<table width="100%" border="1" cellpadding="5">
					<tr>
						<th width="1%" height="30px">Sl</th>
						<th>Student ID</th>
						<th>Name</th>
						<th>Dept.</th>
						<th>Email</th>
						<th>Phone</th>
						<th>CGPA</th>
						<th width="5%">Credit Complete</th>
						
					</tr>
					<?php
			 //print_r(fetchStudents($conn));
			// exit();
			$userDatas = fetchStudents($conn);
			$i=0;
			if (count($userDatas)==0) {
				echo "<tr><td colspan='9' align='center'>No Verified Student found...</td></tr>";
			}
			foreach ($userDatas as $userData) {
			?>
					<tr>
						<td><?=++$i?></td>
						<td><?=$userData['username']?></td>
						<td><?=$userData['name']?></td>
						<td><?=fetchDepartmentById($conn, $userData['departmentId'])['departmentName']?></td>
						<td><?=$userData['email']?></td>
						<td><?=$userData['mobile']?></td>
						<td><?=$userData['cgpa']?></td>
						<td><?=$userData['creditComplete']?></td>
						
					</tr>
					<?php } ?>
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