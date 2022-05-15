<?php
    include './config.php';

    $UserName = $_SESSION['login_client'];

    $sql_get_patient="SELECT  `Name`, `DOB`, `Sex`, `Address`, `CMND`, `PhoneNumber`, `ID_BHYT` FROM `patient` WHERE UserName='$UserName'";
    $query_get_patient = mysqli_query($conn, $sql_get_patient);
    $rows_get_patient = mysqli_fetch_array($query_get_patient);

?>

<div class="profile-form">
    <table>
        <tr>
            <th>Email đăng nhập</th>
            <td><input type="text" id="email_profile" value="<?php echo $UserName?>"></td>
        </tr>
        <tr>
            <th>Họ và tên</th>
            <td><input type="text" id="name_profile" value="<?php echo $rows_get_patient['Name'] ?>"></td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td><input type="text" id="phoneNumber_profile" value="<?php echo $rows_get_patient['PhoneNumber'] ?>"></td>
        </tr>
        <tr>
            <th>Giới tính</th>
            <td>
                <select name="" id="sex_profile">
                    <option value="Nam" <?php if($rows_get_patient['Sex']=='Nam') echo 'selected="selected"' ?> >Nam</option>
                    <option value="Nữ" <?php if($rows_get_patient['Sex']=='Nữ') echo 'selected="selected"' ?>>Nữ</option>
                    <option value="Khác" <?php if($rows_get_patient['Sex']=='Khác') echo 'selected="selected"' ?>>Khác</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Ngày sinh</th>
            <td><input type="date" id="date_profile" value="<?php echo $rows_get_patient['DOB'] ?>"></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><input type="text" id="address_profile" value="<?php echo $rows_get_patient['Address'] ?>"></td>
        </tr>
        <tr>
            <th>Mã số BHYT</th>
            <td><input type="text" id="BHYT_profile" value="<?php echo $rows_get_patient['ID_BHYT'] ?>"></td>
        </tr>
        <tr>
            <th>Chứng minh nhân dân</th>
            <td><input type="text" id="CMND_profile" value="<?php echo $rows_get_patient['CMND'] ?>"></td>
        </tr>
        <tr>
            <th></th>
            <td><button onclick="save()" id="save-profile">Lưu</button></td>
        </tr>
    </table>
    
</div>


<script>
    function save(){
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
</script>