<?php
@include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);
    $usertype=($_POST['usertype']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        $error[]='user already exist!';
    }else{
        if($pass != $cpass){
            $error[]='password not matched!';
        }else{
            $insert = "INSERT INTO user_form(name,email,password,usertype) values('$name','$email','$pass','$usertype')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register form</title>
    <link rel="stylesheet" href="css/style3.css">
    <script src = "https://kit.fontawesome.com/a076d05399.js"></script>
   
</head>

<body>
<?php include 'header.html'; ?>
    <div class="form-container">
        <script>
            function validate(){
            var pwd=document.forms[0].password.value.length;
            if (pwd<8)
            {
                alert("Password should be minimum 8 Characters")
                event.preventDefault();
            }
            else{
				document.getElementById().submit();
			}
        }
        </script>
        <form action="" method="post">
            <h3><center>register now</center></h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class = "error-msg">'.$error.'</span>';
                    };
                };
            ?>
            <div><br></div>
            <input type="text" name = "name" required placeholder="Enter your Name">
            <div><br></div>
            <input type="email" name = "email" required placeholder="Enter your Mail">
            <div><br></div>
            <input type="password" name = "password" required placeholder="Enter your password">
            <div><br></div>
            <input type="password" name = "cpassword" required placeholder="Confirm your password">
            <div><br></div>
            <input type="hidden" name = "usertype" placeholder="usertype" value='user'>
            <div><br></div>
            <input type="submit" name="submit" value="register now" class="form-btn" onclick="validate()">
            <center><p>already have an account? <a href= "login_form.php">login now</a></p></center>
        </form>
    </div>
    <?php include 'footer.html'; ?>
</body>
</html>