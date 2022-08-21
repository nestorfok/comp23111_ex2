<?php
	require_once('../test/config.php');
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Quiz for single result
	</title>
</head>
<body>
	<p>Marks: <?php echo $_SESSION['correct']; ?>/<?php echo $_SESSION['noOfQuestion'];?><p>
	<br>
	<div>
        <form action="homepage.php" method="post">
            <button type="submit" value="" name="back">Back to Home Page</button>
        </form>
    </div>
</body>
</html>