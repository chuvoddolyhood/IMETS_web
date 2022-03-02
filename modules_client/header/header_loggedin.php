<?php
  if(isset($_GET['logout']) && $_GET['logout']=='logoutclient'){
    unset($_SESSION['login']);
    header('location:index.php');
  }
?>
<!-- 
<header>
    <a href="./index.php"><img src="./modules_client/photo/logo.png" class="logo"></a>
    <div class="toggle" onclick="toggleMenu();"></div>
    <ul class="navigation">
        <li><a href="./index.php">Trang chủ</a></li>
        <li><a href="./index.php?page_layout=product">Sản phẩm</a></li>
        <li><a href="#footer">Liên hệ</a></li>
        <li title="<?php echo $_SESSION['login']; ?>"><a class="modal-btn" style="cursor: pointer;"><i class="fas fa-user" style="color:#333; font-size: 130%;"></i></a></li>
        <li><a href="./index.php?page_layout=cart&username=<?php echo $_SESSION['login']; ?>"><i class="bi bi-bag-plus-fill" style="color:#333; font-size: 130%;" ></i></a></li>
    </ul>
</header>


<div class="modal-bg" style="z-index: 10; cursor: pointer;">
  <div class="modal">
    <label><b><?php echo $_SESSION['login']; ?></b></label>
    <a href="./index.php?page_layout=profile&username=<?php echo $_SESSION['login']; ?>">Hồ sơ của tôi</a>
    <a href="./index.php?page_layout=order&username=<?php echo $_SESSION['login']; ?>">Đơn mua</a>
    <a href="./index.php?logout=logoutclient">Đăng xuất</a>
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
</script> -->


<!-- header section starts  -->

<header class="header">

    <a href="./index.php" class="logo">IMETS&reg;</a>

    <nav class="navbar">
        <a href="#home">Trang chủ</a>
        <a href="#about">Về chúng tôi</a>
        <a href="#services">Dịch vụ</a>
        <a href="#doctors">Bác sĩ</a>
        <a href="#booking">Đặt lịch</a>
        <a href="#blogs">blogs</a>
        <a href="./index.php?logout=logoutclient">Đăng xuất</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<script src="./modules_client/header/header.js"></script>

<!-- header section ends -->