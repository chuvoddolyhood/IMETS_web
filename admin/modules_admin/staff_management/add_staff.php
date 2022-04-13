<?php
    include './../../../config.php';
    if(isset($_POST["btn_submit"])){
        $Name = $_POST["Name"];
        $DOB = $_POST['DOB'];
        $Sex = $_POST['Sex'];
        $Address = $_POST['Address'];
        $CMND = $_POST['CMND'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Position = $_POST['Position'];
        $ID_Dept = $_POST['ID_Dept'];
        $DateStartWork = $_POST['DateStartWork'];
        $Username = $_POST['Username'];
        $Password = md5($_POST['Password']);

        // echo $Name;
        // echo $DOB;
        // echo $Sex;
        // echo $Address;
        // echo $CMND;
        // echo $PhoneNumber;
        // echo $Position;
        // echo $ID_Dept;
        // echo $DateStartWork;
        // echo $Username;
        // echo $Password;

        //Them thong tin vao staff
        $sql_add_staff = "INSERT INTO staff(Name_Staff, DOB_Staff, Sex_Staff, Address_Staff, CMND_Staff, PhoneNumber_Staff, Position, ID_Dept, DateStartWork, UserName, Password) 
        VALUES ('$Name','$DOB','$Sex','$Address','$CMND','$PhoneNumber','$Position','$ID_Dept','$DateStartWork','$Username','$Password')";
        $query_staff = mysqli_query($conn, $sql_add_staff);

        //Lay ID_Staff
        $sql_get_IDStaff = "SELECT ID_Staff FROM staff WHERE CMND_Staff='$CMND'";
        $query_get_IDStaff = mysqli_query($conn, $sql_get_IDStaff);
        $rows_get_IDStaff = mysqli_fetch_array($query_get_IDStaff);
        $ID_Staff = $rows_get_IDStaff['ID_Staff']; 


        $files = $_FILES['fileupload'];
        $tmp_name = $files['tmp_name'];
        $names = $files['name'];
        $errors     = $files['error'];
        $numitems = count($names);

        for ($i = 0; $i < $numitems; $i ++) {
            //Them thong tin vao staff
            $sql_add_imgStaff = "INSERT INTO img_staff(`ID_Staff`, imgName) 
                    VALUES ('$ID_Staff','$names[$i]')";
            $query_imgStaff = mysqli_query($conn, $sql_add_imgStaff);

            //Kiểm tra file thứ $i trong mảng file, up thành công không
            if ($errors[$i] == 0){
                $path="./../../../img/staff/".$names[$i];
                if(move_uploaded_file($tmp_name[$i], $path)){
                    echo "Tải tập tin thành công";
                }else{
                    echo "Tải tập tin thất bại";
                }
            }
        }

        
        header("location: ./../../index.php?page_layout=staff_management");
    }
?>