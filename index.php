<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMETS</title>
    <link rel="shortcut icon" type="image/png" href="./img/images/logo.jfif" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./modules_client/style/index.css">
    <!-- <link rel="stylesheet" href="./modules_client/style/style.css"> -->
    <!-- <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" 
        integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" 
        crossorigin="anonymous"> -->

     <!-- Link Swiper's CSS -->
     <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
</head>
<body>
    <?php
        session_start();
        // session_destroy();
        if(!isset($_SESSION['login_client'])){
            include './modules_client/header/header_login.php';
        } else {
            include './modules_client/header/header_loggedin.php';
        }
        include './modules_client/main.php';
		include './modules_client/footer.php';
	?>
</body>
</html>