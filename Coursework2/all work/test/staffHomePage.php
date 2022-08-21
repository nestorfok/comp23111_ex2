<?php
	require_once('../test/config.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
		if (isset($_POST['logout'])) {
        session_destroy();
        header("location: firstpage.php");
	   }
   ?>
	<p>Welcome Staff <?php echo $_SESSION['staffusername'];?></p>
	<p>Welcome Staff <?php echo $_SESSION['staffid'];?></p>
	<p>Welcome Staff <?php echo $_SESSION['staffName'];?></p>
	<form action="insertquiz.php" method="POST">
       <button type="submit" value="Login" name="submit" class="button login-button">Create a quiz!</button>
     </form>
     <br>
     <form action="update.php" method="POST">
       <button type="submit" value="Login" name="submit" class="button login-button">Update a quiz!</button>
     </form>
     <br>
     <form action="delete.php" method="POST">
       <button type="submit" value="Login" name="submit" class="button login-button">Delete a quiz/question!</button>
     </form>
     <br>
     <div>
        <form method="post">
            <button type="submit" value="" name="logout">Logout</button>
        </form>
    </div>
    <br>
</body>
</html>