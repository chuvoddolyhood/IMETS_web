<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./../style/login.css" />
  <title>Log in</title>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <!-- Đăng nhập -->
        <form class="sign-in-form">
          <h2 class="title">Đăng nhập</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username_client_login" id="username_client_login" placeholder="Email" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-key"></i>
            <input type="password" name="password_client_login" id="password_client_login" placeholder="Mật khẩu" required/>
          </div>
          <input type="button" value="Đăng nhập" class="btn solid" name="btn_login" onclick="check_Login()" />
          <a class="modal-btn" href="#">Quên mật khẩu?</a>
          <!-- <input type="button" class="btn" value="Đăng nhập" onclick="check_Login()"/> -->
          <!-- <p class="social-text">Đăng nhập bằng phương thức khác</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-apple"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div> -->
        </form>

        <!-- Đăng ký -->
        <form class="sign-up-form">
          <h2 class="title">Đăng ký</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" id="name_client" placeholder="Họ và tên" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-id-card"></i>
            <select id="sex_client" placeholder="Giới tính" required>
              <option value="Nam">Nam</option>
              <option value="Nữ">Nữ</option>
              <option value="Khác">Khác</option>
            </select>
          </div>
          <div class="input-field">
            <i class="fas fa-calendar"></i>
            <input type="date" id="dob_client" min="1910-01-01" placeholder="Ngày sinh" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-phone"></i>
            <input type="text" id="phoneNumber_client" placeholder="Số điện thoại" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-at"></i>
            <input type="text" id="username_client" placeholder="Email" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="password_client" placeholder="Mật khẩu" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="passwordAgain_client" placeholder="Nhập lại mật khẩu" required/>
          </div>
          <input type="button" class="btn" value="Đăng ký" onclick="check_Signin()"/>
          <!-- <p class="social-text">Đăng ký bằng phương thức khác</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-apple"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div> -->
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Nếu bạn chưa có tài khoản ?</h3>
          <p>
            Hãy đăng ký để được nhận sự giúp đỡ từ đội ngũ y tế của chúng tôi.
          </p>
          <button class="btn transparent" id="sign-up-btn" style="margin-right: 1vw">
            Đăng ký
          </button>
          <button class="btn transparent homepage" id="back-homepage-btn">
            <a href="./../.." style="text-decoration: none; color:#fff">Về Trang chủ</a>
          </button>
        </div>
        <img src="./../photo/medicine.svg" class="image" alt="" />
        <!-- <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_olluraqu.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;"  loop autoplay></lottie-player> -->
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Bạn muốn đăng ký khám bệnh ?</h3>
          <p>
            Hãy click vào nút đăng nhập để chúng tôi có thể tiến hành ghi nhận tình trạng sức khỏe của bạn.
          </p>
          <button class="btn transparent" id="sign-in-btn" style="margin-right: 1vw">
            Đăng nhập
          </button>
          <button class="btn transparent" id="back-homepage-btn">
            <a href="./../.."style="text-decoration: none; color:#fff">Về Trang chủ</a>
          </button>
        </div>
        <img src="./../photo/doctors.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="loginForm.js"></script>
</body>

</html>


<div class="modal-bg">
  <div class="modal">
    <h1>Quên mật khẩu</h1>
    <form action="" method="post">
      <label for="">Email</label>
      <input type="text" id="email-forgot" placeholder="Vui lòng nhập Email">
      <button onclick="forgotPassword()">ok</button>
    </form>    
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


  function forgotPassword() {
    //Gọi các hàm đã viết
    var email = document.getElementById("email-forgot").value;

    // alert(email);

    //call AJAX
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "./forgotPass.php?email="+email;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);

    //send
    ajax.send();
        
    //receive
    ajax.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        var response = this.responseText;
        alert(response);
        // if(response == "True"){
        //   alert('Đăng ký thành công');
        //   window.location.href="./loginForm.php";
        // } else {
        //   alert('Không thể đăng ký do tài khoản tồn tại. Vui Lòng thử lại');
        // }  
      }
    }
  }
</script>