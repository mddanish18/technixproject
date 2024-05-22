

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register now</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="containt">
        <div class="box">
            <?php
            include('connection.php');
            if(isset($_POST['submit'])){
                $username=$_POST['username'];
                $email=$_POST['email'];
                $age=$_POST['age'];
                $password=$_POST['password'];

                $verify_query=mysqli_query($conn,"SELECT email FROM users where email='$email'");
                if(mysqli_num_rows($verify_query)!=0){
                    echo "<div class='message'>
                    <p>This email is used, try another one please</P>
                    </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go back</button>";



                }else{
                    mysqli_query($conn,"INSERT INTO users(username,email,age,password)VALUES('$username','$email','$age','$password')") or die("conection error");
                    echo "<div class='message'>
                    <p>Registration succsessfully</P>
                    </div> <br>";
                    echo "<a href='index.php'><button class='btn'>login now</button>";
                }


            }else{
            
            
            
            ?>
            <header>Sing-up</header>
            <form action="" method="POST">
                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"autocomplete="off" required>
                </div>

                <div class="input">
                    <label for="Age">Age</label>
                    <input type="age" name="age" id="age"autocomplete="off" required>
                </div>
                <div class="input">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" autocomplete="off">
                </div>
                <div class="input">
                    
                    <input type="submit" class="stm" name="submit"  value="Login"  id="username" >
                </div>
                <div class="link">
                    Alredy? <a href="index.php">sin-in</a> 
                </div>

            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>