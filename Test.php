<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-md navbar-dark" id="navbar">
            <div class="container-fluid">
              <img src="images/bgimage.jpg" class="rounded me-3 logo" alt="icon">
              <a class="navbar-brand h2" href="#">Quizify</a>
              <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-0 mb-2 mb-lg-0 mx-auto">
                  <li class="px-3 ">
                    <a class="nav-link" href="home.php">Home</a>
                  </li>
                  <li class="px-3 ">
                    <a class="nav-link" href="Test.php">Test</a>
                  </li>
                  <li class="px-3">
                    <a class="nav-link" href="about.php">About us</a>
                  </li>
                  <li class="px-3">
                    <a class="nav-link" href="career.php">Careers</a>
                  </li>
                  <li class="px-3 ">
                    <a class="nav-link" href="logout.php">Log out</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>
    </header>
    <?php
        @include 'config.php';
        session_start();
        if(isset($_SESSION['user_name'])){
            $query = "SELECT * FROM questions";
        $run = mysqli_query($conn , $query) or die(mysqli_error($conn));
        $total = mysqli_num_rows($run);
        ?>

        <html>
            <body>
            <main>
                    <div class="container">
                        <section class="flex-column">
                        <h1 class="text-primary">Welcome to Quizify !</h1><br>
                        <h4>This is just a simple quiz game to test your knowledge!</h4>
                        <table>
                            <tr>
                                <th><strong>Number of questions: </strong></th>
                                <td><?php echo $total; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Type: </strong></th>
                                <td> Multiple Choice</td>
                            </tr>
                            <tr>
                                <th><strong>Estimated time for each question: </strong></th>
                                <td><?php echo $total * 0.05 * 60; ?> seconds</td>
                            </tr>
                            <tr>
                                <th><strong>Score: </strong></th>
                                <td>+1 point for each correct answer</td>
                            </tr>
                        </table>
                        <a href="question.php?n=1" class="btn btn-primary">Start Quiz</a><br>
                        <a href="logout.php" class=" btn btn-danger">Exit</a>
                        </section>
                    </div>
            </main>
                
            </body>
        </html>
        <?php unset($_SESSION['score']); ?>
        <?php
        }
        else{
        header('location:login_form.php');
        }
    ?>
<!--if(!$conn){
    die('connection error'.mysqli_connect_error());
}-->
<?php include 'footer.html'; ?>
</body>
</html>