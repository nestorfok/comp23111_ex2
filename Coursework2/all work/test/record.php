<?php
	require_once('../test/config.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Record</title>
</head>
<body>
	<p>Below are the records</p>
	<?php
		$userid = intval($_SESSION['id']);
		$sql = "SELECT * FROM record WHERE studentID = $userid";
		$result = mysqli_query($con, $sql);
		echo "<table border='1'>
		<tr>
			<th>QuizID</th>
			<th>Date Of Attempt</th>
			<th>Grade</th>
		</tr>";
		while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['quizID'] . "</td>";
		echo "<td>" . $row['dateOfAttempt'] . "</td>";
		echo "<td>" . $row['grade'] . "</td>";
		echo "</tr>";
		}
		echo "</table>";
	?>
	<br>
	<div>
        <form action="homepage.php" method="post">
            <button type="submit" value="" name="back">Back to Home Page</button>
        </form>
    </div>
</body>
</html>