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
        <a href="./modules_client/login-signin/loginForm.php" name="login_btn">Đăng nhập</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<script src="./modules_client/header/header.js"></script>

<!-- header section ends -->