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

        $tue = strtotime ( '+1 day' , strtotime ( $dateStart ) );
        $wed = strtotime ( '+2 day' , strtotime ( $dateStart ) );
        $thu = strtotime ( '+3 day' , strtotime ( $dateStart ) );
        $fri = strtotime ( '+4 day' , strtotime ( $dateStart ) );
        $sat = strtotime ( '+5 day' , strtotime ( $dateStart ) );
        $sun = strtotime ( '+6 day' , strtotime ( $dateStart ) );
        
?>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Tên phòng</th>
            <th>Thứ 2 <?php echo date('d-m-Y', strtotime($dateStart)); ?></th>
            <th>Thứ 3 <?php echo date ( 'd-m-Y' , $tue ); ?></th>
            <th>Thứ 4 <?php echo date ( 'd-m-Y' , $wed ); ?></th>
            <th>Thứ 5 <?php echo date ( 'd-m-Y' , $thu ); ?></th>
            <th>Thứ 6 <?php echo date ( 'd-m-Y' , $fri ); ?></th>
            <th>Thứ 7 <?php echo date ( 'd-m-Y' , $sat ); ?></th>
            <th>Chủ nhật <?php echo date ( 'd-m-Y' , $sun ); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            include './../config.php';
            $sql_room = "SELECT * FROM `room`";
            $query_room = mysqli_query($conn, $sql_room);
            while($rows_room = mysqli_fetch_array($query_room)){
        ?>
        <tr>
            <td><?php echo $rows_room['Name_Room'] ?></td>
            <td><a href="./index.php?page_layout=detailDateWorking&ID_Room=<?php echo $rows_room['ID_Room'] ?>&date=<?php echo date('Y-m-d', strtotime($dateStart)); ?>">Xem</a></td>
            <td><a href="./index.php?page_layout=detailDateWorking&ID_Room=<?php echo $rows_room['ID_Room'] ?>&date=<?php echo date ('Y-m-d' , $tue ); ?>">Xem</a></td>
            <td><a href="./index.php?page_layout=detailDateWorking&ID_Room=<?php echo $rows_room['ID_Room'] ?>&date=<?php echo date ('Y-m-d' , $wed ); ?>">Xem</a></td>
            <td><a href="./index.php?page_layout=detailDateWorking&ID_Room=<?php echo $rows_room['ID_Room'] ?>&date=<?php echo date ('Y-m-d' , $thu ); ?>">Xem</a></td>
            <td><a href="./index.php?page_layout=detailDateWorking&ID_Room=<?php echo $rows_room['ID_Room'] ?>&date=<?php echo date ('Y-m-d' , $fri ); ?>">Xem</a></td>
            <td><a href="./index.php?page_layout=detailDateWorking&ID_Room=<?php echo $rows_room['ID_Room'] ?>&date=<?php echo date ('Y-m-d' , $sat ); ?>">Xem</a></td>
            <td><a href="./index.php?page_layout=detailDateWorking&ID_Room=<?php echo $rows_room['ID_Room'] ?>&date=<?php echo date ('Y-m-d' , $sun ); ?>">Xem</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php } ?>