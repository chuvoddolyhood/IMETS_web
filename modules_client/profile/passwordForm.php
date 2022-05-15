<?php 
    $username = $_SESSION['login_client'];
?>

<div class="profile-form">
    <table>
        <input type="hidden" id="username" value="<?php echo $username ?>">
        <tr>
            <th>Mật khẩu cũ</th>
            <td><input type="password" id="old_password"></td>
        </tr>
        <tr>
            <th>Mật khẩu mới</th>
            <td><input type="password" id="new_password" ></td>
        </tr>
        <tr>
            <th>Nhập lại mật khẩu mới</th>
            <td><input type="password" id="renew_password"></td>
        </tr>
        <tr>
            <td></td>
            <td><button onclick="save()" id="save-profile">Lưu</button></td>
        </tr>
    </table>
</div>