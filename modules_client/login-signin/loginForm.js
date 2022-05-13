const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});



//Kiem tra passsword moi va password nhap lai
function check_rePassword(password,repassword){
  var checked = true;

  if(password!=repassword){
      checked = false;
      alert('Mật khẩu nhập lại và mật khẩu đăng ký không khớp. Thử lại!');
  }
  return checked;   
}

//Kiem tra email dung dinh dang chua
function checkEmail(UserName){
  var confirmEmail=true;

  var regExp = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;
  if (regExp.test(UserName)){
    confirmEmail=true;
  }
  else{
    alert('Email không hợp lệ! Vui lòng thử lại.');
    confirmEmail=false;
  }
  return confirmEmail;
}

//Kiem tra email co ton tai trong database hay khong
function checkEmailExists(HoTenKH, sex_client, dob_client, SoDienThoai, UserName, password){

  //call AJAX
  var ajax = new XMLHttpRequest();
  var method = "GET";
  var url = "./checkEmailExists.php?email="+UserName;
  var asynchronous = true;
  ajax.open(method, url, asynchronous);

  //send
  ajax.send();
      
  //receive
  ajax.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var response = this.responseText;
      // alert(response);
      if(response == "True"){
        alert('Email đã tồn tại. Vui lòng sử dụng Email khác');
      } else {
        //call AJAX
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "./signin.php?HoTenKH="+HoTenKH+"&sex_client="+sex_client+"&dob_client="+dob_client+"&SoDienThoai="+SoDienThoai+"&UserName="+UserName+"&password="+password;
        var asynchronous = true;
        ajax.open(method, url, asynchronous);

        //send
        ajax.send();
          
        //receive
        ajax.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            var response = this.responseText;
            if(response == "True"){
              alert('Đăng ký thành công');
              window.location.href="./loginForm.php";
            } else {
              alert('Đăng ký tài khoản thất bại. Vui Lòng thử lại');
            }  
          }
        }
      }
    }
  }
}


function check_Signin() {
  var HoTenKH = document.getElementById("name_client").value;
  var sex_client = document.getElementById("sex_client").value;
  var dob_client = document.getElementById("dob_client").value;
  var SoDienThoai = document.getElementById("phoneNumber_client").value;
  var UserName = document.getElementById("username_client").value;
  var password = document.getElementById("password_client").value;
  var repassword = document.getElementById("passwordAgain_client").value;

  if(HoTenKH=='' || sex_client=='' || dob_client=='' || SoDienThoai=='' || UserName=='' || password=='' || repassword==''){
    alert('Vui lòng nhập đầy đủ thông tin');
    
  } else if(check_rePassword(password,repassword)==true ) {
    if(checkEmail(UserName)){
      checkEmailExists(HoTenKH, sex_client, dob_client, SoDienThoai, UserName, password);
    }
  }
}


function check_Login() {
  //Gọi các hàm đã viết
  var username_client_login = document.getElementById("username_client_login").value;
  var password_client_login = document.getElementById("password_client_login").value;
  // alert(username_client_login+password_client_login);


  if(username_client_login=='' || password_client_login==''){
    alert('Vui lòng nhập đầy đủ thông tin');
  } else{
    //call AJAX
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "./login.php?username_client_login="+username_client_login+"&password_client_login="+password_client_login;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);

    //send
    ajax.send();
      
    //receive
    ajax.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        var response = this.responseText;
        // alert (response);
        if(response == "true"){
          // alert('Đăng nhập thành công.');
          window.location.href="./../../index.php";
        } else {
          alert('Sai tên đăng nhập hoặc mật khẩu.');
        }  
      }
    }
  }
}