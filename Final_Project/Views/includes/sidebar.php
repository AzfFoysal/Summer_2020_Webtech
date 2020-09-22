<?php if($_SESSION['userType']=='teacher'){?>
				<ul id="sideBar">
					<li>
						<a href="profile.php">My Profile</a>
					</li>
					<li>
						<a href="create_notice.php">Create Notice</a>
					</li>
					<li>
						<a href="add_file.php">Upload File</a>
					</li>
					<li>
						<a href="contact_admin.php">Contact Admin</a>
					</li>
					<li>
						<a href="students_list.php">Students List</a>
					</li>
					<li>
						<a href="students_grade.php">Students Grade</a>
					</li>
					
					
					<li>
						<a href="drop_application.php">Accept/Reject Drop Application</a>
					</li>
					<li>
						<a href="make_student_result.php">Make Student Result</a>
					</li>
					<li>
						<a href="add_tsf.php">Upload TSF</a>
					</li>
					<li>
						<a href="salary_details.php">Salary Details</a>
					</li>
					<li>
						<a href="leave_application.php">Create Leave Application</a>
					</li>
					
					
					<li>
						<a href="edit_profile.php">Change Password</a>
					</li>
					
				</ul>
			<?php } ?>
