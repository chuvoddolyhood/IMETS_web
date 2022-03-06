<?php
    include './../config.php';
    session_start();
    if(isset($_POST['btnLogin'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);


        $sql = "SELECT password FROM nhanvien WHERE UserName='$username'";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($query);

        if($rows['password'] == $password){
            $_SESSION['login_staff']=$username;
            header('location: index.php');
        } else {
            header('location: login.php');
        }   
        
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Staff Page</title>
	<link rel="shortcut icon" type="image/png" href="./../modules_client/photo/logo.jfif" />
	<link rel="stylesheet" type="text/css" href="./modules_staff/style/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="img">
			<img src="./modules_staff/photo/login.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<h2 class="title">Xin chào nhân viên IMETS</h2>
				<h2 class="title">Đăng nhập</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Mã nhân viên hoặc số điện thoại</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Mật khẩu</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<a href="#">Quên mật khẩu?</a>
            	<input type="submit" class="btn" value="Login" name="btnLogin">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./modules_staff/login/login.js"></script>
</body>
</html>
