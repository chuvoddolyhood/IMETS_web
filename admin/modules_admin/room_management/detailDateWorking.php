<?php
    include './../config.php';
    $ID_Room = $_GET['ID_Room'];
    $start = $_GET['date'];
?>

<main>
    <div class="container-table">
        <div class="link-nav-pages">
            <a href="./index.php?page_layout=room_management">Quản lý phòng làm việc</a> / 
            <a href="">Phòng làm việc</a>
        </div>
        <div class="table-header">
            <h1>Lịch phòng <?php echo $ID_Room ?> làm việc trong ngày <?php echo date('d/m/Y', strtotime($start)); ?></h1>
        </div>
        <div class="table-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Giờ bắt đầu</th>
                        <th>Giờ kết thúc</th>
                        <th>Bác sĩ trực</th>
                        <th>Nội dung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                        $sql_room = "SELECT staff.Name_Staff,room.Name_Room,schedule.title,TIME(schedule.start) AS start,TIME(schedule.end) AS end
                            FROM schedule JOIN room ON schedule.ID_Room=room.ID_Room
                                JOIN staff ON staff.ID_Staff=schedule.ID_Staff
                            WHERE room.ID_Room=$ID_Room AND DATE(schedule.start)='$start'
                            ORDER BY schedule.start ASC";
                        $query_room = mysqli_query($conn, $sql_room);
                        $STT=0;
                        while($rows_room = mysqli_fetch_array($query_room)){
                    ?>
                    <tr>
                        <td><?php echo ++$STT ?></td>
                        <td><?php echo $rows_room['start'] ?></td>
                        <td><?php echo $rows_room['end'] ?></td>
                        <td><?php echo $rows_room['Name_Staff'] ?></td>
                        <td><?php echo $rows_room['title'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
