<?php session_start(); ?>
<?php include "config.php";
if (isset($_SESSION['user_name'])) {
	?>



<?php 
if (isset($_GET['id'])) {
	$id = mysqli_real_escape_string($conn , $_GET['id']);
	if (is_numeric($id)) {
		$query = "SELECT * FROM user_form WHERE id = '$id' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_array($run)) {
				 $id = $row['id'];
                 $name = $row['name'];
                 $email = $row['email'];
                 $password = $row['password'];
                 $usertype = $row['usertype'];
			}
		}
		else {
			echo "<script> alert('error');
			window.location.href = 'players.php'; </script>" ;
		}
	}
	else {
		header("location: players.php");
	}
}

?>
<?php 
if(isset($_POST['submit'])) {
	$id =htmlentities(mysqli_real_escape_string($conn , $_POST['id']));
	$name = htmlentities(mysqli_real_escape_string($conn , $_POST['name']));
	$email = htmlentities(mysqli_real_escape_string($conn , $_POST['email']));
	$password = htmlentities(mysqli_real_escape_string($conn , $_POST['password']));
	$usertype = htmlentities(mysqli_real_escape_string($conn , $_POST['usertype']));
	
	$query = "UPDATE user_form SET id = '$id' , name = '$name' , email= '$email' , password = '$password' , usertype = '$usertype'  WHERE id = '$id' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('user details successfully updated');
		window.location.href= 'players.php'; </script> " ;
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
	<?php include 'admin_header.html'?>

		<main>
		<section>
			<div class="container">
				<h2>Edit User Details...</h2>
				<form method="post" action="">

					<p>
						<label>Id</label>
						<input type="text" readonly name="id" required="" value="<?php echo $id; ?>">
					</p>
					<p>
						<label>Name</label>
						<input type="text" name="name" required="" value="<?php echo $name; ?>">
					</p>
					<p>
						<label>Email</label>
						<input type="text" name="email" required="" value="<?php echo $email; ?>">
					</p>
					<p>
						<label>Password</label>
						<input type="text"  readonly name="password" required="" value="<?php echo $password; ?>">
					</p>
					<p>
						<label>User Type</label>
						<input type="text" name="usertype" required="" value="<?php echo $usertype; ?>">
					</p>
                    <br>
					<p>
						
						<input type="submit" class="btn btn-success w-100" name="submit" value="Submit">
					</p>
				</form>
			</div>
			</section>
		</main>

		<?php include 'footer.html'?>

	</body>
</html>








<?php } 
else {
	header("location: login_form.php");
}
?>