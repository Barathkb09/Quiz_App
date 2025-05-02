<?php
        @include 'config.php';
        session_start();
        if(isset($_SESSION['user_name'])){
			if (isset($_GET['n']) && is_numeric($_GET['n'])) {
				$qno = $_GET['n'];
				if ($qno == 1) {
					$_SESSION['quiz'] = 1;
				}
				}
				else {
					header('location: question.php?n='.$_SESSION['quiz']);
				} 
				if (isset($_SESSION['quiz']) && $_SESSION['quiz'] == $qno) {
				$query = "SELECT * FROM questions WHERE qno = '$qno'" ;
				$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
				if (mysqli_num_rows($run) > 0) {
					$row = mysqli_fetch_array($run);
					$qno = $row['qno'];
					 $question = $row['question'];
					 $ans1 = $row['ans1'];
					 $ans2 = $row['ans2'];
					 $ans3 = $row['ans3'];
					 $ans4 = $row['ans4'];
					 $correct_answer = $row['correct_answer'];
					 $_SESSION['quiz'] = $qno;
					 $checkqsn = "SELECT * FROM questions" ;
					 $runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
					 $countqsn = mysqli_num_rows($runcheck);
					 $time = time();
					 $_SESSION['start_time'] = $time;
					 $allowed_time = $countqsn * 0.05;
					 $_SESSION['time_up'] = $_SESSION['start_time'] + ($allowed_time * 60) ;
	
				}
				else {
					echo "<script> alert('something went wrong');
				window.location.href = 'home.php'; </script> " ;
				}
			}
        }
        else{
        header('location:login_form.php');
        }
    ?>
<?php 
$total = "SELECT * FROM questions ";
$run = mysqli_query($conn , $total) or die(mysqli_error($conn));
$totalqn = mysqli_num_rows($run);

?>
<html>
	<head>
		<title>PHP-kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style3.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	</head>

	<body>
	

    <script>
        var countdownTime = 30;
        function updateCountdown() {
            var countdownElement = document.getElementById('countdown');
            countdownElement.innerHTML = "Time Left: " + countdownTime + "s";
            countdownTime--;
            if (countdownTime < 0) {
                clearInterval(timer);
                countdownElement.innerHTML = "Time's Up!";
            }
        }
        var timer = setInterval(updateCountdown, 1000);
    </script>
		<main>
			<div class= "container flex-column">
				<div class="row w-100">
					<div class="col">
						<div class= "current btn btn-secondary w-100">Question <?php echo $qno; ?> of <?php echo $totalqn; ?></div>
					</div>
					<div class="col ">
						<div id="countdown" class="btn btn-warning mb-3 w-100" ></div>	
					</div>
				</div>
				
				<div class="input-group mb-3">
  					<input type="text" readonly class=" question form-control" value='<?php echo $question; ?>' aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<p class="question"></p>
				<form method="post" action="process.php" class="w-100">
					<div class="choices">

					<div class="input-group mb-3 ">
  						<div class="input-group-text w-100">
    						<input name='choice' class="form-check-input mt-0 me-3" type="radio" value="a" required aria-label="radio for following text input"><?php echo $ans1; ?>
						</div>
					</div>
					<div class="input-group mb-3">
  						<div class="input-group-text w-100">
    						<input name='choice' class="form-check-input mt-0 me-3" type="radio" value="b" required aria-label="radio for following text input"><?php echo $ans2; ?>
						</div>
					</div>
					<div class="input-group mb-3">
  						<div class="input-group-text w-100">
    						<input name='choice' class="form-check-input mt-0 me-3" type="radio" value="c" required aria-label="radio for following text input"><?php echo $ans3; ?>
						</div>
					</div>
					<div class="input-group mb-3">
  						<div class="input-group-text w-100">
    						<input name='choice' class="form-check-input mt-0 me-3" type="radio" value="d" required aria-label="radio for following text input"><?php echo $ans4; ?>
						</div>
					</div>
					
					<input type="submit" class='btn btn-primary w-100' value="Submit">
					<input type="hidden" name="number" value="<?php echo $qno;?>">
					<br>
					<br>
					<a href="results.php" class="btn btn-danger w-100">Stop Quiz</a>
				</form>
				</div>
			</div>
		</main>
		<?php include 'footer.html' ?>
</body>
</html>
