<?php
session_start();
$error = "";
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$userId =$_POST['id'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
	$userType = $_POST['userType'];
	if (empty($name) || empty($email) ||  empty($userType) ||  empty($password) ||  empty($confirmPassword) || empty($userId)){
		$error = "Required field is empty";
	}else if ($password !=$confirmPassword) {
		$error = "Two password not matched";
	}else{
		$file = fopen('users.txt', 'a');
		fwrite($file, $userId.'|'.$password.'|'.$name.'|'.$email.'|'.$userType."/r/n");
		fclose($file);

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
		<tr height="150px">
			<td colspan="2">
			<fieldset>
			    <legend><b>REGISTRATION</b></legend>
				<form action="" method="post">
					<br/>
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td>ID</td>
							<td>:</td>
							<td><input name="id" type="text"></td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td>
								<input name="password" type="password">
							</td>
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
							<td>Name</td>
							<td>:</td>
							<td><input name="name" type="text"></td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input name="email" type="text"></td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>User Type</td>
							<td>:</td>
							<td>
								<select name="userType">
									<option value="user">User</option>
									<option value="admin">Admin</option>
								</select>
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
