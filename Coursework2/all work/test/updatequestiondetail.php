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
		$errorMsg = "";
		if (isset($_POST['submit'])) {
			// code...
			$hi = $_SESSION['questionupdate'];
			$newques = $_REQUEST['question'];
			if (!empty($newques)) {
				// code...
				$sql = "UPDATE question SET content ='$newques' WHERE questionID = '$hi'";
				if (mysqli_query($con, $sql)) {
					// code...
					$errorMsg = "Success!!!!";
				} else {
					$errorMsg = "Fail!!!!";
				}
			}
		}

	?>
	<p><?php echo $_SESSION['questionupdate']?></p>
  	<form method="post">
    <div>
	    <label>Question: </label>
	    <br>
	    <input type="text" name="question">
    </div>
    <br>
    <button type="submit" value="submit" name="submit" class="button login-button">Update Question</button>
  </form>
  <br>
  <div>
    <form action="updatequestion.php" method="POST">
      <button type="submit" value="submit" name="back" class="button login-button">Back
      </button>
    </form>
  </div>
  <p><?php echo $errorMsg;?></p>
</body>
</html>