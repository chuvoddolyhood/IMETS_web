<?php
	include './../config.php';
    $ID_Staff= $_GET['id'];
    // echo $ID_Staff;

	$sql = "SELECT * FROM `staff` WHERE ID_Staff=$ID_Staff";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query);


    if(isset($_POST['btn_submit'])){
        $Name = $_POST['Name_demo'];
        $DOB = $_POST['DOB'];
        $Sex = $_POST['Sex'];
        $Address = $_POST['Address'];
        $CMND = $_POST['CMND'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Position = $_POST['Position'];
        $ID_Dept = $_POST['ID_Dept'];
        $DateStartWork = $_POST['DateStartWork'];

        // echo $Name;
        // echo $DOB;
        // echo $Sex;
        // echo $Address;
        // echo $CMND;
        // echo $PhoneNumber;
        // echo $Position;
        // echo $ID_Dept;
        // echo $DateStartWork;

        $sql_modify_staff = "UPDATE staff SET Name='$Name',DOB='$DOB',Sex='$Sex',Address='$Address',CMND='$CMND',PhoneNumber='$PhoneNumber',Position='$Position',ID_Dept=$ID_Dept,DateStartWork='$DateStartWork' WHERE `ID_Staff`=$ID_Staff";
        $query_modify_staff = mysqli_query($conn, $sql_modify_staff);

        header("location: ./index.php?page_layout=staff_detail&id=$ID_Staff");

    }

?>

<main>
	<div class="nav_tool">
		<div class="link-nav-pages">
			<a href="./index.php?page_layout=staff_management">Quản Lý Thông Tin Nhân Viên</a> / 
			<a href="./index.php?page_layout=staff_detail&id=<?php echo $ID_Staff?>">Xem chi tiết</a> / 
            <a href="">Sửa thông tin</a>
		</div>
		<div class="tool">
			<!-- <a href="./index.php?page_layout=modifyStaff&id= <?php echo $rows["ID_Staff"] ?>" 
                    style="background-color: blue;color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">Xác nhận</a> -->
			<a onclick="return confirm_Cancel()" 
                href="./index.php?page_layout=staff_detail&id=<?php echo $ID_Staff?>" class="btn_delete">Hủy</a>
		</div>
	</div>
    <div class="container-form">
        <div class="header-form">
            <h2>Cập nhật thông tin</h2>
        </div>
        <form id="form" class="form" action="" enctype="multipart/form-data" method="POST">
            <div class="form-control">
                <label for="username">Họ tên</label>
                <input type="text" placeholder="Nhập họ tên" id="name" name="Name_demo" value="<?php echo $rows['Name'] ?>"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Ngày sinh</label>
                <input type="date" placeholder="Nhập ngày sinh" id="name" name="DOB" value="<?php echo $rows['DOB'] ?>"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Giới tính</label>
                <select class="form-control" name="Sex" id="Sex">
                    <option selected>-- Giới tính --</option>
                    <option <?php if($rows['Sex']=="Nam"){echo 'selected="selected"';} ?> value = "Nam" >Nam</option>
                    <option <?php if($rows['Sex']=="Nữ"){echo 'selected="selected"';} ?> value = "Nữ" >Nữ</option>
                    <option <?php if($rows['Sex']=="Khác"){echo 'selected="selected"';} ?> value = "Khác" >Khác</option>
                </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Địa chỉ</label>
                <input type="text" placeholder="Nhập địa chỉ" id="address" name="Address" value="<?php echo $rows['Address'] ?>"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Chứng minh nhân dân</label>
                <input type="number" placeholder="Nhập chứng minh nhân dân" id="CMND" name="CMND" value="<?php echo $rows['CMND'] ?>"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Số điện thoại</label>
                <input type="number" placeholder="Nhập số điện thoại" id="PhoneNumber" name="PhoneNumber" value="<?php echo $rows['PhoneNumber'] ?>"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Vị trí công việc</label>
                <select class="form-control" name="Position">
                    <option selected>-- Chọn vị trí --</option>
                    <option <?php if($rows['Position']=="Bác sĩ"){echo 'selected="selected"';} ?> value = "Bác sĩ" >Bác sĩ</option>
                    <option <?php if($rows['Position']=="Điều dưỡng"){echo 'selected="selected"';} ?> value = "Điều dưỡng" >Điều dưỡng</option>
                    <option <?php if($rows['Position']=="Dược sĩ"){echo 'selected="selected"';} ?> value = "Dược sĩ" >Dược sĩ</option>
                </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Khoa/phòng</label>
                <select class="form-control" name="ID_Dept" name="Dept">
                    <option selected>-- Chọn Khoa --</option>
                    <option <?php if($rows['ID_Dept']=="1"){echo 'selected="selected"';} ?> value = "1" >Khoa Nội tổng hợp</option>
                    <option <?php if($rows['ID_Dept']=="2"){echo 'selected="selected"';} ?> value = "2" >Khoa Cấp cứu</option>
                    <option <?php if($rows['ID_Dept']=="3"){echo 'selected="selected"';} ?> value = "3" >Khoa Nhi</option>
                    <option <?php if($rows['ID_Dept']=="4"){echo 'selected="selected"';} ?> value = "4" >Khoa Mắt</option>
                    <option <?php if($rows['ID_Dept']=="5"){echo 'selected="selected"';} ?> value = "5" >Khoa Sản</option>
                    <option <?php if($rows['ID_Dept']=="6"){echo 'selected="selected"';} ?> value = "6" >Khoa Da liễu</option>
                    <option <?php if($rows['ID_Dept']=="7"){echo 'selected="selected"';} ?> value = "7" >Khoa Thần kinh</option>
                    <option <?php if($rows['ID_Dept']=="8"){echo 'selected="selected"';} ?> value = "8" >Khoa Tim mạch</option>
                    <option <?php if($rows['ID_Dept']=="9"){echo 'selected="selected"';} ?> value = "9" >Khoa Dược</option>
                    <option <?php if($rows['ID_Dept']=="10"){echo 'selected="selected"';} ?> value = "10" >Khoa Nhiễm</option>
                </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Ngày bắt đầu làm</label>
                <input type="date" id="name" name="DateStartWork" value="<?php echo $rows['DateStartWork'] ?>"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>


            <!-- <div class="form-control">
                <label for="username">Username</label>
                <input type="text" placeholder="florinpop17" id="username" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Email</label>
                <input type="email" placeholder="a@florin-pop.com" id="email" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password</label>
                <input type="password" placeholder="Password" id="password"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password check</label>
                <input type="password" placeholder="Password two" id="password2"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div> -->
            <button class="btn_Login" type="submit" name="btn_submit">Cập nhật</button>
        </form>
    </div>
</main>

<!-- <script src="./modules_admin/staff_management/modify_staff.js"> </script> -->