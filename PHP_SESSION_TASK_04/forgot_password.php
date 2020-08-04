<?php
session_start();
if (isset($_POST['submit'])) {
	$message="";
	if (!isset($_POST['email']) || empty($_POST['email'])) {
		$message = "hop... don't put empty value..";
	}else if (isset($_SESSION['user']) && ($_SESSION['user']['email']==$_POST['email'])) {
		$message = "Your Password is: <b>".$_COOKIE['password']."</b>";
	}else{
		$message = "There is no user exists with this email..";
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
			<td colspan="2" align="center">
				<form action="" method="post">
				<fieldset>
				    <legend><b>Forgot Password</b></legend>
				    Enter Email: <input type="text" name="email">
				    <input type="submit" name="submit" value="Submit">
				</fieldset>
				</form>
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
