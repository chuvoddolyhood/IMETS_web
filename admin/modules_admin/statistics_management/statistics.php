<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php 
    include './../config.php'; 
?>

<main>
    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Số liệu kinh doanh</h1>
                <p>Quản lý thông tin tình hình tổng quát bệnh viện</p>
            </div>
        </div>

        <button type="button" class="manage-btn btn-left">Xuất file Excel</button>
        <!-- ############################# Modal Thêm nhân viên ######################################## -->
        <div class="modal-bg-add">
            <div class="modal-add">
            <h2>Xuất báo cáo tạo file Excel</h2>
            <a href="./modules_admin/statistics_management/exportExcel/staffReport.php">Danh sách thông tin nhân viên</a>
            <a href="./modules_admin/statistics_management/exportExcel/patientReport.php" >Danh sách thông tin bệnh nhân</a>
            <a href="./modules_admin/statistics_management/exportExcel/medicineReport.php">Danh sách thuốc điều trị</a>
            <span class="modal-close-add">X</spsan>
            </div>
        </div>

        <script type="text/javascript">
            var modalBtn_add = document.querySelector('.manage-btn'); //sua ten
            var modalBg_add = document.querySelector('.modal-bg-add');
            var modalClose_add = document.querySelector('.modal-close-add');
            var btn_Close_add = document.querySelector('.modal-close-add-btn');

            modalBtn_add.addEventListener('click', function(){
            modalBg_add.classList.add('bg-active-add');
            });
            
            modalClose_add.addEventListener('click', function(){
            modalBg_add.classList.remove('bg-active-add');
            });

            btn_Close_add.addEventListener('click', function(){
            modalBg_add.classList.remove('bg-active-add');
            });
        </script>

        <!-- MAIN TITLE ENDS HERE -->

        <!-- CHARTS STARTS HERE -->
        <div class="charts">
            <div class="charts__left">
                <div class="charts__left__title">
                    <div>
                        <h1>Biểu đồ doanh số theo tháng</h1>
                        <p>IMETS</p>
                    </div>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <canvas id="myChart" width="200" height="130"></canvas>
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

        <!-- CHARTS STARTS HERE -->
        <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                    <h1>Lượt bệnh nhân khám</h1>
                    <p>IMETS</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
              <canvas id="typeCheck_Chart" width="200" height="200"></canvas>
            </div>

            <div class="charts__right">
                <div class="charts__right__title">
                    <div>
                        <h1>Số lương nhân viên y tế</h1>
                        <p>Theo các khoa</p>
                    </div>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <canvas id="staff_Chart"></canvas>
                
            </div>
        </div>
        <!-- CHARTS ENDS HERE -->

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
                        <h1>Số lương nhân viên y tế</h1>
                        <p>Theo các khoa</p>
                    </div>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <canvas id="staff_Chart"></canvas>
                
            </div>
        </div>
        <!-- CHARTS ENDS HERE -->
    </div>
</main>

