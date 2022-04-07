<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php
    include './../config.php';

    $ID_Appointment = $_GET['ID_Appointment'];

    $sql = "SELECT * FROM appointment 
            JOIN patient ON appointment.ID_Patient=patient.ID_Patient 
            JOIN schedule ON schedule.ID_schedule=appointment.Date_Checkup";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query);
?>

<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="./index.php?page_layout=list_patient">Danh sách chờ khám</a> /
                <a href="">Phiếu khám</a>
            </div>
        </div>
        <div class="content-checkup">
            <div class="card-body">
                <div class="card-header">
                    <h1>Bệnh nhân <?php echo $rows["Name"] ?></h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tên bệnh nhân</th>
                                <th>Thời gian hẹn</th>
                                <th>Số phiếu</th>
                                <th>Năm sinh</th>
                                <th>Giới tính</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>CMND</th>
                                <th>BHYT</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $rows["Name"] ?></td>
                                <td><?php echo $rows["start"] ?></td>
                                <td><?php echo $rows["ID_Appointment"] ?></td>
                                <td><?php echo $rows["DOB"] ?></td>
                                <td><?php echo $rows["Sex"] ?></td>
                                <td><?php echo $rows["Address"] ?></td>
                                <td><?php echo $rows["PhoneNumber"] ?></td>
                                <td><?php echo $rows["CMND"] ?></td>
                                <td><?php echo $rows["ID_BHYT"] ?></td>
                                <td><?php echo $rows["StatusAppointment"] ?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="checkup-container">
                <div class="checkup-table">
                    <h3>Khám bệnh</h3>
                    <div class="pre-checkup">
                        <div class="precheckup-container">
                            <input type="hidden" id="ID_Appointment" name="ID_Appointment" value="<?php echo $ID_Appointment ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Lý do khám</label>
                                <div class="col-sm-10">
                                    <input type="text" name="reasoncheckup" id="reasoncheckup" class="form-control">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Toàn thân</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bodycheck" class="form-control" id="bodycheck" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Các bộ phận</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bodypartscheck" class="form-control" id="bodypartscheck" >
                                    </div>
                                </div>
                                    <!-- <div class="form-group">
                                        <label class="col-sm-2 control-label">Kết quả cận lâm sàng</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cls" class="form-control" id="cls" >
                                        </div>
                                    </div> -->
                            </div>

                            <div class="precheckup-container">
                                <h5>Sinh hiệu</h5>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mạch</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="pulserate" class="form-control" id="pulserate" > lần/phút
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nhiệt độ</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="temp" class="form-control" id="temp" >°C
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Huyết áp</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bloodpressure" class="form-control" id="bloodpressure" >mmHg
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nhịp thở</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="breathing" class="form-control" id="breathing" >lần/phút
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Chiều cao</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="height" class="form-control" id="height" >m
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Cân nặng</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="weight" class="form-control" id="weight" >Kg
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            
                        <div class="result-checkup">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Chẩn đoán bệnh</label>
                                <input type="text" name="search" id="search" placeholder="Tên bệnh">
                                <div id="back_result"></div>
                                <div class="detail-prescription-table">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã bệnh</th>
                                                    <th>Tên bệnh</th>
                                                    <th>Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                        include './../config.php';
                                                        $sql = "SELECT ID_Diagnose,disease.ID_Disease, disease.TitleDisease
                                                            FROM diagnose JOIN disease ON diagnose.ID_Disease=disease.ID_Disease
                                                            ORDER BY ID_Diagnose ASC";
                                                        $query = mysqli_query($conn, $sql);
                                                        $count=0;
                                                        while($rows = mysqli_fetch_array($query)){ ?>
                                                    <tr>
                                                        <td><?php echo ++$count ?></td>
                                                        <td><?php echo $rows["ID_Disease"] ?></td>
                                                        <td><?php echo $rows["TitleDisease"] ?></td>
                                                        <td>
                                                            <a  onclick="return confirm_Del('<?php echo $rows['TitleDisease'] ?>')"
                                                                href="./modules_staff/checkup/diagnose_delete_disease.php?ID_Diagnose=<?php echo $rows["ID_Diagnose"] ?>"
                                                                style="background-color: red;color: white;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                                                    xóa
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kết luận</label>
                                <div class="col-sm-10">
                                    <textarea name="result" id="result" cols="20" rows="5" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hướng điều trị</label>
                                <div class="col-sm-10">
                                    <textarea name="dicection" id="dicection" cols="20" rows="5" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Lời dặn</label>
                                <div class="col-sm-10">
                                    <textarea name="advice" id="advice" cols="20" rows="5" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tái khám</label>
                                <div class="col-sm-10">
                                    <input type="date" name="dateRecheckup" class="form-control" id="dateRecheckup" >
                                </div>
                            </div>
                        </div>
                    <button onclick="add_diagnose()"> Lưu
                        <span><i class="fas fa-plus"></i></span>
                    </button>
                </div>

                <div class="prescription">
                    <div class="prescription-head">
                        <h1>Đơn thuốc</h1>
                        <div class="input-prescription">
                            <form action="./modules_staff/checkup/prescription_add_medicine.php" method="POST">
                                <input type="hidden" name="ID_Appointment" value="<?php echo $ID_Appointment ?>">
                                <table>
                                    <tr>
                                        <th>Thuốc - vật tư</th>
                                        <td>
                                            <select name="medicine_choose">
                                                <?php
                                                    $sql_get_medicine = "SELECT * FROM medicine ORDER BY TitleMedicine ASC";
                                                    $query_get_medicine = mysqli_query($conn, $sql_get_medicine);
                                                    while($rows_get_medicine = mysqli_fetch_array($query_get_medicine)){
                                                ?>
                                                <option value="<?php echo $rows_get_medicine['ID_Medicine'] ?>"><?php echo $rows_get_medicine['TitleMedicine'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Số lượng</th>
                                        <td><input type="number" name="medicine_numberous"></td>
                                    </tr>
                                    <tr>
                                        <th>Cách dùng</th>
                                        <td>
                                            <input type="text" name="medicine_use"><br>
                                            <input type="checkbox" name="medicine_use_morning" value="1"> Sáng<br>
                                            <input type="checkbox" name="medicine_use_afternoon" value="1"> Chiều<br>
                                            <input type="checkbox" name="medicine_use_evening" value="1"> Tối<br><br>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <th>Thời gian dùng toa</th>
                                        <td><input type="number" name="medicine_time" id="medicine_time">ngày</td>
                                    </tr>
                                </table>
                                <div>
                                    <input type="submit" name="btn_medicine_prescription" value="Thêm">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="detail-prescription">
                        <h1>Chi tiết thuốc - vật tư</h1>
                        <div class="detail-prescription-table">
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên thuốc - vật tư</th>
                                            <th>Đơn vị</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Tổng tiền</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql_get_medicineChoose = "SELECT * 
                                                FROM medicinesfortreatment JOIN presciption ON medicinesfortreatment.ID_Prescription=presciption.ID_Prescription
                                                JOIN medicine ON medicinesfortreatment.ID_Medicine=medicine.ID_Medicine
                                                WHERE presciption.ID_Appointment=$ID_Appointment";
                                            $query_get_medicineChoose = mysqli_query($conn, $sql_get_medicineChoose);
                                            $stt=0;
                                            $sumMoney=0;
                                            while($rows_get_medicineChoose = mysqli_fetch_array($query_get_medicineChoose)){
                                        ?>
                                        <tr>
                                            <td><?php echo ++$stt?></td>
                                            <td><?php echo $rows_get_medicineChoose['TitleMedicine'] ?></td>
                                            <td><?php echo $rows_get_medicineChoose['Type'] ?></td>
                                            <td><?php echo $rows_get_medicineChoose['Amount'] ?></td>
                                            <td><?php echo $rows_get_medicineChoose['UnitPrice'] ?></td>
                                            <td><?php 
                                                echo $rows_get_medicineChoose['TotalMoney'];
                                                $sumMoney=$sumMoney+$rows_get_medicineChoose['TotalMoney'];
                                            ?></td>
                                            <td>
                                                <a  onclick="return confirm_Del_Prescription('<?php echo $rows_get_medicineChoose['TitleMedicine'] ?>')"
                                                    href="./modules_staff/checkup/prescription_delete.php?ID_Medicine=<?php echo $rows_get_medicineChoose["ID_Medicine"] ?>&ID_Appointment=<?php echo $ID_Appointment ?>"
                                                    style="background-color: red;color: white;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                                    Xóa
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        
                        <div>
                            <h4>Tổng tiền</h4>
                            <p id="TotalMoney"><?php echo $sumMoney ?></p>
                        </div>
                        <div>
                            <button onclick="exportPrescription()"> Xuất toa thuốc
                                <span><i class="fas fa-plus"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="./modules_staff/checkup/diagnose.js"></script>