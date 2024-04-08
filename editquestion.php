<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
	?>



<?php 
if (isset($_GET['qno'])) {
	$qno = mysqli_real_escape_string($conn , $_GET['qno']);
	if (is_numeric($qno)) {
		$query = "SELECT * FROM questions WHERE qno = '$qno' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_array($run)) {
				 $qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
			}
		}
		else {
			echo "<script> alert('błąd');
			window.location.href = 'allquestions.php'; </script>" ;
		}
	}
	else {
		header("location: allquestions.php");
	}
}

?>
<?php 
if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);
    

	$query = "UPDATE questions SET question = '$question' , ans1 = '$choice1' , ans2= '$choice2' , ans3 = '$choice3' , ans4 = '$choice4' , correct_answer = '$correct_answer' WHERE qno = '$qno' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Pytanie zostało zaktualizowane');
		window.location.href= 'allquestions.php'; </script> " ;
	}
	else {
		"<script>alert('błąd, spróbuj ponownie!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>PHP-Quiz</h1>
				<a href="index.php" class="start">Strona główna</a>
				<a href="add.php" class="start">Dodaj pytanie</a>
				<a href="allquestions.php" class="start">Wszystkie pytania</a>
				<a href="exit.php" class="start">Wyłoguj się</a>
				
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Dodaj pytanie...</h2>
				<form method="post" action="">

					<p>
						<label>Pytanie</label>
						<input type="text" name="question" required="" value="<?php echo $question; ?>">
					</p>
					<p>
						<label>Wariant #1</label>
						<input type="text" name="choice1" required="" value="<?php echo $ans1; ?>">
					</p>
					<p>
						<label>Wariant #2</label>
						<input type="text" name="choice2" required="" value="<?php echo $ans2; ?>">
					</p>
					<p>
						<label>Wariant #3</label>
						<input type="text" name="choice3" required="" value="<?php echo $ans3; ?>">
					</p>
					<p>
						<label>Wariant #4</label>
						<input type="text" name="choice4" required="" value="<?php echo $ans4; ?>">
					</p>
					<p>
						<label>Prawidłowa odpowiedź</label>
						<select name="answer" >
                        <option value="a">Wariant #1 </option>
                        <option value="b">Wariant #2</option>
                        <option value="c">Wariant #3</option>
                        <option value="d">Wariant #4</option>
                    </select>
					</p>
					<p>
						
						<input type="submit" name="submit" value="Potwierdź">
					</p>
				</form>
			</div>
		</main>

		

	</body>
</html>








<?php } 
else {
	header("location: admin.php");
}
?>