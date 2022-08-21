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
		if (isset($_POST['submit'])) {
			// code...
			$test1 = "";
			$test2 = "";
			$test3 = "";
			$updateid = intval($_SESSION['updateid']);
			$quizName = $_REQUEST['quizName'];
			$quizDuration = intval($_REQUEST['quizDuration']);
			$quizAvailable = $_REQUEST['available'];
			if (!empty($quizName)){
				$sql = "UPDATE quiz SET quizName ='$quizName' WHERE quizID = '$updateid'";
				mysqli_query($con, $sql);
				$test1 = "Success in updating quiz name";

			}
			if (!empty($quizDuration) and ($quizDuration!=0)) {
				// code...
				$sql = "UPDATE quiz SET quizDuration ='$quizDuration' WHERE quizID = '$updateid'";
				mysqli_query($con, $sql);
				$test2 = "Success in updating quiz duration";
			}
			if (!empty($quizAvailable)) {
				// code...
				$sql = "UPDATE quiz SET quizAvailable ='$quizAvailable' WHERE quizID = '$updateid'";
				mysqli_query($con, $sql);
				$test3 = "Success in updating quiz available";
			}

		}
	?>
	<form method="post">
    <div>
      <label>Quiz Name: </label>
      <br>
      <input type="text" name="quizName">
    </div>
    <br>
    <div>
      <label>Quiz Duration(in mins): </label>
      <br>
      <input type="text" name="quizDuration">
    </div>
    <br>
    <div>
      <label>Is this quiz available to user?</label>
        <ul style="list-style: none;">
          <li>
            <input type="radio" name="available" value="1" />
            Yes
          </li>
          <li>
            <input type="radio" name="available" value="0" />
            No
          </li>
        </ul>
    </div>
    <button type="submit" value="Login" name="submit" class="button login-button">Submit</button>
  </form>
  <br>
  <div>
    <form action="staffHomePage.php" method="post">
        <button type="submit" value="" name="back">Back to Home Page</button>
    </form>
  </div>
  <br>
  <p><?php echo $test1;?></p>
  <p><?php echo $test2;?></p>
  <p><?php echo $test3;?></p>
</body>
</html>