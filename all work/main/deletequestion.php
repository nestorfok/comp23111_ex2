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
		$viewid = intval($_SESSION['view']);
		$sql = "SELECT * FROM question WHERE quizID = '$viewid'";
		$result = mysqli_query($con, $sql);
		if (isset($_POST['view'])) {
			// code...
			$deletequestion = $_REQUEST['view'];
			// delete choice
        	$sql = "DELETE FROM choice WHERE questionID = '$deletequestion'";
        	if(mysqli_query($con, $sql)){
                $errorMsg = "Success!";
            } else {
                $errorMsg = "Fail to delete from choice";
            }
        	// delete question
        	$sql = "DELETE FROM question WHERE questionID = '$deletequestion'";
        	if(mysqli_query($con, $sql)){
                $errorMsg = "Success!";
            } else {
                $errorMsg = "Fail to delete from question";
            }
            $sql = "SELECT * FROM question WHERE quizID = '$viewid'";
			$result = mysqli_query($con, $sql);
		}
	?>
	<form method="post">
		<?php
			while ($row = mysqli_fetch_array($result)):
		?>  
			<div>
				<p>
					<?php echo $row['content'];?>
				</p>
				<ul>
				<?php
					$questionNo = $row['questionID'];
					$sql = "SELECT * FROM choice WHERE questionID = $questionNo";
					$choices = mysqli_query($con, $sql);
					while ($rows = mysqli_fetch_array($choices)):
				?>
					<li>
						<?php echo $rows['choiceContent'];?>
					</li>
				<?php endwhile;?>
				</ul>
				<button type="submit" value="<?php echo($row['questionID']);?>" name="view">
				Delete</button>
			</div>

		<?php
			endwhile;
		?>
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