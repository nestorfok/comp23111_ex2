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
		$updateid = intval($_SESSION['updateid']);
		$sql = "SELECT * FROM question WHERE quizID = '$updateid'";
		$result = mysqli_query($con, $sql);
		if (isset($_POST['update'])) {
			// code...
			$_SESSION['questionupdate'] = $_REQUEST['update'];
			header("location: updatequestiondetail.php");
		}

		if (isset($_POST['updatechoice'])) {
			// code...
			$_SESSION['choiceupdate'] = $_REQUEST['updatechoice'];
			$hi = intval($_SESSION['choiceupdate']);
			$sql = "SELECT content FROM question WHERE questionID = '$hi'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$_SESSION['content'] = $row[0];
			header("location: updatechoicedetail.php");
		}

		if (isset($_POST['updateanswer'])) {
			$_SESSION['answerupdate'] = $_REQUEST['updateanswer'];
			$hi = intval($_SESSION['answerupdate']);
			$sql = "SELECT content FROM question WHERE questionID = '$hi'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$_SESSION['content'] = $row[0];
			header("location: updateanswer.php");
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
				<div>
					<button type="submit" value="<?php echo($row['questionID']);?>" name="update">
					Update Question</button>
				</div>
				<br>
				<div>
					<button type="submit" value="<?php echo($row['questionID']);?>" name="updatechoice">
					Update Choice</button>
				</div>
				<br>
				<div>
					<button type="submit" value="<?php echo($row['questionID']);?>" name="updateanswer">
					Update Answer</button>
				</div>
				<p>_________________________________________________</p>
			<div>

		<?php
			endwhile;
		?>
	</form>
	<br>
	<form action="update.php", method="post">
		<div>
			<button type="submit" value="" name="back">
			Back</button>
		</div>
	</form>
</body>
</html>