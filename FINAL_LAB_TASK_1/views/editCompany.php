<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	if (isset($_GET['id'])) {
		$company = getByIDCompany($_GET['id']);	
	}else{
		header('location: companyInfo.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<body>

	<form action="../php/userController.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Edit User</legend>
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="company_name" value="<?=$company['company_name']?>"></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><input type="text" name="profile_description" value="<?=$company['profile_description']?>"></td>
				</tr>
				<tr>
					<td>Industry</td>
					<td><input type="text" name="industry" value="<?=$company['industry']?>"></td>
				</tr>
				<tr>
					<td>Website</td>
					<td><input type="text" name="company_website" value="<?=$company['company_website']?>"></td>
				</tr>
				<tr>
					<td>Logo</td>
					<td><input type="file" name="company_logo"></td>
				</tr>
				<tr>
					<td></td>
					<td align="right">
						<input type="hidden" name="id" value="<?=$company['id']?>">
						<input type="submit" name="editCompany" value="Update"> 
						<a href="companyInfo.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>
