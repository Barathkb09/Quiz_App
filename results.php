<?php 
session_start();
include "config.php";
if (isset($_SESSION['user_name'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
	}
	?>
<html>
	<head>
		<title>PHP-kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<?php include 'header.html' ?>

		<main>
			<section class='text-center'>
			<div class= "container">
			<h2 class='h1'>Congratulations!</h2> 
				<p>You have successfully completed the test</p>
				<p>Total points: <?php if (isset($_SESSION['score'])) {
echo $_SESSION['score']; 
}; ?> </p>
		<!--<a href="question.php?n=1" class="start">Start Again</a>-->
		<a href="index.php" class="start">Go Home</a>
		</div>
		</section>
		</main>
		<?php include 'footer.html' ?>
		</body>
		</html>

		<?php 
		$score = $_SESSION['score'];
		$user_name = $_SESSION['user_name'];
		$query = "UPDATE user_form SET score = '$score' WHERE email = '$user_name'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>


<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: Test.php");
}
?>

