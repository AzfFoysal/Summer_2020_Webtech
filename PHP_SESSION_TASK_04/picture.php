<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['status'])) {
	header('location: login.php');
	exit();
}
$message = "";
if (isset($_POST['submit'])) {
	if (empty($_POST['image'])) {
		$message="Image not selected!";
	}else{
		$_COOKIE['image'] = $_POST['image'];
		$message="Image successfully changed!";
	}
	
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Abu Zehad Foysal</title>
</head>
<body>
	<br><br>
	<center><?php if(!empty($message))echo $message;?></center>
	<br>
	<form action="" method="post">
	<table border="1" align="center" width="60%">
		<tr>
			<td align="center">
				<h3>X Company</h3>

			</td>
			<td align="right">
				Logged in as <a href="profile.php"><?=$_COOKIE['name']?></a> | <a href="logout.php">Logout</a>
			</td>
		</tr>
		<tr>
			<td>
				<h3>Account</h3><hr>
			 <ul>
			 	<li><a href="dashboard.php">Dashboard</a></li>
			 	<li><a href="profile.php">View Profile</a></li>
			 	<li><a href="edit_profile.php">Edit Profile</a></li>
			 	<li><a href="picture.php">Change Profile Picture</a></li>
			 	<li><a href="change_password.php">Change Password</a></li>
			 	<li><a href="logout.php">Logout</a></li>
			 </ul>
			</td>
			<td>
				<fieldset>
				    <legend><b>PROFILE PICTURE</b></legend>
				    <form action="" method="post" enctype="multipart/form-data">
				        <img width="128" alt="Foysal's Picture" src="<?php if (isset($_COOKIE['image']))echo $_COOKIE['image'];?>" />
				        <br />
				        <input type="file" name="image">
				        <hr />
				        <input type="submit" name="submit" value="Submit">
				    </form>
				</fieldset>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<center>Copyright &copy; Abu Zehad Foysal</center>
			</td>
		</tr>
	</table>
	</form>

</body>
</html>
