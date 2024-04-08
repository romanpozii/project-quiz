<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
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

		
	<h1>Wszystkie gracze</h1>
	<table class="data-table">
		<thead>
			<tr>
			<th>ID Gracza</th>
			<th>Email</th>
			<th>Kiedy zagrał</th>
			<th>Wynik</th>
			</tr>
		</thead>
		<tbody>
		<?php 
            
            $query = "SELECT * FROM users ORDER BY played_on DESC";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $id = $row['id'];
                $email = $row['email'];
                $played_on = $row['played_on'];
                $score = $row['score'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$played_on</td>";
                echo "<td>$score</td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>
