<?php
/*session_start();
include "connection.php";
?>
<?php 
if (isset($_SESSION['user_name'])) {
	header("location: home.php");
}
?>
<?php
if (isset($_POST['user_name'])) {
$user_name = mysqli_real_escape_string($conn , $_POST['user_name']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$checkmail = "SELECT * from user_form WHERE email = '$user_name'";
	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
	if (mysqli_num_rows($runcheck) > 0) {
		$played_on = date('Y-m-d H:i:s');
		$update = "UPDATE user_form SET played_on = '$played_on' WHERE email = '$user_form' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($runcheck);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
		header("location: home.php");
	}
	else {
		$played_on = date('Y-m-d H:i:s');
	$query = "INSERT INTO user_form(email,played_on) VALUES ('$user_name','$played_on')";
	$run = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "SELECT * FROM user_form WHERE email = '$user_name' ";
		$run2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
		if (mysqli_num_rows($run2) > 0) {
			$row = mysqli_fetch_array($run2);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['user_name'] = $row['email'];
			header("location: home.php");
		}
}
	else {
		echo "<script> alert('something is wrong'); </script>";
	}
}
}
else {
	echo "<script> alert('Invalid Email'); </script>";
}
}

*/

?>
<html>
	<head>
		<title>Online-Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

	</head>

	<body>
		<!-- <header>
			<div class="container">
				<h1>PHP-kuiz</h1>
				<a href="index.php" class="start">Home</a>
				<a href="admin.php" class="start">Admin Panel</a>

			</div>
		</header> -->
		<?php include 'header.html'; ?>


		<section>
		<!-- <div class="container">
				<h2>Enter Your Email</h2>
				<form method="POST" action="">
				<input type="email" name="email" required="" >
				<input type="submit" name="submit" value="PLAY NOW">

			</div> -->
			<div class="container body text-center">
				<h1 class='text-primary'>Let's Start your Quiz</h1>
				<h2>Test your skills and become a master.</h2>
				<p>We organize quizzes on various topics.</p>
				<p>Let's join quiz and improve your skills.</p>
			</div>

		</section>

		<!-- <footer>
			<div class="container">
				Copyright @ PHP-kuiz
			</div>
		</footer> -->
		<?php include 'footer.html'; ?>
	</body>
</html>