<?php
	require_once('../test/config.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quiz</title>
</head>
<body>
	<?php
		$correct = 0;
		$hi = intval($_SESSION['quizID']);
		$sql = "SELECT questionID, content FROM question WHERE quizID = $hi";
		$result = mysqli_query($con, $sql);
		$noOfQuestion = mysqli_num_rows($result);;
		if (isset($_POST['submit'])){
            if(!empty($_POST['choices'])){
            	$count = count($_POST['choices']);
            	$select = $_POST['choices'];
            	foreach ($select as $key) {
            		$sql = "SELECT answer FROM choice WHERE choiceID = $key";
            		$checking = mysqli_query($con, $sql);
            		$checkAns = mysqli_fetch_array($checking);
            		if ($checkAns[0] == 1) {
            			$correct ++;
            		}
            	}
            }
            $userID = intval($_SESSION['id']);
            $quizID = intval($_SESSION['quizID']);
            $grade = $correct . "/" . $noOfQuestion;
            $date = date("Y-m-d");
			$date=date("Y-m-d",strtotime($date));
            $sql = "INSERT INTO record (studentID, quizID, dateOfAttempt, grade) VALUES ('$userID', '$quizID', '$date', '$correct')";
            if(mysqli_query($con, $sql)){
                $success = "Success!";
            } else {
                $success = "Fail";
            }
            echo $success;
            $_SESSION['noOfQuestion'] = $noOfQuestion;
            $_SESSION['correct'] = $correct;
            header("location: singleResult.php");
        }
	?>
	<p>The quiz last for <?php echo $_SESSION['duration'];?> mins</p>
	<form method="post">
		<?php
			while ($row = mysqli_fetch_array($result)):
		?>  
			<div>
				<p>
					<?php echo $row['content'];?>
				</p>
				<ul style="list-style: none;">
				<?php
					$questionNo = $row['questionID'];
					$sql = "SELECT * FROM choice WHERE questionID = $questionNo";
					$choices = mysqli_query($con, $sql);
					while ($rows = mysqli_fetch_array($choices)):
				?>
					<li>
						<input type="radio" name="choices[<?php echo $row['questionID'];?>]" value="<?php echo $rows['choiceID']; ?>" />
						<?php echo $rows['choiceContent'];?>
					</li>
				<?php endwhile;?>
				</ul>
			<div>

		<?php
			endwhile;
		?>
		<input type="submit" name="submit" value="submit"/>
	</form>
</body>
</html>