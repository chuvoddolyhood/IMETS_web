<?php
    include './../../config.php';
    use PHPMailer\PHPMailer\PHPMailer;

    $email = $_GET['email'];
    
    $sql_confirmEmail = "SELECT * FROM `patient` WHERE `UserName` = '$email'";
    $query_confirmEmail = mysqli_query($conn, $sql_confirmEmail);

    if(mysqli_num_rows($query_confirmEmail)>0){
        $newPassword = rand(100000,999999);
        $randomPassword = md5($newPassword);

        $sql_updatePass= "UPDATE patient SET Password='$randomPassword' WHERE `UserName` = '$email'";
        $query_updatePass = mysqli_query($conn, $sql_updatePass);

        if($query_updatePass){
            echo 'Updated';
            sendNewPassword($email, $newPassword);
        }
    } else {
        echo 'Email hoặc tài khoản vẫn chưa được đăng ký.';
    }


    function sendNewPassword($email, $newPassword){         
        $nameFrom = 'imets';
        $emailFrom = 'imets.cantho@gmail.com';
        $subject = 'Cap nhat mat khau moi';
        $body = "<p> Mat khau da duoc cap nhat moi tu website imets </p>
            Mat khau moi la: {$newPassword}";

        require_once "./../../library/PHPMailer/PHPMailer.php";
        require_once "./../../library/PHPMailer/SMTP.php";
        require_once "./../../library/PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "imets.cantho@gmail.com"; //enter you email address
        $mail->Password = 'imets.cantho.2401'; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($emailFrom, $nameFrom);
        $mail->addAddress($email); //enter you email address
        $mail->Subject = ("$subject");
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
        
    }

?>