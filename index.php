<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="containt">
        <div class="box">
         <?php
         include('connection.php');
         if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);

            $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'")or die("connection faild");
            $row = mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
                $_SESSION['valid']=$row['email'];
                $_SESSION['username']=$row['username'];
                $_SESSION['age']=$row['age'];
                $_SESSION['id']=$row['id'];
            }else{
                echo "<div class='message'>
                <p>wrong username or password</P>
                </div> <br>";
                echo "<a href='index.php'><button class='btn'>Go back</button>";
            }
            if(isset($_SESSION['valid'])){
                header("location: home.php");
            }
         }else{

         
         ?>

            <header>Login</header>
            <form action="" method="POST">
                <div class="input">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="input">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="input">
                    
                    <input type="submit" class="stm" name="submit"  value="Login"  id="username">
                </div>
                <div class="link">
                    Don't have account? <a href="register.php">sin-up</a>
                </div>

            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>