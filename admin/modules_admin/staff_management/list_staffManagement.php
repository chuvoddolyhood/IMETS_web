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
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './../config.php';
                            $sql = "SELECT *
                                FROM staff  JOIN dept ON dept.ID_Dept=staff.ID_Dept
                                JOIN img_staff ON staff.ID_Staff=img_staff.ID_Staff
                                GROUP BY staff.ID_Staff
                                ORDER BY staff.ID_Staff ASC";
                            $count_nhanvien=0;
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["ID_Staff"] ?></td>
                                <td><img src="./../img/staff/staff_<?php echo $rows["ID_Staff"] ?>/<?php echo $rows["imgName"] ?>" style="width: 30%"></td>
                                <td><?php echo $rows["Name"] ?></td>
                                <td><?php echo $rows["DOB"] ?></td>
                                <td><?php echo $rows["Sex"] ?></td>
                                <td><?php echo $rows["Address"] ?></td>
                                <td><?php echo $rows["CMND"] ?></td>
                                <td><?php echo $rows["PhoneNumber"] ?></td>
                                <td><?php echo $rows["Position"] ?></td>
                                <?php $count_nhanvien++ ?>
                                <td>
                                        <a 
                                        href="./index.php?page_layout=staff_detail&id= <?php echo $rows['ID_Staff'] ?>"
                                        style="background-color: green;color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                            Xem
                                        </a>
                                    </td>
                                <td>
                                        <!-- <button type="button" class="btn_modify">Sửa</button> -->

                                        <!-- <button type="button" class="btn btn-warning modifybtn">Sửa</button> -->
                                    <a href="./index.php?page_layout=modifyStaff&id= <?php echo $rows["MSNV"] ?>" 
                                        style="background-color: rgb(255, 187, 0);color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                        Sửa
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
    <form action="./modules_admin/staff_management/add.php" enctype="multipart/form-data" method="POST"> 
      <div class="modal-body">
          <div>
              <label class="form-label">Họ tên</label>
              <input type="text" class="form-control" name="HoTenNV" require>
          </div>
          <div>
              <label class="form-label">DOB</label>
              <input type="date" class="form-control" name="HoTenNV" require>
          </div>
          <div>
              <label for="">Giới tính</label>
              <select class="form-control" name="ChucVu">
                  <option selected>Chọn chức vụ</option>
                  <option value = "Quản lý" >Nam</option>
                  <option value = "Nhân viên bán hàng" >Nữ</option>
                  <option value = "Nhân viên giao hàng" >Khác</option>
              </select>
          </div>
          <div class="mb-3">
              <label class="form-label">Địa chỉ</label>
              <input type="text" class="form-control" name="DiaChi" require>
          </div>
          <div class="mb-3">
              <label class="form-label">Số điện thoại</label>
              <input type="text" class="form-control" name="SoDienThoai" require>
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

<!-- ############################# Modal Sửa nhân viên ######################################## -->

<div class="modal-bg-modify">
  <div class="modal-modify">
    <h2>Chỉnh sửa thông tin nhân viên</h2>
    <form action="./staff_management/staff.php?page_staff=modify" method="POST"> 
        <div class="modal-body">
            <input type="hidden" name="MSNV_modify" id="MSNV_modify">
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="HoTenNV_modify" id="HoTenNV_modify" require>
            </div>
            <div class="form-group">
                <label for="">Chức vụ</label>
                <select class="form-control" name="ChucVu_modify" id="ChucVu_modify">
                    <option selected>Chọn chức vụ</option>
                    <option value = "Quản lý">Quản Lý</option>
                    <option value = "Nhân viên bán hàng">Nhân viên bán hàng</option>
                    <option value = "Nhân viên giao hàng">Nhân viên giao hàng</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="DiaChi_modify" id="DiaChi_modify" require>
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="SoDienThoai_modify" id="SoDienThoai_modify" require>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary" name="btn_modify">Xác nhận</button>
        </div>
    </form>       
    <span class="modal-close-modify">X</spsan>
  </div>
</div>

<script type="text/javascript">
  var modalBtn_modify = document.querySelector('.btn_modify'); //sua ten
  var modalBg_modify = document.querySelector('.modal-bg-modify');
  var modalClose_modify = document.querySelector('.modal-close-modify');

  modalBtn_modify.addEventListener('click', function(){
    modalBg_modify.classList.add('bg-active-modify');
  });
  
  modalClose_modify.addEventListener('click', function(){
    modalBg_modify.classList.remove('bg-active-modify');
  });
</script>

<!-- CHỈNH SỬA THÔNG TIN NHÂN VIÊN -->
<!-- <script>
    $(document).ready(function(){
        $('.modifybtn').on('click', function(){

            $('#modify_product_Modal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#MSNV_modify').val(data[0]);
            $('#HoTenNV_modify').val(data[1]);
            $('#ChucVu_modify').val(data[2]);
            $('#DiaChi_modify').val(data[3]);
            $('#SoDienThoai_modify').val(data[4]);
        });
    });
</script> -->
