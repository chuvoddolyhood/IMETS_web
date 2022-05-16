//Check change personal information
function savePersonalInfor(){
    email_profile = document.getElementById('email_profile').value;
    name_profile = document.getElementById('name_profile').value;
    phoneNumber_profile = document.getElementById('phoneNumber_profile').value;
    date_profile = document.getElementById('date_profile').value;
    address_profile = document.getElementById('address_profile').value;
    BHYT_profile = document.getElementById('BHYT_profile').value;
    CMND_profile = document.getElementById('CMND_profile').value;
    
    
    //Lay gia tri trong select
    e = document.getElementById("sex_profile");
    sex_profile = e.options[e.selectedIndex].text;

    // alert(sex_profile);

    if(email_profile=='' || name_profile=='' || phoneNumber_profile=='' || date_profile=='' || address_profile=='' || BHYT_profile=='' || CMND_profile=='' || sex_profile==''){
        alert('Vui lòng nhập đầy đủ thông tin.');    
    } else {
        //call ajax
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "./modules_client/profile/saveInfo.php?email_profile="+email_profile+"&name_profile="+name_profile+"&phoneNumber_profile="+phoneNumber_profile+"&date_profile="+date_profile+"&address_profile="+address_profile+"&BHYT_profile="+BHYT_profile+"&CMND_profile="+CMND_profile+"&sex_profile="+sex_profile;
        var asynchronous = true;
        ajax.open(method, url, asynchronous);

        //send
        ajax.send();
            
        //receive
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                
                if(response=='true'){
                    alert('Đã thay đổi thành công.');
                } else {
                    alert('Không thể thay đổi. Vui lòng thử lại.');
                }
            }
        }
    }    
}



//Kiem tra passsword moi va password nhap lai
function check_rePassword(password,repassword){
    var checked = true;
    if(password==repassword){
        checked=true;
    } else {
        alert('Mật khẩu nhập lại và mật khẩu đăng ký không khớp. Thử lại!');
        checked=false;
    } 
    return checked;  
}

//Kiem tra passsword cu
function check_oldPassword(username,old_password,new_password){
  
    //call ajax
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "./modules_client/profile/check_oldPassword.php?username="+username+"&old_password="+old_password;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);

    //send
    ajax.send();
        
    //receive
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var response = this.responseText;
            // alert(response);
            
            if(response=='false'){
                alert('Mật khẩu cũ không chính xác.');
            } else {
                //call ajax
                var ajax = new XMLHttpRequest();
                var method = "GET";
                var url = "./modules_client/profile/updatePassword.php?new_password="+new_password+"&username="+username;
                var asynchronous = true;
                ajax.open(method, url, asynchronous);

                //send
                ajax.send();
                    
                //receive
                ajax.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        var response = this.responseText;
                        
                        if(response=='true'){
                            alert ('Đổi mật khẩu thành công.');
                            window.location = "index.php?page_layout=profile&category=password"
                        } else {
                            alert ('Có lỗi. Không đổi được mật khẩu.');
                        }
                    }
                }
            }
        }
    } 
}


function updatePassword(){
    username = document.getElementById('username').value;
    old_password = document.getElementById('old_password').value;
    new_password = document.getElementById('new_password').value;
    renew_password = document.getElementById('renew_password').value;

    if(old_password=='' || new_password=='' || renew_password==''){
      alert('Vui lòng nhập đầy đủ thông tin');
      
    } else if(check_rePassword(new_password,renew_password)) {
        check_oldPassword(username,old_password,new_password);
    }
}