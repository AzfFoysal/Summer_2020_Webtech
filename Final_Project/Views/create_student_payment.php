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
	<title>Create Student Payment</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Student Payment
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
				<form action="../Controller/studentPaymentCrud.php" method="post">
					<table width="100%" cellpadding="8">
						<tr>
							<td>
								Student Id
							</td>
							<td>
								<input type="text" name="studentId">
							</td>
							<td>
								Semester
							</td>
							<td>
								<input type="text" name="semesterName">
							</td>
							<td>
								Credit Enrolled
							</td>
							<td>
								<input type="text" name="credit">
							</td>
						</tr>
						<tr>
							<td>
								Development Fee
							</td>
							<td>
								<input type="text" value="0" name="devFee">
							</td>
							<td>
								Lab Fee
							</td>
							<td>
								<input type="text" value="0" name="labFee">
							</td>
							<td>
								Due Fee
							</td>
							<td>
								<input type="text" value="0" name="dueFee">
							</td>
						</tr>
						<tr>
							<td align="center" colspan="6">
								<input type="submit" name="createStudentPayment" value="Pay">
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
		<tr>
			<td height="65px" bgcolor="dimgray" colspan="3">
				<center>Copyright &copy; Rokan Chowdhury Onick</center>
			</td>
		</tr>
	</table>

</body>
</html>