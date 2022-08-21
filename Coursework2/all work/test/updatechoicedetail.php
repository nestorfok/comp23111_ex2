<?php
	require_once('../test/config.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Choice</title>
</head>
<body>
	<?php
		$errorMsg = "";
		$text1 = "";
		$text2 = "";
		$text3 = "";
		$text4 = "";
		$hi = intval($_SESSION['choiceupdate']);
		$sql = "SELECT * FROM choice WHERE questionID = '$hi'";
		$result = mysqli_query($con, $sql);
		$choices = array();
		$choicesss = array();
		while($row = mysqli_fetch_array($result)){
			array_push($choices, $row['choiceID']);
			array_push($choicesss, $row['choiceContent']);
		}
		if (isset($_POST['submit'])) {
			// code...
			$choice1 = $_REQUEST['choice1'];
			$choice2 = $_REQUEST['choice2'];
			$choice3 = $_REQUEST['choice3'];
			$choice4 = $_REQUEST['choice4'];
			$x = 0;
			if (((empty($choice1) and empty($choice2))or(strcmp($choice1, $choice2)!=0)) and
				((empty($choice1) and empty($choice3))or(strcmp($choice1, $choice3)!=0)) and
				((empty($choice1) and empty($choice4))or(strcmp($choice1, $choice4)!=0)) and 
				((empty($choice2) and empty($choice3))or(strcmp($choice2, $choice3)!=0)) and 
				((empty($choice2) and empty($choice4))or(strcmp($choice2, $choice4)!=0)) and 
				((empty($choice3) and empty($choice4))or(strcmp($choice3, $choice4)!=0))){
				if ($x==0) {
				// code...
					if (!empty($choice1)) {
						$repeated = 0;
						// check if repeat
						foreach ($choicesss as $key) {
							if (strcmp($choice1, $key)==0) {
								$repeated = 1;
							}
						}
						if ($repeated == 0) {
							$sql = "UPDATE choice SET choiceContent='$choice1' WHERE choiceID='$choices[$x]'";
							if (mysqli_query($con, $sql)) {
								$text1 = "successfully update choice 1!";
							} else {
								$text1 = "fail to update choice 1!";
							}
						} else {
							$errorMsg = "repeated value!!!";
						}
					}
					$x ++;
				}

				if ($x==1) {
					if (!empty($choice2)) {
						$repeated = 0;
						// check if repeat
						foreach ($choicesss as $key) {
							if (strcmp($choice2, $key)==0) {
								$repeated = 1;
							}
						}
						if ($repeated == 0) {
							$sql = "UPDATE choice SET choiceContent='$choice2' WHERE choiceID='$choices[$x]'";
							if (mysqli_query($con, $sql)) {
								$text2 = "successfully update choice 2!";
							} else {
								$text2 = "fail to update choice 2!";
							}
						} else {
							$errorMsg = "repeated value!!!";
						}
					}
					$x ++;
				}
				if ($x==2) {
					if (!empty($choice3)) {
						$repeated = 0;
						// check if repeat
						foreach ($choicesss as $key) {
							if (strcmp($choice3, $key)==0) {
								$repeated = 1;
							}
						}
						if ($repeated == 0) {
							$sql = "UPDATE choice SET choiceContent='$choice3' WHERE choiceID='$choices[$x]'";
							if (mysqli_query($con, $sql)) {
								$text3 = "successfully update choice 3!";
							} else {
								$text3 = "fail to update choice 3!";
							}
						} else {
							$errorMsg = "repeated value!!!";
						}
					}
					$x ++;
				}
				if ($x==3) {
					if (!empty($choice4)) {
						$repeated = 0;
						// check if repeat
						foreach ($choicesss as $key) {
							if (strcmp($choice4, $key)==0) {
								$repeated = 1;
							}
						}
						if ($repeated == 0) {
							$sql = "UPDATE choice SET choiceContent='$choice4' WHERE choiceID='$choices[$x]'";
							if (mysqli_query($con, $sql)) {
								$text4 = "successfully update choice 4!";
							} else {
								$text4 = "fail to update choice 4!";
							}
						} else {
							$errorMsg = "repeated value!!!";
						}
					}
					$x ++;
				}
	        } else {
	        	$errorMsg = "There are repeated input!!!!!!";
	        }
	        $sql = "SELECT * FROM choice WHERE questionID = '$hi'";
			$result = mysqli_query($con, $sql);
			$choices = array();
			$choicesss = array();
			while($row = mysqli_fetch_array($result)){
				array_push($choices, $row['choiceID']);
				array_push($choicesss, $row['choiceContent']);
			}	
		}

	?>
	<form method="post">
		<div>
			<label><?php echo $_SESSION['choiceupdate']?>: <?php echo $_SESSION['content'];?></label>
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

		<button type="submit" value="submit" name="submit" class="button login-button">Update Choice</button>
	</form>
	<br>
	<div>
		<form action="updatequestion.php" method="POST">
			<button type="submit" value="submit" name="back" class="button login-button">Back</button>
		</form>
	</div>
	<p><?php echo $text1;?></p>
	<p><?php echo $text2;?></p>
	<p><?php echo $text3;?></p>
	<p><?php echo $text4;?></p>
	<p><?php echo $errorMsg;?></p>
</body>
</html>