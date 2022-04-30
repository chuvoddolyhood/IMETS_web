<?php
    if(isset($_GET['week'])){
        $week = $_GET['week'];

        //Doi week number -> date
        $year=substr($week,0,4);
        $week_no=substr($week,6);
        $week_start = new DateTime();
        $week_start->setISODate($year,$week_no);
        $dateStart = $week_start->format('Y-m-d'); //Ngay dau tuan (thu 2)


        //Doi date -> week number
        // $ddate = "2022-04-30";
        // $date = new DateTime($ddate);
        // $week = $date->format("W");
        // echo "Weeknummer: $week";
        
?>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Tên phòng</th>
            <th>Thứ 2 <?php echo $dateStart ?></th>
            <th>Thứ 3 <?php echo date ( 'd-m-Y' , strtotime ( '+1 day' , strtotime ( $dateStart ) ) ); ?></th>
            <th>Thứ 4 <?php echo date ( 'd-m-Y' , strtotime ( '+2 day' , strtotime ( $dateStart ) ) ); ?></th>
            <th>Thứ 5 <?php echo date ( 'd-m-Y' , strtotime ( '+3 day' , strtotime ( $dateStart ) ) ); ?></th>
            <th>Thứ 6 <?php echo date ( 'd-m-Y' , strtotime ( '+4 day' , strtotime ( $dateStart ) ) ); ?></th>
            <th>Thứ 7 <?php echo date ( 'd-m-Y' , strtotime ( '+5 day' , strtotime ( $dateStart ) ) ); ?></th>
            <th>Chủ Nhật <?php echo date ( 'd-m-Y' , strtotime ( '+6 day' , strtotime ( $dateStart ) ) ); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            include './../config.php';
            $sql_room = "SELECT Name_Room FROM `room`";
            $query_room = mysqli_query($conn, $sql_room);
            while($rows_room = mysqli_fetch_array($query_room)){
        ?>
        <tr>
            <td><?php echo $rows_room['Name_Room'] ?></td>
            <td><a href="">Xem</a></td>
            <td><a href="">Xem</a></td>
            <td><a href="">Xem</a></td>
            <td><a href="">Xem</a></td>
            <td><a href="">Xem</a></td>
            <td><a href="">Xem</a></td>
            <td><a href="">Xem</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php } ?>