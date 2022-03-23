<?php
  if(isset($_GET['logout']) && $_GET['logout']=='logoutadmin'){
    unset($_SESSION['login_admin']);
    header('location:index.php');
  }
?>

<div id="sidebar">
    <div class="sidebar__title">
        <div class="sidebar__img">
            <!-- <img src="./modules_staff/photo/logo.png" alt="logo" /> -->
            <h1>IMETS</h1>
        </div>
        <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
        ></i>
    </div>

    <div class="sidebar__menu">
        <div class="sidebar__link active_menu_link">
            <i class="fa fa-home"></i>
            <a href="./index.php">Dashboard</a>
        </div>
        <h2>Quản lý bệnh viện</h2>
        <div class="sidebar__link">
            <i class="fas fa-address-card" aria-hidden="true"></i>
            <a href="./index.php?page_layout=staff_management">Quản lý thông tin nhân viên</a>
        </div>
        <div class="sidebar__link">
            <i class="fas fa-user-md"></i>
            <a href="#">Điều phối bác sĩ</a>
        </div>
        <div class="sidebar__link">
            <i class="fas fa-hospital"></i>
            <a href="#">Quản lý phòng làm việc</a>
        </div>
        <h2>Quản lý bệnh</h2>
        <div class="sidebar__link">
            <i class="fas fa-address-book"></i>
            <a href="#">Quản lý thông tin bệnh nhân</a>
        </div>
        <h2>Thống kê</h2>
        <div class="sidebar__link">
            <i class="fas fa-chart-pie"></i>
            <a href="./index.php?page_layout=statistics_management">Số liệu kinh doanh</a>
        </div>
    </div>
</div>
<script src="./modules_admin/sidebar.js"></script>