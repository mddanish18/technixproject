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
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>LOGO</p>
        </div>
        <div class="right-click">
            <?php
            $id=$_SESSION['id'];
            $query = mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

            while($result=mysqli_fetch_assoc($query)){
                $res_username=$result['username'];
                $res_email=$result['email'];
                $res_age=$result['age'];
                // $res_password=$result['password'];
                $res_id=$result['id'];
            }
            echo "<a href='edit.php?id=$res_id'>change profile</a>";
            
            ?>
        
            <a href="logout.php"> <button class="stm">Log Out</button></a>
        </div>
    </div>
    <main>
        <div class="main-box">
            <div class="top">
                <div class="box">
                    <p>hello <b><?php echo $res_username?> ?></b> , Welcome</p>
                </div>
                <div class="box">
                    <p>hello <b><?php echo $res_email?></b> , Welcome</p>
                </div>

                <div class="button">
                    <div class="box">
                        <p>And you are <b><?php echo $res_age?></b></p>
                    </div>
                </div>
        </div>
    </main>
</body>
</html>