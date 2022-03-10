<?php
	include './../../../config.php';
    $ID_Staff= $_GET['id'];

	$sql = "DELETE FROM staff WHERE ID_Staff=$ID_Staff";
    $query = mysqli_query($conn, $sql);
    header("location: ./../../index.php?page_layout=staff_management");
?>