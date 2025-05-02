<?php
@include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass=md5($_POST['password']);
    //$usertype=($_POST['usertype']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    $usertype=mysqli_fetch_array($result);

    if(mysqli_num_rows($result)>0){
        if($usertype['usertype']=='admin'){
          $_SESSION['user_name']=$email;
          header('location:adminhome.php');
    }
    else if(($usertype['usertype']=='user')||($usertype['usertype']=='')){
          $_SESSION['user_name']=$email;

        //time purpose
          if (isset($_POST['email'])) {
            $user_name = mysqli_real_escape_string($conn , $_POST['email']);
            if (filter_var($user_name, FILTER_VALIDATE_EMAIL)) {
                $checkmail = "SELECT * from user_form WHERE email = '$user_name'";
                $runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
                if (mysqli_num_rows($runcheck) > 0) {
                    $played_on = date('Y-m-d H:i:s');
                    $update = "UPDATE user_form SET played_on = '$played_on' WHERE email = '$user_name' ";
                    $runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
                    $row = mysqli_fetch_array($runcheck);
                        $id = $row['id'];
                        $_SESSION['id'] = $id;
                        $_SESSION['email'] = $row['email'];
                    header("location: index.php");
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
                        $_SESSION['email'] = $row['email'];
                        header("location: index.php");
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
            //time purpose end

          header('location:index.php');
      }
    }
    else{
        $error[]='incorrect email or password!';
    }

};

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login form</title>
    <link rel="stylesheet" href="css/style3.css">

</head>

<body>
    <?php include 'header.html'; ?>
    <div class="form-container">
        <form action="" method="post">
            <h3><center>Login now</center></h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class = "error-msg">'.$error.'</span>';
                    };
                };
            ?>
            <div><br></div>
            <input type="email" name = "email" required placeholder="Enter your Mail">
            <div><br></div>
            <input type="password" name = "password" required placeholder="Enter your password">
            <div><br></div>
            <input type="submit" name="submit" value="login now" class="form-btn">
            <center><p>don't have an account? <a href= "register_form.php">register now</a></p></center>
        </form>
    </div>
    <?php include 'footer.html'; ?>
</body>
</html>