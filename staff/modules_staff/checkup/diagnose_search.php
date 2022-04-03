<?php
    include './../../../config.php';

    $sql = "SELECT * FROM disease WHERE TitleDisease LIKE '%".$_POST['name']."%'";
    $query = mysqli_query($conn, $sql);

    $ID_Appointment = $_POST['ID_Appointment'];
    // echo $ID_Appointment;
?>

<div id="user">
    <ul>
        <?php 
            if(mysqli_num_rows($query)>0){
                while($rows = mysqli_fetch_array($query)){
        ?>
        <li>
            <a href="./modules_staff/checkup/diagnose_add_disease.php?id_disease=<?php echo $rows['ID_Disease'] ?>&ID_Appointment=<?php echo $ID_Appointment ?>">
                <span><?php echo $rows['TitleDisease'] ?></span>
            </a>            
        </li>
        <?php
                }
            }else{
                echo 'Không tìm thấy';
            }
        ?>
    </ul>
                
</div>
    

