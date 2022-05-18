<div class="diagnose-checkedup">
    <div>
        <h1 class="heading-main">Chẩn đoán</h1>
        <div class="detail-prescription-table table-custom">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Lý do khám</th>
                            <td><?php echo $rows_medicalRecord['ReasonCheckup'] ?></td>
                        </tr>
                        <tr>
                            <th>Toàn thân</th>
                            <td><?php echo $rows_medicalRecord['BodyCheck'] ?> </td>
                        </tr>
                        <tr>
                            <th>Các bộ phận</th>
                            <td><?php echo $rows_medicalRecord['BodyPartsCheck'] ?></td>
                        </tr>
                        <tr>
                            <th>Mạch</th>
                            <td><?php echo $rows_medicalRecord['PulseRate'] ?>lần/phút</td> 
                        </tr>
                        <tr>
                            <th>Nhiệt độ</th>
                            <td><?php echo $rows_medicalRecord['Temp'] ?>°C</td>
                        </tr>
                        <tr>
                            <th>Huyết áp</th>
                            <td><?php echo $rows_medicalRecord['BloodPressure'] ?>mmHg</td>
                        </tr>
                        <tr>
                            <th>Nhịp thở</th>
                            <td><?php echo $rows_medicalRecord['Breathing'] ?>lần/phút</td>
                        </tr>
                        <tr>
                            <th>Chiều cao</th>
                            <td><?php echo $rows_medicalRecord['Height'] ?>m</td> 
                        </tr>
                        <tr>
                            <th>Cân nặng</th>
                            <td><?php echo $rows_medicalRecord['Weight'] ?>Kg</td> 
                        </tr>
                        <tr>
                            <th>Kết luận</th>
                            <td><?php echo $rows_medicalRecord['Result'] ?></td>
                        </tr>
                        <tr>
                            <th>Hướng điều trị</th>
                            <td><?php echo $rows_medicalRecord['TreatmentDirection'] ?></td>
                        </tr>
                        <tr>
                            <th>Lời dặn</th>
                            <td><?php echo $rows_medicalRecord['Advice'] ?></td>
                        </tr>
                        <tr>
                            <th>Tái khám</th>
                            <td><?php echo $rows_medicalRecord['Date_ReCheckup'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>        
</div>