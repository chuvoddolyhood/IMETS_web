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
        <h2>Quản lý bệnh</h2>
        <div class="sidebar__link">
            <i class="fa fa-heartbeat" aria-hidden="true"></i>
            <a href="./index.php?page_layout=list_patient">Danh sách chờ khám</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-heartbeat" aria-hidden="true"></i>
            <a href="./index.php?page_layout=list_checked_up">Bệnh nhân đã khám</a>
        </div>
        <h2>Quản lý bệnh án</h2>
        <div class="sidebar__link">
            <i class="fa fa-clipboard"></i>
            <a href="./index.php?page_layout=medicalRecord">Bệnh án điện tử</a>
        </div>
        <h2>Quản lý lịch công tác</h2>
        <div class="sidebar__link">
            <i class="fa fa-stethoscope"></i>
            <a href="./index.php?page_layout=bookingSche">Lịch công tác</a>
        </div>
    </div>
</div>