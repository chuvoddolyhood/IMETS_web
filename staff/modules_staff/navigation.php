<?php
  if(isset($_GET['logout']) && $_GET['logout']=='logoutstaff'){
    unset($_SESSION['login_staff']);
    header('location:index.php');
  }
?>

<nav class="navbar">
    <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
    <div class="navbar__left">
        <!-- <a href="#">Subscribers</a>
        <a href="#">Video Management</a> -->
        <a class="active_link" href="#">Admin</a>
    </div>
    <div class="navbar__right">
        <a href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
        </a>
        <a href="#">
            <!-- <i class="fa fa-clock-o" aria-hidden="true"></i> -->
            <i class="far fa-bell" aria-hidden="true"></i>
        </a>
        <a class="modal-btn" href="#">
            <img width="30" src="./modules_staff/photo/avatar.svg" alt="" />
            <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
        </a>
    </div>
</nav>

<div class="modal-bg">
  <div class="modal">
    <h1>Staff</h1>
    <h4><?php echo $_SESSION['login_staff'] ?></h4>
    <!-- <a href="#">Hồ sơ của tôi</a> -->
    <div class="sidebar__logout">
      <i class="fa fa-power-off"></i>
      <a href="./index.php?logout=logoutstaff">Đăng Xuất</a>
    </div>
    <span class="modal-close">X</spsan>
  </div>
</div>

<script type="text/javascript">
  var modalBtn = document.querySelector('.modal-btn'); //sua ten
  var modalBg = document.querySelector('.modal-bg');
  var modalClose = document.querySelector('.modal-close');

  modalBtn.addEventListener('click', function(){
    modalBg.classList.add('bg-active');
  });
  
  modalClose.addEventListener('click', function(){
    modalBg.classList.remove('bg-active');
  });
</script>