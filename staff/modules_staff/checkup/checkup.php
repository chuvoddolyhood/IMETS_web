<?php
    include './../config.php';
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
                <div class="prescription">
                    <div class="prescription-head">
                        <h1>Đơn thuốc</h1>
                        <div class="input-prescription">
                            <form action="">
                                <table>
                                    <tr>
                                        <th>Thuốc - vật tư</th>
                                        <td><input type="text" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <th>Đơn vị</th>
                                        <td><select name="" id="">
                                            <option value="">Gói</option>
                                            <option value="">Viên</option>
                                            <option value="">Lọ</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <th>Số lượng</th>
                                        <td><input type="number" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <th>Cách dùng</th>
                                        <td>
                                            <input type="text" name="" id=""><br>
                                            <input type="checkbox" name="gender" value="male"> Sáng<br>
                                            <input type="checkbox" name="gender" value="female"> Chiều<br>
                                            <input type="checkbox" name="gender" value="other"> Tối<br><br>
                                        </td>

                                        
                                    </tr>
                                </table>
                                <div>
                                    <input type="button" name="" id="" value="Thêm">
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
                                            <th>Giảm giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>abc</td>
                                            <td>Gói</td>
                                            <td>5</td>
                                            <td>5000</td>
                                            <td>25000</td>
                                            <td>10%</td>
                                            <td>10000</td>
                                        </tr>
                                        
                                    </thead>
                                </table>
                            </div>
                        </div>
                        
                        <div>
                            <h4>Tổng tiền</h4>
                            <p>10000</p>
                        </div>
                        <div>
                            <button>Xuất toa thuốc</button>
                        </div>
                    </div>
                </div>
                <div class="checkup-table">
                    <div class="abc">
                        <h3>Khám bệnh</h3>
                        <form action="">
                            <div class="pre-checkup">
                                <div class="precheckup-container">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Lý do khám</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dateworking" class="form-control" id="start" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Toàn thân</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dateworking" class="form-control" id="start" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Các bộ phận</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dateworking" class="form-control" id="start" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kết quả cận lâm sàng</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dateworking" class="form-control" id="start" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Chẩn đoán bệnh</label>
                                        <div class="col-sm-10">
                                            <textarea name="diagnose" id="" cols="20" rows="10" maxlength="500"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="precheckup-container">
                                    <h5>Sinh hiệu</h5>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Mạch</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dateworking" class="form-control" id="start" > lần/phút
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nhiệt độ</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dateworking" class="form-control" id="start" >°C
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Huyết áp</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dateworking" class="form-control" id="start" >mmHg
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nhịp thở</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dateworking" class="form-control" id="start" >lần/phút
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Cân nặng</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dateworking" class="form-control" id="start" >Kg
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="result-checkup">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kết luận</label>
                                    <div class="col-sm-10">
                                        <textarea name="diagnose" id="" cols="20" rows="5" maxlength="500"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Hướng điều trị</label>
                                    <div class="col-sm-10">
                                        <textarea name="diagnose" id="" cols="20" rows="5" maxlength="500"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Lời dặn</label>
                                    <div class="col-sm-10">
                                        <textarea name="diagnose" id="" cols="20" rows="5" maxlength="500"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tái khám</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="dateworking" class="form-control" id="start" > ngày
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>