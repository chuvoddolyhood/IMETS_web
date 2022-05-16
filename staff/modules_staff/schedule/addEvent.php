<html>
  <link rel='stylesheet' href='css/sweetalert.css'>

<?php

	date_default_timezone_set('Asia/Ho_Chi_Minh');
	require_once('bdd.php');

 	if (isset($_POST['btnSave_submit'])){

		$title = $_POST['title'];
		$dateworking = $_POST['dateworking'];
		$session = $_POST['session'];
		$room = $_POST['room'];
		$ID_Staff = $_POST['ID_Staff'];

		// echo $title;
		// echo $dateworking;
		// echo $session;
		// echo $room;

		if($session=='Sáng'){
			// $sql = "INSERT INTO schedule(title, DateWorking, TimeStart, Session, ID_Staff, ID_Room,start, end) VALUES ('$title','$dateworking','07:00:00','$session','4','$room','$dateworking 07:00:00','$dateworking 07:30:00')";

			$loop=8;
			$time=0;
			$start_working = $dateworking.' 07:30:00';
			$end_working = $dateworking.' 08:00:00';
					

			do{
				$sql = "INSERT INTO schedule(title,Session, ID_Staff, ID_Room,start, end) VALUES ('$title','$session',$ID_Staff,'$room','$start_working','$end_working')";
				echo $sql;

				$query = $bdd->prepare( $sql );
				if ($query == false) {
				print_r($bdd->errorInfo());
				die ('Error prepare');
				}
				$sth = $query->execute();
		
		
				if ($sth == false) {
				print_r($query->errorInfo());
				die ('Error execute');
				}


				$time_stamp_start = strtotime($start_working);
				$start_working = date('Y-m-d H:i:s',$time_stamp_start + 30*60);

				$time_stamp_end = strtotime($end_working);
				$end_working = date('Y-m-d H:i:s',$time_stamp_end + 30*60);
				$time++;
			}while($time<$loop);
		}elseif($session=='Chiều'){
			$loop=8;
			$time=0;
			$start_working = $dateworking.' 13:00:00';
			$end_working = $dateworking.' 17:00:00';
					

			do{
				$sql = "INSERT INTO schedule(title, Session, ID_Staff, ID_Room,start, end) VALUES ('$title','$session',$ID_Staff,'$room','$start_working','$end_working')";
				echo $sql;

				$query = $bdd->prepare( $sql );
				if ($query == false) {
				print_r($bdd->errorInfo());
				die ('Error prepare');
				}
				$sth = $query->execute();
		
		
				if ($sth == false) {
				print_r($query->errorInfo());
				die ('Error execute');
				}


				$time_stamp_start = strtotime($start_working);
				$start_working = date('Y-m-d H:i:s',$time_stamp_start + 30*60);

				$time_stamp_end = strtotime($end_working);
				$end_working = date('Y-m-d H:i:s',$time_stamp_end + 30*60);
				$time++;
			}while($time<$loop);
		}elseif($session=='Ngoài giờ'){
			$loop=6;
			$time=0;
			$start_working = $dateworking.' 18:30:00';
			$end_working = $dateworking.' 21:30:00';
					

			do{
				$sql = "INSERT INTO schedule(title, Session, ID_Staff, ID_Room,start, end) VALUES ('$title','$session',$ID_Staff,'$room','$start_working','$end_working')";
				echo $sql;

				$query = $bdd->prepare( $sql );
				if ($query == false) {
				print_r($bdd->errorInfo());
				die ('Error prepare');
				}
				$sth = $query->execute();
		
		
				if ($sth == false) {
				print_r($query->errorInfo());
				die ('Error execute');
				}


				$time_stamp_start = strtotime($start_working);
				$start_working = date('Y-m-d H:i:s',$time_stamp_start + 30*60);

				$time_stamp_end = strtotime($end_working);
				$end_working = date('Y-m-d H:i:s',$time_stamp_end + 30*60);
				$time++;
			}while($time<$loop);
		}



		// echo $sql;

		// $query = $bdd->prepare( $sql );
		// if ($query == false) {
		// print_r($bdd->errorInfo());
		// die ('Error prepare');
		// }
		// $sth = $query->execute();


		// if ($sth == false) {
		// print_r($query->errorInfo());
		// die ('Error execute');
		// }
	}

	
//  if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])){

// 	$name = $_POST['name'];
// 	$username = $_POST['username'];
// 	$password = $_POST['password'];
// 	$email = $_POST['email'];
// 	$role = $_POST['role'];
	
			
// 	$sql = "INSERT INTO member_rss(member_first, username, password,email,role) values ('$name', '$username', '$password', '$email','$role')";
// 	//$req = $bdd->prepare($sql);
// 	//$req->execute();
// 	echo $sql;

// 	$query = $bdd->prepare( $sql );
// 	if ($query == false) {
// 	 print_r($bdd->errorInfo());
// 	 die ('Erreur prepare');
// 	}
// 	$sth = $query->execute();


// 	if ($sth == false) {
// 	 print_r($query->errorInfo());
// 	 die ('Erreur execute');
// 	}
// }
	


header('Location: '.$_SERVER['HTTP_REFERER']);


?>

  <script src='js/sweetalert.min.js'></script>
</html>
