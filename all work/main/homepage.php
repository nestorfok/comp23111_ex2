<?php 
	require_once('../test/config.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Homepage</title>
</head>
<body>
	<?php
        $success = "";
        $errorMsg = "";
        $sql = "SELECT * FROM quiz WHERE quizAvailable = '1'";
        $result = mysqli_query($con, $sql);
        echo '<p>Hi ' . $_SESSION['username'] . '</p>';
        if (isset($_POST['quiz'])) {
            $_SESSION['quizID'] = $_REQUEST['quiz'];
            $quid = intval($_SESSION['quizID']);
            $sql = "SELECT quizDuration FROM quiz WHERE quizID = $quid";
            $dura = mysqli_query($con, $sql);
            $duration = mysqli_fetch_array($dura);
            $stuid = intval($_SESSION['id']);
            $sql = "SELECT * FROM record WHERE studentID = $stuid AND quizID = $quid";
            $done = mysqli_query($con, $sql);
            $done = mysqli_num_rows($done);
            if ($done > 0) {
                $errorMsg = "You have token the quiz already!!!";
            } else {
                $errorMsg = "success";
                $_SESSION['duration'] = $duration['quizDuration'];
                header("location: quiz.php");
            }
        }
        if (isset($_POST['record'])) {
            header("location: record.php");
        }
        if (isset($_POST['logout'])) {
            session_destroy();
            header("location: firstpage.php");
        }
    ?>
    <p>Below are the quiz available</p>
    <form method="post">
    	<?php while ($row=mysqli_fetch_array($result)): ?>
    	<div>
    		<p>QuizID: <?php echo $row['quizID'];?><br>
    		   Quiz Name: <?php echo $row['quizName'];?><br>
    		   Quiz Author: <?php echo $row['quizAuthor'];?><br>
               Quiz Duration: <?php echo $row['quizDuration'];?><br>
    		   <button type="submit" value="<?php echo($row['quizID']);?>" name="quiz">Select</button>
    		</p>
    		<br>
    	</div>
    	<?php endwhile;?>
    </form>
    <div>
        <form method="post">
            <p>Click the button below to see the record!!!</p>
            <button type="submit" value="" name="record">Records</button>
        </form>
    </div>
    <br>
    <div>
        <form method="post">
            <button type="submit" value="" name="logout">Logout</button>
        </form>
    </div>
    <br>
    <div>
        <p><?php echo $errorMsg; ?></p>
    </div>
</body>
</html>