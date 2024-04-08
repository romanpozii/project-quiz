<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['password']))  {
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$10$8WkSLFcoaqhJUJoqjg3K8eWixJWswsICf7FTxehKmx8hpmIKYWqju';
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('nieprawidłowe hasło');</script>";
	}
}


?>



<html>
	<head>
		<title>PHP-quiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>PHP-quiz</h1>
				<a href="index.php" class="start">Strona Główna</a>

			</div>
		</header>

		<main>
		<div class="container">
				<h2>Podaj hasło</h2>
				<form method="POST" action="">
				<input type="password" name="password" required="" >
				<input type="submit" name="submit" value="Enter"> 

			</div>


		</main>

		<footer>
			<div class="container">
				PHP QUIZ
			</div>
		</footer>

	</body>
</html>