<?php

  // Include Database connection
  include("./../../../../config.php");
  // Include SimpleXLSXGen library
  include("./../SimpleXLSXGen.php");

  $patient = [
    ['MSBN', 'Họ và tên','Ngày sinh','Giới tính',  'Địa chỉ','CMND','Số điện thoại','BHYT']
  ];

  $id = 0;
  $sql = "SELECT `ID_Patient`, `Name`, `DOB`, `Sex`, `Address`, `CMND`, `PhoneNumber`, `ID_BHYT` FROM `patient`";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    foreach ($res as $row) {
      // $id++;
      $patient = array_merge($patient, array(array($row['ID_Patient'],$row['Name'], $row['DOB'], $row['Sex'], $row['Address'], $row['CMND'], $row['PhoneNumber'], $row['ID_BHYT'])));
    }
  }

  $xlsx = SimpleXLSXGen::fromArray($patient);
  $xlsx->downloadAs('patient.xlsx'); // This will download the file to your local system

  // $xlsx->saveAs('employees.xlsx'); // This will save the file to your server

  echo "<pre>";
  print_r($patient);
?>