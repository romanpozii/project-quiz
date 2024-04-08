<?php 
session_start();
if (isset($_SESSION['admin'])) {
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
				<h1>PHP-quiz</h1>
				<a href="index.php" class="start">Strona Główna</a>
				<a href="add.php" class="start">Dodaj pytanie</a>
				<a href="allquestions.php" class="start">Wszystkie pytania</a>
				<a href="players.php" class="start">Gracze</a>
				<a href="exit.php" class="start">Wyłoguj się</a>

			</div>
		</header>

		<main>
			<div class="container">
				<h2>Witam ponownie, Admin</h2>
				</div>
				</main>
				</body>
				</html>

<?php } 
    else {
    header("location: admin.php");
    }
?>