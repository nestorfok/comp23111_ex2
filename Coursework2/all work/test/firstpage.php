<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <title>Front Page</title>
</head>
<body>
    <h1>Welcome to Quiz Online!</h1>
	   <form action="login.php" method="POST">
       <label>User Login: </label>
       <br>
       <button type="submit" value="Login" name="login" class="button login-button">Login</button>
     </form>
     <br>
     <form action="register.php" method="POST">
       <label>User Register: </label>
       <br>
       <button type="submit" value="Login" name="register" class="button login-button">Register</button>
     </form>
     <br>
     <form action="stafflogin.php" method="POST">
       <label>Staff Login: </label>
       <br>
       <button type="submit" value="Login" name="stafflogin" class="button login-button">Staff Login</button>
     </form>
</body>
</html>