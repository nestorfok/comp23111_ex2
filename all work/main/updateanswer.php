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
		$errorMsg2 = "";
		$hi = intval($_SESSION['answerupdate']);
		$sql = "SELECT * FROM choice WHERE questionID = '$hi'";
		$choices = mysqli_query($con, $sql);
		if (isset($_POST['updateanswer'])){
			$updatedanswer = $_REQUEST['answer'];
			if (empty($updatedanswer)) {
				$errorMsg = "Answer should not be empty!!!";
			} else {
				echo $answerid;
				$x = 0;
				$find = 0;
				//$abc = array();
				//$abcd = array();
				$sql = "SELECT * FROM choice WHERE questionID = '$hi'";
				$result = mysqli_query($con, $sql);
				while ($resull = mysqli_fetch_array($result)){
					if (strcmp($resull['choiceContent'], $updatedanswer)==0){
						$storeid = $resull['choiceID'];
						$find = 1;
					}
					if (strcmp($resull['answer'], '1')==0){
						$answerid = $resull['choiceID'];
						$answercontent = $resull['choiceContent'];
					}
					//array_push($abc, $resull['choiceID']);
					//array_push($abcd, $resull['choiceContent'])
					$x++;
				}
				if ($find==1) {
					$sql = "UPDATE choice SET answer='0' WHERE choiceID='$answerid'";
					if (mysqli_query($con, $sql)) {
						$errorMsg = "successfully change non answer!";
					} else {
						$errorMsg = "fail to change non answer!";
					}
					$sql = "UPDATE choice SET answer='1' WHERE choiceID='$storeid'";
					if (mysqli_query($con, $sql)) {
						$errorMsg2 = "successfully update answer!";
					} else {
						$errorMsg2 = "fail to update answer!";
					}
				} else {
					$errorMsg = "cant find answer";
				}
				$sql = "SELECT * FROM choice WHERE questionID = '$hi'";
				$choices = mysqli_query($con, $sql);

			}
		}
	?>
	<form method="post">
		<div>
			<label><?php echo $_SESSION['answerupdate']?>: <?php echo $_SESSION['content'];?></label>
		</div>  
		<div>
			<ul>
			<?php
				while ($rows = mysqli_fetch_array($choices)):
			?>
				<li>
					<?php echo $rows['choiceContent'];?>
				</li>

			<?php
				if (strcmp($rows['answer'], '1')==0){
					$answerid = $rows['choiceID'];
					$answercontent = $rows['choiceContent'];
				}
				endwhile;
			?>
			</ul>
			<div>
				<label>Original Answer:</label>
				<br>
				<label><?php echo $answercontent;?></label>
		    </div>
		    <br>
			<div>
				<label>New Answer:</label>
				<br>
				<input type="text" name="answer">
		    </div>
		    <br>
			<button type="submit" value="" name="updateanswer">Update Answer</button>
		</div>
	</form>
	<br>
	<div>
		<form action="updatequestion.php" method="POST">
			<button type="submit" value="" name="back">Back</button>
		</form>
	</div>
	<p><?php echo $errorMsg;?></p>
	<p><?php echo $errorMsg2;?></p>
</body>
</html>