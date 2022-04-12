<?php
    if(isset($_GET['ID_Appointment'])){
        $ID_Appointment = $_GET['ID_Appointment'];
        
        ?>
        <div class="detail_record">
            <h3>Chi tiết hồ sơ</h3>
            <table class="personalInfoTable recordTable">
                <tr>
                    <th>Khám bệnh</th>
                    <td><?php echo $ID_Appointment ?></td>
                    <td><?php echo $rows['Name_Staff'] ?></td>
                    <td><?php echo $rows['TitleDisease'] ?></td>
                    <td>Đơn thuốc</td>
                </tr>
                <tr>
                    <th>Giấy hẹn</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Tổng hợp chi phí</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="update-record">
                <form action="./modules_staff/checked_up/update_checkedup.php" method="POST">
                    <input type="hidden" name="ID_Appointment" value="<?php echo $ID_Appointment ?>">
                    <h3 class="heading3">Tổng quát</h3>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Lý do khám</label>
                        <div class="col-sm-10">
                            <input type="text" class="input-form" name="reasoncheckup" id="reasoncheckup" value="<?php echo $rows['ReasonCheckup'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Toàn thân</label>
                        <div class="col-sm-10">
                            <input type="text" name="bodycheck" class="input-form" id="bodycheck" value="<?php echo $rows['BodyCheck'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Các bộ phận</label>
                        <div class="col-sm-10">
                            <input type="text" name="bodypartscheck" class="input-form" id="bodypartscheck" value="<?php echo $rows['BodyPartsCheck'] ?>">
                        </div>
                    </div>
                    <h3 class="heading3">Sinh hiệu</h3>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mạch</label>
                        <div class="col-sm-10">
                            <input type="text" class="input-form-title" name="pulserate" class="form-control" id="pulserate" value="<?php echo $rows['PulseRate'] ?>"> lần/phút
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nhiệt độ</label>
                        <div class="col-sm-10">
                            <input type="text" name="temp" class="input-form-title" id="temp" value="<?php echo $rows['Temp'] ?>"> °C
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Huyết áp</label>
                        <div class="col-sm-10">
                            <input type="text" name="bloodpressure" class="input-form-title" id="bloodpressure" value="<?php echo $rows['BloodPressure'] ?>"> mmHg
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nhịp thở</label>
                        <div class="col-sm-10">
                            <input type="text" name="breathing" class="input-form-title" id="breathing" value="<?php echo $rows['Breathing'] ?>"> lần/phút
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Chiều cao</label>
                        <div class="col-sm-10">
                            <input type="text" name="height" class="input-form-title" id="height" value="<?php echo $rows['Height'] ?>"> m
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Cân nặng</label>
                        <div class="col-sm-10">
                            <input type="text" name="weight" class="input-form-title" id="weight" value="<?php echo $rows['Weight'] ?>"> Kg
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kết luận</label>
                        <div class="col-sm-10">
                            <textarea name="result" id="result" cols="20" rows="5" maxlength="500" ><?php echo $rows['Result'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Hướng điều trị</label>
                        <div class="col-sm-10">
                            <textarea name="direction" id="direction" cols="20" rows="5" maxlength="500"><?php echo $rows['TreatmentDirection'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Lời dặn</label>
                        <div class="col-sm-10">
                            <textarea name="advice" id="advice" cols="20" rows="5" maxlength="500"><?php echo $rows['Advice'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tái khám</label>
                        <div class="col-sm-10">
                            <input type="date" name="dateRecheckup" class="input-form" id="dateRecheckup" value="<?php echo $rows['Date_ReCheckup'] ?>">
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="update_btn" value="Cập nhật">
                    </div>
                </form>
            </div>
        </div>
    <?php }else {?>
        <div class="detail_record">
            <h3>Chi tiết hồ sơ</h3>
        </div>
    <?php }
?>