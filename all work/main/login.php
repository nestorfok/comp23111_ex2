<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <title>Login</title>
</head>
<body>
<?php
	require_once('../test/config.php');
	session_start();
	$username = "";
	$password = "";
	$success = "";
	if (isset($_POST['username'])){
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		// Check user is exist in the database
		$sql = "SELECT * FROM student WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($con, $sql);
        //$result = db_query("SELECT studentID FROM student WHERE username='$username' ");
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
        	$row = mysqli_fetch_row($result);
            $_SESSION['id'] = $row[0];
            $_SESSION['username'] = $username;
            $success = "success";
            //echo $_SESSION['username'];
        	header("location: homepage.php");
        }
        else {
        	$success = "Wrong username/password!!!";
        }
	}
?>
	<div>
        <form method="post" name="login">
            <h1 class="login-title">Welcome User!</h1>
            <div>
            	<input type="text" class="login-input" name="username" placeholder="Username" autofocus="true">
            </div>
            <br>
            <div>
            	<input type="password" class="login-input" name="password" placeholder="Password"/>
            </div>
            <br>
            <div>
            	<button type="submit" value="Login" name="submit" class="button login-button">Login</button>
        	</div>
        </form>
    </div>
    <br>
    <div>
        <form action="firstpage.php" method="post">
            <button type="submit" value="" name="back">Back to Home Page</button>
        </form>
    </div>
    <p><?php echo $success; ?></p>

</body>
</html>