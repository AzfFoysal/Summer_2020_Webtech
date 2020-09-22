<?php
session_start();
require_once '../DB/config.php';
require_once '../Controller/userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='admin')) {
	header('location:../index.php');
	exit();
}


if (isset($_POST['editTeacher'])) {
	$name = $_POST['name'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$department = $_POST['department'];
	$position = $_POST['position'];
	$gender = $_POST['gender'];
	$username = $_POST['username'];

	$teacherId = $_POST['teacherId'];

	$photo = $_FILES['photo'];
	$salary = getSalaryByPosition($position);

	$error = "";
	$dbError = "";
	if (empty($name) || empty($email) || empty($birthday) || empty($phone) || empty($address) || empty($department) || empty($position) || empty($gender)) {
		//exit();
		$_SESSION['message'] = "<div class='brownAlert'>Field can not be empty!</div><br>";
		header('location:../Views/edit_user.php?teacherId='.$teacherId);
	}else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error .= "Invalid Email format!<br>";
		}

		if (!is_numeric($phone)) {
			$error .= "Invalid phone number format!<br>";
		}

		if (empty($photo['name'])) {
			$sql1 = "UPDATE user_data SET name='$name', dob='$birthday', address='$address', mobile='$phone', departmentId='$department', gender='$gender', position='$position', salary='$salary' WHERE userId='$techerId'";
		}else{
			// Get image file extension
	   		 $file_extension = pathinfo($photo["name"], PATHINFO_EXTENSION);
	   		 $allowed = array('png', 'jpg', 'jpeg');
	   		 if (!in_array($file_extension, $allowed)) {
	   		 	$error .= "Image should be in JPG/PNG format!<br>";
	   		 }else{
	   		 	$unique_image_name = date('d-m-Y')."_".$username.".".$file_extension;
   		 		$photoSource = $photo['tmp_name'];
				$photoPath = "Uploads/Images/Teacher/".$unique_image_name;
				$existsPhotoPath = fetchUserImageById($conn, $teacherId);

				$sql1 = "UPDATE user_data SET name='$name', dob='$birthday', address='$address', mobile='$phone', image='$photoPath', departmentId='$department', gender='$gender', position='$position', salary='$salary' WHERE userId='$teacherId'";
	   		 }
			
		}

		if (!empty($error)) {
			$_SESSION['message'] = "<div class='brownAlert'>".$error."</div>";
		}else{
			$sql2 = "UPDATE users SET email='$email' WHERE id='$teacherId'";
			if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
				if (isset($existsPhotoPath) && !empty($existsPhotoPath)) {
					unlink('../'.$existsPhotoPath);
				}
				if (isset($photoPath) && !empty($photoPath)) {
					move_uploaded_file($photoSource, '../'.$photoPath);
				}
				$_SESSION['message'] = "<div class='greenAlert'>Successfully Updated!</div><br>";
			}else{
				$_SESSION['message'] = "<div class='brownAlert'>Teacher update failed!</div><br>";
			}
		}
		header('location:../Views/edit_user.php?teacherId='.$teacherId);
	}
}

if (isset($_POST['editStudent'])) {
	$name = $_POST['name'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$department = $_POST['department'];
	$father = $_POST['father'];
	$mother = $_POST['mother'];
	$gender = $_POST['gender'];
	$username = $_POST['username'];

	$studentId = $_POST['studentId'];

	$photo = $_FILES['photo'];
	
	$error = "";
	$dbError = "";
	if (empty($name) || empty($email) || empty($birthday) || empty($phone) || empty($address) || empty($department) || empty($father) || empty($mother) || empty($gender)) {
		//exit();
		$_SESSION['message'] = "<div class='brownAlert'>Field can not be empty!</div><br>";
		header('location:../Views/edit_user.php?studentId='.$teacherId);
	}else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error .= "<div class='brownAlert'>Invalid Email format!</div><br>";
		}

		if (!is_numeric($phone)) {
			$error .= "<div class='brownAlert'>Invalid phone number format!</div><br>";
		}

		if (empty($photo['name'])) {
			$sql1 = "UPDATE user_data SET name='$name', dob='$birthday', address='$address', mobile='$phone', departmentId='$department', gender='$gender', father='$father', mother='$mother' WHERE userId='$studentId'";
		}else{
			// Get image file extension
	   		 $file_extension = pathinfo($photo["name"], PATHINFO_EXTENSION);
	   		 $allowed = array('png', 'jpg', 'jpeg');
	   		 if (!in_array($file_extension, $allowed)) {
	   		 	$error .= "<div class='brownAlert'>Image should be in JPG/PNG format!</div><br>";
	   		 }else{
	   		 	$unique_image_name = date('d-m-Y')."_".$username.".".$file_extension;
   		 		$photoSource = $photo['tmp_name'];
				$photoPath = "Uploads/Images/Student/".$unique_image_name;
				$existsPhotoPath = fetchUserImageById($conn, $teacherId);

				$sql1 = "UPDATE user_data SET name='$name', dob='$birthday', address='$address', mobile='$phone', image='$photoPath', departmentId='$department', gender='$gender', father='$father', mother='$mother' WHERE userId='$studentId'";
	   		 }
			
		}

		if (!empty($error)) {
			$_SESSION['message']=$error;
		}else{
			$sql2 = "UPDATE users SET email='$email' WHERE id='$studentId'";
			if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
				if (isset($existsPhotoPath) && !empty($existsPhotoPath)) {
					unlink('../'.$existsPhotoPath);
				}
				if (isset($photoPath) && !empty($photoPath)) {
					move_uploaded_file($photoSource, '../'.$photoPath);
				}
				$_SESSION['message'] = "<div class='greenAlert'>Successfully Updated!</div><br>";
			}else{
				$_SESSION['message'] = "<div class='brownAlert'>Student update failed!</div><br>";
			}
		}
		header('location:../Views/edit_user.php?studentId='.$studentId);
	}
}