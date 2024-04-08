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

		
	<h1>Wszystkie pytania</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>Numer pytania</th>
				<th>Pytanie</th>
				<th>Wariant1</th>
				<th>Wariant2</th>
				<th>Wariant3</th>
				<th>Wariant4</th>
				<th>Prawidłowa odpowiedź</th>
				<th>Edytuj</th>
			</tr>
		</thead>
		<tbody>
        
        <?php 
            
            $query = "SELECT * FROM questions ORDER BY qno DESC";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $qno = $row['qno'];
                $question = $row['question'];
                $option1 = $row['ans1'];
                $option2 = $row['ans2'];
                $option3 = $row['ans3'];
                $option4 = $row['ans4'];
                $Answer = $row['correct_answer'];
                echo "<tr>";
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
                echo "<td> <a href='editquestion.php?qno=$qno'> Edytuj </a></td>";
              
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

