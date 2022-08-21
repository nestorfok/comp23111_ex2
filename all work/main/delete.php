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
        if (isset($_POST['delete'])) {
        	// code...
        	$deleteid = $_REQUEST['delete'];
        	$deleteid = intval($deleteid);
        	// delete record
        	$sql = "DELETE FROM record WHERE quizID = '$deleteid'";
        	if(mysqli_query($con, $sql)){
                echo "Success!";
            } else {
                echo "Fail";
            }
        	// delete choice
        	$sql = "SELECT * FROM question WHERE quizID = '$deleteid'";
        	$result = mysqli_query($con, $sql);
        	while ($row = mysqli_fetch_array($result)){
        		echo "gi";
        		$deletequestionid = $row['questionID'];
        		echo $deletequestionid;
        		$sql = "DELETE FROM choice WHERE questionID = '$deletequestionid'";
	        	if(mysqli_query($con, $sql)){
	                echo "Success!";
	            } else {
	                echo "Fail";
	            }
        	}
        	//echo $deleteid;
        	// delete question
            $sql = "DELETE FROM question WHERE quizID = '$deleteid'";
        	if(mysqli_query($con, $sql)){
                echo "Success!";
            } else {
                echo "Fail";
            }
            //echo $deleteid;
            // delete quiz
            $sql = "DELETE FROM quiz WHERE quizID = '$deleteid'";
            echo "hi";
        	if(mysqli_query($con, $sql)){
                echo "Success!";
            } else {
                echo "Fail";
            }
        	$sql = "SELECT * FROM quiz";
        	$result = mysqli_query($con, $sql);
        	
        }
        if (isset($_POST['view'])) {
        	// code...
        	$_SESSION['view'] = $_REQUEST['view'];
        	header("location: deletequestion.php");
        }
	?>
	<p>Below are the quiz available to delete</p>
    <form method="post">
    	<?php while ($row=mysqli_fetch_array($result)): ?>
    	<div>
    		<p>QuizID: <?php echo $row['quizID'];?><br>
    		   Quiz Name: <?php echo $row['quizName'];?><br>
    		   Quiz Author: <?php echo $row['quizAuthor'];?><br>
               Quiz Duration: <?php echo $row['quizDuration'];?><br>
    		   <button type="submit" value="<?php echo($row['quizID']);?>" name="delete">Delete Quiz</button>
    		   <button type="submit" value="<?php echo($row['quizID']);?>" name="view">
    		   View to Delete Question</button>
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