<?php
session_start();
require_once '../DB/config.php';
require_once '../Controller/userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='teacher')) {
	header('location:../index.php');
	exit();
}
$query1 = mysqli_query($conn, "SELECT username as userId FROM users WHERE userType='student' ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_assoc($query1);
$userId = $data['userId'];
if (!empty($userId)) {
	$userIdExplode = explode('-', $userId);
	$userId = $userIdExplode[1];
	$userId++;
}else{
	$userId = 10001;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload TSF</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Upload TSF
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
				<form action="../Controller/addFile.php" method="post" enctype="multipart/form-data">
					<table width="100%" cellpadding="6" cellspacing="3">
						
						<tr>
							<td>
								Select TSF
							</td>
							<td>
								<input type="file" name="file" >
							</td>
							
						</tr>
						<tr>
							<td colspan="4" align="right"><hr>
								<input type="submit" name="Upload" value="Upload" >
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