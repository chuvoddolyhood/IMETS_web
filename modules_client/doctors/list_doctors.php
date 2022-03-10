<?php 
    include './config.php';
    $sql = "SELECT *
        FROM staff  JOIN dept ON dept.ID_Dept=staff.ID_Dept
        JOIN img_staff ON staff.ID_Staff=img_staff.ID_Staff
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
            <h3><?php echo $rows["VoteRate"] ?></h3>
            <?php 
                // if($rows["VoteRate"])
                // echo $rows["VoteRate"];
            ?>
            <div class="rating-slider">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="">Xem thông tin</a>
            <a href="">Đặt lịch</a>
        </div>
        <?php
            }
        ?>
    </div>
    

</section>