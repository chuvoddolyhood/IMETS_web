<?php

  // Include Database connection
  include("./../../../../config.php");
  // Include SimpleXLSXGen library
  include("./../SimpleXLSXGen.php");

  $medicine = [
    ['Mã thuốc', 'Tên thuốc','Thành phần','Mô tả',  'Chỉ định','Chống chỉ định','Nhà sản xuất','Đơn giá', 'Đơn vị']
  ];

  $id = 0;
  $sql = "SELECT `ID_Medicine`, `TitleMedicine`, `Ingredients`, `MedicineContent`, `PrescriptionDrug`, `ContraindicationsDrug`, `Production`, `UnitPrice`, `Type` FROM `medicine`";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    foreach ($res as $row) {
      // $id++;
      $medicine = array_merge($medicine, array(array($row['ID_Medicine'],$row['TitleMedicine'], $row['Ingredients'], $row['MedicineContent'], $row['PrescriptionDrug'], $row['ContraindicationsDrug'], $row['Production'], $row['UnitPrice'], $row['Type'])));
    }
  }

  $xlsx = SimpleXLSXGen::fromArray($medicine);
  $xlsx->downloadAs('medicine.xlsx'); // This will download the file to your local system

  // $xlsx->saveAs('employees.xlsx'); // This will save the file to your server

  echo "<pre>";
  print_r($medicine);
?>