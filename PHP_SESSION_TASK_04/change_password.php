<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['status'])) {
    header('location:login.php');
    exit();
}
$error=$success="";
if (isset($_POST['save'])) {
    if (empty($_POST['currentPass']) || empty($_POST['password']) || empty($_POST['password2'])) {
        $error = "Required field is empty!";
    }elseif ($_POST['currentPass']!=$_COOKIE['password']) {
        $error = "Current Password is wrong!";
    }
    elseif ($_POST['password']!=$_POST['password2']) {
        $error = "New password and confirm password not matched!";
    }else{
        $_SESSION['password'] = $_POST['password'];
        setcookie('password', $_POST['password'], time() + (86400 * 30), "/");
        $success = "Password Changed Successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Abu Zehad Foysal</title>
</head>
<body>
    <br><br>
    <center><?php if(!empty($error))echo $error; if(!empty($success)) echo $success; ?></center>
    <br>
    <form action="" method="post">
    <table border="1" align="center" width="60%">
        <tr>
            <td align="center">
                <h3>X Company</h3>

            </td>
            <td align="right">
                Logged in as <a href="profile.php"><?=$_COOKIE['name']?></a> | <a href="logout.php">Logout</a>
            </td>
        </tr>
        <tr height="150px">
            <td>
                <h3>Account</h3><hr>
             <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">View Profile</a></li>
                <li><a href="edit_profile.php">Edit Profile</a></li>
                <li><a href="picture.php">Change Profile Picture</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
             </ul>
            </td>
            <td>
                <fieldset>
                    <legend><b>CHANGE PASSWORD</b></legend>
                    <form>
                        <table>
                            <tr>
                                <td><font size="3">Current Password</font></td>
                                <td>:</td>
                                <td><input type="password" name="currentPass" /></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><font size="3" color="green">New Password</font></td>
                                <td>:</td>
                                <td><input type="password" name="password" /></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><font size="3" color="red">Retype New Password</font></td>
                                <td>:</td>
                                <td><input type="password" name="password2" /></td>
                                <td></td>
                            </tr>
                        </table>
                        <hr />
                        <input type="submit" value="Submit" name="save" />
                    </form>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <center>Copyright &copy; Abu Zehad Foysal</center>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
