<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
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
				<h1>PHP-Quiz</h1>
			</div>
		</header>

		<main>
			<div class= "container">
			<h2>Gratulacje!</h2> 
				<p>Test został zakończony sukcesem</p>
				<p>Liczba punktów: <?php if (isset($_SESSION['score'])) {
echo $_SESSION['score']; 
}; ?> </p>
		<a href="question.php?n=1" class="start">Zacznij od nowa</a>
		<a href="home.php" class="start">Wróć do strony głównej</a>
		</div>
		</main>
		</body>
		</html>

		<?php 
		$score = $_SESSION['score'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET score = '$score' WHERE email = '$email'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>


<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: home.php");
}
?>