<?php 

    //Bieu do doanh so
    $TotalAmount = '';
    $BHYT_Pay = '';
    $Patient_Pay = '';

    $sql_pay = "SELECT SUM(presciption.TotalAmount) AS TotalAmount,
                    SUM(presciption.BHYT_Pay) AS BHYT_Pay,
                    SUM(presciption.Patient_Pay) AS Patient_Pay
                FROM presciption JOIN appointment ON presciption.ID_Appointment=appointment.ID_Appointment
                WHERE  presciption.Status_Pay='Đã thanh toán'
                GROUP BY MONTH(appointment.Date_HospitalDischarge)";
    $query_pay = mysqli_query($conn, $sql_pay);

    while($rows_pay = mysqli_fetch_array($query_pay)){
        $TotalAmount = $TotalAmount . '"' . $rows_pay['TotalAmount']. '",';
        $BHYT_Pay = $BHYT_Pay . '"' . $rows_pay['BHYT_Pay']. '",';
        $Patient_Pay = $Patient_Pay . '"' . $rows_pay['Patient_Pay']. '",';
    }

    $TotalAmount = trim($TotalAmount,",");
    $BHYT_Pay = trim($BHYT_Pay,",");
    $Patient_Pay = trim($Patient_Pay,",");

    //Bieu do benh nhan checkin
    $BHYT_Checkin = '';

    $sql_BHYT_Checkin = "SELECT COUNT(BHYT_Checkin) AS BHYT_Checkin
                        FROM appointment
                        WHERE BHYT_Checkin != 0
                        GROUP BY MONTH(`Date_HospitalDischarge`)";
    $query_BHYT_Checkin = mysqli_query($conn, $sql_BHYT_Checkin);

    while($rows_BHYT_Checkin = mysqli_fetch_array($query_BHYT_Checkin)){
        $BHYT_Checkin = $BHYT_Checkin . '"' . $rows_BHYT_Checkin['BHYT_Checkin']. '",';
    }

    $BHYT_Checkin = trim($BHYT_Checkin,",");
    //--------
    $Service_Checkin = '';

    $sql_Service_Checkin = "SELECT COUNT(BHYT_Checkin) AS Service_Checkin
                        FROM appointment
                        WHERE BHYT_Checkin = 0
                        GROUP BY MONTH(`Date_HospitalDischarge`)";
    $query_Service_Checkin = mysqli_query($conn, $sql_Service_Checkin);

    while($rows_Service_Checkin = mysqli_fetch_array($query_Service_Checkin)){
        $Service_Checkin = $Service_Checkin . '"' . $rows_Service_Checkin['Service_Checkin']. '",';
    }

    $Service_Checkin = trim($Service_Checkin,",");

    //Bieu do nhan vien
    $numberOfStaff = '';
    $titleOfStaff = '';

    $sql_numberOfStaff = "SELECT dept.Name_Dept, COUNT(*) AS soluong
                    FROM `staff` JOIN dept ON staff.ID_Dept=dept.ID_Dept
                    WHERE `Position` NOT LIKE 'admin'
                    GROUP BY dept.ID_Dept";
    $query_numberOfStaff = mysqli_query($conn, $sql_numberOfStaff);

    while($rows_numberOfStaff = mysqli_fetch_array($query_numberOfStaff)){
        $numberOfStaff = $numberOfStaff . '"' . $rows_numberOfStaff['soluong']. '",';
        $titleOfStaff = $titleOfStaff . '"' . $rows_numberOfStaff['Name_Dept']. '",';
    }

    $numberOfStaff = trim($numberOfStaff,",");
    $titleOfStaff = trim($titleOfStaff,",");

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
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'BHYT chi trả',
                data: [<?php echo $BHYT_Pay; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1,
                // this dataset is drawn below
                order: 2
            },{
                label: 'Tiền dịch vụ',
                data: [<?php echo $Patient_Pay; ?>],
                backgroundColor: [
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1,
                // this dataset is drawn below
                order: 2
            }, {
                label: 'Doanh thu',
                data: [<?php echo $TotalAmount; ?>],
                type: 'line',
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
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
        },
    });


    const checkin = document.getElementById('typeCheck_Chart').getContext('2d');
    const typeCheck_Chart = new Chart(checkin, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'BHYT',
                data: [<?php echo $BHYT_Checkin; ?>],
                type: 'line',
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1,
                // this dataset is drawn on top
                order: 1,
                tension: 0.1
            },{
                label: 'Dịch vụ',
                data: [<?php echo $Service_Checkin; ?>],
                type: 'line',
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1,
                // this dataset is drawn on top
                order: 1,
                tension: 0.1
            }],
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
        },
    });

    const numberOfStaff = document.getElementById('staff_Chart').getContext('2d');
    const staff_Chart = new Chart(numberOfStaff, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [<?php echo $numberOfStaff ?>],
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)'
                ],
                hoverOffset: 5
            }],
            labels: [<?php echo $titleOfStaff ?>]
        },
    });

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
                type: 'line',
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