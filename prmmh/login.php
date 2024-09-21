<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>President Ramon Magsaysay Memorial Hospital</title>

    <!-- ===== Icons Link ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="styling/testing.css">


</head>

<body>
    <div class="container">
        <div class="box form-box">
            <header><img src="prmmhlogob.png" alt=""></header>
            <?php
            session_start();
            include("../config/config.php");
            if (isset($_POST['submit'])) {
                $user = $_POST['username'];
                $pass  = $_POST['password'];

                $pass_md5 = md5($pass);
            
                $query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$user' AND password = '$pass_md5'");
            
                if(mysqli_num_rows($query) > 0)
                {
                  $user = mysqli_fetch_object($query);
                  $_SESSION['login'] = true;
                  $_SESSION['session_id'] = uniqid();
                  
                  $user_office = $user->office;
                  $user_fullname= $user->fullname;
                  $_SESSION['user_fullname'] = $user_fullname;
                  $_SESSION['user_office'] = $user_office;
                  $_SESSION['user_id'] = $user->id;
                  header('Location: ../'.$user_office.'/index.php');
                  exit();
                }
                else
                {
                    echo "<div class='message'>
                    <div class='icon'>
                    <i class='uil uil-exclamation-circle'></i>
                    </div>
                    <div class='content'>
                    <p>WRONG USERNAME/PASSWORD</p>
                    </div>
                    <br>
                    <a href='javascript:self.history.back()'><button class='btn'> Go back</button>
                    </div>";
                }
            
            }else{
            ?>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
    <script src="script.js"></script>
</body>

</html>