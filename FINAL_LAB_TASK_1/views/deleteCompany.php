<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	if (isset($_GET['id'])) {
		$user = getByIDCompany($_GET['id']);	
	}else{
		header('location: companyInfo.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete User</title>
</head>
<body>

	<form action="../php/userController.php" method="post">
		<fieldset>
			<legend>Delete User</legend>
			<table>
				<tr>
					<td>ID: </td>
					<td><?=$user['id']?></td>
				</tr>
				<tr>
					<td>Name: </td>
					<td><?=$user['company_name']?></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						Are you sure?
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="id" value="<?=$user['id']?>">
						<input type="submit" name="deleteCompany" value="Delete"> 
						<a href="companyInfo.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>
