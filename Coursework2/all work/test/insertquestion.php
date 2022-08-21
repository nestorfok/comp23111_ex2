<?php
  require_once('../test/config.php');
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Insert Question</title>
</head>
<body>
  <?php
    $errorMsg = "";
    if (isset($_POST['submit'])) {
      // code...
      $question = $_REQUEST['question'];
      $choice1 = $_REQUEST['choice1'];
      $choice2 = $_REQUEST['choice2'];
      $choice3 = $_REQUEST['choice3'];
      $choice4 = $_REQUEST['choice4'];
      $answer = $_REQUEST['answer'];
      if (!empty($question) and !empty($choice1) and !empty($choice2) and !empty($choice3) and 
        !empty($choice4) and !empty($answer)) {
        // code...
        if ((strcmp($choice1, $choice2)!=0) and (strcmp($choice1, $choice3)!=0) and 
        (strcmp($choice1, $choice4)!=0) and (strcmp($choice2, $choice3)!=0) and 
        (strcmp($choice2, $choice4)!=0) and (strcmp($choice3, $choice4)!=0)) {
        // check whether answer is 1 of the above
        if ((strcmp($answer, $choice1)==0) or (strcmp($answer, $choice2)==0) or 
          (strcmp($answer, $choice3)==0) or (strcmp($answer, $choice4)==0)) {
          // code...
          $quizid = intval($_SESSION['quizid']);
          $sql = "INSERT INTO question(content, quizID) VALUES ('$question', '$quizid')";
          if(mysqli_query($con, $sql)){
                $sql = "SELECT questionID from question WHERE quizID = '$quizid' ORDER BY questionID DESC LIMIT 1";
                $result = mysqli_query($con, $sql);
                $result = mysqli_fetch_array($result);
                $result = $result[0];
                if (strcmp($answer, $choice1)==0) {
                  // code...
                  $sql = "INSERT INTO choice (choiceContent, answer, questionID) 
                  VALUES ('$choice1', '1', '$result')";
                  mysqli_query($con, $sql);
                } else {
                  $sql = "INSERT INTO choice (choiceContent, answer, questionID) 
                  VALUES ('$choice1', '0', '$result')";
                  mysqli_query($con, $sql);
                }
                if (strcmp($answer, $choice2)==0) {
                  // code...
                  $sql = "INSERT INTO choice (choiceContent, answer, questionID) 
                  VALUES ('$choice2', '1', '$result')";
                  mysqli_query($con, $sql);
                } else {
                  $sql = "INSERT INTO choice (choiceContent, answer, questionID) 
                  VALUES ('$choice2', '0', '$result')";
                  mysqli_query($con, $sql);
                }
                if (strcmp($answer, $choice3)==0) {
                  // code...
                  $sql = "INSERT INTO choice (choiceContent, answer, questionID) 
                  VALUES ('$choice3', '1', '$result')";
                  mysqli_query($con, $sql);
                } else {
                  $sql = "INSERT INTO choice (choiceContent, answer, questionID) 
                  VALUES ('$choice3', '0', '$result')";
                  mysqli_query($con, $sql);
                }
                if (strcmp($answer, $choice4)==0) {
                  // code...
                  $sql = "INSERT INTO choice (choiceContent, answer, questionID) 
                  VALUES ('$choice4', '1', '$result')";
                  mysqli_query($con, $sql);
                } else {
                  $sql = "INSERT INTO choice (choiceContent, answer, questionID) 
                  VALUES ('$choice4', '0', '$result')";
                  mysqli_query($con, $sql);
                }
                $errorMsg = "Success!";
            } else {
                $errorMsg = "Fail";
            }
        } 
        else {
          $errorMsg = "answer should have the same value of 1 of the choice!!!";
        }
      } 
      else {
        $errorMsg = "All choice should be different!!!";
      }
    }
    else {
      $errorMsg = "All input should not be empty!!!";
    }
  }




  ?>
  <p><?php echo $_SESSION['quizid']?></p>
  <form method="post">
    <div>
      <label>Question: </label>
      <br>
      <input type="text" name="question">
    </div>
    <br>

    <div>
      <label>First choice</label>
      <br>
      <input type="text" name="choice1">
    </div>
    <br>

    <div>
      <label>Second choice</label>
      <br>
      <input type="text" name="choice2">
    </div>
    <br>

    <div>
      <label>Third choice</label>
      <br>
      <input type="text" name="choice3">
    </div>
    <br>

    <div>
      <label>Fourth choice</label>
      <br>
      <input type="text" name="choice4">
    </div>
    <br>

    <div>
      <label>Answer</label>
      <br>
      <input type="text" name="answer">
    </div>
    <br>

    <button type="submit" value="submit" name="submit" class="button login-button">Add Question</button>
  </form>
  <br>
  <div>
    <form action="staffHomePage.php" method="POST">
      <button type="submit" value="submit" name="back" class="button login-button">Back to Homepage
      </button>
    </form>
  </div>
  <p><?php echo $errorMsg;?></p>
</body>
</html>