<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="">Danh sách chờ khám</a>
            </div>
            <div class="card-header">
                <h2>Danh sách bệnh nhân chờ khám</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Tên bệnh nhân</th>
                            <th>Thời gian hẹn</th>
                            <th>Số phiếu</th>
                            <th>Năm sinh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>CMND</th>
                            <th>BHYT</th>
                            <th>Trạng thái</th>
                            <th>Nhận bệnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                                include './../config.php';
                                $sql = "SELECT * FROM appointment 
                                JOIN patient ON appointment.ID_Patient=patient.ID_Patient 
                                JOIN schedule ON schedule.ID_schedule=appointment.Date_Checkup";
                                $count_order=0;
                                $query = mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($query)){ ?>
                                <tr>
                                    <td><?php echo ++$count_order ?></td>
                                    <td><?php echo $rows["Name"] ?></td>
                                    <td><?php echo $rows["start"] ?></td>
                                    <td><?php echo $rows["ID_Appointment"] ?></td>
                                    <td><?php echo $rows["DOB"] ?></td>
                                    <td><?php echo $rows["Address"] ?></td>
                                    <td><?php echo $rows["PhoneNumber"] ?></td>
                                    <td><?php echo $rows["CMND"] ?></td>
                                    <td><?php echo $rows["ID_BHYT"] ?></td>
                                    <td><?php echo $rows["StatusAppointment"] ?></td>
                                    <?php 
                                    // if($rows["StatusAppointment"]=='Chưa khám'){ 
                                        ?>
                                    <td>
                                        <a  onclick="return confirm_checkup('<?php echo $rows['ID_Appointment'] ?>','<?php echo $rows['Name'] ?>')"
                                        href="#"
                                        style="background-color: green;color: white;padding: 8px 10px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                            Thực hiện
                                        </a>
                                    </td>
                                    <?php 
                                        // } 
                                    ?>
                                </tr>
                            <?php } ?>
                        </tr>
                    </thead>
                </table>
                <p><b><?php echo 'Tổng bệnh nhân: '. $count_order;?></b></p>
            </div>
        </div>
    </div>
</main>

<script>
    function confirm_checkup(id,name){
        if(confirm("Bạn nhận bệnh từ "+name+" không ?")){
            // alert('1');

            //call ajax
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "./modules_staff/checkup/createDocumentCheckup.php?ID_Appointment="+id;
            var asynchronous = true;
            ajax.open(method, url, asynchronous);

            //send
            ajax.send();

            //receive
            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    var response = this.responseText;
                    if(response=="true"){
                        // alert('abc');
                        window.location.href='./index.php?page_layout=checkup&ID_Appointment='+id;
                    }else{
                        alert(response);
                    }
                }
            }
            return false;
        }
    }
</script>