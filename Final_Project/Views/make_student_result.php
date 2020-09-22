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
	<title>Make Student Result</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Make Student Result
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
				<form action="../Controller/studentResultCrud.php" method="post">
					<table width="100%" cellpadding="8">
						<tr>
							<td>
								Theory
							</td>
							<td>
								<input type="text" value="0" name="devFee">
							</td>
							<td>
								Lab
							</td>
							<td>
								<input type="text" value="0" name="devFee">
							</td>
							<td>
								Assignment
							</td>
							<td>
								<input type="text" value="0" name="devFee">
							</td>
						</tr>
						<tr>
							<td>
								Viva
							</td>
							<td>
								<input type="text" value="0" name="devFee">
							</td>
							<td>
								Quiz
							</td>
							<td>
								<input type="text" value="0" name="labFee">
							</td>
							<td>
								Attendence
							</td>
							<td>
								<input type="text" value="0" name="dueFee">
							</td>
						</tr>
						<tr>
							<td align="center" colspan="6">
								<input type="submit" name="makeStudentResult" value="submit">
							</td>
						</tr>
					</table>
				</form>
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