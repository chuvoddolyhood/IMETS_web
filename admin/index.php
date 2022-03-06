<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" href="./style/index.css" />
	<link rel="shortcut icon" type="image/png" href="./photo/logo.jpg" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
	<!-- <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" 
        crossorigin="anonymous"> -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
	<!-- <link rel="stylesheet" type="text/css" href="style/index.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" /> -->
</head>
<body id="body">
<?php
	session_start();
	//session_destroy();
	if(!isset($_SESSION['login_admin'])){
		header('location:login.php');
	}
?>
<div class="container">
	<?php
		include './modules_admin/config.php';
        include './modules_admin/navigation.php';
		include './modules_admin/content.php';
		include './modules_admin/sidebar.php';
	?>
</div>
</body>
</html>