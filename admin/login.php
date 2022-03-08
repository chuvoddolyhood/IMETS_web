<?php
    include './../config.php';
    session_start();
    if(isset($_POST['btnLogin'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);


        $sql = "SELECT password FROM staff WHERE UserName='$username'";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($query);

        if($rows['password'] == $password){
            $_SESSION['login_admin']=$username;
            header('location: index.php');
        } else {
            header('location: login.php');
        }   
        
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="./modules_admin/style/login.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Westside Sneaker Store, Sneaker, Shoes">
    <meta name="description" content="ecommerce web">
    <meta name="author" content="ch.studio" />
    <link rel="shortcut icon" type="image/png" href="./photo/logo.jpg" />
</head>

<body>
    <div class="login-form">
        <h1>Admin</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Đăng nhập</h2>
                     <form action="" method="POST">
                        <input type="text" name="username" placeholder="Tên đăng nhập" required autofocus="">
                        <input type="password" name="password" placeholder="Mật khẩu" required autofocus="">
                        <button class="btn_Login" type="submit" name="btnLogin">Đăng nhập</button>
                    </form>
                    
                </div>
                <div class="form-img">
                    <img src="./modules_admin/photo/teamNKC.png" alt="poster">
                </div>
            </div>
        </div>
        <p class="developer">Được phát triển bởi <a href="https://chuvoddolyhood.github.io/trannhannghia/">ch.studio</a></p>
    </div>
</body>
</html>