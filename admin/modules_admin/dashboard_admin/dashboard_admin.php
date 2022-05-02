<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<main>
    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Xin chào <?php echo $_SESSION['login_admin'] ?></h1>
                <p>Chào mừng đến với trang quản lý admin</p>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->

        <?php
             $sql_appoinment_evluation = "SELECT COUNT(`Date_Booking`) AS soluongDK, COUNT(`Date_HospitalDischarge`) AS soluongXV, COUNT(evaluation.DoctorStar) AS soluongDG
             FROM `appointment` Left Join evaluation ON appointment.ID_Appointment=evaluation.ID_Appointment
             WHERE MONTH(`Date_HospitalDischarge`) = MONTH(NOW())";
            $query_appoinment_evluation = mysqli_query($conn, $sql_appoinment_evluation);
            $rows_appoinment_evluation = mysqli_fetch_array($query_appoinment_evluation);
        ?>

        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
            <div class="card">
                <i class="fas fa-id-card-alt fa-2x text-yellow" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Bệnh nhân đăng ký</p>
                    <span class="font-bold text-title"><?php echo $rows_appoinment_evluation['soluongDK'] ?></span>
                </div>
            </div>

            <div class="card">
                <i class="fas fa-hand-holding-medical fa-2x text-red" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Bệnh nhân xuất viện</p>
                    <span class="font-bold text-title"><?php echo $rows_appoinment_evluation['soluongXV'] ?></span>
                </div>
            </div>

            <div class="card">
                <?php
                    $sql_staff = "SELECT COUNT(*) AS soluongNV FROM `staff` WHERE `Position` NOT LIKE 'admin'";
                    $query_staff = mysqli_query($conn, $sql_staff);
                    $rows_staff = mysqli_fetch_array($query_staff);
                ?>
                <i class="fas fa-user-md fa-2x text-yellow" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Số lượng nhân viên y tế</p>
                    <span class="font-bold text-title"><?php echo $rows_staff['soluongNV'] ?></span>
                </div>
            </div>

            <div class="card">
                <i class="fa fa-thumbs-up fa-2x text-green" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Số lượng đánh giá</p>
                    <span class="font-bold text-title"><?php echo $rows_appoinment_evluation['soluongDG'] ?></span>
                </div>
            </div>
        </div>
        <!-- MAIN CARDS ENDS HERE -->

        <!-- CHARTS STARTS HERE -->
        <div class="charts">
            <div class="charts__left">
                <div class="charts__left__title">
                    <div>
                        <h1>Bác sĩ ưu tú</h1>
                        <p>IMETS</p>
                    </div>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <canvas id="proStaff_Chart" width="200" height="100"></canvas>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                    <h1>Tổng quan tài chính</h1>
                    <p>Trong năm 2022</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>

                <div class="charts__right__cards">
                    <div class="card1">
                        <?php 
                            include './../config.php';
                            $sql_BHYT = "SELECT COUNT(BHYT_Checkin) AS BHYT
                                    FROM appointment
                                    WHERE BHYT_Checkin != 0";
                            $query_BHYT = mysqli_query($conn, $sql_BHYT);
                            $rows_BHYT = mysqli_fetch_array($query_BHYT);
                        ?>
                        <h1>Khám BHYT</h1>
                        <p><?php echo $rows_BHYT['BHYT'] ?></p>
                    </div>

                    <div class="card2">
                        <?php 
                            $sql_NoBHYT = "SELECT COUNT(BHYT_Checkin) AS NoBHYT
                                    FROM appointment
                                    WHERE BHYT_Checkin = 0";
                            $query_NoBHYT = mysqli_query($conn, $sql_NoBHYT);
                            $rows_NoBHYT = mysqli_fetch_array($query_NoBHYT);
                        ?>
                        <h1>Khám dịch vụ</h1>
                        <p><?php echo $rows_NoBHYT['NoBHYT'] ?></p>
                    </div>

                    <?php 
                        $sql_Pay = "SELECT SUM(`BHYT_Pay`) AS BHYT_Pay, SUM(`Patient_Pay`) AS Patient_Pay,SUM(`TotalAmount`) AS TotalAmount FROM presciption";
                        $query_Pay = mysqli_query($conn, $sql_Pay);
                        $rows_Pay = mysqli_fetch_array($query_Pay);
                    ?>

                    <div class="card3">
                        <h1>BHYT chi trả</h1>
                        <p><?php echo number_format($rows_Pay['BHYT_Pay']) ?>₫</p>
                    </div>

                    <div class="card4">
                        <h1>Tiền dịch vụ</h1>
                        <p><?php echo number_format($rows_Pay['Patient_Pay']) ?>₫</p>
                    </div>

                    <div class="card4">
                        <h1>Thu nhập</h1>
                        <p><?php echo number_format($rows_Pay['TotalAmount']) ?>₫</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- CHARTS ENDS HERE -->
    </div>
</main>

<?php
    //Bieu do nhan vien cham chi
    $numberOfAppoiment = '';
    $starVoting = '';
    $nameOfStaff = '';

    $sql_numberOfAppoinment = "SELECT  staff.Name_Staff, COUNT(ID_Appointment) AS soluong, staff.VoteRate 
                    FROM `appointment` JOIN staff ON appointment.ID_Staff=staff.ID_Staff
                    GROUP BY staff.ID_Staff 
                    ORDER BY COUNT(ID_Appointment)  DESC
                    LIMIT 10";
    $query_numberOfAppoinment = mysqli_query($conn, $sql_numberOfAppoinment);

    while($rows_numberOfAppoinment = mysqli_fetch_array($query_numberOfAppoinment)){
        $numberOfAppoiment = $numberOfAppoiment . '"' . $rows_numberOfAppoinment['soluong']. '",';
        $starVoting = $starVoting . '"' . $rows_numberOfAppoinment['VoteRate']. '",';
        $nameOfStaff = $nameOfStaff . '"' . $rows_numberOfAppoinment['Name_Staff']. '",';
    }

    $numberOfAppoiment = trim($numberOfAppoiment,",");
    $starVoting = trim($starVoting,",");
    $nameOfStaff = trim($nameOfStaff,",");
?>

<script>
    const proStaff = document.getElementById('proStaff_Chart').getContext('2d');
    const proStaff_Chart = new Chart(proStaff, {
        data: {
            datasets: [{
                label: 'Số lần khám',
                type: 'bar',
                data: [<?php echo $numberOfAppoiment; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1,
                // this dataset is drawn below
                order: 2
            },
            {
                label: 'Độ tín nhiệm',
                data: [<?php echo $starVoting; ?>],
                type: 'bar',
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1,
                // this dataset is drawn on top
                order: 1
            }],
            labels: [<?php echo $nameOfStaff ?>]
        },
    });
</script>