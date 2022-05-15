<?php
    if(isset($_GET['category'])){
        $category = $_GET['category'];
        $type ='';
        if($category == 'personalInfo'){
            $type ='Thông tin cá nhân';
        } else if($category == 'password'){
            $type ='Thay đổi mật khẩu';
        }
    } else {
        $type ='Thông tin cá nhân';
    }
?>

<section class="doctorList">
    <h1> <?php echo $type ?> </h1>
    <div class="content-profile">
        <div class="container-category">
            <div class="category-items">
                <i class='fas fa-user-circle'></i>
                <a href="index.php?page_layout=profile&category=personalInfo">Thông tin cá nhân</a>
            </div>
            <div class="category-items">
                <i class='fas fa-lock'></i>
                <a href="index.php?page_layout=profile&category=password">Đổi mật khẩu</a>
            </div>
        </div>
        <div class="container-profile">
            <?php include './modules_client/profile/mainProfile.php' ?>
        </div>
    </div>
</section>

<script src="./modules_client/profile/checkUpdate.js"></script>