<?php
    include './../../../config.php';

    if(isset($_POST['btn_medicine_prescription'])){
        $ID_Appointment = $_POST['ID_Appointment'];
        $ID_Medicine = $_POST['medicine_choose'];
        $Amount = $_POST['medicine_numberous'];
        $DescriptionTreatment = $_POST['medicine_use'];
        $Morning = 0;
        $Afternoon = 0;
        $Evening = 0;

        if(isset($_POST['medicine_use_morning'])){
            $Morning = 1;
        }
        if(isset($_POST['medicine_use_afternoon'])){
            $Afternoon = 1;
        }
        if(isset($_POST['medicine_use_evening'])){
            $Evening = 1;
        }

        // echo $ID_Appointment;
        // echo $medicine_choose;
        // echo $medicine_numberous;
        // echo $medicine_use;
        // echo $medicine_use_morning;
        // echo $medicine_use_afternoon;
        // echo $medicine_use_evening;

        // Get ID_Prescription
        $sql_get_idPrescription = "SELECT * FROM presciption WHERE ID_Appointment=$ID_Appointment";
        $query_get_idPrescription = mysqli_query($conn, $sql_get_idPrescription);
        $rows_get_idPrescription = mysqli_fetch_array($query_get_idPrescription);
        $ID_Prescription = $rows_get_idPrescription['ID_Prescription'];

        //Get UnitPrice from medicine
        $sql_get_UnitPrice = "SELECT * FROM medicine WHERE ID_Medicine=$ID_Medicine";
        $query_get_UnitPrice = mysqli_query($conn, $sql_get_UnitPrice);
        $rows_get_UnitPrice = mysqli_fetch_array($query_get_UnitPrice);
        $UnitPrice = $rows_get_UnitPrice['UnitPrice'];
        $TotalMoney = $UnitPrice * $Amount;
        // echo $TotalMoney;

        //Add information into medicinesfortreatment
        $sql_add_medicinesfortreatment = "INSERT INTO medicinesfortreatment(ID_Prescription, ID_Medicine, Amount, TotalMoney, DescriptionTreatment, Morning, Afternoon, Evening) VALUES ($ID_Prescription,$ID_Medicine,$Amount,$TotalMoney,'$DescriptionTreatment',$Morning,$Afternoon,$Evening)";
        $query_add_medicinesfortreatment = mysqli_query($conn, $sql_add_medicinesfortreatment);

        if($query_add_medicinesfortreatment){
            header("location: ./../../index.php?page_layout=checkup&ID_Appointment=$ID_Appointment");
        }
    }
?>