<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
	$question = htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);


    $checkqsn = "SELECT * FROM questions";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO questions(qno, question , ans1, ans2, ans3, ans4, correct_answer) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Pytanie zostało dodane'); </script> " ;
	}
	else {
		"<script>alert('Wystąpił błąd, spróbuj ponownie'); </script> " ;
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
				<a href="index.php" class="start">Strona Główna</a>
				<a href="add.php" class="start">Dodaj pytanie</a>
				<a href="allquestions.php" class="start">Wszystkie pytania</a>
				<a href="players.php" class="start">Gracze</a>
				<a href="exit.php" class="start">Wyłoguj się</a>
				
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Dodaj pytanie...</h2>
				<form method="post" action="">

					<p>
						<label>Pytanie</label>
						<input type="text" name="question" required="">
					</p>
					<p>
						<label>Wariant #1</label>
						<input type="text" name="choice1" required="">
					</p>
					<p>
						<label>Wariant #2</label>
						<input type="text" name="choice2" required="">
					</p>
					<p>
						<label>Wariant #3</label>
						<input type="text" name="choice3" required="">
					</p>
					<p>
						<label>Wariant #4</label>
						<input type="text" name="choice4" required="">
					</p>
					<p>
						<label>Prawidłowa odpowiedź</label>
						<select name="answer">
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