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
      $quizName = $_REQUEST['quizName'];
      $quizDuration = $_REQUEST['quizDuration'];
      $quizDuration = intval($quizDuration);
      $quizAvailable = $_REQUEST['available'];
      $staffName = $_SESSION['staffName'];
      if (empty($quizName) or empty($quizDuration) or empty($quizAvailable)){
        $errorMsg = "ALL input must not be empty!!!";
      } else {
        if (($quizDuration != 0) and ($quizDuration>10)) {
          $staffid = intval($_SESSION['staffid']);
          $sql = "INSERT INTO quiz(quizName, quizAuthor, quizAvailable, quizDuration, staffID) 
          VALUES ('$quizName', '$staffName', '$quizAvailable', '$quizDuration', '$staffid')";
          if(mysqli_query($con, $sql)){
                $sql = "SELECT quizID from quiz WHERE staffID = '$staffid' ORDER BY quizID DESC LIMIT 1";
                $result = mysqli_query($con, $sql);
                $result = mysqli_fetch_array($result);
                $_SESSION['quizid'] = $result[0];
                echo $_SESSION['quizid'];
                $errorMsg = "Success!";
                header("location: insertquestion.php");
            } else {
                $errorMsg = "Fail";
            }
        } else {
          $errorMsg = "Quiz Duration should be integer and larger than 10 minutes!!!";
        }
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
  <p><?php echo $errorMsg;?></p>
</body>
</html>