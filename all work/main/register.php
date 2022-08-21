<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register Page</title>
</head>
<body>
<?php
	require_once('../test/config.php');
	$username = "";
	$password = "";
	$name = "";
	$errorMsg = "";
	if (isset($_POST['backtohome'])) {
		// code...
		header("location: firstpage.php");
	}
	if (isset($_REQUEST['username'])) {
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$name = $_REQUEST['name'];
		// Check password
		if (strlen($password) < 8) {
			$errorMsg = "The password must be at least 8 characters long!";
		} 
		elseif(empty($username)){
			$errorMsg = "The username should not be empty!";
		}
		elseif (!empty($username)) {
			$sql = "SELECT username FROM student WHERE username='$username'";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) > 0){
				$errorMsg = "The username has been used!";
			} else {
				$sql = "INSERT into student (username, password, studentName) VALUES ('$username', '$password', '$name')";
				if(mysqli_query($con, $sql)){
					$errorMsg = "Success!";
				} else {
					$errorMsg = "Fail";
				}
			}
		}
	}

?>
	<form class="form-register" id="form" action="" method="post">
        <h1>Registration</h1>
        <div>
        	<input type="text" name="username" placeholder="Username"/>
        </div>
        <br>
        <div>
        	<input type="text" name="password" placeholder="Password"/>
    	</div>
        <br>
        <div>
        	<input type="text" name="name" placeholder="Name"/>
    	</div>
        <br>
        <div>
        	<input type="submit" name="submit" value="Register" class="button register-button">
    	</div>
    </form>
    <br>
    <div>
    	<form method="post">
    		<button type="submit" value="" name="backtohome">Back to home</button>
    	</form>
    </div>
    <p><?php echo $errorMsg; ?></p>
</body>
</html>