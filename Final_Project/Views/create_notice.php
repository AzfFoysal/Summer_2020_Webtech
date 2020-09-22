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
	<title>Create Notice</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Create Notice
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
				<form action="../Controller/noticeCrud.php" method="post">
					<table width="100%" cellpadding="6" cellspacing="3">
						<tr>
							<td>
								Select Course
							</td>
							<td>
								<select name="department" onchange="getTeacherList(this.value)">
									<option value="-1">Select Course</option>
								<?php
									foreach (fetchDepartments($conn) as $value) {
								?>
									<option value="<?=$value['id']?>"><?=$value['departmentName']?></option>
								<?php } ?>
								</select>
							</td>
							<td>
								Select Section
							</td>
							<td>
								<select name="section" id="section">
									<option disabled="" selected="">Nothing to show</option>
								</select>
							</td>
							
						</tr>
						<tr>
							<td>
								Notice Subject
							</td>
							<td colspan="3">
								<input type="text" name="noticeSubject" size="78">
							</td>
						</tr>
						<tr>
							<td>
								Details
							</td>
							<td colspan="3">
								<textarea cols="80" rows="5" name="noticeDetails" placeholder="Write a notice ..."></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="6" align="right"><hr>
								<input type="submit" name="createNotice" value="Create Notice" >
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
		<tr>
			<td height="65px" bgcolor="dimgray" colspan="3">
				<center>Copyright &copy; Abu Zehad Foysal</center>
			</td>
		</tr>
	</table>

<script type="text/javascript">
	function getTeacherList(deptId) {
		var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	        document.getElementById("facultyMember").innerHTML = this.responseText;
	      }
	    };
	    xmlhttp.open("GET", "../Controller/fetchTeacher.php?deptId=" + deptId, true);
	    xmlhttp.send();
	}
</script>
</body>
</html>