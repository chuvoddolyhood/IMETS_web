<?php

  // Include Database connection
  include("./../../../../config.php");
  // Include SimpleXLSXGen library
  include("./../SimpleXLSXGen.php");

  $employees = [
    ['MSNV', 'Họ và tên','Ngày sinh','Giới tính',  'Địa chỉ','CMND','Số điện thoại','Chức vụ', 'Bộ phận','Ngày bắt đầu công tác']
  ];

  $id = 0;
  $sql = "SELECT `ID_Staff`, `Name_Staff`, `DOB_Staff`, `Sex_Staff`, `Address_Staff`, `CMND_Staff`, `PhoneNumber_Staff`, `Position`, dept.Name_Dept, `DateStartWork`
    FROM `staff` JOIN dept ON staff.ID_Dept=dept.ID_Dept";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    foreach ($res as $row) {
      // $id++;
      $employees = array_merge($employees, array(array($row['ID_Staff'],$row['Name_Staff'], $row['DOB_Staff'], $row['Sex_Staff'], $row['Address_Staff'], $row['CMND_Staff'], $row['PhoneNumber_Staff'], $row['Position'], $row['Name_Dept'], $row['DateStartWork'])));
    }
  }

  $xlsx = SimpleXLSXGen::fromArray($employees);
  $xlsx->downloadAs('staff.xlsx'); // This will download the file to your local system

  // $xlsx->saveAs('employees.xlsx'); // This will save the file to your server

  echo "<pre>";
  print_r($employees);
?>