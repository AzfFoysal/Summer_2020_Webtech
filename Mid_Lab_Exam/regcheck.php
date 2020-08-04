<?php
    session_start();
	if(isset($_POST['Register']))
	{
		$name = $_POST['name'];
		$id = $_POST['id'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirmPassword'];
		$userType = $_POST['userType'];
		
		if(empty($id)||empty($password)||empty($email)||empty($confirm_password)||empty($name)||empty($userType))
		{
			header("location:registration.html");
		}
		else{
			if($password == $confirm_password)
			{
 
			    $_SESSION['id'] = $id;
			    $_SESSION['password'] = $password;
			    $_SESSION['name'] = $name;
			    $_SESSION['confirm_password'] = $confirm_password;
			    $_SESSION['email'] = $email;
			    $_SESSION['userType'] = $userType;
                header("location:login.html");				
			}
			else
			{
				header("location:registration.html");
			}
		}
	}
	else
	{
		header("location:login.html");
	}
?>
