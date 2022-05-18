<main>
    <div class="container-table">
        <div class="table-header">
            <h1>Danh sách nhân viên</h1>
        </div>
        <div class="table-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn_add">Thêm nhân viên</button>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>MSNV</th>
                        <th>Hình ảnh</th>
                        <th>Họ tên</th>
                        <th>Năm sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>CMND</th>
                        <th>Số điện thoại</th>
                        <th>Chức vụ</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './../config.php';
                            $sql = "SELECT *
                                FROM staff  JOIN dept ON dept.ID_Dept=staff.ID_Dept
                                JOIN img_staff ON staff.ID_Staff=img_staff.ID_Staff
                                WHERE staff.Position != 'Admin'
                                GROUP BY staff.ID_Staff
                                ORDER BY staff.ID_Staff ASC";
                            $count_nhanvien=0;
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["ID_Staff"] ?></td>
                                <td><img src="./../img/staff/<?php echo $rows["imgName"] ?>" style="width: 30%"></td>
                                <td><?php echo $rows["Name_Staff"] ?></td>
                                <td><?php echo $rows["DOB_Staff"] ?></td>
                                <td><?php echo $rows["Sex_Staff"] ?></td>
                                <td><?php echo $rows["Address_Staff"] ?></td>
                                <td><?php echo $rows["CMND_Staff"] ?></td>
                                <td><?php echo $rows["PhoneNumber_Staff"] ?></td>
                                <td><?php echo $rows["Position"] ?></td>
                                <?php $count_nhanvien++ ?>
                                <td>
                                    <a 
                                    href="./index.php?page_layout=staff_detail&id= <?php echo $rows['ID_Staff'] ?>"
                                    style="background-color: green;color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                        Xem
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tr>
                </thead>
            </table>
            <p><b><?php echo 'Số lượng nhân viên: '. $count_nhanvien ?></b></p>
        </div>
    </div>
</main>

<script>
    function confirm_Del(name){
        return confirm("Bạn có chắc muốn xóa nhân viên "+ name + "?");
    }
</script>

<!-- ############################# Modal Thêm nhân viên ######################################## -->
<div class="modal-bg-add">
  <div class="modal-add">
    <h2>Thêm nhân viên</h2>
    <form action="./modules_admin/staff_management/add_staff.php" enctype="multipart/form-data" method="POST"> 
        <div class="modal-body">
            <div class="modal-body-part">
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="Name" placeholder="Họ tên" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-calendar"></i>
                    <input type="date" name="DOB" placeholder="Ngày sinh" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-id-card"></i>
                    <select name="Sex" placeholder="Giới tính" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="Address" placeholder="Địa chỉ" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="CMND" placeholder="CMND" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input type="number" name="PhoneNumber" placeholder="Số điện thoại" required/>
                </div>
            </div>
            <div class="modal-body-part">
                <div class="input-field">
                    <i class="fas fa-id-card"></i>
                    <select name="Position" placeholder="Vị trí công việc" required>
                        <option value = "Bác sĩ" >Bác sĩ</option>
                        <option value = "Điều dưỡng" >Điều dưỡng</option>
                        <option value = "Dược sĩ" >Dược sĩ</option>
                    </select>
                </div>
                <div class="input-field">
                    <i class="fas fa-id-card"></i>
                    <select name="ID_Dept" placeholder="Khoa/phòng" required>
                        <option value = "1" >Khoa Nội tổng hợp</option>
                        <option value = "2" >Khoa Cấp cứu</option>
                        <option value = "3" >Khoa Nhi</option>
                        <option value = "4" >Khoa Mắt</option>
                        <option value = "5" >Khoa Sản</option>
                        <option value = "6" >Khoa Da liễu</option>
                        <option value = "7" >Khoa Thần kinh</option>
                        <option value = "8" >Khoa Tim mạch</option>
                        <option value = "9" >Khoa Dược</option>
                        <option value = "10" >Khoa Nhiễm</option>
                    </select>
                </div>
                <div class="input-field">
                    <title>Ngày làm việc</title>
                    <i class="fas fa-calendar"></i>
                    <input type="date" name="DateStartWork" placeholder="Ngày bắt đầu" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" name="Username" placeholder="Tên đăng nhập" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="Password" placeholder="Mật khẩu" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-photo"></i>
                    <input type="file" name="fileupload[]" placeholder="Ảnh" multiple="multiple" required/>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn" name="btn_submit" value="Thêm"/>
        </div>
    </form>  
    <span class="modal-close-add">X</spsan>
  </div>
</div>

<script type="text/javascript">
  var modalBtn_add = document.querySelector('.btn_add'); //sua ten
  var modalBg_add = document.querySelector('.modal-bg-add');
  var modalClose_add = document.querySelector('.modal-close-add');
  var btn_Close_add = document.querySelector('.modal-close-add-btn');

  modalBtn_add.addEventListener('click', function(){
    modalBg_add.classList.add('bg-active-add');
  });
  
  modalClose_add.addEventListener('click', function(){
    modalBg_add.classList.remove('bg-active-add');
  });

  btn_Close_add.addEventListener('click', function(){
    modalBg_add.classList.remove('bg-active-add');
  });
</script>