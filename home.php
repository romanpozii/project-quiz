<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>

<html>
	<head>
		<title>PHP-quiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>PHP-Quiz</h1>
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Witam w PHP-quiz !</h2>
				<p>Prosty quiz, który sprawdzi Twoją wiedzę!</p>
				<ul>
				    <li><strong>Liczba pytań: </strong><?php echo $total; ?></li>
				    <li><strong>Typ: </strong>Wielokrotny wybór</li>
				    <li><strong>Szacowany czas na każde pytanie: </strong><?php echo $total * 0.05 * 60; ?> sekund</li>
				     <li><strong>Wynik: </strong>   &nbsp; +1 punkt za każdą poprawną odpowiedź</li>
				</ul>
				<a href="question.php?n=1" class="start">Rozpocznij quiz</a>
				<a href="exit.php" class="add">Wyjście</a>

			</div>
		</main>

		<footer>
			<div class="container">
                            PHP QUIZ
			</div>
		</footer>

	</body>
</html>
<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>