<main>
    <div class="container-table">
        <div class="table-header">
            <h1>Danh sách thông tin bệnh nhân</h1>
        </div>
        <div class="table-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>MSBN</th>
                        <th>Họ tên</th>
                        <th>Năm sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>CMND</th>
                        <th>Số điện thoại</th>
                        <th>BHYT</th>
                        <th>Xem thông tin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './../config.php';
                            $sql = "SELECT * FROM patient";
                            $count_patient=0;
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["ID_Patient"] ?></td>
                                <td><?php echo $rows["Name"] ?></td>
                                <td><?php echo $rows["DOB"] ?></td>
                                <td><?php echo $rows["Sex"] ?></td>
                                <td><?php echo $rows["Address"] ?></td>
                                <td><?php echo $rows["CMND"] ?></td>
                                <td><?php echo $rows["PhoneNumber"] ?></td>
                                <td><?php echo $rows["ID_BHYT"] ?></td>
                                <?php $count_patient++ ?>
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
            <p><b><?php echo 'Số lượng nhân viên: '. $count_patient ?></b></p>
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
            <div>
                <label class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="Name" require>
            </div>
            <div>
                <label class="form-label">DOB</label>
                <input type="date" class="form-control" name="DOB" require>
            </div>
            <div>
                <label for="">Giới tính</label>
                <select class="form-control" name="Sex">
                    <option selected>Giới tính</option>
                    <option value = "Nam" >Nam</option>
                    <option value = "Nữ" >Nữ</option>
                    <option value = "Khác" >Khác</option>
                </select>
            </div>
            <div>
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="Address" require>
            </div>
            <div>
                <label class="form-label">CMND</label>
                <input type="text" class="form-control" name="CMND" require>
            </div>
            <div>
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="PhoneNumber" require>
            </div>
            <div>
                <label for="">Vị trí công việc</label>
                <select class="form-control" name="Position">
                    <option selected>Chọn vị trí</option>
                    <option value = "Bác sĩ" >Bác sĩ</option>
                    <option value = "Điều dưỡng" >Điều dưỡng</option>
                    <option value = "Dược sĩ" >Dược sĩ</option>
                </select>
            </div>
            <div>
                <label for="">Khoa/phòng</label>
                <select class="form-control" name="ID_Dept">
                    <option selected>Chọn Khoa</option>
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
            <div>
                <label class="form-label">Ngày bắt đầu</label>
                <input type="date" class="form-control" name="DateStartWork" require>
            </div>
            <div>
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" name="Username" require>
            </div>
            <div>
                <label class="form-label">Mật khẩu</label>
                <input type="text" class="form-control" name="Password" require>
            </div>
            <div class="form-group">
                <label for="">Ảnh</label><br />
                <input type="file" name="fileupload[]" multiple="multiple" required>
            </div>
        </div>
      <div class="modal-footer">
          <button type="button" class="modal-close-add-btn">Đóng</button>
          <button type="submit" class="btn btn-primary" name="btn_submit">Thêm</button>
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