<?php
session_start();
require_once '../DB/config.php';
require_once '../Controller/userFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) || ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='teacher')) {
	header('location:../index.php');
	exit();
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Drop Application List</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Drop Application List
				</h1>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php include_once 'includes/topbar.php'; ?>
			</td>
		</tr>
		<tr height="360px">
			<td width="25%">
				<?php include_once 'includes/sidebar.php'; ?>
			</td>
			<td align="center" bgcolor="cadetblue">
				<?php if(isset($_SESSION['message']) && !empty($_SESSION['message'])) echo $_SESSION['message']; unset($_SESSION['message']); ?>
				<table width="100%">
					<tr>
						<td align="right">
							<input type="text" name="search" placeholder="Search..">
						</td>
					</tr>
				</table><br>
				<table width="100%" border="1" cellpadding="5">
					<tr>
						<th width="1%" height="30px">Sl</th>
						
						<th>Student ID</th>
						<th>Name</th>
						<th>Dept.</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
			<?php
			$accounts = fetchOnHoldAccounts($conn);
			$i=0;
			if (count($accounts)==0) {
				echo "<tr><td colspan='8' align='center'>No account on hold..</td></tr>";
			}
			foreach ( $accounts as $account) {
				?>
					<tr>
						<td><?=++$i?></td>
						<td><?php
						if ($account['userType']=='teacher') {
							echo "Teacher";
						}elseif ($account['userType']=='student') {
							echo "Student";
						}
						?>
						</td>
						<td><?=$account['username']?></td>
						<td><?=$account['name']?></td>
						<td><?=$account['departmentId']?></td>
						<td><?=$account['email']?></td>
						<td><?=$account['mobile']?></td>
					<?php if ($account['userType']=='teacher') { ?>
						<td>[<a href="view_user.php?teacherId=<?=$account['userId']?>&type=inactive">View</a>] [<a href="../Controller/verify.php?userId=<?=$account['userId']?>">Verify</a>] [<a href="../Controller/delete_account.php?onholdId=<?=$account['userId']?>">Delete</a>]</td>
					<?php }else if($account['userType']=='student') {?>
						<td>[<a href="view_user.php?studentId=<?=$account['userId']?>&type=inactive">View</a>] [<a href="../Controller/verify.php?userId=<?=$account['userId']?>">Verify</a>] [<a href="../Controller/delete_account.php?onholdId=<?=$account['userId']?>">Delete</a>]</td>
					<?php } ?>
					</tr>
				<?php } ?>
				</table>
			</td>
		</tr>
		<tr>
			<td height="65px" bgcolor="dimgray" colspan="3">
				<center>Copyright &copy; Abu Zehad Foysal</center>
			</td>
		</tr>
	</table>

</body>
</html>