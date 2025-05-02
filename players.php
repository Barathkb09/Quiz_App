<?php session_start(); ?>
<?php include "config.php";
if (isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>

	<body>
	<?php include 'admin_header.html' ?>

	<section class="flex-column">
	<h1> All Admins</h1>
	<table class="data-table">
	<thead>
		<tr>
		<th>Id</th>
		<th>Email</th>
		<th>User Type</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php 
            
            $query = "SELECT * FROM user_form where usertype='admin'";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $id = $row['id'];
                $email = $row['email'];
				$usertype = $row['usertype'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
				echo "<td>$usertype</td>";
				echo "<td> <a class='btn btn-success' href='edituser.php?id=$id'> Edit </a></td>";
				echo "<td> <a class='btn btn-danger' href='deleteuser.php?id=$id'> Delete </a></td>";
                echo "</tr>";
             }
         }
        ?>
	
	</tbody>	
	</table>

	<h1> All Students</h1>
	<table class="data-table">
	<thead>
		<tr>
		<th>Id</th>
		<th>Email</th>
		<th>User Type</th>
		<th>Played On</th>
		<th>Score</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php 
            
            $query = "SELECT * FROM user_form where usertype='user'";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $id = $row['id'];
                $email = $row['email'];
				$usertype = $row['usertype'];
                $played_on = $row['played_on'];
                $score = $row['score'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
				echo "<td>$usertype</td>";
                echo "<td>$played_on</td>";
                echo "<td>$score</td>";
				echo "<td> <a class='btn btn-success' href='edituser.php?id=$id'> Edit </a></td>";
				echo "<td> <a class='btn btn-danger' href='deleteuser.php?id=$id'> Delete </a></td>";
                echo "</tr>";
             }
         }
        ?>
	
	</tbody>	
	</table>


	</section>
	<?php include 'footer.html' ?>
</body>
</html>

<?php } 
else {
	header("location: adminhome.php");
}
?>

