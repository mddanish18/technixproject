
<?php
session_start();
include('connection.php');
if(isset($_session['valid'])){
    header("Location:index.php");
}

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
    <div class="nav">
        <div class="logo">
            <p><a href="home.php"> LOGO </a></p>
        </div>
        <div class="right-click">
            <a href="edit.php">change profile</a>
            <a href="register.php"> <button class="stm">Log Out</button></a>
        </div>
    </div>
    <div class="containt">
        <div class="box">
            <?php
            if(isset($_POST['submit'])){
                $username =$_POST['username'];
                $email =$_POST['email'];
                $age =$_POST['age'];

                $id =$_SESSION['id'];

                $edit_query = mysqli_query($conn,"UPDATE users SET username='$username',email='$email',age='$age' WHERE id=$id") or die("connect error");
                
                if($edit_query){
                    echo "<div class='message'>
                    <p>profile updated</P>
                    </div> <br>";
                    echo "<a href='home.php'><button class='btn'>Go home</button>";
                }
            }else{
             $id =$_SESSION['id'];
             $query =mysqli_query($conn,"SELECT*FROM users WHERE id=$id");

             while($result=mysqli_fetch_assoc($query)){
                $res_username=$result['username'];
                $res_email=$result['email'];
                $res_age=$result['age'];
             }
            ?>
            <header>Change profile</header>
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
                    
                    <input type="submit" class="stm" name="submit"  value="Update"  id="username" >
                </div>
            </from>
            </div>
            <?php }?>
            </div>
               
</body>
</html>