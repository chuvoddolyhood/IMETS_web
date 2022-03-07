<!DOCTYPE html>
<html>
<head>
	<title>Staff Page</title>
	<link rel="stylesheet" href="./modules_staff/style/index_staff.css" />
	<link rel="shortcut icon" type="image/png" href="./../modules_client/photo/logo.jfif" />
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
		if(!isset($_SESSION['login_staff'])){
			header('location:login.php');
		}
	?>
	<div class="container">
		<?php
			include './../config.php';
			include './modules_staff/navigation.php';
			include './modules_staff/content.php';
			include './modules_staff/sidebar.php';
		?>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="./modules_staff/style/script.js"></script>
</body>
</html>