<?php 
session_start();
if (isset($_SESSION['user_name'])) {
?>




<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
	
	</head>

	<body>
	<?php include 'admin_header.html'; ?>
	<section>
		<div class="container">
			<h2>Welcome back, Admin</h2>
		</div>
	</section>
	<?php include 'footer.html'; ?>
    </body>
</html>

<?php } 
else {
	header("location: login_form.php");
}
?>