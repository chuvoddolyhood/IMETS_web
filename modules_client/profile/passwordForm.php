<?php 
    $username = $_SESSION['login_client'];
?>

<div class="profile-form">
    <table>
        <input type="hidden" id="username" value="<?php echo $username ?>">
        <tr>
            <th>Mật khẩu cũ</th>
            <td><input type="text" id="old_password"></td>
        </tr>
        <tr>
            <th>Mật khẩu mới</th>
            <td><input type="text" id="new_password" ></td>
        </tr>
        <tr>
            <th>Nhập lại mật khẩu mới</th>
            <td><input type="text" id="renew_password"></td>
        </tr>
    </table>
    <button onclick="save()">Lưu</button>
</div>


<script>
    function save(){
        username = document.getElementById('username').value;
        old_password = document.getElementById('old_password').value;
        new_password = document.getElementById('new_password').value;
        renew_password = document.getElementById('renew_password').value;
        
        //call ajax
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "./modules_client/profile/updatePassword.php?old_password="+old_password+"&new_password="+new_password+"&renew_password="+renew_password+"&username="+username;
        var asynchronous = true;
        ajax.open(method, url, asynchronous);

        //send
        ajax.send();
            
        //receive
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                alert(response);
                
                if(response=='Đổi mật khẩu thành công.'){
                    window.location = "index.php?page_layout=profile&category=password"
                }
            }
        }
    }
</script>