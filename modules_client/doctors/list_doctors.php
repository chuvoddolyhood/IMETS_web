<?php 
    include './config.php';
    $sql = "SELECT *
        FROM staff  JOIN dept ON dept.ID_Dept=staff.ID_Dept
        JOIN img_staff ON staff.ID_Staff=img_staff.ID_Staff
        WHERE staff.Position != 'Admin'
        GROUP BY staff.ID_Staff
        ORDER BY staff.ID_Staff ASC";
    $query = mysqli_query($conn, $sql);
?>
<section class="doctorList">

    <h1> Các bác sĩ của IMETS </h1>
    
    <div class="container-card">
        <?php
            while($rows = mysqli_fetch_array($query)){
        ?>
        <div class="card">
            <div class="card-image"> 
                <img src="./img/staff/<?php echo $rows["imgName"] ?>">
            </div>
            <h2><?php echo $rows["Name"] ?></h2>
            <h3><?php echo $rows["Position"] ?></h3>
            <h3><?php echo $rows["Name_Dept"] ?></h3>
            <!-- <h3><?php echo $rows["VoteRate"] ?></h3> -->
            
            <div class="rating-slider">
                <?php
                    $numberOfStar = round($rows["VoteRate"]);
                    // echo 'full:'.$numberOfStar;
                    $fullStart=0;
                    while($fullStart < $numberOfStar){
                        $fullStart++;
                    ?>
                        <i class="fas fa-star"></i>
                <?php } 
                    $numberOfStar_empty = 5-round($rows["VoteRate"]);
                    // echo 'empty:'.$numberOfStar_empty;
                    $i=0;
                    while($i < $numberOfStar_empty){
                        $i++;
                ?>
                    <i class="far fa-star"></i>
                <?php } ?>
            </div>
            <a href="./index.php?page_layout=detail_doctors&id= <?php echo $rows['ID_Staff'] ?>">Xem thông tin</a>
            <a href="">Đặt lịch</a>
        </div>
        <?php
            }
        ?>
    </div>
    

</section>