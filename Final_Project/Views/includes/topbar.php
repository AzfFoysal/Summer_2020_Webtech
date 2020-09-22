<link rel="stylesheet" type="text/css" href="assets/css/style.css?click=<?=rand()?>">

<table width="100%">
	<tr>
		<td align="left">
			[ <a href="dashboard.php">Dashboard</a> ] 
		</td>
		<td align="right">
			Welcome, <a href="profile.php"><?=$_SESSION['name']?></a> [<?php if($_SESSION['userType']=='admin')echo"Admin";else if($_SESSION['userType']=='teacher')echo"Teacher";else echo"Student";?>] | <a href="../Controller/logout.php">Logout</a>
		</td>
	</tr>
</table>
