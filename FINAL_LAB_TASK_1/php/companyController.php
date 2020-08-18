<?php 
	require_once('../php/session_header.php');
	require_once('../service/userService.php');
	if(isset($_POST['create']))
	{

		if(empty($_POST['id']) || empty($_POST['company_name']) || empty($_POST['profile_description']) || empty($_POST['industry']) || empty($_POST['company_website']) || empty($_FILES['company_logo']))
		{
			header('location: ../views/companyCreate.php?error=null_value');
		}
		else
		{
			$id = $_POST['id'];
			$company_name = $_POST['company_name'];
			$profile_description = $_POST['profile_description'];
			$industry = $_POST['industry'];
			$company_website = $_POST['company_website'];
			$filedir='../pictures/'.$id.".png";
			$company = [
				'id'=> $id,
				'company_name'=> $company_name,
				'profile_description'=> $profile_description,
				'industry'=> $industry,
				'company_website'=> $company_website,
				'company_logo'=> $filedir,
				'user_account_id'=> getId($_SESSION['username'])
			];
			var_dump($company);
			$status = insertCompany($company);

			if($status){
				if(move_uploaded_file($_FILES['company_logo']['tmp_name'], $filedir))
				{
					echo "Done";
				}
				header('location: ../views/companyInfo.php?success=registration_done');
			}else{
				header('location: ../views/companyCreate.php?error=db_error');
			}

		}
	}

?>
