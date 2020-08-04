<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status']==1) {
	header("location:dashboard.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Abu Zehad Foysal</title>
</head>
<body>
	<br><br>
	<table border="1" align="center" width="60%">
		<tr>
			<td align="center">
				<h3>X Company</h3>

			</td>
			<td align="right">
				<a href="home.php">Home</a> | <a href="login.php">Login</a> | <a href="registration.php">Registration</a>
			</td>
		</tr>
		<tr height="150px">
			<td colspan="2">
			<h1>Welcome to XYZ Company</h1>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<center>Copyright &copy; Abu Zehad Foysal</center>
			</td>
		</tr>
	</table>

</body>
</html>
