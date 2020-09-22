<?php
session_start();
require_once '../DB/config.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) ||  $_SESSION['logged_in']!=1) {
	header('location:../index.php');
	exit();
}

$userId = $_SESSION['userId'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$userId'");
$userData = mysqli_fetch_assoc($query);

//$message = "";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Edit Profile
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
				<?php if(isset($_SESSION['message'])) echo $_SESSION['message'];
				unset($_SESSION['message']); ?>
				<table width="60%" border="1" cellpadding="6">
					<tr>
						<th align="center" colspan="2">
							Profile Change
						</th>
					</tr>
				<form action="../Controller/change_account.php" method="post">
					<tr>
						<td width="25%">
							User Name
						</td>
						<td>
							<input type="text" size="50" disabled value="<?=$userData['username']?>">
						</td>
					</tr>
					
					<tr>
						<td>
							E-mail
						</td>
						<td>
							<input type="text" name="email" size="50" value="<?=$userData['email']?>">
						</td>
					</tr>
					<tr>
							<td colspan="6" align="right"><hr>
								<input type="submit" name="Done" value="Done" >
							</td>
						</tr>
				</form>
					<tr>
						<th colspan="2" align="center">
							Change Password
						</th>
					</tr>
					<tr>
						<td colspan="2">
							<form action="../Controller/change_account.php" method="post">
								<table width="100%" cellpadding="3">
									<tr>
										<td>
											Current Password
										</td>
										<td>
											<input type="password" name="currentPassword" size="50">
										</td>
									</tr>
									<tr>
										<td>
											New Password
										</td>
										<td>
											<input type="password" name="newPassword" size="50">
										</td>
									</tr>
									<tr>
										<td>
											Again New Password
										</td>
										<td>
											<input type="password" name="newPassword2" size="50">
										</td>
									</tr>
									<tr>
										<td colspan="2" align="right">
											<input type="submit" name="changePassword" value="Change Password">
										</td>
									</tr>
								</table>
							</form>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="right" height="30">
							<a href="profile.php">View Profile</a>
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