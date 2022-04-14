<?php
    include './config.php';

	$ID_Appointment = $_GET['ID_Appointment'];
    $username = $_SESSION['login_client'];    
?>


<section class="doctorList">
    <h1> Thông tin khám bệnh </h1>
        <div class="container-appointment">
            <div class="content-appointment">
                <?php
                    $sql_prescription = "SELECT * FROM medicinesfortreatment 
                    JOIN presciption ON medicinesfortreatment.ID_Prescription=presciption.ID_Prescription
                    JOIN medicine ON medicine.ID_Medicine=medicinesfortreatment.ID_Medicine
                    JOIN appointment ON appointment.ID_Appointment=presciption.ID_Appointment
                    WHERE presciption.ID_Appointment=$ID_Appointment";
                    $query_prescription = mysqli_query($conn, $sql_prescription);
                ?>
                <h3>Toa thuốc</h3>
                <table>
                    <tr>
                        <th>Tên thuốc</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Mức hưởng BHYT</th>
                        <th>Xem thông tin thuốc</th>
                    </tr>
                    <?php
                        while($rows_prescription = mysqli_fetch_array($query_prescription)){
                    ?>
                    <tr>
                        <td> <?php echo $rows_prescription['TitleMedicine'] ?> </td>
                        <td> <?php echo $rows_prescription['Amount'] ?> </td>
                        <td> <?php echo $rows_prescription['UnitPrice'] ?> </td>
                        <td> <?php echo $rows_prescription['TotalMoney'] ?> </td>
                        <td> <?php echo $rows_prescription['BHYT_Checkin']*100 ?>% </td>
                        <td>Xem</td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <?php 
                    $query_prescriptionSummary = mysqli_query($conn, $sql_prescription);
                    $rows_prescriptionSummary = mysqli_fetch_array($query_prescriptionSummary);
                ?>
                <p>Tổng chi phí: <?php echo $rows_prescriptionSummary['TotalAmount'] ?></p>
                <p>BHYT chi trả: <?php echo $rows_prescriptionSummary['BHYT_Pay'] ?></p>
                <p>Bệnh nhân chi trả: <?php echo $rows_prescriptionSummary['Patient_Pay'] ?></p>
            </div>
            <button class="modal-btn-evaluation"> Đánh giá Bác sĩ
                <span><i class="fas fa-plus"></i></span>
            </button>
        </div>
</section>

<!-- =========== modal evaluation =============-->
<div class="modal-bg-evaluation">
    <div class="modal-evaluation">
        <div class="container-evaluation">
            <div class="post">
                <div class="text">Thanks</div>
            </div>
            <div class="star-widget">
                <input type="radio" name="rate" id="rate-5">
                <label for="rate-5" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-4">
                <label for="rate-4" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-3">
                <label for="rate-3" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-2">
                <label for="rate-2" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-1">
                <label for="rate-1" class="fas fa-star"></label>

                <form id="evaluation-form" action="./modules_client/prescription/evaluation.php" method="POST">
                    <header></header>
                    <div class="textarea">
                        <textarea id="myTextarea" name="myTextarea" cols="30" rows="10" placeholder="Đánh giá của bạn về bệnh nhân..."></textarea>
                        <input type="hidden" name="votingRate" id="votingRate">
                        <input type="hidden" name="ID_Appointment" id="ID_Appointment" value="<?php echo $ID_Appointment ?>">
                    </div>
                    <div class="btn-evaluation">
                        <button type="submit" name="evaluation_btn">Đánh giá</button>
                        <!-- <button name="evaluation_btn" class="modal-close-evaluation">Hủy bỏ</button> -->
                    </div>
                </form>
            </div>
        </div>
        <span class="modal-close-evaluation">X</spsan>
    </div>
</div>

<script src="./modules_client/prescription/evaluation.js"></script>