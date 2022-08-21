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
		$sql = "SELECT * FROM quiz";
        $result = mysqli_query($con, $sql);
        if (isset($_POST['add'])) {
        	// code...
        	$_SESSION['quizid'] = $_REQUEST['add'];
        	header("location: insertquestion.php");
        }
        if (isset($_POST['updatequiz'])) {
        	// code...
        	$_SESSION['updateid'] = $_REQUEST['updatequiz'];
        	header("location: updatequiz.php");
        }
        if (isset($_POST['updatequestion'])) {
        	// code...
        	$_SESSION['updateid'] = $_REQUEST['updatequestion'];
        	header("location: updatequestion.php");
        }
	?>
	<form method="post">
    	<?php while ($row=mysqli_fetch_array($result)): ?>
    	<div>
    		<p>QuizID: <?php echo $row['quizID'];?><br>
    		   Quiz Name: <?php echo $row['quizName'];?><br>
    		   Quiz Author: <?php echo $row['quizAuthor'];?><br>
               Quiz Duration: <?php echo $row['quizDuration'];?><br>
               <button type="submit" value="<?php echo($row['quizID']);?>" name="updatequiz">
    		   Click to Update Quiz</button>
    		   <button type="submit" value="<?php echo($row['quizID']);?>" name="updatequestion">
    		   Click to Update Question</button>
    		   <button type="submit" value="<?php echo($row['quizID']);?>" name="add">
    		   Click to Add Question</button>
    		</p>
    		<br>
    	</div>
    	<?php endwhile;?>
    </form>
    <br>
	  <div>
	    <form action="staffHomePage.php" method="post">
	        <button type="submit" value="" name="back">Back to Home Page</button>
	    </form>
	  </div>
	<br>
</body>
</html>