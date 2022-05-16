<?php
  if(isset($_GET['logout']) && $_GET['logout']=='logoutclient'){
    unset($_SESSION['login_client']);
    header('location:index.php');
  }
?>

<!-- header section starts  -->

<header class="header">

  <a href="./index.php" class="logo">IMETS<sup>&reg;</sup></a>

  <form id="labnol">
    <input type="text" id="transcript">
    <a href="#" onclick="startDictation()">
      <i class="fas fa-microphone-alt" aria-hidden="true"></i>
    </a>
    <a onclick="searching()">
      <i class="fa fa-search" aria-hidden="true"></i>
    </a>
  </form>

  <nav class="navbar">
    <a href="./index.php">Trang chủ</a>
    <a href="./index.php?page_layout=doctors">Bác sĩ</a>
    <a href="./index.php?page_layout=booking">Đặt lịch</a>
    <a href="#footer">Liên hệ</a>
    <a class="modal-btn" href="#" title="<?php echo $_SESSION['login_client']; ?>">
      <img width="30" src="./staff/modules_staff/photo/avatar.svg"/>
    </a>
  </nav>

  <div id="menu-btn" class="fas fa-bars"></div>

</header>

<script src="./modules_client/header/header.js"></script>

<!-- header section ends -->
<div class="modal-bg">
  <div class="modal">
    <h1>Khách hàng</h1>
    <h4><?php echo $_SESSION['login_client'] ?></h4>
    <a href="./index.php?page_layout=profile">Hồ sơ của tôi</a>
    <a href="./index.php?page_layout=medicalBook">Sổ khám chữa bệnh</a>
    <div class="sidebar__logout">
      <i class="fa fa-power-off"></i>
      <a href="./index.php?logout=logoutclient">Đăng Xuất</a>
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