<?php session_start(); ?>
<?php include "config.php";
if (isset($_SESSION['user_name'])) {

if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
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
		echo "<script>alert('Question successfully added'); </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
	<?php include 'admin_header.html'; ?>
	
		<main>
		<section>
			<div class="container">
				<h2>Add a question...</h2>
				<form method="post" action="">

					<p>
						<label>Question</label>
						<input type="text" name="question" required="">
					</p>
					<p>
						<label>Choice #1</label>
						<input type="text" name="choice1" required="">
					</p>
					<p>
						<label>Choice #2</label>
						<input type="text" name="choice2" required="">
					</p>
					<p>
						<label>Choice #3</label>
						<input type="text" name="choice3" required="">
					</p>
					<p>
						<label>Choice #4</label>
						<input type="text" name="choice4" required="">
					</p>
					<p>
						<label>Correct answer</label>
						<select name="answer">
                        <option value="a">Choice #1 </option>
                        <option value="b">Choice #2</option>
                        <option value="c">Choice #3</option>
                        <option value="d">Choice #4</option>
                    </select>
					</p>
					<p>
						
						<input type="submit" name="submit" value="Submit">
					</p>
				</form>
			</div>
			</section>
		</main>
	
	<?php include 'footer.html'; ?>

	</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>