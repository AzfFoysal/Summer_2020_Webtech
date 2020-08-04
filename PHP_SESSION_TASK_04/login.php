<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['status'])) {
	header('location:dashboard.php');
	exit();
}
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($username) || empty($password)) {
		$error = "Required field is empty";
	}else if (isset($_SESSION['user'])) {
		if ($username == $_SESSION['user']['userName'] && $password == $_SESSION['user']['password']) {
			if (isset($_POST['save'])) {
				setcookie('userName', $userName, time() + (86400 * 30), "/");
				setcookie('password', $password, time() + (86400 * 30), "/");
			}else{
				unset($_COOKIE['userName']);
				unset($_COOKIE['password']);
			}

			$_SESSION['status'] = 1;
			header('location:dashboard.php');
		}
	}else{
		$error="There is no user exists!";
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
	<center><?php if(!empty($error))echo $error; if(isset($_SESSION['success'])) echo $_SESSION['success']; unset($_SESSION['success']); ?></center>
	<br>
	<form action="" method="post">
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
				<fieldset>
				    <legend><b>Login</b></legend>
				    Username: <input type="text" name="username" value="<?php if (isset($_COOKIE['userName'])) echo $_COOKIE['userName'];?>"><br>
				    Password: <input type="password" name="password" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password'];?>"><br>
				    <input type="checkbox" name="save" <?php if (isset($_COOKIE['save'])) echo "checked";?> > Remember Me <a href="forgot_password.php">Forgot password?</a> <br>
				    <hr>
				    <input type="submit" name="login" value="Submit">
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
