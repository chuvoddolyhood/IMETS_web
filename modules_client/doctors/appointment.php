<?php
    include './../../config.php';
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    $Session_Patient = $_GET['id_Patient'];
    $ID_Staff = $_GET['id_Staff'];
    $Date_Booking = $_GET['date'];
    $session = $_GET['session'];
    $room = $_GET['room'];
    $dept = $_GET['dept'];
    $today = date("Y-m-d H:i:s");


    // ========Lấy ID_Staff========
    $sql_get_IDStaff = "SELECT ID_Patient FROM patient WHERE UserName='$Session_Patient'";
	$query_get_IDStaff = mysqli_query($conn, $sql_get_IDStaff);
    $rows = mysqli_fetch_array($query_get_IDStaff);
    $ID_Patient = $rows["ID_Patient"];

    // =======Xu ly Date_Booking============
    $year_booking=substr($Date_Booking, 6,4);
    $month_booking=substr($Date_Booking, 3,2);
    $day_booking=substr($Date_Booking, 0,2);
    
    $time_booking=0;
    $dmy_today="$year_booking-$month_booking-$day_booking";
    

    if($today<"$dmy_today 17:00:00"){
        echo 'yes';
    }else{echo 'no';}

    // if($session=='Sáng'){
    //     $sql_get_numberOfPatient = "SELECT COUNT(*) AS numberOfPatient FROM appointment WHERE Date_Checkup>='$dmy_today 07:30:00' AND Date_Checkup<='$dmy_today 11:30:00'";
    //     $query_get_numberOfPatient = mysqli_query($conn, $sql_get_numberOfPatient);
    //     $rows_get_numberOfPatient = mysqli_fetch_array($query_get_numberOfPatient);
    //     $numberOfPatient = $rows_get_numberOfPatient["numberOfPatient"];

    //     echo  'Soluongbenhnhan= '.$numberOfPatient;
    //     if($numberOfPatient<9 && $today<"$dmy_today 11:30:00"){
    //         $time_sang="$dmy_today 07:30:00";
    //         $time_stamp = strtotime($time_sang);
    //         $new = $time_stamp + $numberOfPatient*30*60;
    //         echo 'Thoi gian uoc tinh'. date('d-m-Y H:i:s',$new);
    //     } else {
    //         echo 'Het luot';
    //     }

    // } elseif($session=='Chiều') {
    //     $sql_get_numberOfPatient = "SELECT COUNT(*) AS numberOfPatient FROM appointment WHERE Date_Checkup>='$dmy_today 13:00:00' AND Date_Checkup<='$dmy_today 17:00:00'";
    //     $query_get_numberOfPatient = mysqli_query($conn, $sql_get_numberOfPatient);
    //     $rows_get_numberOfPatient = mysqli_fetch_array($query_get_numberOfPatient);
    //     $numberOfPatient = $rows_get_numberOfPatient["numberOfPatient"];

    //     echo  'Soluongbenhnhan= '.$numberOfPatient;
    //     if($numberOfPatient<9 && $today<"$dmy_today 17:00:00"){
    //         $time_sang="$dmy_today 13:00:00";
    //         $time_stamp = strtotime($time_sang);
    //         $new = $time_stamp + $numberOfPatient*30*60;
    //         echo 'Thoi gian uoc tinh'. date('d-m-Y H:i:s',$new);
    //     } else {
    //         echo 'Het luot';
    //     }



    // }elseif($session=='Ngoài giờ') {
    //     $sql_get_numberOfPatient = "SELECT COUNT(*) AS numberOfPatient FROM appointment WHERE Date_Checkup>='$dmy_today 18:30:00' AND Date_Checkup<='$dmy_today 21:30:00'";
    //     $query_get_numberOfPatient = mysqli_query($conn, $sql_get_numberOfPatient);
    //     $rows_get_numberOfPatient = mysqli_fetch_array($query_get_numberOfPatient);
    //     $numberOfPatient = $rows_get_numberOfPatient["numberOfPatient"];
    //     echo  'Soluongbenhnhan= '.$numberOfPatient;
        
    //     if($numberOfPatient<9 && $today<"$dmy_today 21:30:00"){
    //         $time_sang="$dmy_today 18:30:00";
    //         $time_stamp = strtotime($time_sang);
    //         $new = $time_stamp + $numberOfPatient*30*60;
    //         echo 'Thoi gian uoc tinh'. date('d-m-Y H:i:s',$new);
    //     } else {
    //         echo 'Het luot';
    //     }
    // }

    // echo $ID_Staff;
    // echo $ID_Patient;
    // echo $today;
    // echo $Date_Booking;

    
    // echo $Date_Booking;
    // 2022-12-31 00:00:00

    // $sql_add_appointment = "INSERT INTO appointment(`ID_Staff`, `ID_Patient`, `Date_Booking`, `Date_Checkup`) 
    //     VALUES ($ID_Staff,$ID_Patient,'$today','2022-03-21 23:59:59')";
	// $query_add_appointment = mysqli_query($conn, $sql_add_appointment);

    // header('location: ./../../index.php');
?>