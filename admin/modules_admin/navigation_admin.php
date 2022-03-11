<?php
  if(isset($_GET['logout']) && $_GET['logout']=='logoutadmin'){
    unset($_SESSION['login_admin']);
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
        <a href="#" class="modal-btn">
            <!-- <img width="30" src="./modules_staff/photo/avatar.svg" alt="" /> -->
            <i class="fa fa-user-secret" aria-hidden="true"></i>
        </a>
    </div>
</nav>

<div class="modal-bg">
  <div class="modal">
    <h1>Admin</h1>
    <h4><?php echo $_SESSION['login_admin'] ?></h4>
    <!-- <a href="#">Hồ sơ của tôi</a> -->
    <div class="sidebar__logout">
      <i class="fa fa-power-off"></i>
      <a href="./index.php?logout=logoutadmin">Đăng Xuất</a>
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