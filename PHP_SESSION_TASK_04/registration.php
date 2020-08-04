<?php
session_start();
$error = "";
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$userName =$_POST['userName'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
	$gender = @$_POST['gender'];
	$day = $_POST['dd'];
	$month= $_POST['mm'];
	$year = $_POST['yyyy'];
	if (empty($name) || empty($email) ||  empty($userName) ||  empty($password) || empty($gender) || empty($day) || empty($month) || empty($year)){
		$error = "Required field is empty";
	}else if ($password !=$confirmPassword) {
		$error = "Two password not matched";
	}else{
		$user = [
			'userName'=>$userName,
			'email'=>$email,
			'password'=>$password
		];
		$_SESSION['userName'] 		= $uname;
		$_SESSION['email'] 		= $email;
		$_SESSION['password'] 	= $password;
		$_SESSION['user'] 		= $user;

		setcookie('name', $name, time() + (86400 * 30), "/");
		setcookie('email', $email, time() + (86400 * 30), "/");
		setcookie('userName', $userName, time() + (86400 * 30), "/");
		setcookie('password', $password, time() + (86400 * 30), "/");
		setcookie('gender', $gender, time() + (86400 * 30), "/");
		setcookie('day', $day, time() + (86400 * 30), "/");
		setcookie('month', $month, time() + (86400 * 30), "/");
		setcookie('year', $year, time() + (86400 * 30), "/");
		$_SESSION['success'] = 'Registration success..';
header('Location: login.php');
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
	<center><?php if(!empty($error))echo $error;?></center><br>
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
			    <legend><b>REGISTRATION</b></legend>
				<form action="" method="post">
					<br/>
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td>Name</td>
							<td>:</td>
							<td><input name="name" type="text"></td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td>
								<input name="email" type="text">
								<abbr title="hint: xyz@example.com"><b>i</b></abbr>
							</td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>User Name</td>
							<td>:</td>
							<td><input name="userName" type="text"></td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input name="password" type="password"></td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Confirm Password</td>
							<td>:</td>
							<td><input name="confirmPassword" type="password"></td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td colspan="3">
								<fieldset>
									<legend>Gender</legend>    
									<input name="gender" type="radio" value="Male">Male
									<input name="gender" type="radio" value="Female">Female
									<input name="gender" type="radio" value="Other">Other
								</fieldset>
							</td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td colspan="3">
								<fieldset>
									<legend>Date of Birth</legend>    
									<input type="text" size="2" name="dd" />/
									<input type="text" size="2"  name="mm"/>/
									<input type="text" size="4"  name="yyyy"/>
									<font size="2"><i>(dd/mm/yyyy)</i></font>
								</fieldset>
							</td>
							<td></td>
						</tr>
					</table>
					<hr/>
					<input type="submit" name="submit" value="Submit">
					<input type="reset">
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

</body>
</html>
