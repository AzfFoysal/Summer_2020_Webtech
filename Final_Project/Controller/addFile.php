<?php
session_start();
require_once '../DB/config.php';
require_once 'userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='teacher')) {
	header('location:../index.php');
	exit();
}

if (isset($_POST['addStudent'])) {
	$name = $_POST['name'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$department = $_POST['department'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$father = $_POST['father'];
	$mother = $_POST['mother'];
	$gender = $_POST['gender'];

	$photo = $_FILES['photo'];

	$userType = 'student';
	$error = "";
	$dbError = "";
	if (empty($name) || empty($email) || empty($username) || empty($password) || empty($birthday) || empty($phone) || empty($address) || empty($department) || empty($father) || empty($mother) || empty($gender) || empty($photo['name'])) {

		//exit(print_r($_POST));
		$_SESSION['message'] = "<div class='brownAlert'>Field can not be empty!</div><br>";
		header('location:../Views/add_student.php');
	}else {

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error .= "Invalid Email format!<br>";
		}

		if (emailExists($conn, $email)) {
			$error .= "This email already exits!<br>";
		}

		if (!is_numeric($phone)) {
			$error .= "Invalid phone number format!<br>";
		}


		// Get image file extension
   		 $file_extension = pathinfo($photo["name"], PATHINFO_EXTENSION);
   		 $allowed = array('png', 'jpg', 'jpeg');
   		 if (!in_array($file_extension, $allowed)) {
   		 	$error .= "Image should be in JPG/PNG format!<br>";
   		 }

   		 if (!empty($error)) {
   		 	$_SESSION['message'] = "<div class='brownAlert'>".$error."</div>";
   		 }else{
   		 	$q1 = "INSERT INTO users (username, password, email, active, userType) VALUES ('$username','$password','$email', 1, '$userType')";
   		 	if (mysqli_query($conn, $q1)) {
   		 		$last_insert_id = mysqli_insert_id($conn);
   		 		$unique_image_name = date('d-m-Y')."_".$username.".".$file_extension;
   		 		$photoSource = $photo['tmp_name'];
				$photoPath = "Uploads/Images/Student/".$unique_image_name;

				$q2 = "INSERT INTO user_data (userId, name, dob, address, mobile, image, departmentId, gender, father, mother, creditComplete) VALUES ('$last_insert_id','$name','$birthday','$address', $phone,'$photoPath', '$department', '$gender', '$father', '$mother', 0)";
				//exit($q2);
				if (mysqli_query($conn, $q2)) {
					move_uploaded_file($photoSource, '../'.$photoPath);
					$_SESSION['message'] = "<div class='greenAlert'>Student added successfully!</div><br>";
				}else{
					$_SESSION['message'] = "<div class='brownAlert'>Failed to insert profile data in database!</div><br>";
				}
   		 	}else{
   		 		$_SESSION['message'] = "<div class='brownAlert'>Failed to insert student in database!</div><br>";
   		 	}
   		 	
   		 }
   		 header('location:../Views/add_student.php');
	}

}
