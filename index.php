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
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./modules_client/style/index.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

     <!-- Link Swiper's CSS -->
     <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
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