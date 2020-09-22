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
	<title>Salary Details</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Salary Details
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
							<input type="text" name="search" placeholder="Search..">
						</td>
					</tr>
				</table><br>
				<table width="100%" border="1" cellpadding="5">
					<tr>
						<th width="2%">Sl. No</th>
						<th>Department</th>
						<th width="15%">Position</th>
						<th>Pay Time</th>
						<th>Salary</th>
						<th>Bonus</th>
						<th>Total Paid Salary</th>
						
					</tr>
				<?php
				$salaryData = fetchSalary($conn);
				if (count($salaryData)==0) {
					echo "<tr><td colspan='7' align='center'>No salary data found!</td></tr>";
				}
				$i=0;
				foreach ($salaryData as $salary) {
				?>
					<tr>
						<td><?=++$i?></td>
						<td><?=fetchDepartmentById($conn, $salary['departmentId'])['departmentName']?></td>
						<td><?=$salary['position']?> [Total-<?=count(fetchTeacherByDeptId($conn, $salary['departmentId']))?>]</td>
						<td><?=date("d/m/y, h:i:sA", strtotime($salary['created']))?></td>
						<td><?=$salary['salaryPerPerson']?></td>
						<td><?=$salary['bonusPerPerson']?></td>
						<td><?=$salary['totalPaid']?></td>
						
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